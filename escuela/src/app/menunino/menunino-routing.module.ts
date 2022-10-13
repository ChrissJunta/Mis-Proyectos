import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { MenuninoPage } from './menunino.page';

const routes: Routes = [
  {
    path: '',
    component: MenuninoPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class MenuninoPageRoutingModule {}
