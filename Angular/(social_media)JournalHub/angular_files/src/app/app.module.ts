import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { TotalHeaderComponent } from './view/headers/total-header/total-header.component';
import { TotalHeaderUnderComponent } from './view/headers/total-header-under/total-header-under.component';
import { LogoHeaderComponent } from './view/headers/logo-header/logo-header.component';
import { BarHeaderComponent } from './view/headers/bar-header/bar-header.component';
import { TopNewsComponent } from './news/top-news/top-news.component';
import { RecentNewsComponent } from './news/separated/recent-news/recent-news.component';
import { SideBarComponent } from './news/separated/side-bar/side-bar.component';
import { BannerComponent } from './view/banner/banner.component';
import { WatcherComponent } from './view/footers/watcher/watcher.component';
import { TotalFooterComponent } from './view/footers/total-footer/total-footer.component';
import {HttpClientModule} from "@angular/common/http";
import { TopgenComponent } from './generated/news/topgen/topgen.component';
import {FormsModule, ReactiveFormsModule} from "@angular/forms";
import { AddnewsComponent } from './create/addnews/addnews.component';
import { WaitingComponent } from './generated/waiting/waiting.component';
import { PanelComponent } from './user/panel/panel.component';

@NgModule({
  declarations: [
    AppComponent,
    TotalHeaderComponent,
    TotalHeaderUnderComponent,
    LogoHeaderComponent,
    BarHeaderComponent,
    TopNewsComponent,
    RecentNewsComponent,
    SideBarComponent,
    BannerComponent,
    WatcherComponent,
    TotalFooterComponent,
    TopgenComponent,
    AddnewsComponent,
    WaitingComponent,
    PanelComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
