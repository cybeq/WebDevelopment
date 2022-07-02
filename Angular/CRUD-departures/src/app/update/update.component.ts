import { Component, OnInit } from '@angular/core';
import {ServiceService} from "../service.service";
import {ActivatedRoute} from "@angular/router";
import{FormGroup, FormControl, Validators} from "@angular/forms";

@Component({
  selector: 'app-update',
  templateUrl: './update.component.html',
  styleUrls: ['./update.component.css']
})
export class UpdateComponent implements OnInit {

  constructor(private service:ServiceService, private router:ActivatedRoute) { }
  paramID:any;
  updForm = new FormGroup({
    "airline": new FormControl('', Validators.required),
    "city": new FormControl('', Validators.required),
    "date": new FormControl('', Validators.required),
  })


  ngOnInit(): void {
    console.log(this.router.snapshot.paramMap.get('id'));
      this.paramID = this.router.snapshot.paramMap.get('id');
  }

  submit(): void{
    if(this.updForm.valid)
    this.service.update(this.updForm.value, this.paramID).subscribe((res)=>{
      console.log(res)
      location.href=""
    });

  }

}
