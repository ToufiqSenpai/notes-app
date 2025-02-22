<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostNoteRequest;
use App\Service\NoteService;

class NoteController extends Controller
{
    public function __construct(private NoteService $noteService) {}

    public function post(PostNoteRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user->id;

        $note = $this->noteService->save($data);

        return response()->json($note, 201);
    }
}
