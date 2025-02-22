<?php

namespace App\Service;

use App\Models\Note;

interface NoteService 
{
  public function save(array $data): Note;
  
  public function findAll();

  public function findById(int $id): Note;

  public function updateById(int $id, array $data): Note;

  public function deleteById(int $id): void;
}