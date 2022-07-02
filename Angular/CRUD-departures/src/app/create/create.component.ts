import { Component, OnInit } from '@angular/core';
import{ServiceService} from "../service.service";
import{FormControl, FormGroup, Validators} from "@angular/forms";

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {
  warning:boolean = false;
  fillForm = new FormGroup({
        "airline": new FormControl('', Validators.required),
        "city": new FormControl('', Validators.required),
        "date": new FormControl('', Validators.required)
  })
  constructor(private service:ServiceService) { }

  ngOnInit(): void {
  }

  submit():void {
  if(this.fillForm.valid){
    this.service.saveData(this.fillForm.value).subscribe((res)=>{
      console.log(res);
      location.href="";
    })
  }else {
    this.warning = true;
    setTimeout(() => {
      this.warning = false
    }, 1000)
  }
  }


}
