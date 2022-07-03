import { Component, OnInit } from '@angular/core';
import{FormControl, FormGroup, Validators} from "@angular/forms";
import {Observable} from "rxjs";
import {ServiceService} from "../../service/service.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  warning: any;


  form = new FormGroup({
    "email": new FormControl('', Validators.required),
    "password": new FormControl('', Validators.required)
  })
  constructor(private service: ServiceService) { }

  ngOnInit(): void {

  }

  submit(): void{
  if(this.form.valid){
    this.service.login(this.form.value).subscribe((res)=>{
      console.log(res);
      if(res.error!=null) {
        if (res.error = "no_user") {
          this.warning = "no_user";
        }
        if (res.error = "wrong_password") {
          this.warning = "wrong_password"
        }
      }else{
        localStorage.setItem("id", res.id);
        localStorage.setItem("username", res.username);
        localStorage.setItem("email", res.email);
        location.href="";
      }

    })
  }
  }

}
