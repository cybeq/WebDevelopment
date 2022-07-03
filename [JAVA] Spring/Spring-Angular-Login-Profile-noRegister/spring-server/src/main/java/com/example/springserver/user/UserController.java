package com.example.springserver.user;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.Map;
import java.util.Optional;

@CrossOrigin(origins = "*", allowedHeaders = "*")
@RequestMapping("/")
@RestController
public class UserController {
  @Autowired
  private UserService userService;

  @PostMapping("/login")
  public Optional login(@RequestBody User data){
    User user = this.userService.login(data);
    if(user==null){
      return Optional.of(Map.of("error","no_user"));
    }
    if(user.getPassword().equals(data.getPassword())){
      return Optional.of(user);
    }
    return Optional.of(Map.of("error","wrong_password"));
  }

  @PostMapping("/register")
  public void register(@RequestBody User data){
    this.userService.register(data);
  }
  @GetMapping("/getdata/{id}")
  public User getdData(@PathVariable int id){
    return this.userService.getData(id);
  }

}
