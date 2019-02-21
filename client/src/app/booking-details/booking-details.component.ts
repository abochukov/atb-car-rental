import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Car } from '../car';

import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking-details',
  templateUrl: './booking-details.component.html',
  styleUrls: ['./booking-details.component.css']
})
export class BookingDetailsComponent implements OnInit {

  public car: Car;
  bookingForm: FormGroup;
  public formSubmitAttempt: boolean;

  constructor(private dataService: DataService, private route: ActivatedRoute, private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.dataService.getCarsById(this.route.snapshot.params.id).subscribe(res => {
      this.car = res;
    });

    this.booking();
  }

  public booking() {
    this.bookingForm = this.formBuilder.group({
      firstname: [null, [Validators.required]],
      lastname: [null, [Validators.required]],
      email: [null, [Validators.required, Validators.email]]
    });
  }

  onSubmit() {
    this.formSubmitAttempt = true;
    if (this.bookingForm.valid) {
      console.log('the form is valid');
    }
  }
}
