import { Component, OnInit } from '@angular/core';
import {Observable} from "rxjs";
import{ServiceService} from "../service.service";
import {EventEmitter} from "@angular/core";
import {UpdateComponent} from "../update/update.component";

@Component({
  selector: 'app-read',
  templateUrl: './read.component.html',
  styleUrls: ['./read.component.css']
})
export class ReadComponent implements OnInit {

  data:any= [{
    "id":1,
    "airline":"lot",
    "city": "warsaw",
    "date":"22.2.2022"
  },
    {
      "id":2,
      "airline":"grzmot",
      "city": "cracow",
      "date":"13.2.2022"
    }

  ];


  constructor(private service:ServiceService) {
    this.service.readAllData().subscribe((res)=>{
      this.data = res;
    });
  }

  ngOnInit(): void {
  }

  delete(id:number){
    this.service.delete(id).subscribe((res)=>{
      console.log(res);
      location.reload()
    })
  }


}
