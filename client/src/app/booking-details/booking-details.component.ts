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

  public car: Car;

  constructor(private dataService: DataService, private route: ActivatedRoute) { }

  ngOnInit() {
    this.dataService.getCarsById(this.route.snapshot.params.id).subscribe(res => {
      this.car = res;
    });
  }

}
