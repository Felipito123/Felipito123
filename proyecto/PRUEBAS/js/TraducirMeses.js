
function traducirmeses(month) {

    var result = month;

    switch (month) {

        case 'Jan':
            result = 'Enero';
            break;
        case 'Feb':
            result = 'Febrero';
            break;
        case 'Mar':
            result = 'Marzo';
            break;
        case 'Jun':
            result = 'Junio';
            break;
        case 'Jul':
            result = 'Julio';
            break;
        case 'Apr':
            result = 'Abril';
            break;
        case 'May':
            result = 'Mayo';
            break;
        case 'Aug':
            result = 'Agosto';
            break;
        case 'Sep':
            result = 'Septiembre';
            break;
        case 'Oct':
            result = 'Octubre';
            break;
        case 'Nov':
            result = 'Noviembre';
            break;
        case 'Dec':
            result = 'Diciembre';
            break;

    }

    return result;
}


function traducir_label(label) {

    month = label.match(/Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec/g);

    if (!month)
        return label;

    translation = traducirmeses(month[0]);
    return label.replace(month, translation, 'g');
}