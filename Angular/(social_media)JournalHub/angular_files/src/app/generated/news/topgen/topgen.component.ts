import { Component, OnInit } from '@angular/core';
import{NewsServiceService} from "../../../service/news-service.service";
import{ActivatedRoute} from "@angular/router";

@Component({
  selector: 'app-topgen',
  templateUrl: './topgen.component.html',
  styleUrls: ['./topgen.component.css']
})
export class TopgenComponent implements OnInit {

  data:any;
  id:any ;
  constructor(private service: NewsServiceService, private router:ActivatedRoute) { }

  ngOnInit(): void {
    this.id = this.router.snapshot.paramMap.get('id');
    this.service.getNewsById(this.id).subscribe(res=>{
      this.data = res;
      console.log(this.data)
    })
  }

}
