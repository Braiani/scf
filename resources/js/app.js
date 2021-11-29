require('./bootstrap');

import Alpine from 'alpinejs';
import Toastr from 'toastr';

window.Alpine = Alpine;
window.toastr = Toastr;

Alpine.start();
