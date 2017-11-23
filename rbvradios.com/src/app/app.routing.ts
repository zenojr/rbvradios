import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SiteComponent } from './site/site.component';
import { DbaudioComponent } from './dbaudio/dbaudio.component';

// import { RouterModule } from '@angular/router/src/router_module';



const APP_ROUTES: Routes = [
    { path: '', component: SiteComponent },
    { path: 'dbaudio', component: DbaudioComponent }
];


export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);
