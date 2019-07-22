import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators, AbstractControl } from '@angular/forms';
import { Car } from '../car';



// import {NgbDate, NgbCalendar} from '@ng-bootstrap/ng-bootstrap';
// import { HttpClient } from '@angular/common/http';

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
  public storedDates: any;
  // public formattedUserFromDate: any;
  // public formattedUserToDate: any;
  public customerFromDate: any;
  public customerToDate: any;
  public storedFromDate: any;
  public storedToDate: any;

  displayMonths = 2;
  navigation = 'select';
  showWeekNumbers = false;
  outsideDays = 'visible';

  uri = 'http://localhost:5656';

  constructor(
    private dataService: DataService,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
  ) { }

  ngOnInit() {
    this.id = this.route.snapshot.params.id;
    this.dataService.getCarsById(this.route.snapshot.params.id).subscribe(res => {
      this.car = res;
    });

    this.booking();
    // this.getFreeCar();
  }

  public booking() {
    this.bookingForm = this.formBuilder.group({
      firstname: ['test', [Validators.required]],
      lastname: ['test', [Validators.required]],
      email: ['test@test.com', [Validators.required, Validators.email]],
      carId: this.id,
      bookedDates: [null]
    });
  }


  // TRANSFORM DATES
  formatDate() {
    this.customerFromDate = this.bookingForm.value.bookedDates[0];
    this.customerToDate = this.bookingForm.value.bookedDates[1];
  }


  getFreeCar() {
    // const today = new Date().getDate() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getFullYear();
    this.id = this.route.snapshot.params.id; // da se izvede w nova promenliva
    this.dataService.getBookingDate(this.route.snapshot.params.id).subscribe(bookings => {
      bookings.map(booking => {
        this.storedDates = booking.bookedDates;
        this.storedFromDate = new Date(this.storedDates.split(',')[0]);
        this.storedToDate = new Date(this.storedDates.split(',')[1]);
      });
    });
  }

  public checkDate(a_start: any, a_end: any, b_start: any, b_end: any) {
    a_start = this.customerFromDate;
    a_end = this.customerToDate;
    b_start = this.storedFromDate;
    b_end = this.storedToDate;

    if (a_start <= b_start && b_start <= a_end) { console.log('in range'); }  // b starts in a
    if (a_start <= b_end   && b_end   <= a_end) { console.log('in range'); }  // b ends in a
    if (b_start <  a_start && a_end   <  b_end) { console.log('in range'); }  // a in b
    console.log('NOT in range');
  }



  onSubmit() {
    this.formSubmitAttempt = true;
    this.formatDate();
    this.checkDate(1, 2, 3, 4);
    // const frmD = this.bookingForm.value.fromDate;
    // console.log(Object.values(frmD));
    // console.log(this.bookingForm.value);
    // if (this.bookingForm.valid) {
    //   this.dataService.carBooking(this.bookingForm.value);
    // }
    this.getFreeCar();
  }

  showForm() {
    this.showBookingForm = !this.showBookingForm;
  }
}

function DateValidator(control: AbstractControl): {[key: string]: any} | null {
  return control.value instanceof Date ? { 'invalidDate': { value: control.value } } : null;
}
