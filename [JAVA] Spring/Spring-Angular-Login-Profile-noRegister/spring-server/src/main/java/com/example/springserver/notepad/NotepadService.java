package com.example.springserver.notepad;

import com.example.springserver.photos.PhotosRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class NotepadService {

  @Autowired
  private NotepadRepository notepadRepository;

  public List getUserNotes(int id){
    return notepadRepository.findAllNotepadByUserId(id);
  }

}
