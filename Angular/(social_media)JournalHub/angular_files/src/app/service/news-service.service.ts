import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class NewsServiceService {
  url = "http://localhost/angular/partyhub/server/"

  constructor(private _http:HttpClient) { }
  getTopNews():Observable<any>{
    return this._http.get(`${this.url}news/getallnews.php`)
  }

  getNewsById(id:number):Observable<any> {
    return this._http.get(`${this.url}news/getnewsid.php?${id}`)
  }
  get4of5():Observable<any>{
    return this._http.get(`${this.url}news/getnews4of5.php`)
  }
  getFreshNews():Observable<any>{
    return this._http.get(`${this.url}news/getfreshnews.php`)
  }
  addNews(data:any, token:any): Observable<any>{
    return this._http.post(`${this.url}news/addnews.php?token=${token}`, data)
  }

  ownImageUpload(uploadData: FormData, firstFormResponse: any) {
    return this._http.post(`${this.url}news/ownPhotoUpload.php?id=${firstFormResponse}`, uploadData)

  }

  getWaitingNews() {
    return this._http.get(`${this.url}news/getallwaitingnews.php`)
  }

  deleteNewsById(idToDelete: any, userID: any) {
    return this._http.post(`${this.url}news/deletenewsbyid.php`, {
      "news_id":idToDelete, "user_id":userID})
  }

  getWatcherNews():Observable<any> {
    return this._http.get(`${this.url}news/getwatchernews.php`);
  }

  approve(id: any, userID: any) {
    return this._http.post(`${this.url}news/approvenews.php`, {"news_id": id,
    "user_id": userID})
  }
}
