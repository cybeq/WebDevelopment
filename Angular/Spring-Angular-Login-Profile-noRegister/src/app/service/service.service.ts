import { Injectable } from '@angular/core';
import{HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class ServiceService {

  constructor(private _http: HttpClient) { }
  private URI = "http://localhost:8080/";

  login(data: any): Observable<any> {
    return this._http.post(`${this.URI}login/`, data);
  }

  getUserData(id:number): Observable<any> {
    return this._http.get(`${this.URI}getdata/${id}`);
  }
  getUserPhotos(id:number): Observable<any>{

    return this._http.get(`${this.URI}photos/${id}`);
  }

  getUserNotes(userId: any) {
    return this._http.get(`${this.URI}notepad/${userId}`);
  }
}
