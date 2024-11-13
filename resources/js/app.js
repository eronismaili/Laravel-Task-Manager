import './bootstrap';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "5000",
};
