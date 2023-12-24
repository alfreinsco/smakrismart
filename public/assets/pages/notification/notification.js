'use strict';

// Function to show notifications
function notify(from, align, icon, type, animIn, animOut, message) {
    $.growl({
        icon: icon,
        title: '&nbsp',
        message: message,
        url: ''
    }, {
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: from,
            align: align
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: animIn,
            exit: animOut
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
    });
};

// Function to parse Laravel success message and trigger notification
function parseSuccessMessage() {
    // Mengambil nilai successMessage yang telah diberikan dari halaman web
    if (typeof successMessage !== 'undefined' && successMessage !== '') {
        notify('top', 'right', 'fa fa-check', 'success', 'fadeInRight', 'fadeOutRight', successMessage);
    }
}

// Function to parse Laravel error message and trigger notification
function parseErrorMessage() {
    // Mengambil nilai errorMessage yang telah diberikan dari halaman web
    if (typeof errorMessage !== 'undefined' && errorMessage !== '') {
        notify('top', 'right', 'fa fa-times', 'danger', 'fadeInRight', 'fadeOutRight', errorMessage);
    }
}

// Function to parse Laravel failed message and trigger notification
function parseFailedMessage() {
    // Mengambil nilai errorMessage yang telah diberikan dari halaman web
    if (typeof failedMessage !== 'undefined' && failedMessage !== '') {
        notify('top', 'right', 'fa fa-times', 'danger', 'fadeInRight', 'fadeOutRight', failedMessage);
    }
}

$(window).on('load', function() {
    parseSuccessMessage(); // Call the function to show success message if available
    parseErrorMessage(); // Call the function to show error message if available
    parseFailedMessage(); // Call the function to show failed message if available
});

$(document).ready(function() {
    $('.notifications .btn').on('click', function(e) {
        e.preventDefault();
        var nFrom = $(this).attr('data-from');
        var nAlign = $(this).attr('data-align');
        var nIcons = $(this).attr('data-icon');
        var nType = $(this).attr('data-type');
        var nAnimIn = $(this).attr('data-animation-in');
        var nAnimOut = $(this).attr('data-animation-out');

        notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
    });
});
