import './bootstrap';

import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
window.Alpine = Alpine;

Alpine.start();

Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
       toastr.success(notification.msg);
    
  let alerts= $('#alertDropdown .badge-counter').length
  let notify_count=$('#alertDropdown .badge-counter').data('count')
       
         if(alerts){
            if(notify_count <5){
              $('#alertDropdown .badge-counter').text(notify_count+1)
              $('#alertDropdown .badge-counter').data('count', notify_count + 1)
              $('#alertDropdown .badge-counter').text(notify_count + 1)
            }

        
       }else{

       }
    });
