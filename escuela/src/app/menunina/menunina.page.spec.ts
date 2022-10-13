import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MenuninaPage } from './menunina.page';

describe('MenuninaPage', () => {
  let component: MenuninaPage;
  let fixture: ComponentFixture<MenuninaPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuninaPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MenuninaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
