import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DbaudioComponent } from './dbaudio.component';

describe('DbaudioComponent', () => {
  let component: DbaudioComponent;
  let fixture: ComponentFixture<DbaudioComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DbaudioComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DbaudioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
