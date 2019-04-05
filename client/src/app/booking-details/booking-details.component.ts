import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators, AbstractControl } from '@angular/forms';
import { Car } from '../car';
import { HttpClient } from '@angular/common/http';

import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking-details',
  templateUrl: './booking-details.component.html',
  styleUrls: ['./booking-details.component.css']
})
export class BookingDetailsComponent implements OnInit {

  public id: string;
  public car: Car;
  bookingForm: FormGroup;
  public formSubmitAttempt: boolean;
  public showBookingForm: boolean;
  public bsRangeValue: any;
  private storedDates: string;
  private isFree: boolean;
  public disabledDates;

  uri = 'http://localhost:5656';

  constructor(
    private dataService: DataService,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
    private http: HttpClient
  ) { }

  ngOnInit() {
    this.id = this.route.snapshot.params.id;
    this.dataService.getCarsById(this.route.snapshot.params.id).subscribe(res => {
      this.car = res;
    });

    this.booking();
    this.getFreeCar();
  }

  public booking() {
    this.bookingForm = this.formBuilder.group({
      firstname: [null, [Validators.required]],
      lastname: [null, [Validators.required]],
      email: [null, [Validators.required, Validators.email]],
      carId: this.id,
      bookedDates: [null],
    });
  }
  // TRANSFORM DATES
  formatDate() {
    const customerFromDate = this.bsRangeValue[0];
    const formattedFromDate = customerFromDate.getDate() + '-' + (customerFromDate.getMonth() + 1) + '-' + customerFromDate.getFullYear();
    const customerToDate = this.bsRangeValue[1];
    const formattedToDate = customerToDate.getDate() + '-' + (customerToDate.getMonth() + 1) + '-' + customerToDate.getFullYear();
    console.log(formattedFromDate);
    console.log(formattedToDate);
  }


  getFreeCar() {
    this.id = this.route.snapshot.params.id; // da se izvede w nova promenliva
    this.dataService.getBookingDate(this.route.snapshot.params.id).subscribe(bookings => {
      bookings.map(booking => {
        this.storedDates = booking.bookedDates;
        // transfrom incoming date and disable in calendar
        const storedFromDate = new Date(this.storedDates.split(',')[0]);
        const formattedStoredFromDate = storedFromDate.getDate() + '-' + (storedFromDate.getMonth() + 1) + '-' + storedFromDate.getFullYear();

        const storedToDate = new Date(this.storedDates.split(',')[1]);
        const formattedStoredToDate = storedToDate.getDate() + '-' + (storedToDate.getMonth() + 1) + '-' + storedToDate.getFullYear();

        this.disabledDates = [
          // new Date(formattedStoredFromDate),
          // new Date(formattedStoredToDate)
          new Date('2019-03-01'),
          new Date('2019-03-08')
        ];
      });
    });
  }

  onSubmit() {
    this.formSubmitAttempt = true;
    this.formatDate();
    // console.log(this.bookingForm.value);
    // if (this.bookingForm.valid) {
    //   this.dataService.carBooking(this.bookingForm.value);
    // }
  }

  showForm() {
    this.showBookingForm = !this.showBookingForm;
  }
}

function DateValidator(control: AbstractControl): {[key: string]: any} | null {
  return control.value instanceof Date ? { 'invalidDate': { value: control.value } } : null;
}
