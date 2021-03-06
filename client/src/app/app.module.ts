import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';
import { Routing } from './app.routes';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { NgbDatepickerModule } from '@ng-bootstrap/ng-bootstrap';
// import { BsDatepickerModule } from 'ngx-bootstrap';
// import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';
// import { TooltipModule } from 'ngx-bootstrap/tooltip';
// import { ModalModule } from 'ngx-bootstrap/modal';

import { DataService } from './api/data.service';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent } from './about-us/about-us.component';
import { ConditionsComponent } from './conditions/conditions.component';
import { BookingComponent } from './booking/booking.component';
import { ContactsComponent } from './contacts/contacts.component';
import { MenuComponent } from './menu/menu.component';
import { BookingDetailsComponent } from './booking-details/booking-details.component';
import { FooterComponent } from './footer/footer.component';
import { BsDatepickerModule } from 'ngx-bootstrap/datepicker';


@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    AboutUsComponent,
    ConditionsComponent,
    BookingComponent,
    ContactsComponent,
    MenuComponent,
    BookingDetailsComponent,
    FooterComponent,
  ],
  imports: [
    BrowserModule,
    Routing,
    HttpClientModule,
    ReactiveFormsModule,
    NgbModule,
    NgbDatepickerModule.forRoot(),
    BsDatepickerModule.forRoot()
  ],
  providers: [DataService],
  bootstrap: [AppComponent]
})
export class AppModule { }
