import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import{HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class UserService {
  url = "http://localhost/angular/partyhub/server/"
  constructor(private _http: HttpClient) { }

  loginUser(data:any):Observable<any>{
    return this._http.post(`${this.url}user/loginuser.php`, data)
  }
  logout(): Observable<any>{
   return this._http.post(`${this.url}user/logoutuser.php`, {"token":localStorage.getItem("token")});
  }

  checkTokenTrue(token:any):Observable<any> {
    return this._http.get(`${this.url}user/checktokencorrect.php?token=${token}`)
  }

  getUserIdByToken(token:any) {
    return this._http.get(`${this.url}user/getUserIdByToken.php?token=${token}`);
  }

  hasDoneYet(id:any) {
    return this._http.get(`${this.url}user/hasdoneyet.php?id=${id}`);
  }
  getUserDataByToken(token:any){
    return this._http.get(`${this.url}user/getuserdatabyid.php?token=${token}`);
  }
}
