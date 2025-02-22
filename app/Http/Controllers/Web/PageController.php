<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service\NoteService;
use Inertia\Inertia;

class PageController extends Controller
{
    public function __construct(private NoteService $noteService) {}

    public function home()
    {
        return Inertia::render('Home', [
            'notes' => $this->noteService->findAll()
        ]);
    }

    public function signup()
    {
        return Inertia::render('Signup');
    }

    public function login()
    {
        return Inertia::render('Login');
    }
}
