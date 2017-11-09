import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SiteComponent } from './site.component';

@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [
    SiteComponent
  ],
  exports: [
    SiteComponent
  ]
})
export class SiteModule { }
