import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {TopNewsComponent} from "./news/top-news/top-news.component";
import {TopgenComponent} from "./generated/news/topgen/topgen.component";
import {AddnewsComponent} from "./create/addnews/addnews.component";
import {WaitingComponent} from "./generated/waiting/waiting.component";
import {PanelComponent} from "./user/panel/panel.component";

const routes: Routes = [
  {path:'', component:TopNewsComponent},
  {path:'top/:id', component:TopgenComponent},
  {path:'addnews', component:AddnewsComponent},
  {path:'waiting', component: WaitingComponent},
  {path:'panel', component:PanelComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
