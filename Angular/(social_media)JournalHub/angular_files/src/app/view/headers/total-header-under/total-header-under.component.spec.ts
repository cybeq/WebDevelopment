import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TotalHeaderUnderComponent } from './total-header-under.component';

describe('TotalHeaderUnderComponent', () => {
  let component: TotalHeaderUnderComponent;
  let fixture: ComponentFixture<TotalHeaderUnderComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TotalHeaderUnderComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TotalHeaderUnderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
