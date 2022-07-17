import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TotalFooterComponent } from './total-footer.component';

describe('TotalFooterComponent', () => {
  let component: TotalFooterComponent;
  let fixture: ComponentFixture<TotalFooterComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TotalFooterComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TotalFooterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
