import { Component, OnInit } from '@angular/core';
import{ServiceService} from "../../service/service.service";

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  user: any = "guest";
  userId: any = 1;
  userData: any;

  constructor(private service: ServiceService) { }

  ngOnInit(): void {
    if(localStorage.getItem("username")!=null){
      this.user = localStorage.getItem("username");
      this.userId = localStorage.getItem("id");
      this.service.getUserData(this.userId).subscribe((res)=>{
        this.userData = res;
      })



    }
  }

}
