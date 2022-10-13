import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ElijepersonajePage } from './elijepersonaje.page';

describe('ElijepersonajePage', () => {
  let component: ElijepersonajePage;
  let fixture: ComponentFixture<ElijepersonajePage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ElijepersonajePage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ElijepersonajePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
