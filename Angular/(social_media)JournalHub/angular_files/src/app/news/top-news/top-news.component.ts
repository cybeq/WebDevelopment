import { Component, OnInit } from '@angular/core';
import{NewsServiceService} from "../../service/news-service.service";
import {Observable} from "rxjs";

@Component({
  selector: 'app-top-news',
  templateUrl: './top-news.component.html',
  styleUrls: ['./top-news.component.css']
})
export class TopNewsComponent implements OnInit {
  topNews:any=[];
  loaded:boolean = false;
  windowTitle:any=[];
  constructor(private service:NewsServiceService) { }

  ngOnInit(): void {


    this.service.getFreshNews().subscribe(res=>{
      for(let i=0; i<5; i++) {
        this.topNews[i] = res[i];
      }
      for(let i=0; i<5; i++) {
        this.windowTitle[i]= this.topNews[i].title;
        if(this.windowTitle[i].length>100) {
          this.windowTitle[i] = this.windowTitle[i].substr(0,100) + "...";
        }
      }
      this.loaded=true;
    })

  }

}
