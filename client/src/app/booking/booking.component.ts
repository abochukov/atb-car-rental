import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { Car } from '../car';

import { DataService } from '../api/data.service';

@Component({
  selector: 'app-booking',
  templateUrl: './booking.component.html',
  styleUrls: ['./booking.component.css']
})
export class BookingComponent implements OnInit {

  public cars;

  constructor(private dataService: DataService, private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.fetchCars();
  }

  fetchCars() {
    this.dataService.getAllCars().subscribe((cars) => {
      this.cars = cars.cars;
    });
  }

  showDetails(id) {
    this.router.navigate(['booking', id]);
  }

}
