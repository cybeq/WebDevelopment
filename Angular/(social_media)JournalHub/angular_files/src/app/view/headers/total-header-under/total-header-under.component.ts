import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-total-header-under',
  templateUrl: './total-header-under.component.html',
  styleUrls: ['./total-header-under.component.css']
})
export class TotalHeaderUnderComponent implements OnInit {
 constructor() { }

  curdate:any;
  ngOnInit(): void {
   this.curdate = new Date().getDate().toString()+ '-' +(new Date().getMonth() + 1).toString() + '-' + new Date().getFullYear().toString();
  }

}
