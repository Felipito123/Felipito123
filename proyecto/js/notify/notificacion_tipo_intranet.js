function NotifTipoIntranet(title, message, type, time_d) {
    var icon = 'fas fa-info-circle';
    if (type == '' || type == 'undefined' || type == null) {
        type = 'tipo_info';
    }
    if (time_d == '' || time_d == 'undefined' || time_d == null) {
        time_d = '5000';
    }
    switch (type) {
        case 'success':
            // var class_name = 'gritter-success';
            icon = 'fas fa-check-circle';
            type = 'tipo_success';
            break;
        case 'error':
            // var class_name = 'gritter-error';
            icon = 'fas fa-minus-circle';
            type = 'tipo_danger';
            break;
        case 'warning':
            // var class_name = 'gritter-warning';
            icon = 'fa fa-exclamation-triangle';
            type = 'tipo_warning';
            break;
        case 'info':
            // var class_name = 'gritter-info';
            icon = 'fas fa-info-circle'; 
            type = 'tipo_info';
            break;
    }
    $.notify({
        // options
        icon: icon,
        title: '<strong>' + title + '</strong><br>',
        message: message
    }, {
        // settings
        element: 'body',
        position: null,
        type: type,
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: 10,
        spacing: 5,
        z_index: 9999,
        delay: time_d,
        timer: 1000,
        mouse_over: 'pause',
        animate: {
            enter: 'animated fadeInUp',
            exit: 'animated fadeOutRight'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">x</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });
}