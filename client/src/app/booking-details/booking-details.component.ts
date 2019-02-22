import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Car } from '../car';
import { HttpClient } from '@angular/common/http';

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

  uri = 'http://localhost:5656';

  constructor(
    private dataService: DataService,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
    private http: HttpClient
  ) { }

  ngOnInit() {
    this.dataService.getCarsById(this.route.snapshot.params.id).subscribe(res => {
      this.car = res;
    });

    console.log(this.route.snapshot.params.id);

    this.booking();
  }

  public booking() {
    this.bookingForm = this.formBuilder.group({
      firstname: [null, [Validators.required]],
      lastname: [null, [Validators.required]],
      email: [null, [Validators.required, Validators.email]],
    });
  }

  onSubmit() {
    this.formSubmitAttempt = true;
    if (this.bookingForm.valid) {
      this.dataService.carBooking(this.bookingForm.value);
    }

  }
}
