package com.example.springserver.notepad;

import lombok.*;

import javax.persistence.*;

@Getter
@Setter
@Entity
@Data
@AllArgsConstructor
@NoArgsConstructor
@Table(name="notepad")
public class Notepad {
  @Id
  @GeneratedValue(strategy = GenerationType.AUTO)
  private int id;
  private int userId;
  @Column(columnDefinition = "TEXT")
  private String note;

}
