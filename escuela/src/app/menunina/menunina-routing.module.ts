import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { MenuninaPage } from './menunina.page';

const routes: Routes = [
  {
    path: '',
    component: MenuninaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MenuninaPageRoutingModule {}
