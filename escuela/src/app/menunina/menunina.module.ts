import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MenuninaPageRoutingModule } from './menunina-routing.module';

import { MenuninaPage } from './menunina.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    MenuninaPageRoutingModule
  ],
  declarations: [MenuninaPage]
})
export class MenuninaPageModule {}
