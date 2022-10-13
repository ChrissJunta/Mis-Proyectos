import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'principal',
    loadChildren: () => import('./principal/principal.module').then( m => m.PrincipalPageModule)
  },
  {
    path: 'elijepersonaje',
    loadChildren: () => import('./elijepersonaje/elijepersonaje.module').then( m => m.ElijepersonajePageModule)
  },
  {
    path: 'menunina',
    loadChildren: () => import('./menunina/menunina.module').then( m => m.MenuninaPageModule)
  },
  {
    path: 'menunino',
    loadChildren: () => import('./menunino/menunino.module').then( m => m.MenuninoPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
