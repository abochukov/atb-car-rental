import { Component, OnInit } from '@angular/core';
import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking',
  templateUrl: './booking.component.html',
  styleUrls: ['./booking.component.css']
})
export class BookingComponent implements OnInit {

  public cars: any;

  constructor(private dataService: DataService) { }

  ngOnInit() {
    this.fetchCars();
  }

  fetchCars() {
    this.dataService.getAllCars().subscribe((cars) => {
      this.cars = cars;
      console.log(this.cars);
    });
  }

}
