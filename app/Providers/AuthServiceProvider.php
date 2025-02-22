<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('jwt', function (Request $request) {
            $split_token = explode(' ', $request->header('authorization'));

            if($split_token[0] != 'Bearer') {
                return response()->json(['status' => 401, 'message' => 'The Authorization prefix must "Bearer"'], 401);
            }

            try {
                $payload = JWT::decode($split_token[1], env('JWT_KEY'));
                $user = User::find($payload->uid);

                return $user;
            } catch (Exception $error) {
                return response()->json(['status' => 401, 'message' => $error->getMessage()], 401);
            }
        });
    }
}
