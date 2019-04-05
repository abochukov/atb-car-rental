import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

public language: string;

  constructor() { }

  ngOnInit() {
    this.getLanguage();
  }

  public setLanguge(language: string) {
    localStorage.setItem('selectedLanguage', language);
  }

  public getLanguage() {
    this.language = localStorage.getItem('selectedLanguage');
    console.log('Stored Language ' + this.language);
  }

}
