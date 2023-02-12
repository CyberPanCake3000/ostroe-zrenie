import './bootstrap';
import * as bootstrap from 'bootstrap';
import 'jquery-validation';

import '../sass/app.scss';

import jQuery from 'jquery';

window.$ = jQuery;

document.addEventListener('DOMContentLoaded', function () {

    // let toast = $('#notificationToast');
    // let toastBootstrap = new bootstrap.Toast(toast);

    updateDate();
    updateClock();
    setInterval(updateClock, 60000);

    function updateDate()
    {
        let today = new Date(), day = today.getDate(), month = today.getMonth(), weekday = today.getDay();
        let months = ["января", "февраля", "марта",
                        "апреля", "мая", "июня",
                        "июля", "августа", "сентября",
                        "октября", "ноября", "декабря"];

        let weekdays = ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"];

        month = months[month];
        weekday = weekdays[weekday];

        let result = day + " " + month;

        $('.dateDiv').text(result);
        $('.dayDiv').text(weekday);
    }

    function updateClock()
    {
        let date = new Date(), hours = date.getHours(), minutes = date.getMinutes();

        if (hours < 10) { hours = "0" + hours; }
        if (minutes < 10 ) { minutes = "0" + minutes; }

        let time = hours + ":" + minutes;

        $(".timeDiv").text(time);
    }

    // $('#createForm').validate({
    //     rules: {
    //       'clientName': 'required',
    //       'clientPhone': {
    //           required: 'required',
    //       //    TODO: PHONE NUMBER VALIDATION
    //       },
    //     },
    //     messages: {
    //         'clientName': 'Это обязательное поле',
    //         'clientPhone': 'Это обязательное поле',
    //     }
    // });

    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // $("input[type='tel']").on("keypress", function (event) {
    //     var key = event.charCode || event.keyCode || 0;
    //     return (key === 8 || key === 9 || key === 46 || (key >= 48 && key <= 57));
    // });

    // $("#createForm").submit(function (e) {
    //     e.preventDefault();
    //     var formData = $(this).serializeArray();
    //     $.ajax({
    //         type: 'POST',
    //         url: "/orders",
    //         data: formData,
    //         dataType: 'json',
    //         success: function (data) {
    //             let errorDiv = $('#errorDiv');
    //
    //             if(!errorDiv.hasClass('d-none'))
    //             {
    //                 errorDiv.addClass('d-none');
    //             }
    //
    //             let modal = $('#addOrderModal');
    //             let modalBootstrap = bootstrap.Modal.getInstance(modal);
    //             modalBootstrap.hide();
    //
    //
    //             let dateElement = $('.orderDate'), date = new Date();
    //             dateElement.text(date.getHours() + ':' + date.getMinutes());
    //
    //             let toastBody = $('.toast-body');
    //             toastBody.text('Заказ №' + data['order_id'] + ' успешно создан!');
    //
    //             toastBootstrap.show();
    //
    //             $('#createForm')[0].reset();
    //         },
    //         error: function (data) {
    //             let errorDiv = $('#errorDiv'), errorMessage = $('#errorMessage');
    //             errorDiv.removeClass('d-none');
    //             errorMessage.text(data['error']);
    //         }
    //     });
    // });
});


