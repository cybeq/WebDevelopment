import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-bar-header',
  templateUrl: './bar-header.component.html',
  styleUrls: ['./bar-header.component.css']
})
export class BarHeaderComponent implements OnInit {
  showCats:boolean = false;
  constructor() { }

  ngOnInit(): void {
  }
  showCategories(){
    if(!this.showCats) this.showCats= true;
    else this.showCats= false;
  }

}
