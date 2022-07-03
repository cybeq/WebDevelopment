import { Component, OnInit } from '@angular/core';
import{ServiceService} from "../../service/service.service";

@Component({
  selector: 'app-photos',
  templateUrl: './photos.component.html',
  styleUrls: ['./photos.component.css']
})
export class PhotosComponent implements OnInit {
  userId: any = 3;
  urls:any;
  constructor(private service: ServiceService) { }

  ngOnInit(): void {
    if(localStorage.getItem("id")!=null) {
      this.userId = localStorage.getItem("id");
      this.urls = this.service.getUserPhotos(this.userId).subscribe((res) => {
        console.log(res);
      this.urls= res;
      })
    }
  }

}
