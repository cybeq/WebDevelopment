import { Component, OnInit } from '@angular/core';
import{UserService} from "../../service/user.service";

@Component({
  selector: 'app-panel',
  templateUrl: './panel.component.html',
  styleUrls: ['./panel.component.css']
})
export class PanelComponent implements OnInit {
  userData:any;
  constructor(private userService: UserService) { }

  ngOnInit(): void {
    if(localStorage.getItem("token")==null){
      location.href = "../";
    }
    this.userService.getUserDataByToken(localStorage.getItem("token")).subscribe(res=>{
      this.userData = res;
    })

  }

}
