import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TotalHeaderComponent } from './total-header.component';

describe('TotalHeaderComponent', () => {
  let component: TotalHeaderComponent;
  let fixture: ComponentFixture<TotalHeaderComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TotalHeaderComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TotalHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
