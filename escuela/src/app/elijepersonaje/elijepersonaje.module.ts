import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ElijepersonajePageRoutingModule } from './elijepersonaje-routing.module';

import { ElijepersonajePage } from './elijepersonaje.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ElijepersonajePageRoutingModule
  ],
  declarations: [ElijepersonajePage]
})
export class ElijepersonajePageModule {}
