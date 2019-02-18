import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { Car } from '../car';

import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking-details',
  templateUrl: './booking-details.component.html',
  styleUrls: ['./booking-details.component.css']
})
export class BookingDetailsComponent implements OnInit {

  public id: string;
  public cars;

  constructor(private dataService: DataService, private route: ActivatedRoute) { }

  ngOnInit() {
    this.getCarsByIds(this.id);
  }

  getCarsByIds(id) {
    this.route.params.subscribe(params => {
      this.id = params.id;
      console.log(this.id);
      this.dataService.getCarsById(this.id).subscribe(res => {
        this.cars = res;
        this.cars = Array.of(this.cars);
        console.log(this.cars);
      });
    });
  }

}
