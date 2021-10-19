let escuchar = "En un plazo de cuatro años seremos un centro de salud familiar de experiencia, reconocidos y validados por la comunidad, con pertinencia cultural, con un equipo de salud capacitado y comprometido con las familias de la comuna, mejorando su calidad de vida a través de todo el ciclo vital.";

function decir(texto) {
    speechSynthesis.speak(new SpeechSynthesisUtterance(texto));
}

var toogled = false;
var url = window.location.href;

function toogle() {
    if (!toogled) {
        toogled = true;
        decir(escuchar);
        document.getElementById("colordellabel").style.backgroundColor = "#0551a2";
        return;
    } else {
        toogled = false;
        document.getElementById("colordellabel").style.backgroundColor = "#007bff";
        speechSynthesis.cancel();
        return;
    }
}


function compartirfb(){
    //OJO! EL LOCALHOST NO LO TOMA COMO PARA COMPARTIR PERO SI EL SERVIDOR PÚBLICO
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
}

function compartirtw(){
        window.open('https://twitter.com/share?url=' + url+ ' ' + escuchar,
            'twitter-share-dialog',
            'width=800,height=600'
        );
}