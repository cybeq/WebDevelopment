import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import{Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class ServiceService {


  constructor(private _http:HttpClient) {}

  readAllData(): Observable<any>{
    return this._http.get("http://localhost/mycrudalapp/server/Data.php");
  }

  saveData(data:any): Observable<any> {
    return this._http.post("http://localhost/mycrudalapp/server/SaveData.php", data);
  }

  update(data: any, id:number): Observable<any> {

    return this._http.put<any>(`http://localhost/mycrudalapp/server/UpdateData.php?${id}`, data);
  }

  delete(id:number) {
    return this._http.get(`http://localhost/mycrudalapp/server/DeleteData.php?${id}`);
  }
}
