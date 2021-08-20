-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para saac
DROP DATABASE IF EXISTS `saac`;
CREATE DATABASE IF NOT EXISTS `saac` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `saac`;

-- Volcando estructura para tabla saac.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.migrations: ~4 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2021_06_29_214656_create_permission_tables', 1),
	(3, '2021_07_07_182257_create_proyectos_table', 1),
	(4, '2021_07_07_182451_create_users_proyectos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla saac.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.model_has_permissions: ~0 rows (aproximadamente)
DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla saac.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.model_has_roles: ~4 rows (aproximadamente)
DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 4),
	(4, 'App\\Models\\User', 3),
	(5, 'App\\Models\\User', 5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Volcando estructura para tabla saac.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.permissions: ~9 rows (aproximadamente)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'home', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(2, 'userAdmin', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(3, 'userProyecto', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(4, 'registroUsuario', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(5, 'registroProyecto', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(6, 'edicionProyecto', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(7, 'listaProyectos', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(8, 'authProyectos', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(9, 'listUsuarios', 'web', '2021-08-14 18:45:56', '2021-08-14 18:45:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla saac.proyectos
DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8mb4_unicode_ci DEFAULT '\r\n            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>RESUMEN</strong></span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto...El resumen proporciona informaci&oacute;n del estudio y facilita al lector conocer la tem&aacute;tica que se aborda. El resumen debe indicar la problem&aacute;tica, el objetivo general, la pregunta central, la justificaci&oacute;n y las conclusiones; todo ello de manera muy breve y concreta. Este apartado se redacta al concluir con la investigaci&oacute;n.</span></span></span></p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">PALABRAS CLAVE: Palabra 1; palabra 2; palabra 3; palabra 4; palabra 5.</span></span></span></p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las palabras clave son frases cortas que ayudan a clasificar el trabajo de acuerdo a su contenido.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>ABSTRACT</strong></span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto... El abstract es el resumen escrito en ingl&eacute;s.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>KEYWORDS</strong></span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">: Word 1; word 2; word 3;word4.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las keywords son las palabras clave escritas en ingl&eacute;s.</span></span></span></p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente - investigador de la Universidad de Los Altos de Chiapas.&nbsp;</span></span></span></p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp;Estudiantes del CBTis 92 en</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>\r\n            \r\n            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>\r\n            \r\n            <p><strong>INTRODUCCI&Oacute;N</strong></p>\r\n            \r\n            <p>La introducci&oacute;n describe lo que trata el art&iacute;culo de acuerdo al t&iacute;tulo y al planteamiento del problema, con la finalidad de adentrarse en el estudio. Sirve para resaltar el tema que se est&aacute; abordando. La introducci&oacute;n se redacta al terminar de escribir el art&iacute;culo y antes del resumen y las palabras clave.</p>\r\n            \r\n            <p>PROBLEM&Aacute;TICA</p>\r\n            \r\n            <p>La problem&aacute;tica se refiere a describir lo que est&aacute; pasando en relaci&oacute;n con una situaci&oacute;n, con una persona o con una instituci&oacute;n; es narrar los hechos que caracterizan esa situaci&oacute;n, mostrando sus implicaciones.</p>\r\n            \r\n            <p><strong>PREGUNTA DE NVESTIGACI&Oacute;N</strong></p>\r\n            \r\n            <p>La pregunta de investigaci&oacute;n debe resumir lo que habr&aacute; de ser investigado, deben ser claras y concretas, las cuales representan el qu&eacute; del estudio.</p>\r\n            \r\n            <p>Los requisitos que debe cumplir la pregunta de investigaci&oacute;n:</p>\r\n            \r\n            <ul>\r\n                <li>Que no se conozca la respuesta (si se conoce, no valdr&iacute;a la pena realizar el estudio).</li>\r\n                <li>Que pueda responderse con evidencia&nbsp;&nbsp; &nbsp;emp&iacute;rica&nbsp;&nbsp; &nbsp;(datos</li>\r\n                <li>observables o medibles).</li>\r\n                <li>Que implique usar medios &eacute;ticos.</li>\r\n                <li>Que sea clara.</li>\r\n                <li>Que el conocimiento que se obtenga sea sustancial (que aporte conocimientos a un campo de estudio).</li>\r\n            </ul>\r\n            \r\n            <p><strong>OBJETIVO DE INVESTIGACI&Oacute;N</strong></p>\r\n            \r\n            <p>El objetivo es la gu&iacute;a de estudio, establece lo que se pretende con el proyecto de investigaci&oacute;n, este debe expresarse con claridad y ser concreto, medible, apropiado y realista; hay que tenerlo presente durante todo el desarrollo.</p>\r\n            \r\n            <p><strong>JUSTIFICACI&Oacute;N</strong></p>\r\n            \r\n            <p>La justificaci&oacute;n indica las motivaciones que impulsan a plantear la investigaci&oacute;n y por qu&eacute; es relevante investigar ese tema. La justificaci&oacute;n indica el para qu&eacute; o por qu&eacute; debe efectuarse la investigaci&oacute;n, se tiene que explicar por qu&eacute; es conveniente llevar a cabo la investigaci&oacute;n y cu&aacute;les son los beneficios que se derivar&aacute;n de ella.</p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>\r\n            \r\n            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>\r\n            \r\n            <p style="text-align:center"><strong>REFERENTES TE&Oacute;RICOS</strong></p>\r\n            \r\n            <p>Se basan en la informaci&oacute;n documental que fundamentan la investigaci&oacute;n. El plantear los referentes te&oacute;ricos se da proceso de inmersi&oacute;n en el conocimiento existente y disponible que debe estar vinculado con nuestro planteamiento del problema.</p>\r\n            \r\n            <p style="text-align:center"><strong>METODOLOG&Iacute;A</strong></p>\r\n            \r\n            <p>La metodolog&iacute;a presenta informaci&oacute;n clara, concisa y concreta de las t&eacute;cnicas o procedimientos utilizados, as&iacute; como las condiciones bajo las cuales se llev&oacute; a cabo el estudio. En este apartado se colocan las fotografias c&oacute;rrespondientes al realizar la investigaci&oacute;n. La metodolog&iacute;a responde el &iquest;C&oacute;mo se realiz&oacute; la investigaci&oacute;n?</p>\r\n            \r\n            <p style="text-align:center"><strong>RESULTADOS</strong></p>\r\n            \r\n            <p>Los resultados son las observaciones que se realizan en todo el proceso de la investigaci&oacute;n, las cuales se pueden presentar con diagramas, cuadros, tablas o gr&aacute;ficas. El an&aacute;lisis debe ser claro y guardar relaci&oacute;n con el planteamiento del problema (problem&aacute;tica, objetivos, preguntas y justificaci&oacute;n). Agregar evidencias de la investigaci&oacute;n (fotografias, diagramas, transcripciones, etc.)</p>\r\n            \r\n            <p style="text-align:center"><strong>CONCLUSIONES</strong></p>\r\n            \r\n            <p>Las conclusiones describen las respuestas a la pregunta de investigaci&oacute;n de acuerdo a los resultados.</p>\r\n            \r\n            <p style="text-align:center"><strong>FUENTES DE CONSULTA</strong></p>\r\n            \r\n            <p>Las fuentes de consulta son los documentos (digitales o fisicos) que se revisaron para obtener la informaci&oacute;n correspondiente, estos deben ser citados en el formato APA.</p>\r\n            \r\n            <p>Ejemplo de un libro:</p>\r\n            \r\n            <p>Mor&aacute;n, G., y Alvarado, D. (2010). M&eacute;todos &nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;investigaci&oacute;n. M&eacute;xico: Pearson.</p>\r\n            \r\n            <p>Ejemplo de un art&iacute;culo cient&iacute;fico:</p>\r\n            \r\n            <p>Navaridas, F., y Jim&eacute;nez, M. (2016). Concepciones de los estudiantes sobre la eficacia de los ambientes de aprendizaje universitarios. Revista&nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;Investigaci&oacute;n Educativa, Vol. 34, N&uacute;m. 2, pp. 503-519.</p>\r\n            \r\n            <p>Cualquier duda u observaci&oacute;n favor de notificar al correo:</p>\r\n            \r\n            <p>proyectos.academicos@uach.edu.mx</p>\r\n            \r\n            <p style="text-align:center"><strong>OBSERVACIONES DE LA ESTRUCTURA DEL ART&Iacute;CULO:</strong></p>\r\n            \r\n            <p>S&oacute;lo la primera hoja es a una columna, todas las dem&aacute;s a dos columnas.</p>\r\n            \r\n            <p>La extensi&oacute;n m&iacute;nima de cada art&iacute;culo ser&aacute; de 6 cuartillas y la extensi&oacute;n m&aacute;xima de 8 cuartillas.</p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            ',
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.proyectos: ~0 rows (aproximadamente)
DELETE FROM `proyectos`;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`id`, `nombre`, `codigo`, `contenido`, `descripcion`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'Proyecto 1', 'ROY081421-0000', '<p style="text-align:center"><strong><span style="font-size:18px"><span style="font-family:Arial"><span style="color:#000000">Proyecto 1</span></span></span></strong></p>\r\n\r\n            \r\n    <hr/><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente(s)</span></span></span></p><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Erick Fernando Hernandez Costa</span></span></span></p><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Estudiante(s)</span></span></span></p><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Erick Fernando Costa Gordillo</span></span></span></p>\r\n            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>RESUMEN</strong></span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto...El resumen proporciona informaci&oacute;n del estudio y facilita al lector conocer la tem&aacute;tica que se aborda. El resumen debe indicar la problem&aacute;tica, el objetivo general, la pregunta central, la justificaci&oacute;n y las conclusiones; todo ello de manera muy breve y concreta. Este apartado se redacta al concluir con la investigaci&oacute;n.</span></span></span></p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">PALABRAS CLAVE: Palabra 1; palabra 2; palabra 3; palabra 4; palabra 5.</span></span></span></p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las palabras clave son frases cortas que ayudan a clasificar el trabajo de acuerdo a su contenido.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>ABSTRACT</strong></span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto... El abstract es el resumen escrito en ingl&eacute;s.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>KEYWORDS</strong></span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">: Word 1; word 2; word 3;word4.</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las keywords son las palabras clave escritas en ingl&eacute;s.</span></span></span></p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente - investigador de la Universidad de Los Altos de Chiapas.&nbsp;</span></span></span></p>\r\n            \r\n            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp;Estudiantes del CBTis 92 en</span></span></span></p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>\r\n            \r\n            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>\r\n            \r\n            <p><strong>INTRODUCCI&Oacute;N</strong></p>\r\n            \r\n            <p>La introducci&oacute;n describe lo que trata el art&iacute;culo de acuerdo al t&iacute;tulo y al planteamiento del problema, con la finalidad de adentrarse en el estudio. Sirve para resaltar el tema que se est&aacute; abordando. La introducci&oacute;n se redacta al terminar de escribir el art&iacute;culo y antes del resumen y las palabras clave.</p>\r\n            \r\n            <p>PROBLEM&Aacute;TICA</p>\r\n            \r\n            <p>La problem&aacute;tica se refiere a describir lo que est&aacute; pasando en relaci&oacute;n con una situaci&oacute;n, con una persona o con una instituci&oacute;n; es narrar los hechos que caracterizan esa situaci&oacute;n, mostrando sus implicaciones.</p>\r\n            \r\n            <p><strong>PREGUNTA DE NVESTIGACI&Oacute;N</strong></p>\r\n            \r\n            <p>La pregunta de investigaci&oacute;n debe resumir lo que habr&aacute; de ser investigado, deben ser claras y concretas, las cuales representan el qu&eacute; del estudio.</p>\r\n            \r\n            <p>Los requisitos que debe cumplir la pregunta de investigaci&oacute;n:</p>\r\n            \r\n            <ul>\r\n                <li>Que no se conozca la respuesta (si se conoce, no valdr&iacute;a la pena realizar el estudio).</li>\r\n                <li>Que pueda responderse con evidencia&nbsp;&nbsp; &nbsp;emp&iacute;rica&nbsp;&nbsp; &nbsp;(datos</li>\r\n                <li>observables o medibles).</li>\r\n                <li>Que implique usar medios &eacute;ticos.</li>\r\n                <li>Que sea clara.</li>\r\n                <li>Que el conocimiento que se obtenga sea sustancial (que aporte conocimientos a un campo de estudio).</li>\r\n            </ul>\r\n            \r\n            <p><strong>OBJETIVO DE INVESTIGACI&Oacute;N</strong></p>\r\n            \r\n            <p>El objetivo es la gu&iacute;a de estudio, establece lo que se pretende con el proyecto de investigaci&oacute;n, este debe expresarse con claridad y ser concreto, medible, apropiado y realista; hay que tenerlo presente durante todo el desarrollo.</p>\r\n            \r\n            <p><strong>JUSTIFICACI&Oacute;N</strong></p>\r\n            \r\n            <p>La justificaci&oacute;n indica las motivaciones que impulsan a plantear la investigaci&oacute;n y por qu&eacute; es relevante investigar ese tema. La justificaci&oacute;n indica el para qu&eacute; o por qu&eacute; debe efectuarse la investigaci&oacute;n, se tiene que explicar por qu&eacute; es conveniente llevar a cabo la investigaci&oacute;n y cu&aacute;les son los beneficios que se derivar&aacute;n de ella.</p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>\r\n            \r\n            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>\r\n            \r\n            <p style="text-align:center"><strong>REFERENTES TE&Oacute;RICOS</strong></p>\r\n            \r\n            <p>Se basan en la informaci&oacute;n documental que fundamentan la investigaci&oacute;n. El plantear los referentes te&oacute;ricos se da proceso de inmersi&oacute;n en el conocimiento existente y disponible que debe estar vinculado con nuestro planteamiento del problema.</p>\r\n            \r\n            <p style="text-align:center"><strong>METODOLOG&Iacute;A</strong></p>\r\n            \r\n            <p>La metodolog&iacute;a presenta informaci&oacute;n clara, concisa y concreta de las t&eacute;cnicas o procedimientos utilizados, as&iacute; como las condiciones bajo las cuales se llev&oacute; a cabo el estudio. En este apartado se colocan las fotografias c&oacute;rrespondientes al realizar la investigaci&oacute;n. La metodolog&iacute;a responde el &iquest;C&oacute;mo se realiz&oacute; la investigaci&oacute;n?</p>\r\n            \r\n            <p style="text-align:center"><strong>RESULTADOS</strong></p>\r\n            \r\n            <p>Los resultados son las observaciones que se realizan en todo el proceso de la investigaci&oacute;n, las cuales se pueden presentar con diagramas, cuadros, tablas o gr&aacute;ficas. El an&aacute;lisis debe ser claro y guardar relaci&oacute;n con el planteamiento del problema (problem&aacute;tica, objetivos, preguntas y justificaci&oacute;n). Agregar evidencias de la investigaci&oacute;n (fotografias, diagramas, transcripciones, etc.)</p>\r\n            \r\n            <p style="text-align:center"><strong>CONCLUSIONES</strong></p>\r\n            \r\n            <p>Las conclusiones describen las respuestas a la pregunta de investigaci&oacute;n de acuerdo a los resultados.</p>\r\n            \r\n            <p style="text-align:center"><strong>FUENTES DE CONSULTA</strong></p>\r\n            \r\n            <p>Las fuentes de consulta son los documentos (digitales o fisicos) que se revisaron para obtener la informaci&oacute;n correspondiente, estos deben ser citados en el formato APA.</p>\r\n            \r\n            <p>Ejemplo de un libro:</p>\r\n            \r\n            <p>Mor&aacute;n, G., y Alvarado, D. (2010). M&eacute;todos &nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;investigaci&oacute;n. M&eacute;xico: Pearson.</p>\r\n            \r\n            <p>Ejemplo de un art&iacute;culo cient&iacute;fico:</p>\r\n            \r\n            <p>Navaridas, F., y Jim&eacute;nez, M. (2016). Concepciones de los estudiantes sobre la eficacia de los ambientes de aprendizaje universitarios. Revista&nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;Investigaci&oacute;n Educativa, Vol. 34, N&uacute;m. 2, pp. 503-519.</p>\r\n            \r\n            <p>Cualquier duda u observaci&oacute;n favor de notificar al correo:</p>\r\n            \r\n            <p>proyectos.academicos@uach.edu.mx</p>\r\n            \r\n            <p style="text-align:center"><strong>OBSERVACIONES DE LA ESTRUCTURA DEL ART&Iacute;CULO:</strong></p>\r\n            \r\n            <p>S&oacute;lo la primera hoja es a una columna, todas las dem&aacute;s a dos columnas.</p>\r\n            \r\n            <p>La extensi&oacute;n m&iacute;nima de cada art&iacute;culo ser&aacute; de 6 cuartillas y la extensi&oacute;n m&aacute;xima de 8 cuartillas.</p>\r\n            \r\n            <p>&nbsp;</p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>\r\n            \r\n            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>\r\n            \r\n            ', NULL, '1', '2021-08-14 19:22:40', '2021-08-14 19:40:58');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;

-- Volcando estructura para tabla saac.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.roles: ~5 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(2, 'Capturista', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(3, 'Alumno', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(4, 'Profesor', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55'),
	(5, 'Verificador', 'web', '2021-08-14 18:45:55', '2021-08-14 18:45:55');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla saac.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.role_has_permissions: ~25 rows (aproximadamente)
DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(2, 1),
	(3, 1),
	(3, 3),
	(3, 4),
	(3, 5),
	(4, 1),
	(4, 2),
	(5, 1),
	(5, 4),
	(6, 1),
	(6, 3),
	(6, 4),
	(6, 5),
	(7, 1),
	(7, 3),
	(7, 4),
	(7, 5),
	(8, 1),
	(8, 5),
	(9, 2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Volcando estructura para tabla saac.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelPat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelMat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$3WHmPD9Gsq5CTuE3t8g9w.lTJd8hE7D2I7iAd/2DlY4OI28AqhQ4y',
  `estatus` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.users: ~4 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nombre`, `apelPat`, `apelMat`, `usuario`, `password`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'Admin', 'Admin', 'Admin@adm00', '$2y$10$4g9Cd/L0XO9jARWv6ivP3eWJi0xWj3Ym8NeHTsAyf1gMA1rK3fpTK', '1', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(2, 'inicio', 'inicio', 'inicio', 'USR08142101', '$2y$10$3WHmPD9Gsq5CTuE3t8g9w.lTJd8hE7D2I7iAd/2DlY4OI28AqhQ4y', '0', '2021-08-14 18:45:56', '2021-08-14 18:45:56'),
	(3, 'Erick Fernando', 'Hernandez', 'Costa', 'USR08142102', '$2y$10$3WHmPD9Gsq5CTuE3t8g9w.lTJd8hE7D2I7iAd/2DlY4OI28AqhQ4y', '1', '2021-08-14 19:12:44', '2021-08-14 19:12:44'),
	(4, 'Erick Fernando', 'Costa', 'Gordillo', 'USR08142103', '$2y$10$3WHmPD9Gsq5CTuE3t8g9w.lTJd8hE7D2I7iAd/2DlY4OI28AqhQ4y', '1', '2021-08-14 19:26:36', '2021-08-14 19:26:36'),
	(5, 'Erick Fernando', 'Costa', 'Hernandez', 'USR08142104', '$2y$10$3WHmPD9Gsq5CTuE3t8g9w.lTJd8hE7D2I7iAd/2DlY4OI28AqhQ4y', '1', '2021-08-14 19:27:20', '2021-08-14 19:27:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla saac.users_proyectos
DROP TABLE IF EXISTS `users_proyectos`;
CREATE TABLE IF NOT EXISTS `users_proyectos` (
  `fk_userid` bigint(20) unsigned NOT NULL,
  `fk_proyectoid` bigint(20) unsigned NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `users_proyectos_fk_userid_foreign` (`fk_userid`),
  KEY `users_proyectos_fk_proyectoid_foreign` (`fk_proyectoid`),
  CONSTRAINT `users_proyectos_fk_proyectoid_foreign` FOREIGN KEY (`fk_proyectoid`) REFERENCES `proyectos` (`id`),
  CONSTRAINT `users_proyectos_fk_userid_foreign` FOREIGN KEY (`fk_userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla saac.users_proyectos: ~2 rows (aproximadamente)
DELETE FROM `users_proyectos`;
/*!40000 ALTER TABLE `users_proyectos` DISABLE KEYS */;
INSERT INTO `users_proyectos` (`fk_userid`, `fk_proyectoid`, `rol`, `codigo`, `estatus`, `created_at`, `updated_at`) VALUES
	(3, 1, 'Profesor', 'ROY081421-0000', '1', '2021-08-14 19:22:40', '2021-08-14 19:22:40'),
	(4, 1, 'Alumno', 'ROY081421-0000', '1', '2021-08-14 19:28:29', '2021-08-14 19:35:21');
/*!40000 ALTER TABLE `users_proyectos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
