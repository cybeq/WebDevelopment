import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

  user:any = "Guest";
  constructor() { }

  ngOnInit(): void {
    if(localStorage.getItem("username")!=null){
      this.user = localStorage.getItem("username");
    }
  }
  logout():void {
    localStorage.clear();
    location.reload()
  }

}
