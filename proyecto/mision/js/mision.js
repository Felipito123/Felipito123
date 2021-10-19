let escuchar = "Somos un centro de atención primaria de salud, de excelencia, que a través de un equipo humano comprometido presta servicios de salud con enfoque bio-psicosocial a la comunidad, con pertinencia cultural, en los ámbitos de promoción, prevención, tratamiento y rehabilitación.";

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