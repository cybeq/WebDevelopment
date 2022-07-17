import { Component, OnInit } from '@angular/core';
import {FormGroup, FormControl, Validators} from "@angular/forms";
import{NewsServiceService} from "../../service/news-service.service";
import{UserService} from "../../service/user.service";
import {Observable} from "rxjs";

@Component({
  selector: 'app-addnews',
  templateUrl: './addnews.component.html',
  styleUrls: ['./addnews.component.css']
})
export class AddnewsComponent implements OnInit {
  agreement = new FormGroup({
    "agree": new FormControl('', Validators.required)
})
  agreementWarning:any;
  textAreValue:string = "";
  counter:number = 0;
  response:any;
  firstFormResponse:any;
  secondFormResponse:any;
  counterTitle:number = 0;
  titleValue:string = "";
  doneResponse:any;
  user: any;
  logged=false;

  uploadFile?:File;
  constructor(private newsService: NewsServiceService,
              private userService: UserService) { }

  hasUploadedToday:any;
  postForm:any;
  ngOnInit(): void {
    this.postForm = new FormGroup({
      "title": new FormControl('', Validators.required),
      "category":new FormControl('', Validators.required),
      "content": new FormControl('', Validators.required)
    })


    if (localStorage.getItem("token") == null) {

    }else{
      this.logged=true;
   this.userService.getUserIdByToken(localStorage.getItem("token")).subscribe(res=> {
     this.user = res;
     this.user = this.user[0].user_id;
     this.userService.hasDoneYet(this.user).subscribe(res=>{
       this.doneResponse= res;
       this.doneResponse = this.doneResponse.response;
     })
   })
    }
    }
    //token na query -  z query od tokena pobrac user_id :)
    send(){

    if(this.postForm.valid) {
     this.newsService.addNews(this.postForm.value, localStorage.getItem("token")).subscribe(res=>
       this.firstFormResponse = res
     );

    }else {console.log("fillfields")}
    }


    onTextChange(){
    this.counter = this.textAreValue.length;
    if(this.textAreValue.length>0) {
     this.textAreValue= this.textAreValue.replace(/   /gi," ")
      this.textAreValue= this.textAreValue.replace(/\n\n/gi," ")
      this.textAreValue= this.textAreValue.replace(/\n /gi,"\n")
      this.textAreValue= this.textAreValue.replace(/ \n /gi,"\n")
    }
  }
  onTitleChange(){
    this.counterTitle = this.titleValue.length;
  }
  photoFileOnChange($event:any){
    this.uploadFile = $event.target.files[0];
    console.log(this.uploadFile);
  }
  ownPhoto(){
    if(this.agreement.valid) {
      const uploadData = new FormData();
      // @ts-ignore
      uploadData.append('image', this.uploadFile, this.uploadFile?.name)
      this.newsService.ownImageUpload(uploadData, this.firstFormResponse).subscribe(res => {
        this.secondFormResponse = res;
        setTimeout(() => {
          location.href = "../"
        }, 2000)
      })
    } else {
      this.agreementWarning = "Musisz zaakceptować regulamin";
    }
  }
  emptySecondResponse(){
    this.secondFormResponse = "empty";
    setTimeout(()=>{
      location.href="../"
    },2000)
  }
}
