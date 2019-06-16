import { Component, OnInit } from '@angular/core';

import { DataService } from '../api/data.service';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

public language: string;

  constructor(private dataService: DataService) { }

  ngOnInit() {
    this.getLanguage();
  }

  public setLanguge(language: string) {
    localStorage.setItem('selectedLanguage', language);
    this.language = language;
    // console.log(this.language);
    this.dataService.changeLanguage(this.language).subscribe(
      (response) => console.log(response),
      (error) => console.log(error)
    );
  }

  public getLanguage() {
    this.language = localStorage.getItem('selectedLanguage');
    // console.log('Stored Language ' + this.language);
  }

}
