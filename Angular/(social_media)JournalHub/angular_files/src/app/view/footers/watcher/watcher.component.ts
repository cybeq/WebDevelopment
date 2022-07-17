import { Component, OnInit } from '@angular/core';
import{NewsServiceService} from "../../../service/news-service.service";

@Component({
  selector: 'app-watcher',
  templateUrl: './watcher.component.html',
  styleUrls: ['./watcher.component.css']
})
export class WatcherComponent implements OnInit {

  data:any;

  constructor(private service:NewsServiceService) { }

  ngOnInit(): void {
    this.service.getWatcherNews().subscribe(res=>{
      this.data= res;
    })
  }

}
