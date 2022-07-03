package com.example.springserver.photos;

import com.example.springserver.notepad.Notepad;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface PhotosRepository extends JpaRepository<Photos, Long> {

  List findAllPhotosByUserId(int id);

}
