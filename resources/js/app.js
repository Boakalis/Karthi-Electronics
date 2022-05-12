import Swal from 'sweetalert2'

require('./bootstrap');

// var Turbolinks = require("turbolinks");
// Turbolinks.start();
Echo.private(`orderReturned`)
.listen('.orderReturned', (e) => {
    var audio = new Audio("{{asset('error.wav')}}");
    audio.muted = true;
    audio.play();
    Swal.fire({
        title: 'New Order Return Notification !!!',
        icon: 'success',
      })
});
Echo.private(`orderCreated`)
.listen('.orderCreated', (e) => {
    var audio = new Audio("{{asset('alert.wav')}}");
    audio.muted = true;
    audio.play();
    Swal.fire({
        title: 'New Order Received !!!',
        icon: 'success',
      })
});
Echo.private(`orderCancelled`)
.listen('.orderCancelled', (e) => {
    var audio = new Audio("{{asset('error.wav')}}");
    audio.muted = true;
    audio.play();
    Swal.fire({
        title: 'Order Cancelled !!!',
        icon: 'error',
      })
});




