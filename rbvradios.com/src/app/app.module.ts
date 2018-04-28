import { BrowserModule } from '@angular/platform-browser';
import { environment } from './../environments/environment';
import { MaterializeModule } from 'angular2-materialize';

import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { SiteModule } from './site/site.module';
import { DbaudioComponent } from './dbaudio/dbaudio.component';
import { routing } from './app.routing';

import { AngularFireModule } from 'angularfire2';


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
    routing,
    AngularFireModule.initializeApp(environment.firebaseConfig)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
