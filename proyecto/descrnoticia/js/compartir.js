
var fbButton = document.getElementById('boton-compartir-en-facebook');
var url = window.location.href;
fbButton.addEventListener('click', function () {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
        'facebook-share-dialog',
        'width=800,height=600'
    );
    return false;
});

var twButton = document.getElementById('boton-compartir-en-twitter');
var url = window.location.href;
twButton.addEventListener('click', function () {
    window.open('https://twitter.com/share?url=' + titulo+ '  ' +url ,
        'twitter-share-dialog',
        'width=800,height=600'
    );
    return false;
});


var LKButton = document.getElementById('boton_compartir_en_linkedin');
var url = window.location.href;

let separate = url.split('?');
// console.log("URL: "+url);
// console.log("SEP 1: "+separate[0]);

LKButton.addEventListener('click', function () {
    window.open('https://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(separate[0])+'%3F'+encodeURIComponent(separate[1]),
        'width=800,height=600'
    );
    return false;
});

// var TwlrButton = document.getElementById('boton_compartir_en_tumblr');
// var url = window.location.href;
// TwlrButton.addEventListener('click', function () {
//     window.open(url+"&share=tumblr&amp;nb=1" ,
//         'tumblr-share-dialog',
//         'width=800,height=600'
//     );
//     return false;
// });


// https://cualquiercosadetecnologia.wordpress.com/2013/09/29/sabes-que-significa-taggear/?share=tumblr&amp;nb=1