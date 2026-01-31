import './bootstrap';

import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
window.Alpine = Alpine;

Alpine.start();

Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
       toastr.success(notification.msg);

    });
