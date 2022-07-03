package com.example.springserver.user;

import com.example.springserver.photos.Photos;
import lombok.*;

import javax.persistence.*;
import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

@Entity
@Data
@Table(name="users")
@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class User {
@Id
@GeneratedValue(strategy = GenerationType.AUTO)
private int id;
private String username;
private String email;
private String password;

  @OneToOne(mappedBy = "user")
  private Photos photos;



  public void setPassword(String password) throws NoSuchAlgorithmException {
    StringBuilder stringBuilder = new StringBuilder();
    String[] pass = {password, "saltyIce"};
    for( String pas : pass) {
      MessageDigest md = MessageDigest.getInstance("SHA-256");
      byte[] md5sum = md.digest(pas.getBytes());
      String output = String.format("%032X", new BigInteger(1, md5sum));
      stringBuilder.append(output);
    }
    this.password = stringBuilder.toString();
  }


}
