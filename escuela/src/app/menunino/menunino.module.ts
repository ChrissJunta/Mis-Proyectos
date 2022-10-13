import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MenuninoPageRoutingModule } from './menunino-routing.module';

import { MenuninoPage } from './menunino.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    MenuninoPageRoutingModule
  ],
  declarations: [MenuninoPage]
})
export class MenuninoPageModule {}
