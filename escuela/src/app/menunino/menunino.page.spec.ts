import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MenuninoPage } from './menunino.page';

describe('MenuninoPage', () => {
  let component: MenuninoPage;
  let fixture: ComponentFixture<MenuninoPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuninoPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MenuninoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
