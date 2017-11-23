import { MaterializeModule } from 'angular2-materialize';

import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { SiteModule } from './site/site.module';
import { DbaudioComponent } from './dbaudio/dbaudio.component';
import { routing } from './app.routing';

@NgModule({
  declarations: [
    AppComponent,
    DbaudioComponent
  ],
  imports: [
    BrowserModule,
    MaterializeModule,
    FormsModule,
    SiteModule,
    routing
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
