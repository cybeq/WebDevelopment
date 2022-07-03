package com.example.springserver.user;

import com.example.springserver.photos.Photos;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.Optional;

@Service
public class UserService {
  @Autowired
  private UserRepository userRepository;

  public User login(User user) {
  return  userRepository.findUserByEmail(user.getEmail());
  }

  public User register(User user){
    return userRepository.save(user);
  }


  public User getData(int id) {
    return userRepository.findUserById(id);
  }

}
