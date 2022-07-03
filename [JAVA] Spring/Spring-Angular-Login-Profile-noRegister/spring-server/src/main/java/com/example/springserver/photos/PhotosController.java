package com.example.springserver.photos;

import com.example.springserver.user.UserService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;


@RestController
@CrossOrigin(origins = "*", allowedHeaders = "*")
@RequestMapping("/photos")
public class PhotosController {

  @Autowired
  private PhotosService photosService;

  @GetMapping("/{id}")
  public List getPhotos(@PathVariable int id){
    return this.photosService.getUserPhotos(id);
  }
}
