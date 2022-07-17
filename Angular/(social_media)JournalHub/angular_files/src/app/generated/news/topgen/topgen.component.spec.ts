import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TopgenComponent } from './topgen.component';

describe('TopgenComponent', () => {
  let component: TopgenComponent;
  let fixture: ComponentFixture<TopgenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TopgenComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TopgenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
