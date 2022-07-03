package com.example.springserver.photos;

import com.example.springserver.user.User;
import lombok.*;

import javax.persistence.*;

@Entity
@Data
@AllArgsConstructor
@NoArgsConstructor
@Getter
@Setter
@Table(name="photos")
public class Photos {
  @Id
  @GeneratedValue(strategy = GenerationType.AUTO)
  @Column(name = "id")
  private Long id;
  private String url;
  private int userId;
  //...

  @OneToOne(cascade = CascadeType.ALL)
  @JoinTable(name = "usersphotos",
    joinColumns =
      { @JoinColumn(name = "PhotoId", referencedColumnName = "id") },
    inverseJoinColumns =
      { @JoinColumn(name = "UserId", referencedColumnName = "id") })
  private User user;




}
