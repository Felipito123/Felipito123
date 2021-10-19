INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Funcionario'),
(2, 'Administrador'),
(3, 'Superadmin'),
(4, 'Calidad'),
(5, 'Dentista'),
(6, 'Farmacia'),
(7, 'Jefe Sector'),
(8, 'Jefe Unidad'),
(9, 'Jefe DAS'),
(10, 'Dirección'),
(11, 'Director'),
(12, 'Encargado(a) de personal'),
(13, 'Jefe sistema salud');

INSERT INTO `region` (`id_region`, `nombre_region`) VALUES
(1, 'I Región de Tarapacá'),
(2, ' II Región de Antofagasta'),
(3, ' III Región de Atacama'),
(4, ' IV Región de Coquimbo'),
(5, ' V Región de Valparaíso'),
(6, ' VI Región del Libertador General Bernardo O\`Higgins'),
(7, ' VII Región del Maule'),
(8, ' VIII Región del Biobío'),
(9, ' IX Región de La Araucanía'),
(10, ' X Región de Los Lagos'),
(11, ' XI Región Aysén del General Carlos Ibáñez del Campo'),
(12, 'XII Región de Magallanes y Antártica Chilena'),
(13, ' Región Metropolitana de Santiago'),
(14, ' XIV Región de Los Ríos'),
(15, 'XV Región de Arica y Parinacota'),
(16, ' XVI Región de Ñuble');

INSERT INTO `comuna` (`id_comuna`, `id_region`, `nombre_comuna`) VALUES
(1, 1, 'Iquique'),
(2, 1, 'Alto Hospicio'),
(3, 1, 'Pozo Almonte'),
(4, 1, 'Camiña'),
(5, 1, 'Colchane'),
(6, 1, 'Huara'),
(7, 1, 'Pica'),
(8, 2, 'Antofagasta'),
(9, 2, 'Mejillones'),
(10, 2, 'Sierra Gorda'),
(11, 2, 'Taltal'),
(12, 2, 'Calama'),
(13, 2, 'Ollagüe'),
(14, 2, 'San Pedro de Atacama'),
(15, 2, 'Tocopilla'),
(16, 2, 'María Elena'),
(17, 3, 'Copiapó'),
(18, 3, 'Caldera'),
(19, 3, 'Tierra Amarilla'),
(20, 3, 'Chañaral'),
(21, 3, 'Diego de Almagro'),
(22, 3, 'Vallenar'),
(23, 3, 'Alto del Carmen'),
(24, 3, 'Freirina'),
(26, 4, 'La Serena'),
(27, 4, 'Coquimbo'),
(28, 4, 'Andacollo'),
(29, 4, 'La Higuera'),
(30, 4, 'Paiguano'),
(31, 4, 'Vicuña'),
(32, 4, 'Illapel'),
(33, 4, 'Canela'),
(34, 4, 'Los Vilos'),
(35, 4, 'Salamanca'),
(36, 4, 'Ovalle'),
(37, 4, 'Combarbalá'),
(38, 4, 'Monte Patria'),
(39, 4, 'Punitaqui'),
(40, 4, 'Río Hurtado'),
(41, 5, 'Valparaíso'),
(42, 5, 'Casablanca'),
(43, 5, 'Concón'),
(44, 5, 'Juan Fernández'),
(45, 5, 'Puchuncaví'),
(46, 5, 'Quintero'),
(47, 5, 'Viña del Mar'),
(48, 5, 'Isla de Pascua'),
(49, 5, 'Los Andes'),
(50, 5, 'Calle Larga'),
(51, 5, 'Rinconada'),
(52, 5, 'San Esteban'),
(53, 5, 'La Ligua'),
(54, 5, 'Cabildo'),
(55, 5, 'Papudo'),
(56, 5, 'Petorca'),
(57, 5, 'Zapallar'),
(58, 5, 'Quillota'),
(59, 5, 'Calera'),
(60, 5, 'Hijuelas'),
(61, 5, 'La Cruz'),
(62, 5, 'Nogales'),
(63, 5, 'San Antonio'),
(64, 5, 'Algarrobo'),
(65, 5, 'Cartagena'),
(66, 5, 'El Quisco'),
(67, 5, 'El Tabo'),
(68, 5, 'Santo Domingo'),
(69, 5, 'San Felipe'),
(70, 5, 'Catemu'),
(71, 5, 'Llaillay'),
(72, 5, 'Panquehue'),
(73, 5, 'Putaendo'),
(74, 5, 'Santa María'),
(75, 5, 'Quilpué'),
(76, 5, 'Limache'),
(77, 5, 'Olmué'),
(78, 5, 'Villa Alemana'),
(79, 6, 'Rancagua'),
(80, 6, 'Codegua'),
(81, 6, 'Coinco'),
(82, 6, 'Coltauco'),
(83, 6, 'Doñihue'),
(84, 6, 'Graneros'),
(85, 6, 'Las Cabras'),
(86, 6, 'Machalí'),
(87, 6, 'Malloa'),
(88, 6, 'Mostazal'),
(89, 6, 'Olivar'),
(90, 6, 'Peumo'),
(91, 6, 'Pichidegua'),
(92, 6, 'Quinta de Tilcoco'),
(93, 6, 'Rengo'),
(94, 6, 'Requínoa'),
(95, 6, 'San Vicente'),
(96, 6, 'Pichilemu'),
(97, 6, 'La Estrella'),
(98, 6, 'Litueche'),
(99, 6, 'Marchihue'),
(100, 6, 'Navidad'),
(101, 6, 'Paredones'),
(102, 6, 'San Fernando'),
(103, 6, 'Chépica'),
(104, 6, 'Chimbarongo'),
(105, 6, 'Lolol'),
(106, 6, 'Nancagua'),
(107, 6, 'Palmilla'),
(108, 6, 'Peralillo'),
(109, 6, 'Placilla'),
(110, 6, 'Pumanque'),
(111, 6, 'Santa Cruz'),
(112, 7, 'Talca'),
(113, 7, 'Constitución'),
(114, 7, 'Curepto'),
(115, 7, 'Empedrado'),
(116, 7, 'Maule'),
(117, 7, 'Pelarco'),
(118, 7, 'Pencahue'),
(119, 7, 'Río Claro'),
(120, 7, 'San Clemente'),
(121, 7, 'San Rafael'),
(122, 7, 'Cauquenes'),
(123, 7, 'Chanco'),
(124, 7, 'Pelluhue'),
(125, 7, 'Curicó'),
(126, 7, 'Hualañé'),
(127, 7, 'Licantén'),
(128, 7, 'Molina'),
(129, 7, 'Rauco'),
(130, 7, 'Romeral'),
(131, 7, 'Sagrada Familia'),
(132, 7, 'Teno'),
(133, 7, 'Vichuquén'),
(134, 7, 'Linares'),
(135, 7, 'Colbún'),
(136, 7, 'Longaví'),
(137, 7, 'Parral'),
(138, 7, 'Retiro'),
(139, 7, 'San Javier'),
(140, 7, 'Villa Alegre'),
(141, 7, 'Yerbas Buenas'),
(142, 8, 'Concepción'),
(143, 8, 'Coronel'),
(144, 8, 'Chiguayante'),
(145, 8, 'Florida'),
(146, 8, 'Hualqui'),
(147, 8, 'Lota'),
(148, 8, 'Penco'),
(149, 8, 'San Pedro de la Paz'),
(150, 8, 'Santa Juana'),
(151, 8, 'Talcahuano'),
(152, 8, 'Tomé'),
(153, 8, 'Hualpén'),
(154, 8, 'Lebu'),
(155, 8, 'Arauco'),
(156, 8, 'Cañete'),
(157, 8, 'Contulmo'),
(158, 8, 'Curanilahue'),
(159, 8, 'Los Álamos'),
(160, 8, 'Tirúa'),
(161, 8, 'Los Ángeles'),
(162, 8, 'Antuco'),
(163, 8, 'Cabrero'),
(164, 8, 'Laja'),
(165, 8, 'Mulchén'),
(166, 8, 'Nacimiento'),
(167, 8, 'Negrete'),
(168, 8, 'Quilaco'),
(169, 8, 'Quilleco'),
(170, 8, 'San Rosendo'),
(171, 8, 'Santa Bárbara'),
(172, 8, 'Tucapel'),
(173, 8, 'Yumbel'),
(174, 8, 'Alto Biobío'),
(175, 9, 'Temuco'),
(176, 9, 'Carahue'),
(177, 9, 'Cunco'),
(178, 9, 'Curarrehue'),
(179, 9, 'Freire'),
(180, 9, 'Galvarino'),
(181, 9, 'Gorbea'),
(182, 9, 'Lautaro'),
(183, 9, 'Loncoche'),
(184, 9, 'Melipeuco'),
(185, 9, 'Nueva Imperial'),
(186, 9, 'Padre las Casas'),
(187, 9, 'Perquenco'),
(188, 9, 'Pitrufquén'),
(189, 9, 'Pucón'),
(190, 9, 'Saavedra'),
(191, 9, 'Teodoro Schmidt'),
(192, 9, 'Toltén'),
(193, 9, 'Vilcún'),
(194, 9, 'Villarrica'),
(195, 9, 'Cholchol'),
(196, 9, 'Angol'),
(197, 9, 'Collipulli'),
(198, 9, 'Curacautín'),
(199, 9, 'Ercilla'),
(200, 9, 'Lonquimay'),
(201, 9, 'Los Sauces'),
(202, 9, 'Lumaco'),
(203, 9, 'Purén'),
(204, 9, 'Renaico'),
(205, 9, 'Traiguén'),
(206, 9, 'Victoria'),
(207, 10, 'Puerto Montt'),
(208, 10, 'Calbuco'),
(209, 10, 'Cochamó'),
(210, 10, 'Fresia'),
(211, 10, 'Frutillar'),
(212, 10, 'Los Muermos'),
(213, 10, 'Llanquihue'),
(214, 10, 'Maullín'),
(215, 10, 'Puerto Varas'),
(216, 10, 'Castro'),
(217, 10, 'Ancud'),
(218, 10, 'Chonchi'),
(219, 10, 'Curaco de Vélez'),
(220, 10, 'Dalcahue'),
(221, 10, 'Puqueldón'),
(222, 10, 'Queilén'),
(223, 10, 'Quellón'),
(224, 10, 'Quemchi'),
(225, 10, 'Quinchao'),
(226, 10, 'Osorno'),
(227, 10, 'Puerto Octay'),
(228, 10, 'Purranque'),
(229, 10, 'Puyehue'),
(230, 10, 'Río Negro'),
(231, 10, 'San Juan de la Costa'),
(232, 10, 'San Pablo'),
(233, 10, 'Chaitén'),
(234, 10, 'Futaleufú'),
(235, 10, 'Hualaihué'),
(236, 10, 'Palena'),
(237, 11, 'Coihaique'),
(238, 11, 'Lago Verde'),
(239, 11, 'Aisén'),
(240, 11, 'Cisnes'),
(241, 11, 'Guaitecas'),
(242, 11, 'Cochrane'),
(243, 11, 'O’Higgins'),
(244, 11, 'Tortel'),
(245, 11, 'Chile Chico'),
(246, 11, 'Río Ibáñez'),
(247, 12, 'Punta Arenas'),
(248, 12, 'Laguna Blanca'),
(249, 12, 'Río Verde'),
(250, 12, 'San Gregorio'),
(251, 12, 'Cabo de Hornos (Ex Navarino)'),
(252, 12, 'Antártica'),
(253, 12, 'Porvenir'),
(254, 12, 'Primavera'),
(255, 12, 'Timaukel'),
(256, 12, 'Natales'),
(257, 12, 'Torres del Paine'),
(258, 13, 'Cerrillos'),
(259, 13, 'Cerro Navia'),
(260, 13, 'Conchalí'),
(261, 13, 'El Bosque'),
(262, 13, 'Estación Central'),
(263, 13, 'Huechuraba'),
(264, 13, 'Independencia'),
(265, 13, 'La Cisterna'),
(266, 13, 'La Florida'),
(267, 13, 'La Granja'),
(268, 13, 'La Pintana'),
(269, 13, 'La Reina'),
(270, 13, 'Las Condes'),
(271, 13, 'Lo Barnechea'),
(272, 13, 'Lo Espejo'),
(273, 13, 'Lo Prado'),
(274, 13, 'Macul'),
(275, 13, 'Maipú'),
(276, 13, 'Ñuñoa'),
(277, 13, 'Pedro Aguirre Cerda'),
(278, 13, 'Peñalolén'),
(279, 13, 'Providencia'),
(280, 13, 'Pudahuel'),
(281, 13, 'Quilicura'),
(282, 13, 'Quinta Normal'),
(283, 13, 'Recoleta'),
(284, 13, 'Renca'),
(285, 13, 'San Joaquín'),
(286, 13, 'San Miguel'),
(287, 13, 'San Ramón'),
(288, 13, 'Vitacura'),
(289, 13, 'Puente Alto'),
(290, 13, 'Pirque'),
(291, 13, 'San José de Maipo'),
(292, 13, 'Colina'),
(293, 13, 'Lampa'),
(294, 13, 'Tiltil'),
(295, 13, 'San Bernardo'),
(296, 13, 'Buin'),
(297, 13, 'Paine'),
(298, 13, 'Melipilla'),
(299, 13, 'Alhué'),
(300, 13, 'Curacaví'),
(301, 13, 'María Pinto'),
(302, 13, 'San Pedro'),
(303, 13, 'Talagante'),
(304, 13, 'El Monte'),
(305, 13, 'Isla de Maipo'),
(306, 13, 'Padre Hurtado'),
(307, 13, 'Peñaflor'),
(308, 14, 'Valdivia'),
(309, 14, 'Corral'),
(310, 14, 'Lanco'),
(311, 14, 'Los Lagos'),
(312, 14, 'Máfil'),
(313, 14, 'Mariquina'),
(314, 14, 'Paillaco'),
(315, 14, 'Panguipulli'),
(316, 14, 'La Unión'),
(317, 14, 'Futrono'),
(318, 14, 'Lago Ranco'),
(319, 14, 'Río Bueno'),
(320, 15, 'Arica'),
(321, 15, 'Camarones'),
(322, 15, 'Putre'),
(323, 15, 'General Lagos'),
(324, 16, 'Cobquecura'),
(325, 16, 'Coelemu'),
(326, 16, 'Ninhue'),
(327, 16, 'Portezuelo'),
(328, 16, 'Quirihue'),
(329, 16, 'Ránquil'),
(330, 16, 'Treguaco'),
(331, 16, 'Bulnes'),
(332, 16, 'Chillán Viejo'),
(333, 16, 'Chillán'),
(334, 16, 'El Carmen'),
(335, 16, 'Pemuco'),
(336, 16, 'Pinto'),
(337, 16, 'Quillón'),
(338, 16, 'San Ignacio'),
(339, 16, 'Yungay'),
(340, 16, 'Coihueco'),
(341, 16, 'Ñiquén'),
(342, 16, 'San Carlos'),
(343, 16, 'San Fabián'),
(344, 16, 'San Nicolás');


INSERT INTO `sector` (`id_sector`, `nombre_sector`) VALUES
(1, 'Sector Amarillo'),
(2, 'Sector Rojo'),
(3, 'Sector Verde'),
(4, 'Sector Azul'),
(5, 'Sector Transversal');

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Medicina'),
(2, 'Química y Farmacia'),
(3, 'Odontología'),
(4, 'Enfermería'),
(5, 'Obstetricia y Puericultura'),
(6, 'Trabajo Social'),
(7, 'Psicología'),
(8, 'Kinesiología'),
(9, 'Nutrición y Dietética'),
(10, 'Terapia Ocupacional'),
(11, 'Fonoaudiología'),
(12, 'Podología Clínica'),
(13, 'Técnico en Podología Clínica'),
(14, 'Técnico de Nivel Superior en Enfermería'),
(15, 'TMP (Mantenimiento productivo total)'),
(16, 'Auxiliar de servicio'),
(17, 'Administrativo'),
(18, 'Conductor'),
(19, 'Ingeniería de Ejecución Informática'),
(20, 'Ingeniería en prevención de Riesgos'),
(21, 'Técnico en prevención de Riesgos'),
(22, 'Contador Auditor'),
(23, 'Pedagogía en Educación Parvularia'),
(24, 'Pedagogía en Educación Física'),
(25, 'Otros Técnicos');

INSERT INTO `etapas_spe` (`id_etapas_spe`, `descripcion_etapas_spe`) VALUES
(1, 'Visado por Funcionario'),
(2, 'Visado por Jefe de Sector o  Jefe de Unidad'),
(3, 'Visado por Encargado de Personal'),
(4, 'Visado por Jefe Sistema de Salud');


INSERT INTO `decision_spe` (`id_decision_spe`, `descripcion_decision_spe`) VALUES
(1, 'Aprobado'),
(2, 'Rechazado');

INSERT INTO `motivo_pe` (`id_mpe`, `descripcion_mpe`) VALUES
(1, 'Reunión de apoderados'),
(2, 'Control de salud de mi hijo(a)');

INSERT INTO `tipo_remuneracion` (`id_tiporem`, `descripcion_tiporem`) VALUES
(1, 'Con goce de remuneraciones'),
(2, 'Sin goce de remuneraciones');

INSERT INTO `tipo_dia` (`id_tipo_dia`, `descripcion_tipo_dia`) VALUES
(1, 'Medio Dia'),
(2, '1 Dia'),
(3, '2 Dias');

INSERT INTO `decision_spa` (`id_decision_spa`, `descripcion_decision_spa`) VALUES
(1, 'Aprobado'),
(2, 'Rechazado');

INSERT INTO `etapas_spa` (`id_etapas_spa`, `descripcion_etapas_spa`) VALUES
(1, 'Visado por Funcionario'),
(2, 'Visado por Jefe Directo'),
(3, 'Visado por Encargado(a) de Personal'),
(4, 'Visado por Jefe Sistema de Salud');



INSERT INTO `usuario` (`rut`, `id_rol`, `id_comuna`, `id_cargo`, `id_sector`, `nombre_usuario`, `telefono_usuario`, `direccion_usuario`, `correo_usuario`, `contrasena_usuario`, `fechaentrada_usuario`, `enlinea_usuario`, `imagen_usuario`, `estado_usuario`, `firma_usuario`) VALUES
('10511897K', 4, 188, 6, 1, 'Sefanecio Riquelme', '957459545', 'Ramon Rabal', 'juan@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-12-17', '0', 'profile-1_dewapk.jpg', 1, NULL),
('11111111', 2, 158, 6, 2, 'Juan Alfred', '957459545', 'Ramon Rabal', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-12-17', '0', '', 1, NULL),
('114974560', 1, 158, 6, 4, 'Ignacio Serrano', '957459545', 'Ramon Rabal', 'usuario1@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2020-12-17', '0', '', 1, NULL),
('117775500', 7, 156, 17, 4, 'Jefe Sector Azul', '57459545', 'Los olmos jefe sector azul 456', 'jefesectorazul@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-28', '1', 'no-imagen.jpg', 1, 'profile.jpg'),
('117775501', 7, 155, 17, 2, 'Jefe Sector Rojo', '57459545', 'Los olmos jefe sector rojo 456', 'jefesectorrojo@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '0', 'no-imagen.jpg', 1, NULL),
('117775502', 7, 157, 17, 3, 'Jefe Sector Verde', '57459545', 'Los olmos jefe sector verde 456', 'jefesectorverde@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '0', 'no-imagen.jpg', 1, NULL),
('117775503', 7, 154, 17, 1, 'Jefe Sector Amarillo', '57459545', 'Los olmos jefe sector amarillo 456', 'jefesectoramarillo@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '0', 'no-imagen.jpg', 1, NULL),
('193871240', 3, 158, 6, 2, 'Felipe Andrés Galdames Vidal', '957459545', 'Ramon Rabal', 'fagv.galdamesv@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2020-12-17', '1', 'profile-1_dewapk.jpg', 1, 'profile.jpg'),
('193874210', 6, 174, 6, 4, 'Daniel Habif', '957459545', 'Ramon Rabal', 'd.habif@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2020-12-17', '1', '', 1, NULL),
('222222222', 5, 158, 6, 5, 'NO SE QUE NOMBRE PONER', '455000000', 'DIRECCION DE PRUEBA', 'soporte.himnario@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-08-07', '0', 'BMPN-1-SITUACION-ACTUAL.png', 1, NULL),
('33221100', 8, 1, 17, NULL, 'Jefe de Unidad', '57459545', 'Los olmos jefe unidad 456', 'jefeunidad@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-28', '1', 'no-imagen.jpg', 1, NULL),
('33221101', 9, 8, 17, NULL, 'Jefe de Das', '957459545', 'los olmos jefe DAS 456', 'jefedas@gmail.com', 'e6750e36542e7ba6b48fe6363fa883bb2103f105', '2021-04-29', '0', 'no-imagen.jpg', 1, NULL),
('33221102', 10, 18, 17, NULL, 'Encargado de Dirección', '957459545', 'los olmos encargado de Dirección 456', 'direccion@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '0', 'no-imagen.jpg', 1, NULL),
('33221103', 11, 155, 17, NULL, 'Director', '957459545', 'los olmos Director 456', 'director@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '1', 'no-imagen.jpg', 1, NULL),
('33221104', 12, 154, 17, NULL, 'Encargada de Personal', '957459545', 'los olmos encargada de personal 456', 'encargadadepersonal@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '1', 'no-imagen.jpg', 1, NULL),
('33221105', 13, 159, 17, NULL, 'Jefe Sistema de Salud', '957459545', 'los olmos Jefe Sistema Salud 456', 'jefesistemasalud@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-04-29', '1', 'no-imagen.jpg', 1, NULL),
('555556666', 1, 158, 6, 4, 'saodfpdkvzlmxl', '309402934', 'slkdalskjlaks', 'fanu@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2021-02-09', '0', 'no-imagen.jpg', 0, NULL),
('80910908', 1, 158, 6, 4, 'Jaalo', '957459545', 'Ramon Rabal', 'f@gmail.com', 'b41e9b8dd61267c8eb3db48acfda473f53d9964b', '2020-12-17', '0', '', 1, NULL),
('92892697', 1, 158, 6, 4, 'Gervasio', '957459545', 'Ramon Rabal', 'aa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-12-26', '1', 'portada-Salud-Bucal-660x220.png', 1, NULL),
('93471075', 1, 158, 6, 4, 'Antonia Benavidez', '957459545', 'Ramon Rabal', 'usuario@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-12-17', '0', '', 1, NULL);


INSERT INTO `banner_imagenes` (`id_ban_imagenes`, `rut`, `nombre_ban_imagenes`, `estado_ban_imagenes`, `link_ban_imagenes`) VALUES
(1, '193871240', 'Captura de pantalla.png', 0, 'https://google.com'),
(2, '193871240', 'salud-responde.jpg', 0, 'https://saludresponde.minsal.cl/'),
(3, '193871240', 'empleospublicos.png', 1, 'https://intranet.ubiobio.cl/intranet/'),
(4, '193871240', 'banner-lateral_plan-de-accion-coronavirus-gob.png', 1, 'https://www.gob.cl/coronavirus/'),
(5, '193871240', 'banner-lateral_paso-a-paso-1.png', 1, 'https://www.gob.cl/coronavirus/pasoapaso'),
(6, '193871240', 'logo-cancer.png', 1, 'https://www.gob.cl/plannacionaldecancer/'),
(7, '193871240', 'banner-inferior_chile-atiende.png', 0, 'https://www.chileatiende.gob.cl/'),
(8, '193871240', 'MER-IMAGEN.png', 1, 'https://translate.google.com/'),
(9, '193871240', 'MER-IMAGEN.png', 0, 'https://www.contarcaracteres.com/');



INSERT INTO `banner_videos` (`id_ban_videos`, `rut`, `nombre_ban_videos`, `estado_ban_videos`, `titulo_ban_videos`) VALUES
(1, '193871240', 'Como RETIRAR dinero de MERCADOPAGO 2019 (Tutorial COMPLETO).mp4', 0, 'segundo titulo'),
(2, '193871240', 'CuentaHasta3.mp4', 0, 'tercer titulo'),
(3, '193871240', 'Esta pandemia solo la superamos entre todos.mp4', 1, '4to titulo'),
(4, '193871240', 'Michael Jackson - Heal The World (Piano Cover) - YouTube - Google Chrome 2019-10-27 00-41-36_Trim.mp4', 1, '5to titulo'),
(5, '193871240', 'Cuando combatido.mp4', 0, '63');


INSERT INTO `categoria_articulo` (`id_categoria_articulo`, `nombre_categoria_articulo`) VALUES
(1, 'Odontologia'),
(2, 'Farmacia'),
(3, 'Podologos'),
(4, 'Posta Cerro Alto'),
(5, 'Posta Antihuala'),
(6, 'Posta Pangue'),
(7, 'Posta Ranquilco'),
(8, 'Destacado');


INSERT INTO `articulo` (`id_articulo`, `rut`, `id_categoria_articulo`, `titulo_articulo`, `descripcion_articulo`, `fecha_articulo`, `visualizaciones_articulo`, `archivo_articulo`) VALUES
(1, '193871240', 8, 'Presentan diseño de estudio que evaluará determinantes socioambientales de salud en habitantes de Coronel', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><em>– Representantes del Ministerio de Salud y profesionales de la Pontificia Universidad Católica participaron en reunión del Consejo para la Recuperación Ambiental y Social (CRAS) de la comuna, para entregar detalles del proyecto “Situación de salud y sus determinantes en la comuna de Coronel”.</em></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Cerca de cuarenta representantes de distintas organizaciones de Coronel, y que integran el Consejo para la Recuperación Ambiental y Social (CRAS) de la comuna, conocieron el pasado jueves los detalles del proyecto “Situación de salud y sus determinantes en la comuna de Coronel, Región del Biobío”.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">El estudio fue encargado por el Ministerio de Salud y será ejecutado por expertos de la Pontificia Universidad Católica. Su objetivo es describir la prevalencia de enfermedades prioritarias y sus determinantes sociales en el entorno de las personas, usando una metodología ya validada en el país, mediante la aplicación de cuestionarios y exámenes de laboratorio, en una muestra representativa de la comuna de Coronel.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">La subsecretaria de Salud, Paula Daza, señaló que «este estudio nace como una respuesta del Ministerio a la preocupación de los habitantes de la comuna de Coronel vinculada a las exposiciones ambientales. Se trata del primer estudio a nivel regional de esta naturaleza, que abarca una población de más de 1.000 personas, y se llevará a través del Departamento de Salud Pública de la Pontificia Universidad Católica de Chile».</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Este trabajo buscar establecer la prevalencia comunal de enfermedades asociadas al deterioro ambiental, prevalencia de niveles elevados de arsénico inorgánico urinario o plomo en sangre y sus factores de riesgo en personas mayores de 18 años.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">La Dra. Sandra Cortés, investigadora responsable de la ejecución, destacó lo importante que fue para el equipo investigador escuchar a los miembros del CRAS, con quienes coincidieron respecto de la relevancia del estudio para la comunidad de Coronel.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">«Conversamos de manera general acerca de cómo podríamos ejecutar este estudio de la mejor manera y solicitamos la colaboración y el apoyo de la comunidad y de todos sus actores claves para que nos abran las puertas de sus casas y nos permitan recolectar la información que necesitamos para su éxito”, señaló la doctora Cortés.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Los habitantes de Coronel recibirán durante todo este 2021 al equipo de campo, conformado por empadronadores y equipo de salud de la UC, debidamente identificados, quienes tomarán contacto con personas elegibles, seleccionadas de manera aleatoria por un periodo estimado de 4 meses.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Luego de terminado este proceso, y analizada la información, cada participante recibirá un reporte con sus resultados personales. «La autoridad sanitaria contará con información epidemiológica pionera para la toma de decisiones en este ámbito de alta preocupación comunitaria», agregó la investigadora.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Este proyecto cuenta con la aprobación del comité de ética de investigación de la Facultad de Medicina de la Universidad Católica, lo que se suma a la fuerte colaboración de la Subsecretaría de Salud Pública y la Seremi de Salud.</p>', '10 de mayo, 2021', 54, '0'),
(2, '193871240', 8, 'Chile superó los 16 millones de dosis administradas de vacuna contra SARSCoV2', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">El ministro de Salud, Enrique Paris, informó que “se han administrado 16.059.122 de dosis de vacuna contra COVID-19. De los cuales 8.765.052 son personas con primera dosis y 7.294.070 son personas vacunadas que ya completaron sus dos dosis”.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone size-full wp-image-65119\" src=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-total_2021.05.12.png\" alt=\"\" width=\"1921\" height=\"1081\" srcset=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-total_2021.05.12.png 1921w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-total_2021.05.12-300x169.png 300w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-total_2021.05.12-1024x576.png 1024w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-total_2021.05.12-660x371.png 660w\" sizes=\"(max-width: 1921px) 100vw, 1921px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">El ministro Paris señaló que “la población objetivo es 15.200.840 de personas, donde un 57,7% de la población se ha vacunado con primera dosis y un 48% de la población se ha vacunado con segunda dosis”.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone size-full wp-image-65120\" src=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-primera-y-segunda-dosis_2021.05.12.png\" alt=\"\" width=\"1921\" height=\"1081\" srcset=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-primera-y-segunda-dosis_2021.05.12.png 1921w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-primera-y-segunda-dosis_2021.05.12-300x169.png 300w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-primera-y-segunda-dosis_2021.05.12-1024x576.png 1024w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-primera-y-segunda-dosis_2021.05.12-660x371.png 660w\" sizes=\"(max-width: 1921px) 100vw, 1921px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">De acuerdo con los datos entregados por el Departamento de Estadística e Información de Salud, hasta ayer martes 11 de mayo, hasta las 19.59hrs, se inmunizaron 183.262 personas, de los cuales 102.319 son primera dosis y 80.943 con segunda dosis.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone size-full wp-image-65121\" src=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-60-y-mas_2021.05.12.png\" alt=\"\" width=\"1921\" height=\"1081\" srcset=\"https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-60-y-mas_2021.05.12.png 1921w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-60-y-mas_2021.05.12-300x169.png 300w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-60-y-mas_2021.05.12-1024x576.png 1024w, https://www.minsal.cl/wp-content/uploads/2021/05/Vacunados-60-y-mas_2021.05.12-660x371.png 660w\" sizes=\"(max-width: 1921px) 100vw, 1921px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">El jefe de la cartera detalló además que “3.013.247 personas mayores de 60 años y más han participado en la campaña. Respecto al género, el 53,8% de los inoculados corresponde a mujeres y el 46,1% son hombres”.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">El ministro Paris hizo un especial llamado a la población a seguir con el proceso de vacunación según el calendario, “mientras continuamos con la inoculación, la ciudadanía debe mantener las medidas de autocuidado porque por ahora siguen siendo las más efectivas para evitar nuevos contagios”.</p>', '12 de mayo, 2021', 21, '0'),
(3, '193871240', 8, 'Médico UCI del Hospital Las Higueras es la primera vacunada contra el COVID19 en la región del Biobío', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><em>â€“ Subsecretaria de Salud PÃºblica, Paula Daza, liderÃ³ el proceso de vacunaciÃ³n a nivel regional, donde se iniciÃ³ por vÃ­a terrestre y aÃ©rea la distribuciÃ³n de 2.050 dosis para trabajadores de las Unidades CrÃ­ticas de 13 recintos de salud.</em></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">2 mil 050 vacunas contra el Covid-19 arribaron este viernes 25 de diciembre a la regiÃ³n del BiobÃ­o, con el objetivo de inmunizar a trabajadores UCI y UTI de recintos de salud pÃºblicos y privados de las tres provincias de la regiÃ³n, que son parte del grupo objetivo de la vacuna debido a su alta exposiciÃ³n al virus.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">La Subsecretaria de Salud PÃºblica, Paula Daza estuvo a cargo del traslado de las vacunas, las cuales fueron recibidas en la Base Aeropolicial de Carabineros en ConcepciÃ³n por el Intendente del BiobÃ­o, Patricio Kuhn y el Seremi de Salud, HÃ©ctor MuÃ±oz, quienes se trasladaron posteriormente hasta el Hospital Las Higueras de Talcahuano para dar curso al primer proceso de inoculaciÃ³n, donde los acompaÃ±Ã³, ademÃ¡s, el Director del Servicio Salud Talcahuano, Carlos Vera y la Directora del recinto asistencial, Patricia SÃ¡nchez.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone wp-image-60262 size-full\" src=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758272783_6663025ff7_k-1.jpg\" alt=\"\" width=\"2048\" height=\"1365\" srcset=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758272783_6663025ff7_k-1.jpg 2048w, https://www.minsal.cl/wp-content/uploads/2020/12/50758272783_6663025ff7_k-1-300x200.jpg 300w, https://www.minsal.cl/wp-content/uploads/2020/12/50758272783_6663025ff7_k-1-1024x683.jpg 1024w, https://www.minsal.cl/wp-content/uploads/2020/12/50758272783_6663025ff7_k-1-660x440.jpg 660w\" sizes=\"(max-width: 2048px) 100vw, 2048px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">En la regiÃ³n, la primera funcionaria inmunizada fue la Dra. Sara Delgado EcheverrÃ­a (32), mÃ©dico internista de la UCI en dicho recinto desde el aÃ±o 2016. Ha colaborado en la redacciÃ³n de protocolos para el manejo de pacientes Covid-19 y en es la encargada de la coordinaciÃ³n de turnos mÃ©dicos de todas las Ã¡reas que componen la Unidad del Paciente CrÃ­tico.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">â€œEl personal de atenciÃ³n mÃ©dica de Unidades del Paciente CrÃ­tico UCI y UTI han estado los 9 meses en la primera lÃ­nea de atenciÃ³n y contenciÃ³n de la pandemia en todo el paÃ­s, prestando servicios cruciales a pacientes Covid-19, por lo que es de vital importancia iniciar con ellos el proceso de inmunizaciÃ³n, debido a que por el tipo de ocupaciÃ³n y entorno laboral presentan riesgos mÃ¡s altos de exposiciÃ³n al virusâ€, declarÃ³ la Subsecretaria de Salud PÃºblica, Paula Daza.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone wp-image-60263 size-full\" src=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758997176_456891ac68_k.jpg\" alt=\"\" width=\"2048\" height=\"1365\" srcset=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758997176_456891ac68_k.jpg 2048w, https://www.minsal.cl/wp-content/uploads/2020/12/50758997176_456891ac68_k-300x200.jpg 300w, https://www.minsal.cl/wp-content/uploads/2020/12/50758997176_456891ac68_k-1024x683.jpg 1024w, https://www.minsal.cl/wp-content/uploads/2020/12/50758997176_456891ac68_k-660x440.jpg 660w\" sizes=\"(max-width: 2048px) 100vw, 2048px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Tras la dra. Delgado, fue vacunada la enfermera supervisora de la UCI del recinto asistencial, Carolina Campos Torres (37), que asumiÃ³ dicha jefatura al iniciarse la pandemia con la labor de implementar camas crÃ­ticas, complejizar camas UTI, contratar personal y gestionar insumos y equipamientos de la Unidad del Paciente CrÃ­tico; y la Dra. MarÃ­a Soledad Oliveros, mÃ©dico nutriÃ³loga que trabaja en el Hospital Las Higueras hace una dÃ©cada y actualmente se desempeÃ±a en el recinto como Jefa del Equipo de NutriciÃ³n ClÃ­nica.&nbsp; La profesional es esposa de un mÃ©dico nefrÃ³logo que tambiÃ©n trabaja en el Hospital y madre de 2 hijos pequeÃ±os de 6 y 8 aÃ±os, por lo que han tenido que redoblar esfuerzo para mantener su actividad clÃ­nica y el cuidado de sus hijos.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">En la instancia, la Subsecretaria Daza seÃ±alÃ³ que â€œesta es una esperanza. Una luz en este camino que hemos recorrido desde principio de aÃ±o, cuando llegÃ³ la pandemia a nuestro paÃ­s y que seguiremos recorriendo hasta que podamos vacunar a gran parte de la poblaciÃ³n de nuestro paÃ­s, ya que este proceso es gradual. Es por eso que es fundamental que las personas mantengan las medidas de autocuidado y respeten las indicaciones de la Autoridad Sanitariaâ€.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\"><img class=\"alignnone wp-image-60264 size-full\" src=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758998236_4c64cec88a_k.jpg\" alt=\"\" width=\"2048\" height=\"1365\" srcset=\"https://www.minsal.cl/wp-content/uploads/2020/12/50758998236_4c64cec88a_k.jpg 2048w, https://www.minsal.cl/wp-content/uploads/2020/12/50758998236_4c64cec88a_k-300x200.jpg 300w, https://www.minsal.cl/wp-content/uploads/2020/12/50758998236_4c64cec88a_k-1024x683.jpg 1024w, https://www.minsal.cl/wp-content/uploads/2020/12/50758998236_4c64cec88a_k-660x440.jpg 660w\" sizes=\"(max-width: 2048px) 100vw, 2048px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Respecto a la distribuciÃ³n de dosis por recinto, el Seremi HÃ©ctor MuÃ±oz explicÃ³ que â€œllegaron 13 cÃ¡psula a la Base Aeropolicial de Carabineros, una serÃ¡ dirigida por vÃ­a terrestre al Hospital Las Higueras y 3 se van por vÃ­a aÃ©rea al Hospital de Curanilahue, al Complejo Asistencial VÃ­ctor RÃ­os Ruiz y ClÃ­nica Los Andes de Los Ãngeles; mientras que otras 9 cÃ¡psulas&nbsp; se dirigen a la central de vacuna. En dicho lugar, una&nbsp; es retirada por la Armada, con destino a Hospital Naval; otras 4 se dirigen a ClÃ­nica Universitaria ConcepciÃ³n, ClÃ­nica BiobÃ­o, Hospital de Penco y Hospital de TomÃ©; mientras que las Ãºltimas 4 al Sanatorio AlemÃ¡n de ConcepciÃ³n, Hospital ClÃ­nico del Sur, Hospital TraumatolÃ³gico y Hospital Regionalâ€.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\"><img class=\"alignnone wp-image-60265 size-full\" src=\"https://www.minsal.cl/wp-content/uploads/2020/12/50759009136_1c5c3a15c2_k.jpg\" alt=\"\" width=\"2048\" height=\"1365\" srcset=\"https://www.minsal.cl/wp-content/uploads/2020/12/50759009136_1c5c3a15c2_k.jpg 2048w, https://www.minsal.cl/wp-content/uploads/2020/12/50759009136_1c5c3a15c2_k-300x200.jpg 300w, https://www.minsal.cl/wp-content/uploads/2020/12/50759009136_1c5c3a15c2_k-1024x683.jpg 1024w, https://www.minsal.cl/wp-content/uploads/2020/12/50759009136_1c5c3a15c2_k-660x440.jpg 660w\" sizes=\"(max-width: 2048px) 100vw, 2048px\" style=\"border: 0px; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">Del total de vacunas, 615 corresponden al Hospital Regional Guillermo Grant Benavente, 291 al Hospital Las Higueras, 119 al Sanatorio AlemÃ¡n, 85 a la ClÃ­nica Universitaria de ConcepciÃ³n, 97 al Hospital de Curanilahue, 468 al Complejo Asistencial VÃ­ctor RÃ­os Ruiz de Los Ãngeles, 26 al Hospital Naval, 54 a ClÃ­nica Los Andes, 82 a ClÃ­nica BiobÃ­o, 48 al Hospital de TomÃ©, 60 al Hospital ClÃ­nico del Sur, 44 al Hospital de Penco y 39 al Hospital TraumatolÃ³gico, ademÃ¡s de otras 22 de redistribuciÃ³n.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; text-align: justify;\">En 48 horas se realizarÃ¡ un balance de este primer proceso de inmunizaciÃ³n, iniciando con ello un proceso gradual, donde los grupos que conforman la poblaciÃ³n objetivo, correspondiente a personal de salud y otros desplegados en primera lÃ­nea en contexto de la pandemia, personas mayores y personas con enfermedades crÃ³nicas, irÃ¡n accediendo durante las prÃ³ximas semanas y meses a esta protecciÃ³n que es entregada en forma gratuita por el Estado.</p>', '28 de diciembre, 2020', 40, '0');


INSERT INTO `imagen_articulo` (`id_imagen_articulo`, `id_articulo`, `nombre_imagen_articulo`) VALUES
(1, 1,'ComunicadosMinsalweb-660x350.jpg'),
(2, 2, 'banner-reporte-vacunacion_04-660x349.png'),
(3, 3, 'ComunicadoBiobio.jpg');



INSERT INTO `categoria_odonto` (`id_categoria_odonto`, `nombre_categoria_odonto`) VALUES
(1, 'Manuales'),
(2, 'Boletines'),
(3, 'GuÃ­as'),
(4, 'Orientaciones'),
(5, 'Material educativo'),
(6, 'Calendarios');


INSERT INTO `articulo_odonto` (`id_articulo_odonto`,`rut`,`titulo_articulo_odonto`, `frase_articulo_odonto`, `cita_articulo_odonto`, `descripcion_articulo_odonto`, `archivo_articulo_odonto`, `estado_articulo_odonto`) VALUES
(1,'193871240', 'PromociÃ³n de Salud y PrevenciÃ³n de Enfermedades Bucales', 'AlgÃºn tipo', 'De cita', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">La salud bucal es parte fundamental de la salud general y bienestar de las personas, ya que influye no solo en el bienestar fÃ­sico, sino que en su autoestima, comunicaciÃ³n y relaciones sociales, en fin, en su calidad de vida y felicidad.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">La promociÃ³n de salud es un proceso que permite a las personas el control sobre su salud para mejorarla, ya que el gozar de buena salud, posibilita la participaciÃ³n de las personas en la sociedad y permite acceder a las oportunidades de desarrollo individual y social.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">En esta secciÃ³n encontrarÃ¡ material educativo y acceso a la plataforma educativa â€œPromociÃ³n y PrevenciÃ³nâ€“Salud Bucalâ€ con contenidos que esperamos sirvan para motivarles a que cuiden su salud bucal y la de su familia.</p>', 'herramienta-para-la-salud-bucal.png', 'visible'),
(2,'193871240','AtenciÃ³n OdontolÃ³gica', 'AtenciÃ³n', 'OdontolÃ³gica?', '<p><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">La polÃ­tica de Salud Bucal de Chile desde el aÃ±o 2000 ha priorizado a los menores de 20 aÃ±os tanto en los Objetivos Sanitarios 2000-2010 como en la Estrategia Nacional de Salud 2011-2020. El Ministerio de Salud ha desarrollado, desde el aÃ±o 2007 una propuesta de intervenciÃ³n intersectorial para la promociÃ³n de hÃ¡bitos de higiene y alimentaciÃ³n y la prevenciÃ³n de caries en los pÃ¡rvulos de jardines infantiles, a travÃ©s del Programa de PromociÃ³n y PrevenciÃ³n en Salud Bucal Para Preescolares. Este piloto se centrÃ³ en la poblaciÃ³n menor de 7 aÃ±os y se orientÃ³ hacia la formulaciÃ³n de diagnÃ³sticos participativos, con Ã©nfasis en el componente promocional y educativo de salud bucal de estas familias, para lograr la adquisiciÃ³n de hÃ¡bitos favorables, otorgando ademÃ¡s, prevenciÃ³n especÃ­fica de caries dentales a los niÃ±os y niÃ±as de mayor riesgo a travÃ©s de la aplicaciÃ³n de barniz de flÃºor.</span><br></p>', 'atencion-odontologica.png', 'visible'),
(3,'193871240', 'Programa de FluoraciÃ³n', '', '', '<p><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px;\">La utilizaciÃ³n de fluoruros es la principal estrategia para la prevenciÃ³n y control de la caries dental, enfermedad de alta prevalencia en nuestro paÃ­s.</span><br style=\"margin: 0px; padding: 0px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px;\"><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px;\">En esta secciÃ³n encontrarÃ¡ material sobre los programas de fluoraciÃ³n en Chile y la evidencia de su efectividad.&nbsp;</span><br></p>', 'programa-de-fluoracion.png', 'visible'),
(4,'193871240', 'Salud Bucal Infantil y en Adolescentes', '', '', '<p><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\">La salud bucal es un componente indispensable de la salud general que influye positivamente en el bienestar fÃ­sico, psicolÃ³gico y social de las personas. Los cuidados de salud bucal desde la primera infancia contribuyen a mejorar la salud y calidad de vida de todos nuestros niÃ±os, niÃ±as y adolescentes.</span></p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\">Material desarrollado en el departamento</h3><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">â€¢ Plataforma educativa. PromociÃ³n y prevenciÃ³n en salud bucal.&nbsp;<a href=\"http://saludbucal.minsal.cl/fundamentos-de-salud-bucal/salud-bucal-y-calidad-de-vida/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">Ir a la plataforma clic acÃ¡</a><br style=\"margin: 0px; padding: 0px;\">â€¢ Higiene bucal en personas en situaciÃ³n de discapacidad. Consejos para los cuidadores<br style=\"margin: 0px; padding: 0px;\">â€¢ BoletÃ­n Dientes Sanos nÂº 1 â€“ 8</p>', 'Salud-bucal-infantil-y-adolescentes.png', 'visible'),
(5,'193871240', 'Salud Bucal en Adultos y Adultos Mayores', '', '', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">La salud de bucal de los adultos es fundamental para tener una buena calidad de vida. Lamentablemente, las enfermedades bucales son muy comunes en los adultos y adultos mayores de nuestro paÃ­s. Se asocian a una mala higiene, mala alimentaciÃ³n, consumo de alcohol y hÃ¡bito tabÃ¡quico, entre otros factores.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Las enfermedades bucales mÃ¡s comunes en los adultos son la caries dental, enfermedades de las encÃ­as y de los tejidos que sostienen el diente, teniendo como consecuencia en muchos casos la pÃ©rdida de dientes.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">SegÃºn los estudios nacionales, los adultos de 35 a 44 aÃ±os ya han perdido, en promedio, 6 dientes y los adultos mayores de 65 a 74 aÃ±os, 18 dientes.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Las enfermedades bucales comienzan desde los primeros aÃ±os de vida y tienden a aumentar con la edad. La mejor forma de controlarlas es realizar una correcta higiene bucal con pasta fluorada, alimentarse sanamente comiendo abundantes verduras y frutas, productos lÃ¡cteos y tomando agua fluorada, en vez de bebidas. Evitando fumar, consumir alcohol y alimentos ricos en azÃºcares.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\">Programas para la atenciÃ³n dental del adulto:</h3><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 22px; line-height: 1.2em; color: rgb(71, 81, 86);\">GarantÃ­as Explicitas en Salud Bucal para poblaciÃ³n adulta</h4><blockquote style=\"margin-bottom: 0px; padding: 0px 0px 0px 20px; border-left: 2px solid rgb(15, 105, 180); color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 35px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 27px; font-family: Georgia, Times, &quot;Times New Roman&quot;, serif; font-style: italic;\">â€¢ Urgencia OdontolÃ³gica Ambulatoria<br style=\"margin: 0px; padding: 0px;\">â€¢ Salud Oral Integral de la embarazada<br style=\"margin: 0px; padding: 0px;\">â€¢ Salud Oral Integral del adulto de 60 aÃ±os</p></blockquote><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 22px; line-height: 1.2em; color: rgb(71, 81, 86);\">Programas de Salud Bucal en centros de AtenciÃ³n de la Red PÃºblica de Salud</h4><blockquote style=\"margin-bottom: 0px; padding: 0px 0px 0px 20px; border-left: 2px solid rgb(15, 105, 180); color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 35px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 27px; font-family: Georgia, Times, &quot;Times New Roman&quot;, serif; font-style: italic;\">â€¢ Programa OdontolÃ³gico Integral (Dentro de este programa se encuentra MÃ¡s Sonrisas para Chile, destinado a mujeres beneficiarias de FONASA y/o PRAIS, mayores de 15 aÃ±os)<br style=\"margin: 0px; padding: 0px;\">â€¢ Programa mejoramiento del acceso a la atenciÃ³n odontolÃ³gica (dentro de este estÃ¡ la consulta odontolÃ³gica para los mayores de 20 aÃ±os)</p></blockquote><h4 style=\"margin-right: 0px; margin-bottom: 13px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 22px; line-height: 1.2em; color: rgb(71, 81, 86);\">Para mayor informaciÃ³n consulte en:</h4><blockquote style=\"margin-bottom: 0px; padding: 0px 0px 0px 20px; border-left: 2px solid rgb(15, 105, 180); color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 35px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 27px; font-family: Georgia, Times, &quot;Times New Roman&quot;, serif; font-style: italic;\">â€¢ Su centro de salud<br style=\"margin: 0px; padding: 0px;\">â€¢ Oficinas de OIRS a lo largo del paÃ­s.<br style=\"margin: 0px; padding: 0px;\">â€¢ Salud Responde en el fono:&nbsp;<strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">600 360 7777.</strong></p></blockquote>', 'Salud-bucal-adulto-y-adulto-mayor.png', 'visible'),
(6,'193871240', 'Salud Bucal en el Embarazo', '', '', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Es preocupaciÃ³n del Departamento de Salud Bucal, que la embarazada tenga una Ã³ptima Salud Bucal en esta etapa de la vida, ya que es un momento muy especial de la mujer en que estÃ¡ mÃ¡s receptiva y sensibilizada para adoptar o modificar hÃ¡bitos de higiene y alimenticios, que conlleven a una mejor Salud Bucal de ella y a mantener sano al hijo que espera el mayor tiempo posible.</p><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Para el logro de esta objetivo, la atenciÃ³n de la embarazada es una GarantÃ­a ExplÃ­cita de Salud, por lo que tiene una GuÃ­a de PrÃ¡ctica ClÃ­nica, para la mejor atenciÃ³n.<br style=\"margin: 0px; padding: 0px;\">Para ayudar en la educaciÃ³n que se entrega a la embarazada el Departamento de Salud Bucal ha elaborado una OrientaciÃ³n TÃ©cnica Para la EducaciÃ³n en Salud Bucal de la Embarazada.</p>', 'Salud-bucal-embarazo.png', 'visible'),
(7,'193871240','Preguntas frecuentes', '', '', '<p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">En esta secciÃ³n podrÃ¡ encontrar respuesta a algunas preguntas relacionadas con Salud Bucal, si tiene mÃ¡s dudas por favor comunÃ­quese con&nbsp;<strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">Salud Responde al 600 360 7777</strong></p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">Programa Sembrando Sonrisas</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuiÃ©nes acceden a al Programa Sembrando Sonrisas?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">NiÃ±os y niÃ±as de 2 a 5 aÃ±os que asisten a jardines infantiles de JUNJI, INTEGRA y a establecimientos municipales y particulares subvencionados.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceder al Programa Sembrando Sonrisas?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Debido a que la atenciÃ³n se realiza en jardines infantiles de JUNJI, INTEGRA y en establecimientos municipales y particulares subvencionados, acceden los niÃ±os que pertenecen a estos establecimientos educacionales.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n dental del Programa Sembrando Sonrisas?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Este programa es de carÃ¡cter promocional y preventivo, entrega educaciÃ³n en cuidados de la salud bucal y tÃ©cnica de cepillado, entrega cepillos y pasta de dientes y ademÃ¡s considera la aplicaciÃ³n de flÃºor barniz, como medida de prevenciÃ³n especÃ­fica de caries, 2 veces al aÃ±o.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">Programa mÃ¡s sonrisas para Chile</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuiÃ©nes acceden a este Programa?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Mujeres de 15 aÃ±os o mÃ¡s, y beneficiarias Fonasa A, B, C, D y Prais.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceder al Programa MÃ¡s sonrisas para Chile?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Para acceder puede inscribirse en su centro de salud o en la oficina del Sernam de su comuna.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n dental del Programa MÃ¡s sonrisas para Chile?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Este programa incluye la realizaciÃ³n de acciones de atenciÃ³n primaria, como obturaciones, exodoncias y destartraje, ademÃ¡s incluye prÃ³tesis dental.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica integral a estudiantes de cuarto aÃ±o de educaciÃ³n media</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuiÃ©nes acceden?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Acceden alumnos y alumnas de cuarto aÃ±o de enseÃ±anza media de colegios municipales y particulares subvencionados, beneficiarios de Fonasa A, B, C, D y Prais.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceder a la atenciÃ³n?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Se accede al programa en los centro de salud seleccionados del paÃ­s y en los liceos a travÃ©s de Unidades dentales mÃ³viles que permiten la atenciÃ³n en zonas de difÃ­cil acceso.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Esta atenciÃ³n incluye la realizaciÃ³n de acciones de atenciÃ³n primaria, como obturaciones, exodoncias y destartraje, obteniendo un alta odontolÃ³gica integral de atenciÃ³n primaria.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica en niÃ±os y niÃ±as de 2 a 5 aÃ±os</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceden a atenciÃ³n odontolÃ³gica niÃ±os y niÃ±as entre 2 y 5 aÃ±os?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder al Programa Sembrando Sonrisas.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica en niÃ±os y niÃ±as de 6 aÃ±os</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceden a atenciÃ³n para niÃ±os y niÃ±as de 6 aÃ±os?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder niÃ±os y niÃ±as de 6 aÃ±os, hasta 6 aÃ±os 11 meses 29 dÃ­as, vÃ­a garantÃ­a explÃ­cita en salud GES a Salud Oral Integral para niÃ±os y niÃ±as de 6 aÃ±os. Los beneficiarios de Fonasa solicitando hora en su centro de salud, y quienes pertenecen a Isapre deben acercarse a una oficina de su isapre.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Esta atenciÃ³n incluye la realizaciÃ³n de acciones de atenciÃ³n primaria promocionales y preventivas, se le entrega un kit de salud bucal que incluye cepillo y pasta de dientes y se le enseÃ±a a cepillarse los dientes, tambiÃ©n incluye acciones recuperativas si es que se requieren tales como obturaciones, obteniendo un alta odontolÃ³gica integral de atenciÃ³n primaria.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica en adolescentes de 12 aÃ±os</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceden a atenciÃ³n odontolÃ³gica adolescentes de 12 aÃ±os?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder adolescentes con 12 aÃ±os beneficiarios Fonasa A, B, D, D y Prais, solicitando hora en su centro de salud.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Esta atenciÃ³n incluye la realizaciÃ³n de acciones de atenciÃ³n primaria promocionales, preventivas y recuperativas, se le enseÃ±a a lavarse los dientes y se realizan obturaciones si se requieren, obteniendo un alta odontolÃ³gica integral de atenciÃ³n primaria.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica en menores de 20 aÃ±os</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceden a atenciÃ³n las personas menores de 20 aÃ±os que no se encuentran entre las edades priorizadas?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder a atenciÃ³n odontolÃ³gica beneficiarios Fonasa A, B, D, D y Prais solicitando hora en su centro de salud.</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica para embarazadas</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo acceden a atenciÃ³n odontolÃ³gica para mujeres de 15 aÃ±os o mÃ¡s?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder a travÃ©s del Programa Mas Sonrisas para Chile</p><h3 style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px 0px 15px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 32px; line-height: 1.1em; color: rgb(15, 105, 180); border-bottom: 1px solid rgb(189, 201, 209);\"><strong style=\"margin: 0px; padding: 0px; font-weight: bold;\">AtenciÃ³n odontolÃ³gica de urgencia (todas las edades)</strong></h3><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuiÃ©nes acceden a atenciÃ³n odontolÃ³gica de urgencia?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Pueden acceder todas personas independiente de la edad que presenten una urgencia odontolÃ³gica tal como dolor que no cede a los analgÃ©sicos, que presente hinchada la cara, que tenga una fractura dental (diente quebrado) a causa de un trauma o golpe, que tenga una hemorragia dental producto de una extracciÃ³n o una infecciÃ³n en el sitio de la extracciÃ³n.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"verde\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿CÃ³mo se accede a atenciÃ³n odontolÃ³gica de urgencia?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">VÃ­a garantÃ­a explÃ­cita en salud GES Urgencia OdontolÃ³gica Ambulatoria. Los beneficiarios de Fonasa, en su centro de salud en horario de 8:00 a 20:00 horas, y quienes pertenecen a Isapre deben comunicarse con su isapre.</p><h5 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: gobCL, Tahoma, Verdana, Segoe, sans-serif; font-size: 18px; line-height: 1em; color: rgb(15, 105, 180);\"><strong class=\"naranja\" style=\"margin: 0px; padding: 0px; font-weight: bold; color: rgb(255, 78, 0);\">â—Â¿QuÃ© incluye la atenciÃ³n odontolÃ³gica de urgencia?</strong></h5><p style=\"margin-right: 0px; margin-bottom: 25px; margin-left: 0px; padding: 0px; font-size: 14px; line-height: 25.2px; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif;\">Una evaluaciÃ³n y tratamiento de la urgencia realizada por odontÃ³logo.&nbsp;</p>', 'Salud-bucal-preguntas-frecuentes.png', 'visible');







INSERT INTO `articulo_odonto` (`id_articulo_odonto`,`rut`, `titulo_articulo_odonto`, `frase_articulo_odonto`, `cita_articulo_odonto`, `descripcion_articulo_odonto`, `archivo_articulo_odonto`, `estado_articulo_odonto`) VALUES
(8,'193871240','Novedades y datos de interÃ©s', '', '', '<h1><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px;\">En esta secciÃ³n encontrarÃ¡ las publicaciones mÃ¡s recientes, noticias y actividades realizadas a nivel nacional, regional o local relacionadas con temas de salud bucal.</span></h1><table id=\"tablepress-41\" class=\"tablepress tablepress-id-41 dataTable no-footer\" role=\"grid\" aria-describedby=\"tablepress-41_info\" style=\"padding: 0px; width: 600px; border-collapse: collapse; border: none; color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; margin: 0px !important;\"><thead style=\"margin: 0px; padding: 0px;\"><tr class=\"row-1 odd\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><th class=\"column-1 sorting\" tabindex=\"0\" aria-controls=\"tablepress-41\" rowspan=\"1\" colspan=\"1\" aria-label=\"Noticia: Activar para ordenar la columna de manera ascendente\" style=\"margin: 0px; padding: 8px 20px 8px 8px; box-sizing: border-box; background: 0px 0px rgb(15, 105, 180); color: white; --border: 1px solid #ccc; text-align: left; border-top: none; border-right: none; border-bottom: 1px solid rgb(221, 221, 221); border-left: none; border-image: initial; vertical-align: middle; outline: 0px; width: 572px; float: none !important;\">Noticia</th></tr></thead><tbody class=\"row-hover\" style=\"margin: 0px; padding: 0px;\"><tr class=\"row-2 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 0px; border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/wrdprss_minsal/wp-content/uploads/2017/07/2017_DI%C3%81LOGOS-CIUDADANOS-EN-SALUD-BUCAL.pdf\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºDiÃ¡logos Ciudadanos en Salud Bucal. Consolidado nacional.</a></td></tr><tr class=\"row-3 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/wrdprss_minsal/wp-content/uploads/2017/07/2017_DIALOGOS-INTERSECTORIALES-SALUD-BUCAL.pdf\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºDiÃ¡logos Intersectoriales en Salud Bucal. Consolidado nacional.</a></td></tr><tr class=\"row-4 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/wrdprss_minsal/wp-content/uploads/2016/11/Reporte-Actividades-Mes-de-la-Salud-Bucal-2016.pdf\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºActividades realizadas por la Seremi AysÃ©n - mes de Salud Bucal</a></td></tr><tr class=\"row-5 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/magallanes-mesa-intersectorial-de-salud-bucal-realizo-diversas-actividades-de-prevencion/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºMagallanes: Mesa intersectorial de Salud Bucal realizÃ³ diversas actividades de prevenciÃ³n</a></td></tr><tr class=\"row-6 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://seremi6.redsalud.gob.cl/?p=6917\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºSe realizÃ³ premiaciÃ³n de concurso de salud bucal â€œSonrÃ­e te estamos grabandoâ€</a></td></tr><tr class=\"row-7 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/cesfam-bertin-soto-de-arica-monto-stand-para-la-prevencion-de-los-canceres-orales/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºCESFAM BertÃ­n Soto de Arica montÃ³ stand para la prevenciÃ³n de los cÃ¡nceres orales</a></td></tr><tr class=\"row-8 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://www.comunicacionesua.cl/2016/10/25/ninos-y-ninas-de-caleta-coloso-aprendieron-a-cuidar-sus-dientes/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºNiÃ±os y niÃ±as de Caleta Coloso aprendieron a cuidar sus dientes</a><br style=\"margin: 0px; padding: 0px;\"></td></tr><tr class=\"row-9 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/con-monitores-y-campana-comunicacional-seremi-de-salud-magallanes-lidera-trabajo-preventivo-en-salud-bucal-en-jovenes/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºCon monitores y campaÃ±a comunicacional Seremi de Salud Magallanes lidera trabajo preventivo en Salud Bucal en jÃ³venes</a></td></tr><tr class=\"row-10 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/?p=12033\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºPrograma â€œSembrando Sonrisasâ€ ha beneficiado a mÃ¡s de 6 mil 500 niÃ±os y niÃ±as de Atacama durante 2016</a></td></tr><tr class=\"row-11 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(243, 243, 243); vertical-align: top; float: none !important;\"><p><a href=\"http://web.minsal.cl/hospital-comunitario-de-puerto-williams-promueve-la-importancia-de-la-salud-bucal/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-decoration-line: underline; color: rgb(4, 82, 130); transition: all 0.1s ease 0s; outline: 0px;\">â–ºHospital Comunitario de Puerto Williams promueve la importancia de la salud bucal</a></p><table id=\"tablepress-41\" class=\"tablepress tablepress-id-41 dataTable no-footer\" role=\"grid\" aria-describedby=\"tablepress-41_info\" style=\"padding: 0px; width: 600px; border-collapse: collapse; border: none; background-color: rgb(255, 255, 255); margin: 0px !important;\"><tbody class=\"row-hover\" style=\"margin: 0px; padding: 0px;\"><tr class=\"row-12 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 0px; border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><br></td></tr><tr class=\"row-13 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/exitosa-jornada-preventiva-contra-el-cancer/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºExitosa jornada preventiva contra el CÃ¡ncer</a></td></tr><tr class=\"row-14 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/?p=11809\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºEn Rancagua dan el vamos a concurso escolar de Salud Bucal â€œSonrÃ­e te estamos grabandoâ€</a></td></tr><tr class=\"row-15 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/?p=11799\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºArica dio inicio al mes de la salud bucal con Ã©nfasis en jÃ³venes</a></td></tr><tr class=\"row-16 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://diprece.minsal.cl/?p=11779\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºArica: CESFAM Neghme celebrÃ³ DÃ­a de la OdontologÃ­a con feria educativa para niÃ±as y niÃ±os</a></td></tr><tr class=\"row-17 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://seremi9.redsalud.gob.cl/?p=5712\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºLanzan concurso dirigido a niÃ±os y niÃ±as de la regiÃ³n para promover hÃ¡bitos de higiene bucal</a></td></tr><tr class=\"row-18 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://seremi5.redsalud.gob.cl/?p=13724\" target=\"_blank\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºCuaderno Viajero â€œMi Familia Cuida Mis Dientesâ€ busca promover la salud bucal</a><br style=\"margin: 0px; padding: 0px;\"></td></tr><tr class=\"row-19 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/maule-salud-y-educacion-acreditan-establecimientos-educacionales-promotores-en-salud/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºMaule: Salud y EducaciÃ³n acreditan establecimientos educacionales promotores en salud</a><br style=\"margin: 0px; padding: 0px;\"></td></tr><tr class=\"row-20 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/realiza-dialogo-de-salud-bucal-con-intersector-en-los-rios/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºRealiza DiÃ¡logo de Salud Bucal con intersector en RegiÃ³n de Los RÃ­os</a></td></tr><tr class=\"row-21 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(243, 243, 243); vertical-align: top; float: none !important;\"><p><a href=\"http://web.minsal.cl/chiloe-autoridades-de-salud-dan-el-vamos-a-1er-dialogo-ciudadano-de-salud-bucal-de-la-provincia-2/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-decoration-line: underline; color: rgb(4, 82, 130); transition: all 0.1s ease 0s; outline: 0px;\">â–ºChiloÃ©: Autoridades de Salud dan el vamos a 1er diÃ¡logo ciudadano de Salud Bucal de la provincia</a></p><table id=\"tablepress-41\" class=\"tablepress tablepress-id-41 dataTable no-footer\" role=\"grid\" aria-describedby=\"tablepress-41_info\" style=\"padding: 0px; width: 600px; border-collapse: collapse; border: none; background-color: rgb(255, 255, 255); margin: 0px !important;\"><tbody class=\"row-hover\" style=\"margin: 0px; padding: 0px;\"><tr class=\"row-22 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 0px; border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/magallanes-se-realizo-premiacion-de-concurso-de-fotografias-mi-familia-cuida-su-salud-bucal/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºMagallanes: se realizÃ³ premiaciÃ³n de concurso de fotografÃ­as â€œMi Familia Cuida su Salud Bucalâ€</a></td></tr><tr class=\"row-23 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/en-la-araucania-desarrollan-jornadas-de-salud-bucal-y-educacion-y-de-odontologia-en-atencion-primaria/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºEn la AraucanÃ­a desarrollan jornadas de Salud Bucal y EducaciÃ³n y de OdontologÃ­a en AtenciÃ³n Primaria</a></td></tr><tr class=\"row-24 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/maulinos-se-realizaron-evaluaciones-preventivas-en-salud-bucal/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºMaulinos se realizaron evaluaciones preventivas en salud bucal para prevenir el cÃ¡ncer oral</a></td></tr><tr class=\"row-25 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/seremi-de-salud-magallanes-coordina-tecnica-de-magicoterapia-para-que-ninas-y-ninos-cuiden-sus-dientes-y-no-teman-al-dentista/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºSeremi de Salud Magallanes coordina tÃ©cnica de Magicoterapia para que niÃ±as y niÃ±os cuiden sus dientes y no teman al dentista</a></td></tr><tr class=\"row-26 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/17-mil-ninos-de-la-region-de-ohiggins-estan-siendo-beneficiados-con-el-programa-sembrando-sonrisas/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–º17 mil niÃ±os de la regiÃ³n de OÂ´Higgins estÃ¡n siendo beneficiados con el Programa â€œSembrando Sonrisasâ€</a></td></tr><tr class=\"row-27 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/magallanes-ninas-y-ninos-aprenden-importancia-de-lavarse-los-dientes/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºMagallanes: NiÃ±as y niÃ±os aprenden importancia de lavarse los dientes</a></td></tr><tr class=\"row-28 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(255, 255, 255); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/programa-mas-sonrisas-para-chile-beneficia-a-mas-de-8-mil-mujeres-en-nuble/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºPrograma MÃ¡s Sonrisas para Chile beneficia a mÃ¡s de 8 mil mujeres en Ã‘uble</a></td></tr><tr class=\"row-29 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/seremi-y-servicio-de-salud-valdivia-enviaran-propuestas-ciudadanas-para-plan-nacional-de-salud-bucal/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºSeremi y Servicio de Salud Valdivia enviarÃ¡n propuestas ciudadanas para Plan Nacional de Salud Bucal</a></td></tr><tr class=\"row-30 even\" role=\"row\" style=\"margin: 0px; padding: 0px; background: rgb(238, 238, 238);\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(243, 243, 243); vertical-align: top; float: none !important;\"><a href=\"http://web.minsal.cl/autoridades-regionales-y-colegio-de-dentistas-dan-inicio-al-mes-de-la-salud-bucal-en-magallanes/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-decoration-line: underline; color: rgb(4, 82, 130); transition: all 0.1s ease 0s; outline: 0px;\">â–ºAutoridades regionales y Colegio de Dentistas dan inicio al mes de la Salud Bucal en Magallanes</a></td></tr><tr class=\"row-31 odd\" role=\"row\" style=\"margin: 0px; padding: 0px;\"><td class=\"column-1\" style=\"margin: 0px; padding: 8px; box-sizing: border-box; --border: 1px solid #ccc; border-top: 1px solid rgb(221, 221, 221); border-right: none; border-bottom: none; border-left: none; border-image: initial; background: 0px 0px rgb(249, 249, 249); vertical-align: top; float: none !important;\"><p><a href=\"http://web.minsal.cl/dirigentes-sociales-fueron-parte-del-primer-dialogo-ciudadano-de-salud-bucal/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(15, 105, 180); transition: all 0.1s ease 0s;\">â–ºDirigentes sociales fueron parte del primer â€œDiÃ¡logo Ciudadano de Salud Bucalâ€</a></p><p><a href=\"http://web.minsal.cl/exitoso-dialogo-ciudadano-en-salud-bucal-se-realizo-en-la-region-del-biobio/\" style=\"margin: 0px; padding: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-decoration-line: underline; color: rgb(4, 82, 130); transition: all 0.1s ease 0s; outline: 0px;\">â–ºExitoso DiÃ¡logo Ciudadano en salud bucal se realizÃ³ en la RegiÃ³n del BiobÃ­o</a><br></p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><p><span style=\"color: rgb(71, 81, 86); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px;\"><br></span><br></p>', 'novedades-y-datos-de-interes.png', 'visible');

INSERT INTO `calidad` (`id_calidad`, `rut`, `descripcion_calidad`, `archivo_calidad`, `estado_calidad`) VALUES
(1, '193871240', 'Organigrama', 'Situacion-militar.pdf', 1),
(2, '10511897K', 'Reglamento', 'Reglamento.pdf', 1),
(3, '10511897K', 'Informe de Oscar Burgos, compaÃ±ero', 'Informe NÂ°5 OSCAR BURGOS.pdf', 1),
(4, '10511897K', 'Certificado alumno regular, Felipe Galdames', 'b8cae06d4e7c04dd39792228ee470df8.pdf', 1),
(5, '10511897K', 'Canciones AdoraciÃ³n PÃºblica Chue', 'Canciones AdoraciÃ³n PÃºblica Chue.pdf', 1);


INSERT INTO `calificacion_articulo` (`id_calificacion_articulo`, `id_articulo`, `valor_calificacion_articulo`, `ip_calificacion_articulo`, `pais_calificacion_articulo`, `ciudad_calificacion_articulo`, `region_calificacion_articulo`, `compania_calificacion_articulo`) VALUES
(1, 3, 4, '190.5.60.107', 'Chile', 'Curanilahue', 'Region del Biobio', 'Pacifico Cable SPA.'),
(2, 2, 5, '190.5.60.110', 'Chile', 'Curanilahue', 'Region del Biobio', 'Pacifico Cable SPA.');

INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `correo_contacto`, `telefono_contacto`, `asunto_contacto`, `descripcion_contacto`) VALUES
(1, 'asasasa', 'juan@gmail.com', '957459545', 'Asunto del contacto', 'asasasa'),
(2, 'Felipe Andres aaaasamas asajskjaksjkas k', 'asaas@gmail.com', '957459545', 'Asunto del contacto', 'asasasa'),
(3, 'Felipe Andres', 'juan@gmail.com', '957459545', 'Asunto del contacto 2', 'Holaaaaaaaaaaaaaaaaaaaaaobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asuntoobtiene_asunto'),
(4, 'Juan Alberto', 'asaas@gmail.com', '957459545', 'Asunto del contacto', 'No lo quise probar'),
(5, 'rwetyuiop', 'qwertyu@gmail.com', '3425789022', 'sfdghmfdsafghk', 'asdfgfhjkljÃ±hfgdgfhjJUANANANA'),
(6, 'Felipe Galdames', 'a@gmail.com', '123456789', 'ssdf', '12'),
(7, 'Feli', 'a@gmail.com', '456568709', 'q435werut', 'arestdfykugliho');


INSERT INTO `eventos` (`id`, `rut`, `title`, `descripcion`, `color`, `start`, `end`) VALUES
(1, '193871240', 'Titulo ', 'En febrero vamos a ir a una fiesta compaÃ±eros', '#b70b92', '2021-02-10 14:40:00', '2021-02-10 15:42:00'),
(2, '193871240', 'Titulo uno', 'DescripciÃ³n para hoy', '#35bcd4', '2021-02-25 02:40:00', '2021-02-25 03:40:00'),
(3, '193871240', 'AGREGAR ALGO', 'SLADKSDALS', '#7192f4', '2021-02-27 14:52:00', '2021-02-27 14:53:00'),
(4, '193871240', 'asdafgh', 'dsfghj', '#000000', '2021-02-16 15:12:00', '2021-02-16 15:13:00'),
(5, '193871240', 'dsfdgh', 'sadfgh', '#806928', '2021-02-12 16:30:00', '2021-02-12 16:31:00');


INSERT INTO `galeria` (`id_galeria`,`rut`, `archivo_galeria`, `titulo_galeria`, `estado_galeria`) VALUES
(1,'193871240', '3.jpeg', '', 0),
(2,'193871240', '122492353_3480602052021538_3980924520564217486_o.png', '', 1),
(3,'193871240', '122531978_3478340565581020_1188094438180611083_o.jpg', '', 1),
(4,'193871240','50494366628_01e951f70e_k.jpg', '', 1),
(5,'193871240','acordeon.jpg', '', 1),
(6,'193871240','BalanceCovid1710.jpg', '', 1),
(7,'193871240','banner-inferior_chile-atiende.png', '', 0),
(8,'193871240','ceafam10.jpg', '', 1),
(9,'193871240','cesfam.jpg', '', 0),
(10,'193871240','cesfam2.jpg', '', 1),
(11,'193871240','cesfam3.jpg', '', 1),
(12,'193871240','cesfam5.jpg', '', 1),
(13,'193871240','cesfam6.jpg', '', 1),
(14,'193871240','cesfam7.jpg', '', 1),
(15,'193871240','cesfam8.jpg', '', 1),
(16,'193871240','cesfam9.jpg', '', 1),
(17,'193871240','cesfam10.jpg', '', 1),
(18,'193871240','cesfam11.jpg', '', 1),
(19,'193871240','programa-de-fluoracion.png', '', 0);

INSERT INTO `documentos` (`id_documentos`, `rut`, `descripcion_documentos`, `archivo_documentos`, `estado_documentos`) VALUES
(1, '193871240', 'Reglamento', 'Reglamento.pdf', 1),
(2, '193871240','','REGLAMENTO_GENERAL_DE_BECAS_UNIVERSIDAD_DEL_BIO_BIO.pdf', 1),
(3, '114974560', 'Se adjunta el certificado de su vacación.', '1001.pdf', 1),
(4, '10511897K', 'Se adjunta el certificado de su vacación.', '1002.pdf', 1),
(5, '11111111', 'Se adjunta el certificado de su vacación.', '1003.pdf', 1),
(6, '222222222', 'Se adjunta el certificado de su vacación.', '1004.pdf', 1),
(7, '80910908', 'Se adjunta el certificado de su vacación.', '1005.pdf', 1),
(8, '92892697', 'Se adjunta el certificado de su vacación.', '1006.pdf', 1),
(9, '92892697', 'Se adjunta el certificado de su vacación.', '1007.pdf', 1),
(10, '92892697', 'Se adjunta el certificado de su vacación.', '1008.pdf', 1);



INSERT INTO `reunion` (`id_reunion`,`codigo_reunion`, `rut`, `asunto_reunion`, `url_reunion`, `fecha_reunion`, `duracion_reunion`, `estado_reunion`, `contrasena_reunion`) VALUES
(1,'75311706117','193871240', 'ReuniÃ³n uno', 'https://us04web.zoom.us/j/75311706117?pwd=K3ppNUprOWswTWp4LzBRb1NFMUdnZz09', '2021-10-24T21:01:00', 60, 'activo', '1234'),
(2, '75059010878','193871240', 'ReuniÃ³n dos', 'https://us04web.zoom.us/j/75059010878?pwd=bjVCYk9ER0o4VHR3L0pabDFSdHk4Zz09', '2021-02-24T21:17:00', 60, 'finalizada', '324567');


INSERT INTO `token` (`id_token`, `token_de_acceso`, `rut`) VALUES
(1, '{\"access_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiIxYmQwNTFjMC0wMWUxLTQ1YmItYjk2OC1jMTkyZjk5ZGI0YWMifQ.eyJ2ZXIiOjcsImF1aWQiOiI5ZjU5MTg4OGQ4NWFmNzAwY2RhNDVhMDQ4MWZmZTUzYyIsImNvZGUiOiJBdjRmVDJENkdaX2RqT3pBTUZKU0lxNWlzd0pIeDBxd3ciLCJpc3MiOiJ6bTpjaWQ6YlRSbHpEZTdRSk9TUzJFTTJUZVhDUSIsImdubyI6MCwidHlwZSI6MCwidGlkIjo1LCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJkak96QU1GSlNJcTVpc3dKSHgwcXd3IiwibmJmIjoxNjE0MjA5OTQ1LCJleHAiOjE2MTQyMTM1NDUsImlhdCI6MTYxNDIwOTk0NSwiYWlkIjoiamxaQjM3VHNTOFNVN0FSNnh2ZU5RUSIsImp0aSI6IjExNmQ5NThkLWJjZDQtNDI0OS04YTc2LTdmMDZiYjM4ZjMzMiJ9.w2ZXMVXdnbpyeCAl8OZSLMmESyetytk0Ih_snzBpYw4nMG1GK6zs0XQFnteBhO5eP_Vco3FKFYW7KsidyxSOew\",\"token_type\":\"bearer\",\"refresh_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiJmZDUyNGQ0Ny1mNTBmLTRjYzUtYmYxNS05ZDE3ZDdhOTYxMjkifQ.eyJ2ZXIiOjcsImF1aWQiOiI5ZjU5MTg4OGQ4NWFmNzAwY2RhNDVhMDQ4MWZmZTUzYyIsImNvZGUiOiJBdjRmVDJENkdaX2RqT3pBTUZKU0lxNWlzd0pIeDBxd3ciLCJpc3MiOiJ6bTpjaWQ6YlRSbHpEZTdRSk9TUzJFTTJUZVhDUSIsImdubyI6MCwidHlwZSI6MSwidGlkIjo1LCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJkak96QU1GSlNJcTVpc3dKSHgwcXd3IiwibmJmIjoxNjE0MjA5OTQ1LCJleHAiOjIwODcyNDk5NDUsImlhdCI6MTYxNDIwOTk0NSwiYWlkIjoiamxaQjM3VHNTOFNVN0FSNnh2ZU5RUSIsImp0aSI6IjVjYWEzZDRiLTk1MzItNDczNy04MzRmLTk2Y2YxNDFmYzUwZSJ9.HpkIcip_RCU-b9bHA2P_HiCrycs--Q0GTeYPjpkXAvMh7BRT3jU2X_B567C1eqePJ5s3dsoXQvZQhOeN3PiPfg\",\"expires_in\":3599,\"scope\":\"meeting:master meeting:read:admin meeting:write:admin\"}', '193871240');



INSERT INTO `patologia` (`id_patologia`, `nombre_patologia`) VALUES
(1, 'Diabetes Mellitus tipo 2'),
(2, 'Hipertensión arterial'),
(3, 'Dislipidemia'),
(4, 'Hipotiroidismo'),
(5, 'Epilepsia'),
(6, 'Artrosis'),
(7, 'Insumos para el manejo avanzado de heridas de Pie Diabético');

INSERT INTO `paciente` (`rut_paciente`, `id_patologia`, `nombres_paciente`, `apellidos_paciente`, `direccion_paciente`, `telefono_paciente`, `correo_paciente`,`edad_paciente`) VALUES
('14140914k', 7, 'Andrés', 'Convway', 'Santo Domingo, N° 566, Los Álamos', '967566128', 'a.convway@gmail.com','2021-03-21'),
('181791810', 5, 'Nicolás', 'Mohamed', 'Los boldos N°777, Los Álamos', '988278452', 'n.moha@gmail.com','2021-03-21'),
('239325564', 2, 'Lola', 'Benavidez', 'los lamentos n° 689, Población Jamaica', '956194693', 'lola@gmail.com','2021-03-21');

INSERT INTO `estado_medicamento` (`id_estado_medicamento`, `nombre_estado_medicamento`) VALUES
(1, 'Disponible'),
(2, 'Entregados'),
(3, 'Perdidos');

INSERT INTO `tipo_medicamento` (`id_tipo_medicamento`, `nombre_tipo_medicamento`) VALUES
(1, 'Comprimidos'),
(2, 'Cápsulas'),
(3, 'Inyectable intraarticular');

INSERT INTO `categoria_medicamento` (`id_categoria_medicamento`, `nombre_categoria_medicamento`) VALUES
(1, 'Duréticos');

INSERT INTO `medicamento` (`id_medicamento`, `id_tipo_medicamento`, `id_categoria_medicamento`, `rut`, `nombre_medicamento`, `precio_medicamento`, `dosificacion_medicamento`, `imagen_medicamento`, `visibilidad_medicamento`, `stock_total`, `cantidadminima`, `cantidadmaxima`, `historial`, `fecha`) VALUES (1, 1, 1, '193874210', 'Clortalidona', 15995, '50mg x 30 comprimidos', 'euromicina.jpg', 1, 10, 3, 10, 10, '2021-03-12 11:54:47'),
(2, '1', '1', '193874210', 'Furosemida', '6780', '40 mg x 12 Comprimidos', 'furosemida.jpg', '1', '10', '3', '10', '10', '2021-03-19 17:54:47');

INSERT INTO `historial_medicamento` (`id_historial_medicamento`, `id_medicamento`, `id_estado_medicamento`, `stock_historial_medicamento`) VALUES
(1, 1, 1, 100),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 2, 1, 10),
(5, 2, 2, 0),
(6, 2, 3, 0);





