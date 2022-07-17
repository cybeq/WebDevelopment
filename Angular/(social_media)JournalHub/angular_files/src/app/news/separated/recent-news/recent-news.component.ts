import { Component, OnInit } from '@angular/core';
import{NewsServiceService} from "../../../service/news-service.service";

@Component({
  selector: 'app-recent-news',
  templateUrl: './recent-news.component.html',
  styleUrls: ['./recent-news.component.css']
})
export class RecentNewsComponent implements OnInit {

  constructor(private service: NewsServiceService) { }
  data:any;
  loaded:boolean = false;
  windowTitle:any=[];
  ngOnInit(): void {
  this.service.get4of5().subscribe(res=>{
    this.data = res;
    this.loaded = true;
    for(let i=0; i<4; i++) {
      this.windowTitle[i]= this.data[i].title;
      if(this.windowTitle[i].length>80) {
        this.windowTitle[i] = this.windowTitle[i].substr(0,100) + "...";
      }
    }
  })
  }

}
