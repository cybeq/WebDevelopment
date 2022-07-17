import { Component, OnInit } from '@angular/core';
import{NewsServiceService} from "../../service/news-service.service";
import {UserService} from "../../service/user.service";

@Component({
  selector: 'app-waiting',
  templateUrl: './waiting.component.html',
  styleUrls: ['./waiting.component.css']
})
export class WaitingComponent implements OnInit {
  shortContent:any;
  deleteIt:boolean = false;
  updateIt:boolean = false;
  data:any;
  idToDelete:any;
  sqlResp:any;
  userID:any;
  shorten:boolean = false;
  constructor(private service: NewsServiceService,
              private userService: UserService) { }

  ngOnInit(): void {
    this.userService.getUserIdByToken(localStorage.getItem("token")).subscribe(res=>{
      this.userID = res;
      this.userID = this.userID[0].user_id;
      console.log(this.userID)
    })
    this.service.getWaitingNews().subscribe(res=>{
    this.shortContent = res
    for(let single of this.shortContent){
      single.shortContent = single.content.substring(0, 300)+" ... ... ...";
    }

    })
  }
  fullItem(){
    if(this.shorten==false)
    this.shorten=true;
    else this.shorten = false;
  }
  delete(id:any){
    console.log(id)
    this.deleteIt=true;
    this.idToDelete = id;
  }
  deleteSql(){
    this.service.deleteNewsById(this.idToDelete, this.userID).subscribe(res=>{
      this.sqlResp = res;
      if(this.sqlResp.news=="deleted"){
        location.reload();
      }
    })
  }
  approve(id:any){
    this.service.approve(id,this.userID).subscribe(res=>{
console.log(res);
location.reload();
    })
  }

}
