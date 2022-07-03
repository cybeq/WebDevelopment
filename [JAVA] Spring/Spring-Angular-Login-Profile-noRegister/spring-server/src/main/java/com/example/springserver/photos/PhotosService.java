package com.example.springserver.photos;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class PhotosService {
  @Autowired
  private PhotosRepository photosRepository;

  public List getUserPhotos(int id) {
    return this.photosRepository.findAllPhotosByUserId(id);
  }
}
