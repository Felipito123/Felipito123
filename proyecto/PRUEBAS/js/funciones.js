$("#contiene_todo").on('submit', function (event) {
    event.preventDefault();
    form = $("#contiene_todo");
    let tipo_prevision = $("input[name=tipo_prevision_ficha]:checked").val();
    let direccion_ano_academico = $("#direccion_ano_academico").val();
    let academico_telefono_fijo = $("#academico_telefono_fijo").val();
    let academico_celular = $("#academico_celular").val();
    let direccion_familiar = $("#direccion_familiar").val();
    let familiar_telefono_fijo = $("#familiar_telefono_fijo").val();
    let familiar_celular = $("#familiar_celular").val();
    let estado_civil = $("#estado_civil").val();
    let tengo_hijos = $("input[name=tengo_hijos]:checked").val();

    let vives_contus_padres = $("#vives_contus_padres").val();
    let tipo_residencia_ficha = $("input[name=tipo_residencia_ficha]:checked").val();

    let item_enfermedad_cardiaca = $("input[name=item_enfermedad_cardiaca]:checked").val();
    let edad_enfermedad_cardiaca = $("#edad_enfermedad_cardiaca").val();

    let item_enfermedad_riñon = $("input[name=item_enfermedad_riñon]:checked").val();
    let edad_enfermedad_riñon = $("#edad_enfermedad_riñon").val();

    let item_enfermedad_diabetes = $("input[name=item_enfermedad_diabetes]:checked").val();
    let edad_enfermedad_diabetes = $("#edad_enfermedad_diabetes").val();

    let item_enfermedad_hipertension_arterial = $("input[name=item_enfermedad_hipertension_arterial]:checked").val();
    let edad_enfermedad_hipertension_arterial = $("#edad_enfermedad_hipertension_arterial").val();

    let item_enfermedad_respiratoria_cronicas = $("input[name=item_enfermedad_respiratoria_cronicas]:checked").val();
    let edad_enfermedad_respiratoria_cronicas = $("#edad_enfermedad_respiratoria_cronicas").val();

    let item_enfermedad_problemas_alimentarios = $("input[name=item_enfermedad_problemas_alimentarios]:checked").val();
    let edad_enfermedad_problemas_alimentarios = $("#edad_enfermedad_problemas_alimentarios").val();

    let item_enfermedad_delapiel = $("input[name=item_enfermedad_delapiel]:checked").val();
    let edad_enfermedad_delapiel = $("#edad_enfermedad_delapiel").val();

    let item_enfermedad_trm_sexual = $("input[name=item_enfermedad_trm_sexual]:checked").val();
    let edad_enfermedad_trm_sexual = $("#edad_enfermedad_trm_sexual").val();

    let item_enfermedad_hepatitis = $("input[name=item_enfermedad_hepatitis]:checked").val();
    let edad_enfermedad_hepatitis = $("#edad_enfermedad_hepatitis").val();

    let item_enfermedad_cancer = $("input[name=item_enfermedad_cancer]:checked").val();
    let edad_enfermedad_cancer = $("#edad_enfermedad_cancer").val();

    let item_enfermedad_tpp = $("input[name=item_enfermedad_tpp]:checked").val();
    let edad_enfermedad_tpp = $("#edad_enfermedad_tpp").val();

    let item_enfermedad_varicela = $("input[name=item_enfermedad_varicela]:checked").val();
    let edad_enfermedad_varicela = $("#edad_enfermedad_varicela").val();

    let item_enfermedad_probl_estomc = $("input[name=item_enfermedad_probl_estomc]:checked").val();
    let edad_enfermedad_probl_estomc = $("#edad_enfermedad_probl_estomc").val();

    let item_enfermedad_anemia = $("input[name=item_enfermedad_anemia]:checked").val();
    let edad_enfermedad_anemia = $("#edad_enfermedad_anemia").val();

    let transfucion = $("input[name=transfucion]:checked").val();
    let anestesia = $("input[name=anestesia]:checked").val();
    let hospitalizado = $("input[name=hospitalizado]:checked").val();
    let medicamento = $("input[name=medicamento]:checked").val();
    let sueno_normal = $("input[name=sueno_normal]:checked").val();

    let desayuno = $("input[name=desayuno]:checked").val();
    let almuerzo = $("input[name=almuerzo]:checked").val();
    let cena = $("input[name=cena]:checked").val();

    let cigarrillos = $("#cigarrillos").val();

    let pregunta_bebe = $("input[name=pregunta_bebe]:checked").val();

    let vino = $("input[name=vino]:checked").val();
    let cerveza = $("input[name=cerveza]:checked").val();
    let licores = $("input[name=licores]:checked").val();

    let bebe = $("input[name=bebe]:checked").val();
    let comienzo_beber = $("#comienzo_beber").val();

    let pregunta_consume_drogas = $("input[name=pregunta_consume_drogas]:checked").val();
    let otras_drogas = $("#otras_drogas").val();
    let cantidad_semanal = $("#cantidad_semanal").val();
    let edad_comienzo_uso = $("#edad_comienzo_uso").val();

    let conduces_vehiculo = $("input[name=conduces_vehiculo]:checked").val();

    let pregunta_realiza_ejercicioFisico = $("input[name=pregunta_realiza_ejercicioFisico]:checked").val();
    let ejercicio_fisico = $("#ejercicio_fisico").val();
    let ejercicio = $("input[name=ejercicio]:checked").val();

    let cepillado = $("input[name=cepillado]:checked").val();
    let cep_despuescomida = $("input[name=cep_despuescomida]:checked").val();
    let cep_solo_levantarme = $("input[name=cep_solo_levantarme]:checked").val();
    let cep_solo_acostarme = $("input[name=cep_solo_acostarme]:checked").val();

    let edad_mestruacion = $("#edad_mestruacion").val();
    let ciclos_regulares = $("input[name=ciclos_regulares]:checked").val();
    let dismenorrea = $("input[name=dismenorrea]:checked").val();
    let secresion_peneana = $("input[name=secresion_peneana]:checked").val();
    let enfermedad_transmision = $("input[name=enfermedad_transmision]:checked").val();
    let numero_embarazos = $("#numero_embarazos").val();
    let edad_primer_embarazo = $("#edad_primer_embarazo").val();
    let numero_partos = $("#numero_partos").val();

    /*=============================FILA DIABETES===============================*/
    let m_diabetes_padre = $("input[name=m_diabetes_padre]:checked").val();
    let m_diabetes_madre = $("input[name=m_diabetes_madre]:checked").val();
    let m_diabetes_hermano = $("input[name=m_diabetes_hermano]:checked").val();
    let m_diabetes_abuelo = $("input[name=m_diabetes_abuelo]:checked").val();
    let m_diabetes_tio = $("input[name=m_diabetes_tio]:checked").val();

    /*==========================FILA HIPERTENSION ARTERIAL=====================*/
    let m_ha_padre = $("input[name=m_ha_padre]:checked").val();
    let m_ha_madre = $("input[name=m_ha_madre]:checked").val();
    let m_ha_hermano = $("input[name=m_ha_hermano]:checked").val();
    let m_ha_abuelo = $("input[name=m_ha_abuelo]:checked").val();
    let m_ha_tio = $("input[name=m_ha_tio]:checked").val();

    /*==========================FILA CANCER=====================*/
    let m_cancer_padre = $("input[name=m_cancer_padre]:checked").val();
    let m_cancer_madre = $("input[name=m_cancer_madre]:checked").val();
    let m_cancer_hermano = $("input[name=m_cancer_hermano]:checked").val();
    let m_cancer_abuelo = $("input[name=m_cancer_abuelo]:checked").val();
    let m_cancer_tio = $("input[name=m_cancer_tio]:checked").val();

    /*==========================FILA CARDIOPATIA=====================*/
    let m_cardiopatias_padre = $("input[name=m_cardiopatias_padre]:checked").val();
    let m_cardiopatias_madre = $("input[name=m_cardiopatias_madre]:checked").val();
    let m_cardiopatias_hermano = $("input[name=m_cardiopatias_hermano]:checked").val();
    let m_cardiopatias_abuelo = $("input[name=m_cardiopatias_abuelo]:checked").val();
    let m_cardiopatias_tio = $("input[name=m_cardiopatias_tio]:checked").val();

    /*==========================FILA ALCOHOLISMO=====================*/
    let m_alcoholismo_padre = $("input[name=m_alcoholismo_padre]:checked").val();
    let m_alcoholismo_madre = $("input[name=m_alcoholismo_madre]:checked").val();
    let m_alcoholismo_hermano = $("input[name=m_alcoholismo_hermano]:checked").val();
    let m_alcoholismo_abuelo = $("input[name=m_alcoholismo_abuelo]:checked").val();
    let m_alcoholismo_tio = $("input[name=m_alcoholismo_tio]:checked").val();

    /*==========================FILA DROGADICCION=====================*/
    let m_drogadiccion_padre = $("input[name=m_drogadiccion_padre]:checked").val();
    let m_drogadiccion_madre = $("input[name=m_drogadiccion_madre]:checked").val();
    let m_drogadiccion_hermano = $("input[name=m_drogadiccion_hermano]:checked").val();
    let m_drogadiccion_abuelo = $("input[name=m_drogadiccion_abuelo]:checked").val();
    let m_drogadiccion_tio = $("input[name=m_drogadiccion_tio]:checked").val();

    /*==========================FILA DEPRESIÓN=====================*/
    let m_depresion_padre = $("input[name=m_depresion_padre]:checked").val();
    let m_depresion_madre = $("input[name=m_depresion_madre]:checked").val();
    let m_depresion_hermano = $("input[name=m_depresion_hermano]:checked").val();
    let m_depresion_abuelo = $("input[name=m_depresion_abuelo]:checked").val();
    let m_depresion_tio = $("input[name=m_depresion_tio]:checked").val();

    /*==========================FILA OTROS TRASTORNOS MENTALES=====================*/
    let m_tm_padre = $("input[name=m_tm_padre]:checked").val();
    let m_tm_madre = $("input[name=m_tm_madre]:checked").val();
    let m_tm_hermano = $("input[name=m_tm_hermano]:checked").val();
    let m_tm_abuelo = $("input[name=m_tm_abuelo]:checked").val();
    let m_tm_tio = $("input[name=m_tm_tio]:checked").val();

    /*==========================OBESIDAD=====================*/
    let m_obesidad_padre = $("input[name=m_obesidad_padre]:checked").val();
    let m_obesidad_madre = $("input[name=m_obesidad_madre]:checked").val();
    let m_obesidad_hermano = $("input[name=m_obesidad_hermano]:checked").val();
    let m_obesidad_abuelo = $("input[name=m_obesidad_abuelo]:checked").val();
    let m_obesidad_tio = $("input[name=m_obesidad_tio]:checked").val();

    let padres_separados = $("input[name=padres_separados]:checked").val();

    let agua_potable = $("input[name=agua_potable]:checked").val();
    let alcantarillado = $("input[name=alcantarillado]:checked").val();
    let luz_electrica = $("input[name=luz_electrica]:checked").val();
    let calefaccion = $("input[name=calefaccion]:checked").val();

    

    // alertify.success("VALOR: "+item1_enfermedad_alumno);

    if (!tipo_prevision) {
        moverscroll(alturaprevision);
        toastr.info("Seleccione una previsión");
        return;
    } else if (!direccion_ano_academico) {
        moverscroll(alturaotros);
        toastr.info("Ingrese una dirección académica");
        $("#direccion_ano_academico").css("border-bottom", "2px solid red");
        // $("#direccion_ano_academico").css("color", "white");
        return;
    } else if (!academico_telefono_fijo && !academico_celular) {
        moverscroll(alturaotros);
        toastr.info("Ingrese una teléfono o celular académico");
        return;
    } else if (!direccion_familiar) {
        moverscroll(alturaotros);
        toastr.info("Ingrese una dirección familiar");
        return;
    } else if (!familiar_telefono_fijo && !familiar_celular) {
        moverscroll(alturaotros);
        toastr.info("Ingrese una teléfono o celular familiar");
        return;
    } else if (!estado_civil) {
        moverscroll(alturaotros);
        toastr.info("Seleccione un estado civil");
        return;
    } else if (!tengo_hijos) {
        moverscroll(alturatienehijos);
        toastr.info("Marque si tiene o no, hijos.");
        return;
    } else if (tengo_hijos == 1 && $("#tablahijos tbody").children().length == 0) { //marco que tiene hijos pero la tabla esta vacia
        moverscroll(alturatienehijos);
        toastr.info("Ingrese hijos a la tabla.");
        return;
    } else if (!tipo_residencia_ficha) {
        moverscroll(añoacademicodevivienda);
        toastr.info("Marque el lugar donde vive durante el año académico.");
        return;
    } else if (!item_enfermedad_cardiaca) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Enfermedades cardíacas.</strong>");
        return;
    } else if (item_enfermedad_cardiaca == 1 && (!edad_enfermedad_cardiaca || edad_enfermedad_cardiaca == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Enfermedad cardíaca.</strong>");
        return;
    } else if (!item_enfermedad_riñon) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Enfermedades del riñon.</strong>");
        return;
    } else if (item_enfermedad_riñon == 1 && (!edad_enfermedad_riñon || edad_enfermedad_riñon == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Enfermedad del riñon.</strong>");
        return;
    } else if (!item_enfermedad_diabetes) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Diabetes.</strong>");
        return;
    } else if (item_enfermedad_diabetes == 1 && (!edad_enfermedad_diabetes || edad_enfermedad_diabetes == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Diabetes.</strong>");
        return;
    } else if (!item_enfermedad_hipertension_arterial) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Hipertension arterial.</strong>");
        return;
    } else if (item_enfermedad_hipertension_arterial == 1 && (!edad_enfermedad_hipertension_arterial || edad_enfermedad_hipertension_arterial == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Hipertension arterial.</strong>");
        return;
    } else if (!item_enfermedad_respiratoria_cronicas) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Enfermedades respiratorias crónicas.</strong>");
        return;
    } else if (item_enfermedad_respiratoria_cronicas == 1 && (!edad_enfermedad_respiratoria_cronicas || edad_enfermedad_respiratoria_cronicas == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Enfermedad respiratoria crónica.</strong>");
        return;
    } else if (!item_enfermedad_problemas_alimentarios) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Problemas alimentarios.</strong>");
        return;
    } else if (item_enfermedad_problemas_alimentarios == 1 && (!edad_enfermedad_problemas_alimentarios || edad_enfermedad_problemas_alimentarios == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con <strong>Problemas alimentarios.</strong>");
        return;
    } else if (!item_enfermedad_delapiel) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Enfermedades de la piel<strong>.");
        return;
    } else if (item_enfermedad_delapiel == 1 && (!edad_enfermedad_delapiel || edad_enfermedad_delapiel == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Enfermedad de la piel<strong>.");
        return;
    } else if (!item_enfermedad_trm_sexual) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Enfermedades de Transmisión Sexual<strong>.");
        return;
    } else if (item_enfermedad_trm_sexual == 1 && (!edad_enfermedad_trm_sexual || edad_enfermedad_trm_sexual == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Enfermedad de Transmisión Sexual<strong>.");
        return;
    } else if (!item_enfermedad_hepatitis) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Hepatitis<strong>.");
        return;
    } else if (item_enfermedad_hepatitis == 1 && (!edad_enfermedad_hepatitis || edad_enfermedad_hepatitis == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Hepatitis<strong>.");
        return;
    } else if (!item_enfermedad_cancer) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Cáncer<strong>.");
        return;
    } else if (item_enfermedad_cancer == 1 && (!edad_enfermedad_cancer || edad_enfermedad_cancer == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con el <strong>Cáncer<strong>.");
        return;
    } else if (!item_enfermedad_tpp) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Trastornos Psicológicos o Psiquiátricos<strong>.");
        return;
    } else if (item_enfermedad_tpp == 1 && (!edad_enfermedad_tpp || edad_enfermedad_tpp == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con el <strong>Trastornos Psicológicos o Psiquiátricos<strong>.");
        return;
    } else if (!item_enfermedad_varicela) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Varicela<strong>.");
        return;
    } else if (item_enfermedad_varicela == 1 && (!edad_enfermedad_varicela || edad_enfermedad_varicela == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Varicela<strong>.");
        return;
    } else if (!item_enfermedad_probl_estomc) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Problemas estomacales<strong>.");
        return;
    } else if (item_enfermedad_probl_estomc == 1 && (!edad_enfermedad_probl_estomc || edad_enfermedad_probl_estomc == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Problemas estomacales<strong>.");
        return;
    } else if (!item_enfermedad_anemia) {
        moverscroll(alturaenfermedades);
        toastr.info("Marque el casillero \n <strong>Anemia<strong>.");
        return;
    } else if (item_enfermedad_anemia == 1 && (!edad_enfermedad_anemia || edad_enfermedad_anemia == '')) {
        moverscroll(alturaenfermedades);
        toastr.info("Ingrese la edad cuando comenzo con la <strong>Anemia<strong>.");
        return;
    } else if (!transfucion) {
        moverscroll(alturatransfusionessanguineas);
        toastr.info("Marque\n si has recibido transfusiones sanguíneas");
        return;
    } else if (!anestesia) {
        moverscroll(alturaanestesia);
        toastr.info("Marque si Has tenido algún accidente con la anestesia o eres alérgico a ella");
        return;
    } else if (!hospitalizado) {
        moverscroll(alturahospitalizado);
        toastr.info("Marque\n si Has estado hospitalizado");
        return;
    } else if (hospitalizado == 1 && $("#tablahospitalizado tbody").children().length == 0) { //marco que tiene hijos pero la tabla esta vacia
        moverscroll(alturahospitalizado);
        toastr.info("Ingrese hospitalizacion.");
        return;
    } else if (!medicamento) {
        moverscroll(alturamedicamento);
        toastr.info("Marque\n si utilizas actualmente algún medicamento");
        return;
    } else if (medicamento == 1 && $("#tablamedicamento tbody").children().length == 0) { //marco que tiene hijos pero la tabla esta vacia
        moverscroll(alturamedicamento);
        toastr.info("Ingrese medicamento.");
        return;
    } else if (!sueno_normal) {
        moverscroll(alturaseccionII_III);
        toastr.info("Marque\n si tienes sueño normal en el último mes");
        return;
    } else if (!desayuno && !almuerzo && !cena) {
        moverscroll(alturaseccionII_III);
        toastr.info("Marque\n el tipo de comidas que ingieres todos los días");
        return;
    } else if (!cigarrillos) {
        moverscroll(alturaseccionII_III);
        toastr.info("Ingrese cantidad de cigarrillos que fuma a la semana");
        return;
    } else if (pregunta_bebe == 1 && (!vino && !cerveza && !licores)) {
        moverscroll(alturaseccionII_III);
        toastr.info("Marque si bebe: vino, cerveza o licores.");
        return;
    } else if (pregunta_bebe == 1 && !bebe) {
        moverscroll(alturaseccionII_VIII);
        toastr.info("Marque la frecuencia en que usted bebe");
        return;
    } else if (pregunta_bebe == 1 && !comienzo_beber) {
        moverscroll(alturaseccionII_VIII);
        toastr.info("Ingrese edad que comenzó a beber.");
        return;
    } else if (pregunta_consume_drogas == 1 && (!otras_drogas || otras_drogas == '')) {
        moverscroll(alturaconsumedrogas);
        toastr.info("Ingrese droga.");
        return;
    } else if (pregunta_consume_drogas == 1 && (!cantidad_semanal || cantidad_semanal == '')) {
        moverscroll(alturaconsumedrogas);
        toastr.info("Ingrese cantidad semanal.");
        return;
    } else if (pregunta_consume_drogas == 1 && (!edad_comienzo_uso || edad_comienzo_uso == '')) {
        moverscroll(alturaconsumedrogas);
        toastr.info("Ingrese edad en que comenzo a usar droga.");
        return;
    } else if (!conduces_vehiculo) {
        moverscroll(alturaconducevehiculo);
        toastr.info("Marque si conduce o no un vehiculo.");
        return;
    } else if (pregunta_realiza_ejercicioFisico == 1 && (!ejercicio_fisico || ejercicio_fisico == '')) {
        moverscroll(alturarealizaejercicio);
        toastr.info("Señala tipo de Ejercicio.");
        return;
    } else if (pregunta_realiza_ejercicioFisico == 1 && (!ejercicio || ejercicio == '')) {
        moverscroll(alturarealizaejercicio);
        toastr.info("Marque frecuencia del ejercicio.");
        return;
    } else if (!cepillado) {
        moverscroll(alturacepillardientes);
        toastr.info("Marque frecuencia con que te cepillas los dientes al día.");
        return;
    } else if (!cep_despuescomida && !cep_solo_levantarme && !cep_solo_acostarme) {
        moverscroll(alturacepillardientes);
        toastr.info("Marque cuando se cepilla.");
        return;
    } else if (tipodesexo == 2 && !edad_mestruacion) {
        moverscroll(alturaedad_mestruacion);
        toastr.info("Ingrese Edad de tu primera menstruación.");
        return;
    } else if (tipodesexo == 2 && !ciclos_regulares) {
        moverscroll(alturaedad_ciclosregularesmenstruacion);
        toastr.info("Responda a : ¿Son tus ciclos regulares?.");
        return;
    } else if (tipodesexo == 2 && !dismenorrea) {
        moverscroll(alturaedad_opcionesdismenorrea);
        toastr.info("Responda a : ¿Sufres de dismenorrea? (dolor menstrual).");
        return;
    } else if (tipodesexo == 2 && !secresion_peneana) {
        moverscroll(alturaedad_opcionessecresion_peneana);
        toastr.info("Responda a : ¿Has tenido algún tipo de flujo patológico anormal o secreción pereana?.");
        return;
    } else if (tipodesexo == 2 && !enfermedad_transmision) {
        moverscroll(alturaedad_opcionesenfermedad_transmision);
        toastr.info("Responda a : ¿Has tenido una enfermedad de transmisión sexual?.");
        return;
    } else if (tipodesexo == 2 && (!numero_embarazos || numero_embarazos == '')) {
        moverscroll(alturaedad_informaciondeembarazo);
        toastr.info("Ingrese Número de Embarazos.");
        return;
    } else if (tipodesexo == 2 && (!edad_primer_embarazo || edad_primer_embarazo == '')) {
        moverscroll(alturaedad_informacion_primer_parto);
        toastr.info("Ingrese Edad del primer Embarazo.");
        return;
    } else if (tipodesexo == 2 && (!numero_partos || numero_partos == '')) {
        moverscroll(alturaedad_informacion_numero_partos);
        toastr.info("Ingrese Número de Partos.");
        return;
    } else if (!m_diabetes_padre && m_diabetes_madre && m_diabetes_hermano && m_diabetes_abuelo && m_diabetes_tio) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en <strong>Diabetes</strong>.");
        return;
    } else if (!m_diabetes_padre) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Diabetes</strong>.");
        return;
    } else if (!m_diabetes_madre) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Diabetes</strong>.");
        return;
    } else if (!m_diabetes_hermano) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Diabetes</strong>.");
        return;
    } else if (!m_diabetes_abuelo) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en ABUELO de la enfermedad:  <strong>Diabetes</strong>.");
        return;
    } else if (!m_diabetes_tio) {
        colorfila(1);
        moverscroll(altura_filadiabetes);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Diabetes</strong>.");
        return;
    } else if (!m_ha_padre) {
        colorfila(2);
        moverscroll(altura_filahipertension_arterial);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Hipertensión Arterial</strong>.");
        return;
    } else if (!m_ha_madre) {
        colorfila(2);
        moverscroll(altura_filahipertension_arterial);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Hipertensión Arterial</strong>.");
        return;
    } else if (!m_ha_hermano) {
        colorfila(2);
        moverscroll(altura_filahipertension_arterial);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Hipertensión Arterial</strong>.");
        return;
    } else if (!m_ha_abuelo) {
        colorfila(2);
        moverscroll(altura_filahipertension_arterial);
        toastr.info("Marque una opción en ABUELO de la enfermedad:  <strong>Hipertensión Arterial</strong>.");
        return;
    } else if (!m_ha_tio) {
        colorfila(2);
        moverscroll(altura_filahipertension_arterial);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Hipertensión Arterial</strong>.");
        return;
    } else if (!m_cancer_padre) {
        colorfila(3);
        moverscroll(altura_filacancer);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Cáncer</strong>.");
        return;
    } else if (!m_cancer_madre) {
        colorfila(3);
        moverscroll(altura_filacancer);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Cáncer</strong>.");
        return;
    } else if (!m_cancer_hermano) {
        colorfila(3);
        moverscroll(altura_filacancer);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Cáncer</strong>.");
        return;
    } else if (!m_cancer_abuelo) {
        colorfila(3);
        moverscroll(altura_filacancer);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Cáncer</strong>.");
        return;
    } else if (!m_cancer_tio) {
        colorfila(3);
        moverscroll(altura_filacancer);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Cáncer</strong>.");
        return;
    } else if (!m_cardiopatias_padre) {
        colorfila(4);
        moverscroll(altura_filacardiopatias);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Cardiopatías</strong>.");
        return;
    } else if (!m_cardiopatias_madre) {
        colorfila(4);
        moverscroll(altura_filacardiopatias);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Cardiopatías</strong>.");
        return;
    } else if (!m_cardiopatias_hermano) {
        colorfila(4);
        moverscroll(altura_filacardiopatias);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Cardiopatías</strong>.");
        return;
    } else if (!m_cardiopatias_abuelo) {
        colorfila(4);
        moverscroll(altura_filacardiopatias);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Cardiopatías</strong>.");
        return;
    } else if (!m_cardiopatias_tio) {
        colorfila(4);
        moverscroll(altura_filacardiopatias);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Cardiopatías</strong>.");
        return;
    } else if (!m_alcoholismo_padre) {
        colorfila(5);
        moverscroll(altura_filaalcoholismo);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Alcoholismo</strong>.");
        return;
    } else if (!m_alcoholismo_madre) {
        colorfila(5);
        moverscroll(altura_filaalcoholismo);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Alcoholismo</strong>.");
        return;
    } else if (!m_alcoholismo_hermano) {
        colorfila(5);
        moverscroll(altura_filaalcoholismo);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Alcoholismo</strong>.");
        return;
    } else if (!m_alcoholismo_abuelo) {
        colorfila(5);
        moverscroll(altura_filaalcoholismo);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Alcoholismo</strong>.");
        return;
    } else if (!m_alcoholismo_tio) {
        colorfila(5);
        moverscroll(altura_filaalcoholismo);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Alcoholismo</strong>.");
        return;
    } else if (!m_drogadiccion_padre) {
        colorfila(6);
        moverscroll(altura_filadrogadiccion);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Drogadicción</strong>.");
        return;
    } else if (!m_drogadiccion_madre) {
        colorfila(6);
        moverscroll(altura_filadrogadiccion);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Drogadicción</strong>.");
        return;
    } else if (!m_drogadiccion_hermano) {
        colorfila(6);
        moverscroll(altura_filadrogadiccion);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Drogadicción</strong>.");
        return;
    } else if (!m_drogadiccion_abuelo) {
        colorfila(6);
        moverscroll(altura_filadrogadiccion);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Drogadicción</strong>.");
        return;
    } else if (!m_drogadiccion_tio) {
        colorfila(6);
        moverscroll(altura_filadrogadiccion);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Drogadicción</strong>.");
        return;
    } else if (!m_depresion_padre) {
        colorfila(7);
        moverscroll(altura_filadepresion);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Depresión</strong>.");
        return;
    } else if (!m_depresion_madre) {
        colorfila(7);
        moverscroll(altura_filadepresion);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Depresión</strong>.");
        return;
    } else if (!m_depresion_hermano) {
        colorfila(7);
        moverscroll(altura_filadepresion);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Depresión</strong>.");
        return;
    } else if (!m_depresion_abuelo) {
        colorfila(7);
        moverscroll(altura_filadepresion);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Depresión</strong>.");
        return;
    } else if (!m_depresion_tio) {
        colorfila(7);
        moverscroll(altura_filadepresion);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Depresión</strong>.");
        return;
    } else if (!m_tm_padre) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Otros trastornos mentales</strong>.");
        return;
    } else if (!m_tm_madre) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Otros trastornos mentales</strong>.");
        return;
    } else if (!m_tm_hermano) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Otros trastornos mentales</strong>.");
        return;
    } else if (!m_tm_abuelo) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Otros trastornos mentales</strong>.");
        return;
    } else if (!m_tm_tio) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Otros trastornos mentales</strong>.");
        return;
    } else if (!m_obesidad_padre) {
        colorfila(8);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en PADRE de la enfermedad:  <strong>Obesidad</strong>.");
        return;
    } else if (!m_obesidad_madre) {
        colorfila(9);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en MADRE de la enfermedad:  <strong>Obesidad</strong>.");
        return;
    } else if (!m_obesidad_hermano) {
        colorfila(9);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en HERMANO(AS) de la enfermedad:  <strong>Obesidad</strong>.");
        return;
    } else if (!m_obesidad_abuelo) {
        colorfila(9);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en ABUELO(AS) de la enfermedad:  <strong>Obesidad</strong>.");
        return;
    } else if (!m_obesidad_tio) {
        colorfila(9);
        moverscroll(altura_filatrastornos_mentales);
        toastr.info("Marque una opción en TIO(AS) de la enfermedad:  <strong>Obesidad</strong>.");
        return;
    }else if (!padres_separados) {
        moverscroll(altura_tablafamiliares);
        toastr.info("Marque si sus padres están separados o no.");
        return;
    } else if (padres_separados == 1 && $("#tablafamiliares tbody").children().length == 0) { //marco que tiene hijos pero la tabla esta vacia
        moverscroll(altura_tablafamiliares);
        toastr.info("Ingrese familiares a la tabla.");
        return;
    }else if (!agua_potable && !alcantarillado && !luz_electrica && !calefaccion) { //marco que tiene hijos pero la tabla esta vacia
        moverscroll(altura_DivInsumosBasicos);
        toastr.info("Marque una opción como mínimo de servicios básicos, en tu hogar de origen.");
        return;
    } else {

        $("#direccion_ano_academico").css("border-bottom", "1px solid #d1d3e2");

        // console.log("Listado: "+JSON.stringify(listado));

        toastr.success("Enviado");

        var formData = new FormData(form[0]); //form[0]

        formData.append('vivesconellos', JSON.stringify(vivesconellos));

        for (var i of formData.entries()) {
            console.log(i[0] + ', ' + i[1]);
        }

        // $.ajax({
        //     type: 'POST',
        //     url: 'funciones/recibir.php',
        //     data: formData,
        //     dataType: 'text',
        //     contentType: false,
        //     cache: false,
        //     processData: false
        // }).done(function (respuesta) {
        //     console.log(respuesta);
        // });
    }

    // toastr.info("TIPO PREVISIÓN: "+tipo_prevision);

});


$("input[name=tengo_hijos]").on('click', function () {
    if ($(this).is(':checked')) {
        if ($(this).val() == 0) {
            $('#insertarhijo').prop("disabled", true);
            $("#tablahijos tbody tr").remove();
        } else if ($(this).val() == 1) {
            $('#insertarhijo').prop("disabled", false);
        }
    }
});

$("input[name=hospitalizado]").on('click', function () {
    if ($(this).is(':checked')) {
        if ($(this).val() == 0) {
            $('#insertarhospitalizado').prop("disabled", true);
            $("#tablahospitalizado tbody tr").remove();
        } else if ($(this).val() == 1) {
            $('#insertarhospitalizado').prop("disabled", false);
        }
    }
});

$("input[name=medicamento]").on('click', function () {
    if ($(this).is(':checked')) {
        if ($(this).val() == 0) {
            $('#insertarmedicamento').prop("disabled", true);
            $("#tablamedicamento tbody tr").remove();
        } else if ($(this).val() == 1) {
            $('#insertarmedicamento').prop("disabled", false);
        }
    }
});

$("input[name=padres_separados]").on('click', function () {
    if ($(this).is(':checked')) {
        if ($(this).val() == 0) {
            $('#insertarfamiliar').prop("disabled", true);
            $("#tablafamiliares tbody tr").remove();
        } else if ($(this).val() == 1) {
            $('#insertarfamiliar').prop("disabled", false);
        }
    }
});

$("input[name=pregunta_bebe]").on('change', function () {
    if ($(this).is(':checked')) {

        $('#vino').prop('checked', false).val(0);
        $('#cerveza').prop('checked', false).val(0);
        $('#licores').prop('checked', false).val(0);

        /*========Oculta los checkbox===========*/
        $('#colVino').prop("hidden", false);
        $('#colCerveza').prop("hidden", false);
        $('#colLicores').prop("hidden", false);

        $('#textofrecuenciabebe').prop("hidden", false);
        $('#colcomienzo_beber1').prop("hidden", false);
        $('#colcomienzo_beber2').prop("hidden", false);

        for (let i = 1; i <= 5; i++) {
            $('#colbebe' + i).prop("hidden", false);
        }

    } else {
        $('#vino').prop("checked", false).val(0);
        $('#cerveza').prop("checked", false).val(0);
        $('#licores').prop("checked", false).val(0);

        /*========Muestra los checkbox===========*/
        $('#colVino').prop("hidden", true);
        $('#colCerveza').prop("hidden", true);
        $('#colLicores').prop("hidden", true);

        $('#textofrecuenciabebe').prop("hidden", true);
        $('#colcomienzo_beber1').prop("hidden", true);
        $('#colcomienzo_beber2').prop("hidden", true);

        $('#comienzo_beber').val("");

        for (let i = 1; i <= 5; i++) {
            $('#colbebe' + i).prop("hidden", true);
        }

        $("input[name=bebe]").prop("checked", false);

    }
});


$("input[name=pregunta_consume_drogas]").on('change', function () {
    if ($(this).is(':checked')) {

        // /*========Oculta los checkbox===========*/
        $('#TextoConsumeDroga').prop("hidden", false);
        $('#DivOtrasDrogas').prop("hidden", false);
        $('#TextoCantidadSemanal').prop("hidden", false);
        $('#DivCantidadSemanal').prop("hidden", false);
        $('#TextoEdadDroga').prop("hidden", false);
        $('#DivEdadComienzoUso').prop("hidden", false);
        $('#otras_drogas').val('');
        $('#cantidad_semanal').val('');
        $('#edad_comienzo_uso').val('');
    } else {

        // /*========Muestra los checkbox===========*/
        $('#TextoConsumeDroga').prop("hidden", true);
        $('#DivOtrasDrogas').prop("hidden", true);
        $('#TextoCantidadSemanal').prop("hidden", true);
        $('#DivCantidadSemanal').prop("hidden", true);
        $('#TextoEdadDroga').prop("hidden", true);
        $('#DivEdadComienzoUso').prop("hidden", true);
        $('#otras_drogas').val('');
        $('#cantidad_semanal').val('');
        $('#edad_comienzo_uso').val('');
    }
});


$("input[name=pregunta_realiza_ejercicioFisico]").on('change', function () {
    if ($(this).is(':checked')) {

        // /*========Oculta los checkbox===========*/

        $('#TextoSeñalaEjercicio').prop("hidden", false);
        $('#InputSeñalaEjercicio').prop("hidden", false);
        $('#TextoSeñalaFrecuenciaEjercicio').prop("hidden", false);
        $('#CheckEjercicio1').prop("hidden", false);
        $('#CheckEjercicio2').prop("hidden", false);
        $('#CheckEjercicio3').prop("hidden", false);
        $('#ejercicio_fisico').val('');
        $("input[name=ejercicio]").prop("checked", false);
        // $('#cantidad_semanal').val('');
        // $('#edad_comienzo_uso').val('');
    } else {
        // /*========Muestra los checkbox===========*/
        $('#TextoSeñalaEjercicio').prop("hidden", true);
        $('#InputSeñalaEjercicio').prop("hidden", true);
        $('#TextoSeñalaFrecuenciaEjercicio').prop("hidden", true);
        $('#CheckEjercicio1').prop("hidden", true);
        $('#CheckEjercicio2').prop("hidden", true);
        $('#CheckEjercicio3').prop("hidden", true);
        $('#ejercicio_fisico').val('');
        $("input[name=ejercicio]").prop("checked", false);
    }
});


function colorfila(valor) {
    if (valor == 1) {
        $("#filadiabetes").css("background-color", "#fcf8e3");
    } else if (valor == 2) {
        $("#filadiabetes").css("background-color", "white");
        $("#filahipertension_arterial").css("background-color", "#fcf8e3");
    } else if (valor == 3) {
        $("#filahipertension_arterial").css("background-color", "white");
        $("#filacancer").css("background-color", "#fcf8e3");
    } else if (valor == 4) {
        $("#filacancer").css("background-color", "white");
        $("#filacardiopatias").css("background-color", "#fcf8e3");
    } else if (valor == 5) {
        $("#filacardiopatias").css("background-color", "white");
        $("#filaalcoholismo").css("background-color", "#fcf8e3");
    } else if (valor == 6) {
        $("#filaalcoholismo").css("background-color", "white");
        $("#filadrogadiccion").css("background-color", "#fcf8e3");
    } else if (valor == 7) {
        $("#filadrogadiccion").css("background-color", "white");
        $("#filadepresion").css("background-color", "#fcf8e3");
    } else if (valor == 8) {
        $("#filadepresion").css("background-color", "white");
        $("#filatrastornos_mentales").css("background-color", "#fcf8e3");
    } else if (valor == 9) {
        $("#filatrastornos_mentales").css("background-color", "white");
        $("#filaobesidad").css("background-color", "#fcf8e3");
    }
}

// $("input[name=viveconhijo]").on('change', function(){

//     toastr.error("vive: "+$(this).val());

//     // if ($(this).is(':checked')) {

//     //     toastr.error("vive: "+$(this).val());
//     //     // if($(this).val()==0){
//     //     //     $('#insertarhijo').prop("disabled", true);
//     //     //     $("#tablahijos tbody tr").remove(); 
//     //     // }else if($(this).val()==1){
//     //     //     $('#insertarhijo').prop("disabled", false);
//     //     // }
//     // }
// });


// function formularioFirmaDigital() {
//     form = $("#formfirmadigital");

//     let firmadigital = $('#firmabase64').val();

//     var formData = new FormData(form[0]); //form[0]

//     formData.append('seleccionar', '1');

//     // for (var i of formData.entries()) {
//     //     console.log(i[0] + ', ' + i[1]);
//     // }
// }