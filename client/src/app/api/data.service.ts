import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { Car } from '../car';

import { Observable } from 'rxjs/Observable';

@Injectable()
export class DataService {

  uri = 'http://localhost:5656';

  constructor(private http: HttpClient) { }


  getAllCars(): Observable<any> {
    return this.http.get(`${this.uri}/api/cars`);
  }

  getCarsById(id): Observable<Car> {
    return this.http.get<Car>(`${this.uri}/api/cars/${id}`);
  }

  setNewCar(make, model) {
      const test = {
        make: make,
        model: model
      };
      return this.http.post(`${this.uri}/api/cars`, test);
  }

  public carBooking(bookingData) {
    this.http.post(`${this.uri}/api/booking`, bookingData).subscribe(data => {
      console.log(data);
    });
  }
}
