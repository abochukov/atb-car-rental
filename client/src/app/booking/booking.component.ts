import { Component, OnInit } from '@angular/core';
import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking',
  templateUrl: './booking.component.html',
  styleUrls: ['./booking.component.css']
})
export class BookingComponent implements OnInit {

  public result: any;

  constructor(private dataService: DataService) { }

  ngOnInit() {
    this.fetchCars();
  }

  fetchCars() {
    this.dataService.getAllCars().subscribe((cars) => {
      this.result = cars;
      console.log(this.result);
    });
  }

}
