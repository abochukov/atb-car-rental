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
  public bsRangeValue: any;
  public showDatePicker = false;
  public fromDate: any;
  public toDate: any;
  // private fromDate: string;
  public storedDates: any;
  // private isFree: boolean;
  public disabledDates: any;


  displayMonths = 2;
  navigation = 'select';
  showWeekNumbers = false;
  outsideDays = 'visible';

  uri = 'http://localhost:5656';

  constructor(
    private dataService: DataService,
    private route: ActivatedRoute,
    private formBuilder: FormBuilder,
    // calendar: NgbCalendar
    // private http: HttpClient
  ) {
    // this.fromDate = calendar.getToday();
    // this.toDate = calendar.getToday();
  }

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
      firstname: [null, [Validators.required]],
      lastname: [null, [Validators.required]],
      email: [null, [Validators.required, Validators.email]],
      carId: this.id,
      bsRangeValue: [null]
      // dateRange: [this.fromDate],
      // toDate: [this.toDate]
    });
  }


  // TRANSFORM DATES
  formatDate() {
    const customerFromDate = this.bookingForm.value.bsRangeValue[0];
    console.log(customerFromDate);
    const formattedFromDate = customerFromDate.getDate() + '-' + (customerFromDate.getMonth() + 1) + '-' + customerFromDate.getFullYear();
    const customerToDate = this.bookingForm.value.bsRangeValue[1];
    const formattedToDate = customerToDate.getDate() + '-' + (customerToDate.getMonth() + 1) + '-' + customerToDate.getFullYear();
    console.log(formattedFromDate);
    console.log(formattedToDate);
  }


  getFreeCar() {
    this.id = this.route.snapshot.params.id; // da se izvede w nova promenliva
    this.dataService.getBookingDate(this.route.snapshot.params.id).subscribe(bookings => {
      bookings.map(booking => {
        this.storedDates = booking.bookedDates;
        console.log(this.storedDates);
        // transfrom incoming date and disable in calendar
        // const storedFromDate = new Date(this.storedDates.split(',')[0]);
        // const formattedStoredFromDate = storedFromDate.getDate() + '-' + (storedFromDate.getMonth() + 1) + '-' + storedFromDate.getFullYear();
        //
        // const storedToDate = new Date(this.storedDates.split(',')[1]);
        // const formattedStoredToDate = storedToDate.getDate() + '-' + (storedToDate.getMonth() + 1) + '-' + storedToDate.getFullYear();

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
    // const frmD = this.bookingForm.value.fromDate;
    // console.log(Object.values(frmD));
    console.log(this.bookingForm.value);
    // if (this.bookingForm.valid) {
    //   this.dataService.carBooking(this.bookingForm.value);
    // }
    // this.getFreeCar();
  }

  showForm() {
    this.showBookingForm = !this.showBookingForm;
  }
}

function DateValidator(control: AbstractControl): {[key: string]: any} | null {
  return control.value instanceof Date ? { 'invalidDate': { value: control.value } } : null;
}
