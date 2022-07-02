import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {ReadComponent} from "./read/read.component";
import {CreateComponent} from "./create/create.component";
import {UpdateComponent} from "./update/update.component";

const routes: Routes = [
  {path:'', component:ReadComponent},
  {path:'create', component: CreateComponent},
  {path: 'update/:id', component: UpdateComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
