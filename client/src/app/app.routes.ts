import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { AboutUsComponent} from './about-us/about-us.component';
import { ConditionsComponent } from './conditions/conditions.component';
import { BookingComponent } from './booking/booking.component';
import { BookingDetailsComponent } from './booking-details/booking-details.component';
import { ContactsComponent } from './contacts/contacts.component';

const appRoutes: Routes = [
  { path: '', redirectTo: '/home', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  { path: 'about-us', component: AboutUsComponent },
  { path: 'conditions', component: ConditionsComponent },
  { path: 'booking', component: BookingComponent },
  { path: 'booking/:id', component: BookingDetailsComponent },
  { path: 'contacts', component: ContactsComponent }
];

export const Routing = RouterModule.forRoot(appRoutes);
