<?php include '../dashboard/head.php'; ?>

<script src="https://demo.azuracast.com/static/dist/lib/select2/select2-c28f3322ee.full.min.js"></script>

<!-- <link rel="stylesheet" href="https://demo.azuracast.com/static/dist/style-9e184535f9.css"> -->

<style>
    code{background-color:#f5f5f5;color:#bd4147}
    .card-header{border-bottom:1px solid rgba(0,0,0,.12)}.card-header.bg-primary-dark .card-subtitle,.card-header.bg-primary-dark .card-title{color:#fff}
    .nav-tabs.border-0,.nav-tabs.border-bottom-0{box-shadow:none}.nav-tabs .nav-link{transition-duration:.3s;transition-property:background-color,color,opacity;transition-timing-function:cubic-bezier(.4,0,.2,1);font-size:.875rem;font-weight:500;line-height:1;min-height:3rem;opacity:.7;padding:1.0625rem .75rem;position:relative;text-transform:uppercase}@media (min-width:576px){.nav-tabs .nav-link{transition-duration:.39s}}@media (min-width:992px){.nav-tabs .nav-link{transition-duration:.2s}}@media screen and (prefers-reduced-motion:reduce){.nav-tabs .nav-link{transition:none}}.nav-tabs .nav-link.active,.nav-tabs .nav-link:active{opacity:1}.nav-tabs .nav-link.active::before{opacity:1}.nav-tabs .nav-link.disabled{background-color:transparent;opacity:1}.nav-tabs .nav-link::before{transition-duration:.3s;transition-property:opacity;transition-timing-function:cubic-bezier(.4,0,.2,1);content:"";display:block;height:.125rem;opacity:0;position:absolute;right:0;bottom:0;left:0}@media (min-width:576px){.nav-tabs .nav-link::before{transition-duration:.39s}}@media (min-width:992px){.nav-tabs .nav-link::before{transition-duration:.2s}}@media screen and (prefers-reduced-motion:reduce){.nav-tabs .nav-link::before{transition:none}}.nav-tabs .nav-item.show .nav-link{opacity:1}.nav-tabs-material{position:relative}.nav-tabs-material.animate .nav-link::before{opacity:0}.nav-tabs-material.animate .nav-tabs-indicator{transition-duration:.3s;transition-property:left,right;transition-timing-function:cubic-bezier(.4,0,.2,1)}@media (min-width:576px){.nav-tabs-material.animate .nav-tabs-indicator{transition-duration:.39s}}@media (min-width:992px){.nav-tabs-material.animate .nav-tabs-indicator{transition-duration:.2s}}@media screen and (prefers-reduced-motion:reduce){.nav-tabs-material.animate .nav-tabs-indicator{transition:none}}.nav-tabs-material .nav-link::before{transition:none}.nav-tabs-material .nav-tabs-indicator{display:none;height:.125rem;position:absolute;bottom:0}.nav-tabs-material .nav-tabs-indicator.show{display:block}.nav-tabs-scrollable .nav-tabs-material .nav-tabs-indicator{bottom:3rem}.nav-tabs-scrollable{box-shadow:inset 0 -2px 0 -1px rgba(0,0,0,.12);height:3rem;overflow:hidden}.nav-tabs-scrollable .nav-tabs{box-shadow:none;flex-wrap:nowrap;overflow-x:auto;overflow-y:hidden;padding-bottom:3rem}.nav-tabs-scrollable .nav-tabs::-webkit-scrollbar{display:none}.custom-select,.form-control,.form-control-file{background-clip:padding-box;background-color:transparent;border-radius:4px;border-style:solid;border-width:1px;box-shadow:none;color:rgba(0,0,0,.87);display:block;font-size:.9rem;line-height:1.5;padding:.6rem .75rem;width:100%}.custom-select::-ms-expand,.form-control-file::-ms-expand,.form-control::-ms-expand{background-color:transparent;border:0}.custom-select::placeholder,.form-control-file::placeholder,.form-control::placeholder{opacity:1}.custom-select:disabled,.form-control-file:disabled,.form-control:disabled,[readonly].custom-select,[readonly].form-control,[readonly].form-control-file{border-style:dotted;opacity:1}.custom-select:disabled:focus,.custom-select:disabled:hover,.form-control-file:disabled:focus,.form-control-file:disabled:hover,.form-control:disabled:focus,.form-control:disabled:hover,[readonly].custom-select:focus,[readonly].custom-select:hover,[readonly].form-control-file:focus,[readonly].form-control-file:hover,[readonly].form-control:focus,[readonly].form-control:hover{box-shadow:none}.custom-select:focus,.form-control-file:focus,.form-control:focus{outline:0}.custom-select:invalid:required,.form-control-file:invalid:required,.form-control:invalid:required{outline:0}.form-control[type=file]{max-height:2.25rem}.form-control-lg{font-size:2.125rem;line-height:1.176471;padding:.6249995625rem .75rem calc(.6249995625rem - 1px)}.form-control-lg[type=file]{max-height:3.75rem}.form-control-sm{font-size:.8125rem;line-height:1.538462;padding:.3749998125rem .75rem calc(.3749998125rem - 1px)}.form-control-sm[type=file]{max-height:2rem}
</style>

<title>Salud los Álamos - CARD TAB 2</title>

</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" id="contenedorgeneral">

                    <div class="container pt-4 pb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="progress" style="height: 9px;">
                                    <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="card mb-3" role="region">
                        <div class="card-header bg-primary">
                            <h2 class="card-title text-white">Editar el perfil</h2>
                        </div>


                        <div class="card-header">
                            <ul class="nav nav-justified nav-tabs card-header-tabs" role="tablist">
                                <li class="nav-item">
                                    <a aria-controls="profile" aria-selected="true" class="nav-link active" data-toggle="tab" href="#tab-profile" id="tab-profile-link" role="tab">Perfil de la estación</a>
                                </li>
                                <li class="nav-item">
                                    <a aria-controls="frontend" aria-selected="true" class="nav-link " data-toggle="tab" href="#tab-frontend" id="tab-frontend-link" role="tab">Emisión</a>
                                </li>
                                <li class="nav-item">
                                    <a aria-controls="backend" aria-selected="true" class="nav-link " data-toggle="tab" href="#tab-backend" id="tab-backend-link" role="tab">AutoDJ</a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <form id="azuraforms_form" method="POST" action="" class="form " accept-charset="UTF-8" novalidate="novalidate">
                                <div class="tab-content">
                                    <div aria-labelledby="tab-profile-link" class="tab-pane fade show active" id="tab-profile" role="tabpanel">

                                        <fieldset id="profile" class="">


                                            <div class="row">

                                                <div class="form-group col-sm-12" id="field_name"><label for="azuraforms_form_name" class="">Nombre <span class="text-danger" title="Required">*</span></label>
                                                    <div class="form-field"><input type="text" name="name" id="azuraforms_form_name" value="AzuraTest Radio" class="form-control" data-dirrty-initial-value="AzuraTest Radio"></div>
                                                </div>
                                                <div class="form-group col-sm-12" id="field_description"><label for="azuraforms_form_description" class="">Descripción </label>
                                                    <div class="form-field"><textarea name="description" id="azuraforms_form_description" class="form-control" type="text" rows="6" cols="60" data-dirrty-initial-value="A test radio station." style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 147px;">A test radio station.</textarea></div>
                                                </div>
                                                <div class="form-group col-md-6" id="field_genre"><label for="azuraforms_form_genre" class="">Género </label>
                                                    <div class="form-field"><input type="text" name="genre" id="azuraforms_form_genre" value="" class="form-control" data-dirrty-initial-value=""></div>
                                                </div>
                                                <div class="form-group col-md-6" id="field_url"><label for="azuraforms_form_url" class="">URL del sitio web </label>
                                                    <div class="form-field"><input type="text" name="url" id="azuraforms_form_url" value="" class="form-control" data-dirrty-initial-value=""></div><small class="help-block form-text">Nota: Esta debe ser la página de inicio pública de la estación de radio, no la URL de AzuraCast. Se incluirá en los detalles de la transmisión.</small>
                                                </div>
                                                <div class="form-group col-sm-12" id="field_timezone"><label for="azuraforms_form_timezone" class="">Zona Horaria </label>
                                                    <div class="form-field"><select name="timezone" id="azuraforms_form_timezone" class="%s form-control select2-hidden-accessible" data-dirrty-initial-value="UTC" data-select2-id="azuraforms_form_timezone" tabindex="-1" aria-hidden="true">
                                                            <optgroup label="UTC">
                                                                <option value="UTC" selected="selected" data-select2-id="2">UTC</option>
                                                            </optgroup>
                                                            <optgroup label="Africa">
                                                                <option value="Africa/Abidjan">Abidjan (UTC)</option>
                                                                <option value="Africa/Accra">Accra (UTC)</option>
                                                                <option value="Africa/Addis_Ababa">Addis Ababa (UTC+3)</option>
                                                                <option value="Africa/Algiers">Algiers (UTC+1)</option>
                                                                <option value="Africa/Asmara">Asmara (UTC+3)</option>
                                                                <option value="Africa/Bamako">Bamako (UTC)</option>
                                                                <option value="Africa/Bangui">Bangui (UTC+1)</option>
                                                                <option value="Africa/Banjul">Banjul (UTC)</option>
                                                                <option value="Africa/Bissau">Bissau (UTC)</option>
                                                                <option value="Africa/Blantyre">Blantyre (UTC+2)</option>
                                                                <option value="Africa/Brazzaville">Brazzaville (UTC+1)</option>
                                                                <option value="Africa/Bujumbura">Bujumbura (UTC+2)</option>
                                                                <option value="Africa/Cairo">Cairo (UTC+2)</option>
                                                                <option value="Africa/Casablanca">Casablanca (UTC+1)</option>
                                                                <option value="Africa/Ceuta">Ceuta (UTC+2)</option>
                                                                <option value="Africa/Conakry">Conakry (UTC)</option>
                                                                <option value="Africa/Dakar">Dakar (UTC)</option>
                                                                <option value="Africa/Dar_es_Salaam">Dar es Salaam (UTC+3)</option>
                                                                <option value="Africa/Djibouti">Djibouti (UTC+3)</option>
                                                                <option value="Africa/Douala">Douala (UTC+1)</option>
                                                                <option value="Africa/El_Aaiun">El Aaiun (UTC+1)</option>
                                                                <option value="Africa/Freetown">Freetown (UTC)</option>
                                                                <option value="Africa/Gaborone">Gaborone (UTC+2)</option>
                                                                <option value="Africa/Harare">Harare (UTC+2)</option>
                                                                <option value="Africa/Johannesburg">Johannesburg (UTC+2)</option>
                                                                <option value="Africa/Juba">Juba (UTC+2)</option>
                                                                <option value="Africa/Kampala">Kampala (UTC+3)</option>
                                                                <option value="Africa/Khartoum">Khartoum (UTC+2)</option>
                                                                <option value="Africa/Kigali">Kigali (UTC+2)</option>
                                                                <option value="Africa/Kinshasa">Kinshasa (UTC+1)</option>
                                                                <option value="Africa/Lagos">Lagos (UTC+1)</option>
                                                                <option value="Africa/Libreville">Libreville (UTC+1)</option>
                                                                <option value="Africa/Lome">Lome (UTC)</option>
                                                                <option value="Africa/Luanda">Luanda (UTC+1)</option>
                                                                <option value="Africa/Lubumbashi">Lubumbashi (UTC+2)</option>
                                                                <option value="Africa/Lusaka">Lusaka (UTC+2)</option>
                                                                <option value="Africa/Malabo">Malabo (UTC+1)</option>
                                                                <option value="Africa/Maputo">Maputo (UTC+2)</option>
                                                                <option value="Africa/Maseru">Maseru (UTC+2)</option>
                                                                <option value="Africa/Mbabane">Mbabane (UTC+2)</option>
                                                                <option value="Africa/Mogadishu">Mogadishu (UTC+3)</option>
                                                                <option value="Africa/Monrovia">Monrovia (UTC)</option>
                                                                <option value="Africa/Nairobi">Nairobi (UTC+3)</option>
                                                                <option value="Africa/Ndjamena">Ndjamena (UTC+1)</option>
                                                                <option value="Africa/Niamey">Niamey (UTC+1)</option>
                                                                <option value="Africa/Nouakchott">Nouakchott (UTC)</option>
                                                                <option value="Africa/Ouagadougou">Ouagadougou (UTC)</option>
                                                                <option value="Africa/Porto-Novo">Porto-Novo (UTC+1)</option>
                                                                <option value="Africa/Sao_Tome">Sao Tome (UTC)</option>
                                                                <option value="Africa/Tripoli">Tripoli (UTC+2)</option>
                                                                <option value="Africa/Tunis">Tunis (UTC+1)</option>
                                                                <option value="Africa/Windhoek">Windhoek (UTC+2)</option>
                                                            </optgroup>
                                                            <optgroup label="America">
                                                                <option value="America/Adak">Adak (UTC-9)</option>
                                                                <option value="America/Anchorage">Anchorage (UTC-8)</option>
                                                                <option value="America/Anguilla">Anguilla (UTC-4)</option>
                                                                <option value="America/Antigua">Antigua (UTC-4)</option>
                                                                <option value="America/Araguaina">Araguaina (UTC-3)</option>
                                                                <option value="America/Argentina/Buenos_Aires">Argentina/Buenos Aires (UTC-3)</option>
                                                                <option value="America/Argentina/Catamarca">Argentina/Catamarca (UTC-3)</option>
                                                                <option value="America/Argentina/Cordoba">Argentina/Cordoba (UTC-3)</option>
                                                                <option value="America/Argentina/Jujuy">Argentina/Jujuy (UTC-3)</option>
                                                                <option value="America/Argentina/La_Rioja">Argentina/La Rioja (UTC-3)</option>
                                                                <option value="America/Argentina/Mendoza">Argentina/Mendoza (UTC-3)</option>
                                                                <option value="America/Argentina/Rio_Gallegos">Argentina/Rio Gallegos (UTC-3)</option>
                                                                <option value="America/Argentina/Salta">Argentina/Salta (UTC-3)</option>
                                                                <option value="America/Argentina/San_Juan">Argentina/San Juan (UTC-3)</option>
                                                                <option value="America/Argentina/San_Luis">Argentina/San Luis (UTC-3)</option>
                                                                <option value="America/Argentina/Tucuman">Argentina/Tucuman (UTC-3)</option>
                                                                <option value="America/Argentina/Ushuaia">Argentina/Ushuaia (UTC-3)</option>
                                                                <option value="America/Aruba">Aruba (UTC-4)</option>
                                                                <option value="America/Asuncion">Asuncion (UTC-4)</option>
                                                                <option value="America/Atikokan">Atikokan (UTC-5)</option>
                                                                <option value="America/Bahia">Bahia (UTC-3)</option>
                                                                <option value="America/Bahia_Banderas">Bahia Banderas (UTC-5)</option>
                                                                <option value="America/Barbados">Barbados (UTC-4)</option>
                                                                <option value="America/Belem">Belem (UTC-3)</option>
                                                                <option value="America/Belize">Belize (UTC-6)</option>
                                                                <option value="America/Blanc-Sablon">Blanc-Sablon (UTC-4)</option>
                                                                <option value="America/Boa_Vista">Boa Vista (UTC-4)</option>
                                                                <option value="America/Bogota">Bogota (UTC-5)</option>
                                                                <option value="America/Boise">Boise (UTC-6)</option>
                                                                <option value="America/Cambridge_Bay">Cambridge Bay (UTC-6)</option>
                                                                <option value="America/Campo_Grande">Campo Grande (UTC-4)</option>
                                                                <option value="America/Cancun">Cancun (UTC-5)</option>
                                                                <option value="America/Caracas">Caracas (UTC-4)</option>
                                                                <option value="America/Cayenne">Cayenne (UTC-3)</option>
                                                                <option value="America/Cayman">Cayman (UTC-5)</option>
                                                                <option value="America/Chicago">Chicago (UTC-5)</option>
                                                                <option value="America/Chihuahua">Chihuahua (UTC-6)</option>
                                                                <option value="America/Costa_Rica">Costa Rica (UTC-6)</option>
                                                                <option value="America/Creston">Creston (UTC-7)</option>
                                                                <option value="America/Cuiaba">Cuiaba (UTC-4)</option>
                                                                <option value="America/Curacao">Curacao (UTC-4)</option>
                                                                <option value="America/Danmarkshavn">Danmarkshavn (UTC)</option>
                                                                <option value="America/Dawson">Dawson (UTC-7)</option>
                                                                <option value="America/Dawson_Creek">Dawson Creek (UTC-7)</option>
                                                                <option value="America/Denver">Denver (UTC-6)</option>
                                                                <option value="America/Detroit">Detroit (UTC-4)</option>
                                                                <option value="America/Dominica">Dominica (UTC-4)</option>
                                                                <option value="America/Edmonton">Edmonton (UTC-6)</option>
                                                                <option value="America/Eirunepe">Eirunepe (UTC-5)</option>
                                                                <option value="America/El_Salvador">El Salvador (UTC-6)</option>
                                                                <option value="America/Fort_Nelson">Fort Nelson (UTC-7)</option>
                                                                <option value="America/Fortaleza">Fortaleza (UTC-3)</option>
                                                                <option value="America/Glace_Bay">Glace Bay (UTC-3)</option>
                                                                <option value="America/Goose_Bay">Goose Bay (UTC-3)</option>
                                                                <option value="America/Grand_Turk">Grand Turk (UTC-4)</option>
                                                                <option value="America/Grenada">Grenada (UTC-4)</option>
                                                                <option value="America/Guadeloupe">Guadeloupe (UTC-4)</option>
                                                                <option value="America/Guatemala">Guatemala (UTC-6)</option>
                                                                <option value="America/Guayaquil">Guayaquil (UTC-5)</option>
                                                                <option value="America/Guyana">Guyana (UTC-4)</option>
                                                                <option value="America/Halifax">Halifax (UTC-3)</option>
                                                                <option value="America/Havana">Havana (UTC-4)</option>
                                                                <option value="America/Hermosillo">Hermosillo (UTC-7)</option>
                                                                <option value="America/Indiana/Indianapolis">Indiana/Indianapolis (UTC-4)</option>
                                                                <option value="America/Indiana/Knox">Indiana/Knox (UTC-5)</option>
                                                                <option value="America/Indiana/Marengo">Indiana/Marengo (UTC-4)</option>
                                                                <option value="America/Indiana/Petersburg">Indiana/Petersburg (UTC-4)</option>
                                                                <option value="America/Indiana/Tell_City">Indiana/Tell City (UTC-5)</option>
                                                                <option value="America/Indiana/Vevay">Indiana/Vevay (UTC-4)</option>
                                                                <option value="America/Indiana/Vincennes">Indiana/Vincennes (UTC-4)</option>
                                                                <option value="America/Indiana/Winamac">Indiana/Winamac (UTC-4)</option>
                                                                <option value="America/Inuvik">Inuvik (UTC-6)</option>
                                                                <option value="America/Iqaluit">Iqaluit (UTC-4)</option>
                                                                <option value="America/Jamaica">Jamaica (UTC-5)</option>
                                                                <option value="America/Juneau">Juneau (UTC-8)</option>
                                                                <option value="America/Kentucky/Louisville">Kentucky/Louisville (UTC-4)</option>
                                                                <option value="America/Kentucky/Monticello">Kentucky/Monticello (UTC-4)</option>
                                                                <option value="America/Kralendijk">Kralendijk (UTC-4)</option>
                                                                <option value="America/La_Paz">La Paz (UTC-4)</option>
                                                                <option value="America/Lima">Lima (UTC-5)</option>
                                                                <option value="America/Los_Angeles">Los Angeles (UTC-7)</option>
                                                                <option value="America/Lower_Princes">Lower Princes (UTC-4)</option>
                                                                <option value="America/Maceio">Maceio (UTC-3)</option>
                                                                <option value="America/Managua">Managua (UTC-6)</option>
                                                                <option value="America/Manaus">Manaus (UTC-4)</option>
                                                                <option value="America/Marigot">Marigot (UTC-4)</option>
                                                                <option value="America/Martinique">Martinique (UTC-4)</option>
                                                                <option value="America/Matamoros">Matamoros (UTC-5)</option>
                                                                <option value="America/Mazatlan">Mazatlan (UTC-6)</option>
                                                                <option value="America/Menominee">Menominee (UTC-5)</option>
                                                                <option value="America/Merida">Merida (UTC-5)</option>
                                                                <option value="America/Metlakatla">Metlakatla (UTC-8)</option>
                                                                <option value="America/Mexico_City">Mexico City (UTC-5)</option>
                                                                <option value="America/Miquelon">Miquelon (UTC-2)</option>
                                                                <option value="America/Moncton">Moncton (UTC-3)</option>
                                                                <option value="America/Monterrey">Monterrey (UTC-5)</option>
                                                                <option value="America/Montevideo">Montevideo (UTC-3)</option>
                                                                <option value="America/Montserrat">Montserrat (UTC-4)</option>
                                                                <option value="America/Nassau">Nassau (UTC-4)</option>
                                                                <option value="America/New_York">New York (UTC-4)</option>
                                                                <option value="America/Nipigon">Nipigon (UTC-4)</option>
                                                                <option value="America/Nome">Nome (UTC-8)</option>
                                                                <option value="America/Noronha">Noronha (UTC-2)</option>
                                                                <option value="America/North_Dakota/Beulah">North Dakota/Beulah (UTC-5)</option>
                                                                <option value="America/North_Dakota/Center">North Dakota/Center (UTC-5)</option>
                                                                <option value="America/North_Dakota/New_Salem">North Dakota/New Salem (UTC-5)</option>
                                                                <option value="America/Nuuk">Nuuk (UTC-2)</option>
                                                                <option value="America/Ojinaga">Ojinaga (UTC-6)</option>
                                                                <option value="America/Panama">Panama (UTC-5)</option>
                                                                <option value="America/Pangnirtung">Pangnirtung (UTC-4)</option>
                                                                <option value="America/Paramaribo">Paramaribo (UTC-3)</option>
                                                                <option value="America/Phoenix">Phoenix (UTC-7)</option>
                                                                <option value="America/Port-au-Prince">Port-au-Prince (UTC-4)</option>
                                                                <option value="America/Port_of_Spain">Port of Spain (UTC-4)</option>
                                                                <option value="America/Porto_Velho">Porto Velho (UTC-4)</option>
                                                                <option value="America/Puerto_Rico">Puerto Rico (UTC-4)</option>
                                                                <option value="America/Punta_Arenas">Punta Arenas (UTC-3)</option>
                                                                <option value="America/Rainy_River">Rainy River (UTC-5)</option>
                                                                <option value="America/Rankin_Inlet">Rankin Inlet (UTC-5)</option>
                                                                <option value="America/Recife">Recife (UTC-3)</option>
                                                                <option value="America/Regina">Regina (UTC-6)</option>
                                                                <option value="America/Resolute">Resolute (UTC-5)</option>
                                                                <option value="America/Rio_Branco">Rio Branco (UTC-5)</option>
                                                                <option value="America/Santarem">Santarem (UTC-3)</option>
                                                                <option value="America/Santiago">Santiago (UTC-3)</option>
                                                                <option value="America/Santo_Domingo">Santo Domingo (UTC-4)</option>
                                                                <option value="America/Sao_Paulo">Sao Paulo (UTC-3)</option>
                                                                <option value="America/Scoresbysund">Scoresbysund (UTC)</option>
                                                                <option value="America/Sitka">Sitka (UTC-8)</option>
                                                                <option value="America/St_Barthelemy">St Barthelemy (UTC-4)</option>
                                                                <option value="America/St_Johns">St Johns (UTC-2)</option>
                                                                <option value="America/St_Kitts">St Kitts (UTC-4)</option>
                                                                <option value="America/St_Lucia">St Lucia (UTC-4)</option>
                                                                <option value="America/St_Thomas">St Thomas (UTC-4)</option>
                                                                <option value="America/St_Vincent">St Vincent (UTC-4)</option>
                                                                <option value="America/Swift_Current">Swift Current (UTC-6)</option>
                                                                <option value="America/Tegucigalpa">Tegucigalpa (UTC-6)</option>
                                                                <option value="America/Thule">Thule (UTC-3)</option>
                                                                <option value="America/Thunder_Bay">Thunder Bay (UTC-4)</option>
                                                                <option value="America/Tijuana">Tijuana (UTC-7)</option>
                                                                <option value="America/Toronto">Toronto (UTC-4)</option>
                                                                <option value="America/Tortola">Tortola (UTC-4)</option>
                                                                <option value="America/Vancouver">Vancouver (UTC-7)</option>
                                                                <option value="America/Whitehorse">Whitehorse (UTC-7)</option>
                                                                <option value="America/Winnipeg">Winnipeg (UTC-5)</option>
                                                                <option value="America/Yakutat">Yakutat (UTC-8)</option>
                                                                <option value="America/Yellowknife">Yellowknife (UTC-6)</option>
                                                            </optgroup>
                                                            <optgroup label="Arctic">
                                                                <option value="Arctic/Longyearbyen">Longyearbyen (UTC+2)</option>
                                                            </optgroup>
                                                            <optgroup label="Asia">
                                                                <option value="Asia/Aden">Aden (UTC+3)</option>
                                                                <option value="Asia/Almaty">Almaty (UTC+6)</option>
                                                                <option value="Asia/Amman">Amman (UTC+3)</option>
                                                                <option value="Asia/Anadyr">Anadyr (UTC+12)</option>
                                                                <option value="Asia/Aqtau">Aqtau (UTC+5)</option>
                                                                <option value="Asia/Aqtobe">Aqtobe (UTC+5)</option>
                                                                <option value="Asia/Ashgabat">Ashgabat (UTC+5)</option>
                                                                <option value="Asia/Atyrau">Atyrau (UTC+5)</option>
                                                                <option value="Asia/Baghdad">Baghdad (UTC+3)</option>
                                                                <option value="Asia/Bahrain">Bahrain (UTC+3)</option>
                                                                <option value="Asia/Baku">Baku (UTC+4)</option>
                                                                <option value="Asia/Bangkok">Bangkok (UTC+7)</option>
                                                                <option value="Asia/Barnaul">Barnaul (UTC+7)</option>
                                                                <option value="Asia/Beirut">Beirut (UTC+3)</option>
                                                                <option value="Asia/Bishkek">Bishkek (UTC+6)</option>
                                                                <option value="Asia/Brunei">Brunei (UTC+8)</option>
                                                                <option value="Asia/Chita">Chita (UTC+9)</option>
                                                                <option value="Asia/Choibalsan">Choibalsan (UTC+8)</option>
                                                                <option value="Asia/Colombo">Colombo (UTC+5)</option>
                                                                <option value="Asia/Damascus">Damascus (UTC+3)</option>
                                                                <option value="Asia/Dhaka">Dhaka (UTC+6)</option>
                                                                <option value="Asia/Dili">Dili (UTC+9)</option>
                                                                <option value="Asia/Dubai">Dubai (UTC+4)</option>
                                                                <option value="Asia/Dushanbe">Dushanbe (UTC+5)</option>
                                                                <option value="Asia/Famagusta">Famagusta (UTC+3)</option>
                                                                <option value="Asia/Gaza">Gaza (UTC+3)</option>
                                                                <option value="Asia/Hebron">Hebron (UTC+3)</option>
                                                                <option value="Asia/Ho_Chi_Minh">Ho Chi Minh (UTC+7)</option>
                                                                <option value="Asia/Hong_Kong">Hong Kong (UTC+8)</option>
                                                                <option value="Asia/Hovd">Hovd (UTC+7)</option>
                                                                <option value="Asia/Irkutsk">Irkutsk (UTC+8)</option>
                                                                <option value="Asia/Jakarta">Jakarta (UTC+7)</option>
                                                                <option value="Asia/Jayapura">Jayapura (UTC+9)</option>
                                                                <option value="Asia/Jerusalem">Jerusalem (UTC+3)</option>
                                                                <option value="Asia/Kabul">Kabul (UTC+4)</option>
                                                                <option value="Asia/Kamchatka">Kamchatka (UTC+12)</option>
                                                                <option value="Asia/Karachi">Karachi (UTC+5)</option>
                                                                <option value="Asia/Kathmandu">Kathmandu (UTC+5)</option>
                                                                <option value="Asia/Khandyga">Khandyga (UTC+9)</option>
                                                                <option value="Asia/Kolkata">Kolkata (UTC+5)</option>
                                                                <option value="Asia/Krasnoyarsk">Krasnoyarsk (UTC+7)</option>
                                                                <option value="Asia/Kuala_Lumpur">Kuala Lumpur (UTC+8)</option>
                                                                <option value="Asia/Kuching">Kuching (UTC+8)</option>
                                                                <option value="Asia/Kuwait">Kuwait (UTC+3)</option>
                                                                <option value="Asia/Macau">Macau (UTC+8)</option>
                                                                <option value="Asia/Magadan">Magadan (UTC+11)</option>
                                                                <option value="Asia/Makassar">Makassar (UTC+8)</option>
                                                                <option value="Asia/Manila">Manila (UTC+8)</option>
                                                                <option value="Asia/Muscat">Muscat (UTC+4)</option>
                                                                <option value="Asia/Nicosia">Nicosia (UTC+3)</option>
                                                                <option value="Asia/Novokuznetsk">Novokuznetsk (UTC+7)</option>
                                                                <option value="Asia/Novosibirsk">Novosibirsk (UTC+7)</option>
                                                                <option value="Asia/Omsk">Omsk (UTC+6)</option>
                                                                <option value="Asia/Oral">Oral (UTC+5)</option>
                                                                <option value="Asia/Phnom_Penh">Phnom Penh (UTC+7)</option>
                                                                <option value="Asia/Pontianak">Pontianak (UTC+7)</option>
                                                                <option value="Asia/Pyongyang">Pyongyang (UTC+9)</option>
                                                                <option value="Asia/Qatar">Qatar (UTC+3)</option>
                                                                <option value="Asia/Qostanay">Qostanay (UTC+6)</option>
                                                                <option value="Asia/Qyzylorda">Qyzylorda (UTC+5)</option>
                                                                <option value="Asia/Riyadh">Riyadh (UTC+3)</option>
                                                                <option value="Asia/Sakhalin">Sakhalin (UTC+11)</option>
                                                                <option value="Asia/Samarkand">Samarkand (UTC+5)</option>
                                                                <option value="Asia/Seoul">Seoul (UTC+9)</option>
                                                                <option value="Asia/Shanghai">Shanghai (UTC+8)</option>
                                                                <option value="Asia/Singapore">Singapore (UTC+8)</option>
                                                                <option value="Asia/Srednekolymsk">Srednekolymsk (UTC+11)</option>
                                                                <option value="Asia/Taipei">Taipei (UTC+8)</option>
                                                                <option value="Asia/Tashkent">Tashkent (UTC+5)</option>
                                                                <option value="Asia/Tbilisi">Tbilisi (UTC+4)</option>
                                                                <option value="Asia/Tehran">Tehran (UTC+4)</option>
                                                                <option value="Asia/Thimphu">Thimphu (UTC+6)</option>
                                                                <option value="Asia/Tokyo">Tokyo (UTC+9)</option>
                                                                <option value="Asia/Tomsk">Tomsk (UTC+7)</option>
                                                                <option value="Asia/Ulaanbaatar">Ulaanbaatar (UTC+8)</option>
                                                                <option value="Asia/Urumqi">Urumqi (UTC+6)</option>
                                                                <option value="Asia/Ust-Nera">Ust-Nera (UTC+10)</option>
                                                                <option value="Asia/Vientiane">Vientiane (UTC+7)</option>
                                                                <option value="Asia/Vladivostok">Vladivostok (UTC+10)</option>
                                                                <option value="Asia/Yakutsk">Yakutsk (UTC+9)</option>
                                                                <option value="Asia/Yangon">Yangon (UTC+6)</option>
                                                                <option value="Asia/Yekaterinburg">Yekaterinburg (UTC+5)</option>
                                                                <option value="Asia/Yerevan">Yerevan (UTC+4)</option>
                                                            </optgroup>
                                                            <optgroup label="Atlantic">
                                                                <option value="Atlantic/Azores">Azores (UTC)</option>
                                                                <option value="Atlantic/Bermuda">Bermuda (UTC-3)</option>
                                                                <option value="Atlantic/Canary">Canary (UTC+1)</option>
                                                                <option value="Atlantic/Cape_Verde">Cape Verde (UTC-1)</option>
                                                                <option value="Atlantic/Faroe">Faroe (UTC+1)</option>
                                                                <option value="Atlantic/Madeira">Madeira (UTC+1)</option>
                                                                <option value="Atlantic/Reykjavik">Reykjavik (UTC)</option>
                                                                <option value="Atlantic/South_Georgia">South Georgia (UTC-2)</option>
                                                                <option value="Atlantic/St_Helena">St Helena (UTC)</option>
                                                                <option value="Atlantic/Stanley">Stanley (UTC-3)</option>
                                                            </optgroup>
                                                            <optgroup label="Australia">
                                                                <option value="Australia/Adelaide">Adelaide (UTC+9)</option>
                                                                <option value="Australia/Brisbane">Brisbane (UTC+10)</option>
                                                                <option value="Australia/Broken_Hill">Broken Hill (UTC+9)</option>
                                                                <option value="Australia/Darwin">Darwin (UTC+9)</option>
                                                                <option value="Australia/Eucla">Eucla (UTC+8)</option>
                                                                <option value="Australia/Hobart">Hobart (UTC+10)</option>
                                                                <option value="Australia/Lindeman">Lindeman (UTC+10)</option>
                                                                <option value="Australia/Lord_Howe">Lord Howe (UTC+10)</option>
                                                                <option value="Australia/Melbourne">Melbourne (UTC+10)</option>
                                                                <option value="Australia/Perth">Perth (UTC+8)</option>
                                                                <option value="Australia/Sydney">Sydney (UTC+10)</option>
                                                            </optgroup>
                                                            <optgroup label="Europe">
                                                                <option value="Europe/Amsterdam">Amsterdam (UTC+2)</option>
                                                                <option value="Europe/Andorra">Andorra (UTC+2)</option>
                                                                <option value="Europe/Astrakhan">Astrakhan (UTC+4)</option>
                                                                <option value="Europe/Athens">Athens (UTC+3)</option>
                                                                <option value="Europe/Belgrade">Belgrade (UTC+2)</option>
                                                                <option value="Europe/Berlin">Berlin (UTC+2)</option>
                                                                <option value="Europe/Bratislava">Bratislava (UTC+2)</option>
                                                                <option value="Europe/Brussels">Brussels (UTC+2)</option>
                                                                <option value="Europe/Bucharest">Bucharest (UTC+3)</option>
                                                                <option value="Europe/Budapest">Budapest (UTC+2)</option>
                                                                <option value="Europe/Busingen">Busingen (UTC+2)</option>
                                                                <option value="Europe/Chisinau">Chisinau (UTC+3)</option>
                                                                <option value="Europe/Copenhagen">Copenhagen (UTC+2)</option>
                                                                <option value="Europe/Dublin">Dublin (UTC+1)</option>
                                                                <option value="Europe/Gibraltar">Gibraltar (UTC+2)</option>
                                                                <option value="Europe/Guernsey">Guernsey (UTC+1)</option>
                                                                <option value="Europe/Helsinki">Helsinki (UTC+3)</option>
                                                                <option value="Europe/Isle_of_Man">Isle of Man (UTC+1)</option>
                                                                <option value="Europe/Istanbul">Istanbul (UTC+3)</option>
                                                                <option value="Europe/Jersey">Jersey (UTC+1)</option>
                                                                <option value="Europe/Kaliningrad">Kaliningrad (UTC+2)</option>
                                                                <option value="Europe/Kiev">Kiev (UTC+3)</option>
                                                                <option value="Europe/Kirov">Kirov (UTC+3)</option>
                                                                <option value="Europe/Lisbon">Lisbon (UTC+1)</option>
                                                                <option value="Europe/Ljubljana">Ljubljana (UTC+2)</option>
                                                                <option value="Europe/London">London (UTC+1)</option>
                                                                <option value="Europe/Luxembourg">Luxembourg (UTC+2)</option>
                                                                <option value="Europe/Madrid">Madrid (UTC+2)</option>
                                                                <option value="Europe/Malta">Malta (UTC+2)</option>
                                                                <option value="Europe/Mariehamn">Mariehamn (UTC+3)</option>
                                                                <option value="Europe/Minsk">Minsk (UTC+3)</option>
                                                                <option value="Europe/Monaco">Monaco (UTC+2)</option>
                                                                <option value="Europe/Moscow">Moscow (UTC+3)</option>
                                                                <option value="Europe/Oslo">Oslo (UTC+2)</option>
                                                                <option value="Europe/Paris">Paris (UTC+2)</option>
                                                                <option value="Europe/Podgorica">Podgorica (UTC+2)</option>
                                                                <option value="Europe/Prague">Prague (UTC+2)</option>
                                                                <option value="Europe/Riga">Riga (UTC+3)</option>
                                                                <option value="Europe/Rome">Rome (UTC+2)</option>
                                                                <option value="Europe/Samara">Samara (UTC+4)</option>
                                                                <option value="Europe/San_Marino">San Marino (UTC+2)</option>
                                                                <option value="Europe/Sarajevo">Sarajevo (UTC+2)</option>
                                                                <option value="Europe/Saratov">Saratov (UTC+4)</option>
                                                                <option value="Europe/Simferopol">Simferopol (UTC+3)</option>
                                                                <option value="Europe/Skopje">Skopje (UTC+2)</option>
                                                                <option value="Europe/Sofia">Sofia (UTC+3)</option>
                                                                <option value="Europe/Stockholm">Stockholm (UTC+2)</option>
                                                                <option value="Europe/Tallinn">Tallinn (UTC+3)</option>
                                                                <option value="Europe/Tirane">Tirane (UTC+2)</option>
                                                                <option value="Europe/Ulyanovsk">Ulyanovsk (UTC+4)</option>
                                                                <option value="Europe/Uzhgorod">Uzhgorod (UTC+3)</option>
                                                                <option value="Europe/Vaduz">Vaduz (UTC+2)</option>
                                                                <option value="Europe/Vatican">Vatican (UTC+2)</option>
                                                                <option value="Europe/Vienna">Vienna (UTC+2)</option>
                                                                <option value="Europe/Vilnius">Vilnius (UTC+3)</option>
                                                                <option value="Europe/Volgograd">Volgograd (UTC+3)</option>
                                                                <option value="Europe/Warsaw">Warsaw (UTC+2)</option>
                                                                <option value="Europe/Zagreb">Zagreb (UTC+2)</option>
                                                                <option value="Europe/Zaporozhye">Zaporozhye (UTC+3)</option>
                                                                <option value="Europe/Zurich">Zurich (UTC+2)</option>
                                                            </optgroup>
                                                            <optgroup label="Indian">
                                                                <option value="Indian/Antananarivo">Antananarivo (UTC+3)</option>
                                                                <option value="Indian/Chagos">Chagos (UTC+6)</option>
                                                                <option value="Indian/Christmas">Christmas (UTC+7)</option>
                                                                <option value="Indian/Cocos">Cocos (UTC+6)</option>
                                                                <option value="Indian/Comoro">Comoro (UTC+3)</option>
                                                                <option value="Indian/Kerguelen">Kerguelen (UTC+5)</option>
                                                                <option value="Indian/Mahe">Mahe (UTC+4)</option>
                                                                <option value="Indian/Maldives">Maldives (UTC+5)</option>
                                                                <option value="Indian/Mauritius">Mauritius (UTC+4)</option>
                                                                <option value="Indian/Mayotte">Mayotte (UTC+3)</option>
                                                                <option value="Indian/Reunion">Reunion (UTC+4)</option>
                                                            </optgroup>
                                                            <optgroup label="Pacific">
                                                                <option value="Pacific/Apia">Apia (UTC+13)</option>
                                                                <option value="Pacific/Auckland">Auckland (UTC+12)</option>
                                                                <option value="Pacific/Bougainville">Bougainville (UTC+11)</option>
                                                                <option value="Pacific/Chatham">Chatham (UTC+12)</option>
                                                                <option value="Pacific/Chuuk">Chuuk (UTC+10)</option>
                                                                <option value="Pacific/Easter">Easter (UTC-5)</option>
                                                                <option value="Pacific/Efate">Efate (UTC+11)</option>
                                                                <option value="Pacific/Enderbury">Enderbury (UTC+13)</option>
                                                                <option value="Pacific/Fakaofo">Fakaofo (UTC+13)</option>
                                                                <option value="Pacific/Fiji">Fiji (UTC+12)</option>
                                                                <option value="Pacific/Funafuti">Funafuti (UTC+12)</option>
                                                                <option value="Pacific/Galapagos">Galapagos (UTC-6)</option>
                                                                <option value="Pacific/Gambier">Gambier (UTC-9)</option>
                                                                <option value="Pacific/Guadalcanal">Guadalcanal (UTC+11)</option>
                                                                <option value="Pacific/Guam">Guam (UTC+10)</option>
                                                                <option value="Pacific/Honolulu">Honolulu (UTC-10)</option>
                                                                <option value="Pacific/Kiritimati">Kiritimati (UTC+14)</option>
                                                                <option value="Pacific/Kosrae">Kosrae (UTC+11)</option>
                                                                <option value="Pacific/Kwajalein">Kwajalein (UTC+12)</option>
                                                                <option value="Pacific/Majuro">Majuro (UTC+12)</option>
                                                                <option value="Pacific/Marquesas">Marquesas (UTC-9)</option>
                                                                <option value="Pacific/Midway">Midway (UTC-11)</option>
                                                                <option value="Pacific/Nauru">Nauru (UTC+12)</option>
                                                                <option value="Pacific/Niue">Niue (UTC-11)</option>
                                                                <option value="Pacific/Norfolk">Norfolk (UTC+11)</option>
                                                                <option value="Pacific/Noumea">Noumea (UTC+11)</option>
                                                                <option value="Pacific/Pago_Pago">Pago Pago (UTC-11)</option>
                                                                <option value="Pacific/Palau">Palau (UTC+9)</option>
                                                                <option value="Pacific/Pitcairn">Pitcairn (UTC-8)</option>
                                                                <option value="Pacific/Pohnpei">Pohnpei (UTC+11)</option>
                                                                <option value="Pacific/Port_Moresby">Port Moresby (UTC+10)</option>
                                                                <option value="Pacific/Rarotonga">Rarotonga (UTC-10)</option>
                                                                <option value="Pacific/Saipan">Saipan (UTC+10)</option>
                                                                <option value="Pacific/Tahiti">Tahiti (UTC-10)</option>
                                                                <option value="Pacific/Tarawa">Tarawa (UTC+12)</option>
                                                                <option value="Pacific/Tongatapu">Tongatapu (UTC+13)</option>
                                                                <option value="Pacific/Wake">Wake (UTC+12)</option>
                                                                <option value="Pacific/Wallis">Wallis (UTC+12)</option>
                                                            </optgroup>
                                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-azuraforms_form_timezone-container"><span class="select2-selection__rendered" id="select2-azuraforms_form_timezone-container" role="textbox" aria-readonly="true" title="UTC">UTC</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div><small class="help-block form-text">Las listas de reproducción y otros elementos cronometrados estarán controlados por esta zona horaria.</small>
                                                </div>
                                                <div class="form-group col-sm-6" id="field_enable_public_page"><label for="azuraforms_form_enable_public_page" class="">Activar Página Pública </label>
                                                    <div class="form-field"><input type="hidden" name="enable_public_page" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="enable_public_page" id="azuraforms_form_enable_public_page" value="1" checked="checked" class="toggle-switch custom-control-input" data-dirrty-initial-value="checked"><label for="azuraforms_form_enable_public_page" class="custom-control-label">Activar Página Pública</label></div>
                                                    </div><small class="help-block form-text">Mostrar la estación en páginas públicas y resultados generales de la API.</small>
                                                </div>
                                                <div class="form-group col-sm-6" id="field_enable_on_demand"><label for="azuraforms_form_enable_on_demand" class="">Habilitar Streaming Bajo Demanda </label>
                                                    <div class="form-field"><input type="hidden" name="enable_on_demand" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="enable_on_demand" id="azuraforms_form_enable_on_demand" value="1" class="toggle-switch custom-control-input" data-dirrty-initial-value="unchecked"><label for="azuraforms_form_enable_on_demand" class="custom-control-label">Habilitar Streaming Bajo Demanda</label></div>
                                                    </div><small class="help-block form-text">Si está habilitado, la música de las listas de reproducción con reproducción bajo demanda habilitada, estará disponible para transmitir y descargar a través de una página pública especializada.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_default_album_art_url"><label for="azuraforms_form_default_album_art_url" class="">URL para Portada de Álbum por Defecto </label>
                                                    <div class="form-field"><input type="text" name="default_album_art_url" id="azuraforms_form_default_album_art_url" value="" class="form-control" data-dirrty-initial-value=""></div><small class="help-block form-text">Si una canción no tiene portada de álbum, esta URL aparecerá en su lugar. Déjelo en blanco para utilizar el arte de marcador de posición estándar.</small>
                                                </div>
                                                <div class="form-group col-sm-6" id="field_enable_on_demand_download"><label for="azuraforms_form_enable_on_demand_download" class="">Habilitar Descargas en la Página Bajo Demanda </label>
                                                    <div class="form-field"><input type="hidden" name="enable_on_demand_download" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="enable_on_demand_download" id="azuraforms_form_enable_on_demand_download" value="1" checked="checked" class="toggle-switch custom-control-input" data-dirrty-initial-value="checked"><label for="azuraforms_form_enable_on_demand_download" class="custom-control-label">Habilitar Descargas en la Página Bajo Demanda</label></div>
                                                    </div><small class="help-block form-text">Si está habilitado, la música de las listas de reproducción con reproducción bajo demanda habilitada, estará disponible para transmitir y descargar a través de una página pública especializada.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_short_name"><label for="azuraforms_form_short_name" class="advanced"><span class="text-info">Avanzado</span> Stub de URL </label>
                                                    <div class="form-field"><input type="text" name="short_name" id="azuraforms_form_short_name" value="azuratest_radio" class="form-control" data-dirrty-initial-value="azuratest_radio"></div><small class="help-block form-text">Opcionalmente, especifique una URL con un nombre corto compatible, como <code>mi_nombre_de_estación</code>, que se utilizará en las URLs de esta estación. Deje este campo en blanco para crear automáticamente uno basado en el nombre de la estación.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_api_history_items"><label for="azuraforms_form_api_history_items" class="advanced"><span class="text-info">Avanzado</span> Número de Canciones Recientemente Reproducidas </label>
                                                    <div class="form-field"><select name="api_history_items" id="azuraforms_form_api_history_items" class="%s form-control select2-hidden-accessible" data-dirrty-initial-value="5" data-select2-id="azuraforms_form_api_history_items" tabindex="-1" aria-hidden="true">
                                                            <option value="0">Desactivado</option>
                                                            <option value="1">1</option>
                                                            <option value="5" selected="selected" data-select2-id="4">5</option>
                                                            <option value="10">10</option>
                                                            <option value="15">15</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="3" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-azuraforms_form_api_history_items-container"><span class="select2-selection__rendered" id="select2-azuraforms_form_api_history_items-container" role="textbox" aria-readonly="true" title="5">5</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div><small class="help-block form-text">Personaliza el número de canciones que aparecerán en la sección "Historial de Canciones" para esta estación y en todas las APIs públicas.</small>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div aria-labelledby="tab-frontend-link" class="tab-pane fade " id="tab-frontend" role="tabpanel">

                                        <fieldset id="select_frontend_type" class="">



                                            <div class="form-group " id="field_frontend_type"><label for="azuraforms_form_frontend_type" class="">Servicio de Radiodifusión </label>
                                                <div class="form-field">
                                                    <div class="custom-control custom-radio"><input type="radio" name="frontend_type" id="azuraforms_form_frontend_type_icecast" value="icecast" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_frontend_type_icecast" class="custom-control-label">Usar <b>Icecast 2.4</b> en este servidor</label></div>
                                                    <div class="custom-control custom-radio"><input type="radio" name="frontend_type" id="azuraforms_form_frontend_type_remote" value="remote" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_frontend_type_remote" class="custom-control-label">Conectar a un <b>servidor remoto de radio</b></label></div>
                                                </div><small class="help-block form-text">¿Quieres usar SHOUTcast 2? <a href="/admin/install/shoutcast" target="_blank">Instálalo aquí</a> y vuelve a cargar esta página.</small>
                                            </div>
                                        </fieldset>

                                        <fieldset id="frontend_local" class="frontend_fieldset" style="">


                                            <div class="row">

                                                <div class="form-group col-md-6" id="field_source_pw"><label for="azuraforms_form_source_pw" class="">Personalizar Contraseña de Origen </label>
                                                    <div class="form-field"><input type="text" name="frontend_config_source_pw" id="azuraforms_form_frontend_config_source_pw" value="MQKFMwNE" class="form-control" data-dirrty-initial-value="MQKFMwNE"></div><small class="help-block form-text">Deje en blanco para generar automáticamente una nueva contraseña.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_admin_pw"><label for="azuraforms_form_admin_pw" class="">Personalizar Contraseña del Administrador </label>
                                                    <div class="form-field"><input type="text" name="frontend_config_admin_pw" id="azuraforms_form_frontend_config_admin_pw" value="fagXc3T3" class="form-control" data-dirrty-initial-value="fagXc3T3"></div><small class="help-block form-text">Deje en blanco para generar automáticamente una nueva contraseña.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_port"><label for="azuraforms_form_port" class="advanced"><span class="text-info">Avanzado</span> Personalizar Puerto de Radiodifusión </label>
                                                    <div class="form-field"><input type="text" name="frontend_config_port" id="azuraforms_form_frontend_config_port" value="8000" class="form-control" data-dirrty-initial-value="8000"></div><small class="help-block form-text">Ningún otro programa puede utilizar este puerto. Deje en blanco para asignar un puerto automáticamente.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_max_listeners"><label for="azuraforms_form_max_listeners" class="advanced"><span class="text-info">Avanzado</span> Oyentes máximos </label>
                                                    <div class="form-field"><input type="text" name="frontend_config_max_listeners" id="azuraforms_form_frontend_config_max_listeners" value="" class="form-control" data-dirrty-initial-value=""></div><small class="help-block form-text">Número máximo del total de oyentes a través de todos los streams. Deje en blanco el usar el predeterminado (250).</small>
                                                </div>
                                                <div class="form-group col-sm-7" id="field_custom_config"><label for="azuraforms_form_custom_config" class="advanced"><span class="text-info">Avanzado</span> Configuración personalizada </label>
                                                    <div class="form-field"><textarea name="frontend_config_custom_config" id="azuraforms_form_frontend_config_custom_config" class="text-preformatted form-control" type="text" rows="6" cols="60" data-dirrty-initial-value="" style="overflow: hidden; overflow-wrap: break-word; resize: none;"></textarea></div><small class="help-block form-text">Este código se incluirá en la configuración del frontend. Puede utilizar tanto formato JSON {"new_key": "new_value"} como XML &lt;new_key&gt;new_value&lt;/new_key&gt;.Para los usuarios Premium de SHOUTcast, puede utilizar la configuración personalizada en este formato: <code>{ "licenceid": "YOUR_LICENSE_ID", "userid": "YOUR_USER_ID" }</code></small>
                                                </div>
                                                <div class="form-group col-sm-5" id="field_banned_ips"><label for="azuraforms_form_banned_ips" class="advanced"><span class="text-info">Avanzado</span> Direcciones IP Prohibidas </label>
                                                    <div class="form-field"><textarea name="frontend_config_banned_ips" id="azuraforms_form_frontend_config_banned_ips" class="text-preformatted form-control" type="text" rows="6" cols="60" data-dirrty-initial-value="" style="overflow: hidden; overflow-wrap: break-word; resize: none;"></textarea></div><small class="help-block form-text">Listar una dirección IP o un grupo (en formato CIDR) por línea.</small>
                                                </div>
                                                <div class="form-group col-sm-7" id="field_banned_countries"><label for="azuraforms_form_banned_countries" class="advanced"><span class="text-info">Avanzado</span> Países Prohibidos </label>
                                                    <div class="form-field"><select name="frontend_config_banned_countries[]" id="azuraforms_form_frontend_config_banned_countries" multiple="" data-dirrty-initial-value="" class="form-control select2-hidden-accessible" data-select2-id="azuraforms_form_frontend_config_banned_countries" tabindex="-1" aria-hidden="true">
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Åland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                            <option value="AD">Andorra</option>
                                                            <option value="AO">Angola</option>
                                                            <option value="AI">Anguilla</option>
                                                            <option value="AQ">Antarctica</option>
                                                            <option value="AG">Antigua &amp; Barbuda</option>
                                                            <option value="AR">Argentina</option>
                                                            <option value="AM">Armenia</option>
                                                            <option value="AW">Aruba</option>
                                                            <option value="AU">Australia</option>
                                                            <option value="AT">Austria</option>
                                                            <option value="AZ">Azerbaijan</option>
                                                            <option value="BS">Bahamas</option>
                                                            <option value="BH">Bahrain</option>
                                                            <option value="BD">Bangladesh</option>
                                                            <option value="BB">Barbados</option>
                                                            <option value="BY">Belarus</option>
                                                            <option value="BE">Belgium</option>
                                                            <option value="BZ">Belize</option>
                                                            <option value="BJ">Benin</option>
                                                            <option value="BM">Bermuda</option>
                                                            <option value="BT">Bhutan</option>
                                                            <option value="BO">Bolivia</option>
                                                            <option value="BA">Bosnia &amp; Herzegovina</option>
                                                            <option value="BW">Botswana</option>
                                                            <option value="BV">Bouvet Island</option>
                                                            <option value="BR">Brazil</option>
                                                            <option value="IO">British Indian Ocean Territory</option>
                                                            <option value="VG">British Virgin Islands</option>
                                                            <option value="BN">Brunei</option>
                                                            <option value="BG">Bulgaria</option>
                                                            <option value="BF">Burkina Faso</option>
                                                            <option value="BI">Burundi</option>
                                                            <option value="KH">Cambodia</option>
                                                            <option value="CM">Cameroon</option>
                                                            <option value="CA">Canada</option>
                                                            <option value="CV">Cape Verde</option>
                                                            <option value="BQ">Caribbean Netherlands</option>
                                                            <option value="KY">Cayman Islands</option>
                                                            <option value="CF">Central African Republic</option>
                                                            <option value="TD">Chad</option>
                                                            <option value="CL">Chile</option>
                                                            <option value="CN">China</option>
                                                            <option value="CX">Christmas Island</option>
                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                            <option value="CO">Colombia</option>
                                                            <option value="KM">Comoros</option>
                                                            <option value="CG">Congo - Brazzaville</option>
                                                            <option value="CD">Congo - Kinshasa</option>
                                                            <option value="CK">Cook Islands</option>
                                                            <option value="CR">Costa Rica</option>
                                                            <option value="CI">Côte d’Ivoire</option>
                                                            <option value="HR">Croatia</option>
                                                            <option value="CU">Cuba</option>
                                                            <option value="CW">Curaçao</option>
                                                            <option value="CY">Cyprus</option>
                                                            <option value="CZ">Czechia</option>
                                                            <option value="DK">Denmark</option>
                                                            <option value="DJ">Djibouti</option>
                                                            <option value="DM">Dominica</option>
                                                            <option value="DO">Dominican Republic</option>
                                                            <option value="EC">Ecuador</option>
                                                            <option value="EG">Egypt</option>
                                                            <option value="SV">El Salvador</option>
                                                            <option value="GQ">Equatorial Guinea</option>
                                                            <option value="ER">Eritrea</option>
                                                            <option value="EE">Estonia</option>
                                                            <option value="SZ">Eswatini</option>
                                                            <option value="ET">Ethiopia</option>
                                                            <option value="FK">Falkland Islands</option>
                                                            <option value="FO">Faroe Islands</option>
                                                            <option value="FJ">Fiji</option>
                                                            <option value="FI">Finland</option>
                                                            <option value="FR">France</option>
                                                            <option value="GF">French Guiana</option>
                                                            <option value="PF">French Polynesia</option>
                                                            <option value="TF">French Southern Territories</option>
                                                            <option value="GA">Gabon</option>
                                                            <option value="GM">Gambia</option>
                                                            <option value="GE">Georgia</option>
                                                            <option value="DE">Germany</option>
                                                            <option value="GH">Ghana</option>
                                                            <option value="GI">Gibraltar</option>
                                                            <option value="GR">Greece</option>
                                                            <option value="GL">Greenland</option>
                                                            <option value="GD">Grenada</option>
                                                            <option value="GP">Guadeloupe</option>
                                                            <option value="GU">Guam</option>
                                                            <option value="GT">Guatemala</option>
                                                            <option value="GG">Guernsey</option>
                                                            <option value="GN">Guinea</option>
                                                            <option value="GW">Guinea-Bissau</option>
                                                            <option value="GY">Guyana</option>
                                                            <option value="HT">Haiti</option>
                                                            <option value="HM">Heard &amp; McDonald Islands</option>
                                                            <option value="HN">Honduras</option>
                                                            <option value="HK">Hong Kong SAR China</option>
                                                            <option value="HU">Hungary</option>
                                                            <option value="IS">Iceland</option>
                                                            <option value="IN">India</option>
                                                            <option value="ID">Indonesia</option>
                                                            <option value="IR">Iran</option>
                                                            <option value="IQ">Iraq</option>
                                                            <option value="IE">Ireland</option>
                                                            <option value="IM">Isle of Man</option>
                                                            <option value="IL">Israel</option>
                                                            <option value="IT">Italy</option>
                                                            <option value="JM">Jamaica</option>
                                                            <option value="JP">Japan</option>
                                                            <option value="JE">Jersey</option>
                                                            <option value="JO">Jordan</option>
                                                            <option value="KZ">Kazakhstan</option>
                                                            <option value="KE">Kenya</option>
                                                            <option value="KI">Kiribati</option>
                                                            <option value="KW">Kuwait</option>
                                                            <option value="KG">Kyrgyzstan</option>
                                                            <option value="LA">Laos</option>
                                                            <option value="LV">Latvia</option>
                                                            <option value="LB">Lebanon</option>
                                                            <option value="LS">Lesotho</option>
                                                            <option value="LR">Liberia</option>
                                                            <option value="LY">Libya</option>
                                                            <option value="LI">Liechtenstein</option>
                                                            <option value="LT">Lithuania</option>
                                                            <option value="LU">Luxembourg</option>
                                                            <option value="MO">Macao SAR China</option>
                                                            <option value="MG">Madagascar</option>
                                                            <option value="MW">Malawi</option>
                                                            <option value="MY">Malaysia</option>
                                                            <option value="MV">Maldives</option>
                                                            <option value="ML">Mali</option>
                                                            <option value="MT">Malta</option>
                                                            <option value="MH">Marshall Islands</option>
                                                            <option value="MQ">Martinique</option>
                                                            <option value="MR">Mauritania</option>
                                                            <option value="MU">Mauritius</option>
                                                            <option value="YT">Mayotte</option>
                                                            <option value="MX">Mexico</option>
                                                            <option value="FM">Micronesia</option>
                                                            <option value="MD">Moldova</option>
                                                            <option value="MC">Monaco</option>
                                                            <option value="MN">Mongolia</option>
                                                            <option value="ME">Montenegro</option>
                                                            <option value="MS">Montserrat</option>
                                                            <option value="MA">Morocco</option>
                                                            <option value="MZ">Mozambique</option>
                                                            <option value="MM">Myanmar (Burma)</option>
                                                            <option value="NA">Namibia</option>
                                                            <option value="NR">Nauru</option>
                                                            <option value="NP">Nepal</option>
                                                            <option value="NL">Netherlands</option>
                                                            <option value="NC">New Caledonia</option>
                                                            <option value="NZ">New Zealand</option>
                                                            <option value="NI">Nicaragua</option>
                                                            <option value="NE">Niger</option>
                                                            <option value="NG">Nigeria</option>
                                                            <option value="NU">Niue</option>
                                                            <option value="NF">Norfolk Island</option>
                                                            <option value="KP">North Korea</option>
                                                            <option value="MK">North Macedonia</option>
                                                            <option value="MP">Northern Mariana Islands</option>
                                                            <option value="NO">Norway</option>
                                                            <option value="OM">Oman</option>
                                                            <option value="PK">Pakistan</option>
                                                            <option value="PW">Palau</option>
                                                            <option value="PS">Palestinian Territories</option>
                                                            <option value="PA">Panama</option>
                                                            <option value="PG">Papua New Guinea</option>
                                                            <option value="PY">Paraguay</option>
                                                            <option value="PE">Peru</option>
                                                            <option value="PH">Philippines</option>
                                                            <option value="PN">Pitcairn Islands</option>
                                                            <option value="PL">Poland</option>
                                                            <option value="PT">Portugal</option>
                                                            <option value="PR">Puerto Rico</option>
                                                            <option value="QA">Qatar</option>
                                                            <option value="RE">Réunion</option>
                                                            <option value="RO">Romania</option>
                                                            <option value="RU">Russia</option>
                                                            <option value="RW">Rwanda</option>
                                                            <option value="WS">Samoa</option>
                                                            <option value="SM">San Marino</option>
                                                            <option value="ST">São Tomé &amp; Príncipe</option>
                                                            <option value="SA">Saudi Arabia</option>
                                                            <option value="SN">Senegal</option>
                                                            <option value="RS">Serbia</option>
                                                            <option value="SC">Seychelles</option>
                                                            <option value="SL">Sierra Leone</option>
                                                            <option value="SG">Singapore</option>
                                                            <option value="SX">Sint Maarten</option>
                                                            <option value="SK">Slovakia</option>
                                                            <option value="SI">Slovenia</option>
                                                            <option value="SB">Solomon Islands</option>
                                                            <option value="SO">Somalia</option>
                                                            <option value="ZA">South Africa</option>
                                                            <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                                            <option value="KR">South Korea</option>
                                                            <option value="SS">South Sudan</option>
                                                            <option value="ES">Spain</option>
                                                            <option value="LK">Sri Lanka</option>
                                                            <option value="BL">St. Barthélemy</option>
                                                            <option value="SH">St. Helena</option>
                                                            <option value="KN">St. Kitts &amp; Nevis</option>
                                                            <option value="LC">St. Lucia</option>
                                                            <option value="MF">St. Martin</option>
                                                            <option value="PM">St. Pierre &amp; Miquelon</option>
                                                            <option value="VC">St. Vincent &amp; Grenadines</option>
                                                            <option value="SD">Sudan</option>
                                                            <option value="SR">Suriname</option>
                                                            <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                                            <option value="SE">Sweden</option>
                                                            <option value="CH">Switzerland</option>
                                                            <option value="SY">Syria</option>
                                                            <option value="TW">Taiwan</option>
                                                            <option value="TJ">Tajikistan</option>
                                                            <option value="TZ">Tanzania</option>
                                                            <option value="TH">Thailand</option>
                                                            <option value="TL">Timor-Leste</option>
                                                            <option value="TG">Togo</option>
                                                            <option value="TK">Tokelau</option>
                                                            <option value="TO">Tonga</option>
                                                            <option value="TT">Trinidad &amp; Tobago</option>
                                                            <option value="TN">Tunisia</option>
                                                            <option value="TR">Turkey</option>
                                                            <option value="TM">Turkmenistan</option>
                                                            <option value="TC">Turks &amp; Caicos Islands</option>
                                                            <option value="TV">Tuvalu</option>
                                                            <option value="UM">U.S. Outlying Islands</option>
                                                            <option value="VI">U.S. Virgin Islands</option>
                                                            <option value="UG">Uganda</option>
                                                            <option value="UA">Ukraine</option>
                                                            <option value="AE">United Arab Emirates</option>
                                                            <option value="GB">United Kingdom</option>
                                                            <option value="US">United States</option>
                                                            <option value="UY">Uruguay</option>
                                                            <option value="UZ">Uzbekistan</option>
                                                            <option value="VU">Vanuatu</option>
                                                            <option value="VA">Vatican City</option>
                                                            <option value="VE">Venezuela</option>
                                                            <option value="VN">Vietnam</option>
                                                            <option value="WF">Wallis &amp; Futuna</option>
                                                            <option value="EH">Western Sahara</option>
                                                            <option value="YE">Yemen</option>
                                                            <option value="ZM">Zambia</option>
                                                            <option value="ZW">Zimbabwe</option>
                                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                                                    <ul class="select2-selection__rendered">
                                                                        <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                                                    </ul>
                                                                </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div><small class="help-block form-text">Seleccione los países que no están autorizados a conectarse a los streams.</small>
                                                </div>
                                                <div class="form-group col-sm-5" id="field_allowed_ips"><label for="azuraforms_form_allowed_ips" class="advanced"><span class="text-info">Avanzado</span> Direcciones IP Permitidas </label>
                                                    <div class="form-field"><textarea name="frontend_config_allowed_ips" id="azuraforms_form_frontend_config_allowed_ips" class="text-preformatted form-control" type="text" rows="6" cols="60" data-dirrty-initial-value="" style="overflow: hidden; overflow-wrap: break-word; resize: none;"></textarea></div><small class="help-block form-text">Indique una dirección IP o un grupo (en formato CIDR) por línea para permitirles conectarse explícitamente incluso cuando su país está prohibido.</small>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div aria-labelledby="tab-backend-link" class="tab-pane fade " id="tab-backend" role="tabpanel">

                                        <fieldset id="select_backend_type" class="">



                                            <div class="form-group " id="field_backend_type"><label for="azuraforms_form_backend_type" class="">Servicio de AutoDJ </label>
                                                <div class="form-field">
                                                    <div class="custom-control custom-radio"><input type="radio" name="backend_type" id="azuraforms_form_backend_type_liquidsoap" value="liquidsoap" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_backend_type_liquidsoap" class="custom-control-label">Usar <b>Liquidsoap</b> en este servidor</label></div>
                                                    <div class="custom-control custom-radio"><input type="radio" name="backend_type" id="azuraforms_form_backend_type_none" value="none" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_type_none" class="custom-control-label"><b>No usar</b> un servicio de DJ Automático</label></div>
                                                </div><small class="help-block form-text">Este software cambia constantemente las listas de reproducción de música y se reproduce cuando no hay otra fuente de radio disponible.</small>
                                            </div>
                                        </fieldset>

                                        <fieldset id="backend_liquidsoap" class="backend_fieldset" style="">


                                            <div class="row">

                                                <div class="form-group col-md-8" id="field_crossfade_type"><label for="azuraforms_form_crossfade_type" class="">Método de Crossfade </label>
                                                    <div class="form-field">
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_crossfade_type" id="azuraforms_form_backend_config_crossfade_type_smart" value="smart" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_crossfade_type_smart" class="custom-control-label">Modo Inteligente</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_crossfade_type" id="azuraforms_form_backend_config_crossfade_type_normal" value="normal" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_backend_config_crossfade_type_normal" class="custom-control-label">Modo Normal</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_crossfade_type" id="azuraforms_form_backend_config_crossfade_type_none" value="none" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_crossfade_type_none" class="custom-control-label">Desactivar el Fundido entre Pistas</label></div>
                                                    </div><small class="help-block form-text">Elija un método para pasar de una canción a otra. El modo inteligente considera el volumen de las dos pistas cuando se desvanecen para obtener un efecto más suave, pero requiere más recursos de CPU.</small>
                                                </div>
                                                <div class="form-group col-md-4" id="field_crossfade"><label for="azuraforms_form_crossfade" class="">Duración de crossfade (segundos) </label>
                                                    <div class="form-field"><input type="number" name="backend_config_crossfade" id="azuraforms_form_backend_config_crossfade" value="2" min="0.0" max="30.0" step="0.1" class="form-control" data-dirrty-initial-value="2"></div><small class="help-block form-text">Número de segundos para superponer canciones.</small>
                                                </div>
                                                <div class="form-group col-sm-12" id="field_nrj"><label for="azuraforms_form_nrj" class="">Aplicar Compresión y Normalización </label>
                                                    <div class="form-field"><input type="hidden" name="backend_config_nrj" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="backend_config_nrj" id="azuraforms_form_backend_config_nrj" value="1" class="toggle-switch custom-control-input" data-dirrty-initial-value="unchecked"><label for="azuraforms_form_backend_config_nrj" class="custom-control-label">Aplicar Compresión y Normalización</label></div>
                                                    </div><small class="help-block form-text">Comprime y normaliza el audio de tu estación, produciendo un sonido más uniforme y "completo".</small>
                                                </div>
                                                <div class="form-group col-sm-12" id="field_enable_requests"><label for="azuraforms_form_enable_requests" class="">Permitir Pedido de Canciones </label>
                                                    <div class="form-field"><input type="hidden" name="enable_requests" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="enable_requests" id="azuraforms_form_enable_requests" value="1" checked="checked" class="toggle-switch custom-control-input" data-dirrty-initial-value="checked"><label for="azuraforms_form_enable_requests" class="custom-control-label">Permitir Pedido de Canciones</label></div>
                                                    </div><small class="help-block form-text">Activa a los oyentes para solicitar canciones para reproducir en tu estación. Sólo se solicitan pistas que ya están en tus listas de reproducción.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_request_delay"><label for="azuraforms_form_request_delay" class="">Retraso mínimo de pedido (minutos) </label>
                                                    <div class="form-field"><input type="number" name="request_delay" id="azuraforms_form_request_delay" value="5" min="0" max="1440" class="form-control" data-dirrty-initial-value="5"></div><small class="help-block form-text">Si los pedidos están habilitados, esto especifica el retraso mínimo (en minutos) entre un pedido de ser enviado y jugado. Si se aplica el sistema a cero, no hay un retraso. <br><b>Importante:</b> Algunas reglas de las licencias para Streams requieren un retraso mínimo de los pedidos (en los Estados Unidos, es actualmente 60 minutos). Compruebe las normativas locales para obtenerse más información.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_request_threshold"><label for="azuraforms_form_request_threshold" class="">Tiempo de espera antes de pedir un nuevo título (minutos) </label>
                                                    <div class="form-field"><input type="number" name="request_threshold" id="azuraforms_form_request_threshold" value="15" min="0" max="1440" class="form-control" data-dirrty-initial-value="15"></div><small class="help-block form-text">Si los pedidos están habilitados, esto le permite especificar el tiempo mínimo (en minutos) entre el momento en que se reproduce el título en la radio y cuándo se puede volver a solicitar. Especifique 0 para no esperar.</small>
                                                </div>
                                                <div class="form-group col-md-12" id="field_enable_streamers"><label for="azuraforms_form_enable_streamers" class="">Permitir Streamers / DJs </label>
                                                    <div class="form-field"><input type="hidden" name="enable_streamers" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="enable_streamers" id="azuraforms_form_enable_streamers" value="1" checked="checked" class="toggle-switch custom-control-input" data-dirrty-initial-value="checked"><label for="azuraforms_form_enable_streamers" class="custom-control-label">Permitir Streamers / DJs</label></div>
                                                    </div><small class="help-block form-text">Si está activado, los streamers (o DJs) podrán conectarse directamente a su stream y transmitir música en vivo que interrumpirá el flujo de AutoDJ.</small>
                                                </div>
                                                <div class="form-group col-md-4" id="field_record_streams"><label for="azuraforms_form_record_streams" class="">Grabar Transmisiones en Vivo </label>
                                                    <div class="form-field"><input type="hidden" name="backend_config_record_streams" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="backend_config_record_streams" id="azuraforms_form_backend_config_record_streams" value="1" class="toggle-switch custom-control-input" data-dirrty-initial-value="unchecked"><label for="azuraforms_form_backend_config_record_streams" class="custom-control-label">Grabar Transmisiones en Vivo</label></div>
                                                    </div><small class="help-block form-text">Si se activa, AzuraCast grabará automáticamente cualquier transmisión en vivo realizada en esta emisora para grabaciones por emisión.</small>
                                                </div>
                                                <div class="form-group col-md-4" id="field_record_streams_format"><label for="azuraforms_form_record_streams_format" class="">Formato de Grabación de Transmisión en Vivo </label>
                                                    <div class="form-field">
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_format" id="azuraforms_form_backend_config_record_streams_format_mp3" value="mp3" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_format_mp3" class="custom-control-label">MP3</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_format" id="azuraforms_form_backend_config_record_streams_format_ogg" value="ogg" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_format_ogg" class="custom-control-label">OGG Vorbis</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_format" id="azuraforms_form_backend_config_record_streams_format_opus" value="opus" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_format_opus" class="custom-control-label">OGG Opus</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_format" id="azuraforms_form_backend_config_record_streams_format_aac" value="aac" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_format_aac" class="custom-control-label">AAC+ (MPEG4 HE-AAC v2)</label></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4" id="field_record_streams_bitrate"><label for="azuraforms_form_record_streams_bitrate" class="">Tasa de Grabación de Transmisión en Vivo (kbps) </label>
                                                    <div class="form-field">
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_32" value="32" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_32" class="custom-control-label">32</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_48" value="48" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_48" class="custom-control-label">48</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_64" value="64" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_64" class="custom-control-label">64</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_96" value="96" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_96" class="custom-control-label">96</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_128" value="128" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_128" class="custom-control-label">128</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_192" value="192" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_192" class="custom-control-label">192</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_256" value="256" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_256" class="custom-control-label">256</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_record_streams_bitrate" id="azuraforms_form_backend_config_record_streams_bitrate_320" value="320" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_record_streams_bitrate_320" class="custom-control-label">320</label></div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4" id="field_disconnect_deactivate_streamer"><label for="azuraforms_form_disconnect_deactivate_streamer" class="">Desconectar al Streamer en (segundos) </label>
                                                    <div class="form-field"><input type="number" name="disconnect_deactivate_streamer" id="azuraforms_form_disconnect_deactivate_streamer" value="0" min="0" step="1" class="form-control" data-dirrty-initial-value="0"></div><small class="help-block form-text">Número en segundos para desactivar el Streamer de la estación al desconectar manualmente. Establecer en 0 para deshabilitar la desconexión por completo.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_dj_port"><label for="azuraforms_form_dj_port" class="advanced"><span class="text-info">Avanzado</span> Personalizar el Puerto para el DJ/Streamer </label>
                                                    <div class="form-field"><input type="text" name="backend_config_dj_port" id="azuraforms_form_backend_config_dj_port" value="8005" class="form-control" data-dirrty-initial-value="8005"></div><small class="help-block form-text">Ningún otro programa puede estar usando este puerto. Dejar en blanco para asignar automáticamente un puerto.<br><b>Nota:</b> El puerto después de este (n+1) se utilizará automáticamente para conexiones antiguas.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_telnet_port"><label for="azuraforms_form_telnet_port" class="advanced"><span class="text-info">Avanzado</span> Personalizar el Puerto de Procesamiento de Peticiones Internas </label>
                                                    <div class="form-field"><input type="text" name="backend_config_telnet_port" id="azuraforms_form_backend_config_telnet_port" value="8004" class="form-control" data-dirrty-initial-value="8004"></div><small class="help-block form-text">Este puerto no es utilizado por ningún proceso externo. Sólo modificar este puerto si el puerto asignado está en uso. Dejar en blanco para asignar automáticamente un puerto.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_dj_buffer"><label for="azuraforms_form_dj_buffer" class="">Tiempo del Búfer del DJ/Streamer (segundos) </label>
                                                    <div class="form-field"><input type="number" name="backend_config_dj_buffer" id="azuraforms_form_backend_config_dj_buffer" value="5" min="0" max="60" step="1" class="form-control" data-dirrty-initial-value="5"></div><small class="help-block form-text">Número de segundos para almacenar la señal en caso de interrupción. Establezca el valor más bajo que sus DJs pueden usar sin interrupción de flujos.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_dj_mount_point"><label for="azuraforms_form_dj_mount_point" class="advanced"><span class="text-info">Avanzado</span> Personalizar el Punto de Montaje del DJ/Streamer </label>
                                                    <div class="form-field"><input type="text" name="backend_config_dj_mount_point" id="azuraforms_form_backend_config_dj_mount_point" value="/" class="form-control" data-dirrty-initial-value="/"></div><small class="help-block form-text">Si su software de streaming requiere una ruta específica para el punto de montaje, especifíquelo aquí. De lo contrario, utilice el valor predeterminado.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_enable_replaygain_metadata"><label for="azuraforms_form_enable_replaygain_metadata" class="advanced"><span class="text-info">Avanzado</span> Usar los Metadatos de Replaygain </label>
                                                    <div class="form-field"><input type="hidden" name="backend_config_enable_replaygain_metadata" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="backend_config_enable_replaygain_metadata" id="azuraforms_form_backend_config_enable_replaygain_metadata" value="1" class="toggle-switch custom-control-input" data-dirrty-initial-value="unchecked"><label for="azuraforms_form_backend_config_enable_replaygain_metadata" class="custom-control-label">Usar los Metadatos de Replaygain</label></div>
                                                    </div><small class="help-block form-text">Instruye a Liquidsoap para usar cualquier metadata de Replaygain asociada a una canción para controlar su nivel de volumen.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_autodj_queue_length"><label for="azuraforms_form_autodj_queue_length" class="">Longitud de Cola del AutoDJ </label>
                                                    <div class="form-field"><input type="number" name="backend_config_autodj_queue_length" id="azuraforms_form_backend_config_autodj_queue_length" value="3" min="1" max="25" class="form-control" data-dirrty-initial-value="3"></div><small class="help-block form-text">Si utiliza el AutoDJ de AzuraCast, este determinará cuántas canciones llenará automáticamente por adelantado en la cola.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_use_manual_autodj"><label for="azuraforms_form_use_manual_autodj" class="advanced"><span class="text-info">Avanzado</span> Modo Manual de AutoDJ </label>
                                                    <div class="form-field"><input type="hidden" name="backend_config_use_manual_autodj" value="0" data-dirrty-initial-value="0" class="form-control">
                                                        <div class="custom-control custom-checkbox"><input type="checkbox" name="backend_config_use_manual_autodj" id="azuraforms_form_backend_config_use_manual_autodj" value="1" class="toggle-switch custom-control-input" data-dirrty-initial-value="unchecked"><label for="azuraforms_form_backend_config_use_manual_autodj" class="custom-control-label">Modo Manual de AutoDJ</label></div>
                                                    </div><small class="help-block form-text">Este modo desactiva la administración del AutoDJ de AzuraCast, usando el propio Liquidsoap para gestionar la reproducción de canciones. "Siguiente Canción" y algunas otras características no estarán disponibles.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_charset"><label for="azuraforms_form_charset" class="advanced"><span class="text-info">Avanzado</span> Establecer Codificación de Caracteres </label>
                                                    <div class="form-field">
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_charset" id="azuraforms_form_backend_config_charset_utf-8" value="UTF-8" checked="checked" data-dirrty-initial-value="checked" class="custom-control-input"><label for="azuraforms_form_backend_config_charset_utf-8" class="custom-control-label">UTF-8</label></div>
                                                        <div class="custom-control custom-radio"><input type="radio" name="backend_config_charset" id="azuraforms_form_backend_config_charset_iso-8859-1" value="ISO-8859-1" data-dirrty-initial-value="unchecked" class="custom-control-input"><label for="azuraforms_form_backend_config_charset_iso-8859-1" class="custom-control-label">ISO-8859-1</label></div>
                                                    </div><small class="help-block form-text">Para la mayoría de los casos, utilice la codificación UTF-8 por defecto. La codificación ISO-8859-1 antigua puede utilizarse si acepta conexiones desde DJs SHOUTcast 1 o si utiliza otro software antiguo.</small>
                                                </div>
                                                <div class="form-group col-md-6" id="field_duplicate_prevention_time_range"><label for="azuraforms_form_duplicate_prevention_time_range" class="">Intervalo de Prevención de Duplicado (Minutos) </label>
                                                    <div class="form-field"><input type="number" name="backend_config_duplicate_prevention_time_range" id="azuraforms_form_backend_config_duplicate_prevention_time_range" value="120" min="0" max="1440" class="form-control" data-dirrty-initial-value="120"></div><small class="help-block form-text">Intervalo de tiempo (en minutos) que el algoritmo de prevención de canciones duplicadas debe tener en cuenta del historial de canciones.</small>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>


                                    <fieldset id="submit_grp" class="">



                                        <div class="form-group " id="field_submit">
                                            <div class="form-field"><input type="submit" name="submit" id="azuraforms_form_submit" value="Guardar los Cambios" class="btn btn-lg btn-primary m-t-10" data-dirrty-initial-value="Guardar los Cambios"></div>
                                        </div>
                                    </fieldset>

                                    <input type="hidden" name="_csrf" id="azuraforms_form__csrf" value="6c6W0h1fRq" autocomplete="off" class="form-control" data-dirrty-initial-value="6c6W0h1fRq">
                                </div>
                            </form>

                        </div>
                    </section>


                </div>
                <!-- End of Main Content -->

                <?php include '../dashboard/footer.php'; ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#firmadigital").attr(' class', 'nav-item active');
        </script>


        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
</body>

</html>