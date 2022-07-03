package com.example.springserver.notepad;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface NotepadRepository extends JpaRepository<Notepad, Long>
{

  List findAllNotepadByUserId(int id);
}
