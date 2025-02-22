<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PatchNoteRequest;
use App\Http\Requests\Web\PostNoteRequest;
use App\Http\Requests\Web\SignupRequest;
use App\Service\NoteService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
    public function __construct(private UserService $userService, private NoteService $noteService) {}

    public function signup(SignupRequest $request)
    {
        $this->userService->signup($request->all());

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials, true)) {
            return redirect('/');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function postNote(PostNoteRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $this->noteService->save($data);

        return back();
    }

    public function patchNote(PatchNoteRequest $request, string $noteId)
    {
        $this->noteService->updateById($noteId, $request->all());

        return back();
    }

    public function deleteNote(string $noteId)
    {
        $this->noteService->deleteById((int) $noteId);

        return back();
    }
}
