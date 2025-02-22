<?php

namespace App\Service;

use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;

class NoteServiceImpl implements NoteService
{
  public function save(array $data): Note
  {
    $note = new Note($data);
    $note->save();

    return $note;
  }

  public function findAll()
  {
    return Note::all();
  }

  public function findById(int $id): Note
  {
    return Note::find($id);
  }

  public function updateById(int $id, array $data): Note
  {
    $note = Note::find($id);
    $note->update($data);

    return $note;
  }

  public function deleteById(int $id): void
  {
    Note::find($id)->delete();
  }
}