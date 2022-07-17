import { Component, OnInit } from '@angular/core';
import {FormGroup, FormControl, Validators, AbstractControl, FormArray} from "@angular/forms";
import{UserService} from "../../../service/user.service";

@Component({
  selector: 'app-logo-header',
  templateUrl: './logo-header.component.html',
  styleUrls: ['./logo-header.component.css']
})
export class LogoHeaderComponent implements OnInit {
  showSignIn= false;
  warning:any;
  userData:any;

  constructor(private service:UserService) { }

  formGroup = new FormGroup({
    "email":  new FormControl('', Validators.required),
    "password": new FormControl('', Validators.required),
  });

  ngOnInit(): void {
    if (localStorage.getItem("token") != null){
      if(localStorage.getItem("username")==null){
        localStorage.clear();
      }
      this.service.checkTokenTrue(localStorage.getItem("token")).subscribe(res => {
        if(res.error=="token"){
          localStorage.clear();
          location.reload();
        }
        this.service.getUserDataByToken(localStorage.getItem("token")).subscribe(res=>{
          this.userData= res;
        })

      })
  }
  }

  signInDiv():void{
    this.showSignIn= true;
  }
  login():void{

    this.service.loginUser(this.formGroup.value).subscribe(res=>{
      console.log(res);
      if(res.error!==null){
        this.warning = "error";
      }

      if(res.token!=null) {
        localStorage.setItem("token",res.token )
        localStorage.setItem("userId", res.user_id)
        localStorage.setItem("username", res.username)
        location.reload()
      }
    })
  }
  logout(){
    this.service.logout().subscribe(res=>{
      console.log(res);
    });
    localStorage.clear();
    location.reload();
  }

  isHereToken():boolean{
    if(localStorage.getItem("token")!=null){
      return true;
    }
    return false;
  }
}
