import { Component, OnInit } from '@angular/core';
import{ServiceService} from "../../service/service.service";

@Component({
  selector: 'app-notepad',
  templateUrl: './notepad.component.html',
  styleUrls: ['./notepad.component.css']
})
export class NotepadComponent implements OnInit {
  userId:any = 1;
  notes: any;
  constructor(private service: ServiceService) { }

  ngOnInit(): void {
    if(localStorage.getItem("id")!=null) {
      this.userId = localStorage.getItem("id");
      this.notes = this.service.getUserNotes(this.userId).subscribe((res) => {
        console.log(res);
        this.notes= res;
      })
    }
  }

}
