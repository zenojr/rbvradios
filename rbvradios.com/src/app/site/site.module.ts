import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from "@angular/forms";

import { SiteComponent } from './site.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule
  ],
  declarations: [
    SiteComponent
  ],
  exports: [
    SiteComponent
  ]
})
export class SiteModule { }
