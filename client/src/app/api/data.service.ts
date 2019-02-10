import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class DataService {

  uri = 'http://localhost:5656';

  constructor(private http: HttpClient) { }


  getAllCars() {
    return this.http.get(`${this.uri}/api/cars`);
  }

  setNewCar(make, model) {
      const test = {
        make: make,
        model: model
      };
      return this.http.post(`${this.uri}/api/cars`, test);
  }
}
