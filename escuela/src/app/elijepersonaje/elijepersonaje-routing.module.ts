import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ElijepersonajePage } from './elijepersonaje.page';

const routes: Routes = [
  {
    path: '',
    component: ElijepersonajePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ElijepersonajePageRoutingModule {}
