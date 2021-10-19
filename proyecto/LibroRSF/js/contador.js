
        const contador1 = () => {
            let noc = $("#detalle").val().length;
            let now = $("#detalle").val();
            let escrito = noc;

            if (noc >= 2000) { // en caso que en el html del navegador alguien cambie el maxlenght
                $('#detalle').attr('maxlength', '2000')
            }

            noc = 2000 - noc;
            now = now.match(/\w+/g);

            if (!now) {
                now = 0;
            } else {
                now = now.length;
            }

            $("#escrito1").text(escrito);
            // $("#contadordepalabras").text(now);
            $("#contadorcaracteres1").text(noc);
        }
        const contador2 = () => {
            let noc = $("#observaciones").val().length;
            let now = $("#observaciones").val();
            let escrito = noc;

            if (noc >= 2000) { // en caso que en el html del navegador alguien cambie el maxlenght
                $('#observaciones').attr('maxlength', '2000')
            }

            noc = 2000 - noc;
            now = now.match(/\w+/g);

            if (!now) {
                now = 0;
            } else {
                now = now.length;
            }

            $("#escrito2").text(escrito);
            // $("#contadordepalabras2").text(now);
            $("#contadorcaracteres2").text(noc);

        }