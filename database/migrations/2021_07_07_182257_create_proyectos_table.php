<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->longText('contenido')->nullable()->default('<p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>

            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">T&Iacute;TULO</span></span></span></p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">El t&iacute;tulo indica de forma breve y concreta de lo que trata todo el art&iacute;culo, tiene que ser lo m&aacute;s espec&iacute;fico posible.</span></span></span></p>
            
            <hr />
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Nombre completo del docente 1</span></span></span></p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Nombre (s) completo (s) del (los) estudiante (s) 2</span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>RESUMEN</strong></span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto...El resumen proporciona informaci&oacute;n del estudio y facilita al lector conocer la tem&aacute;tica que se aborda. El resumen debe indicar la problem&aacute;tica, el objetivo general, la pregunta central, la justificaci&oacute;n y las conclusiones; todo ello de manera muy breve y concreta. Este apartado se redacta al concluir con la investigaci&oacute;n.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">PALABRAS CLAVE: Palabra 1; palabra 2; palabra 3; palabra 4; palabra 5.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las palabras clave son frases cortas que ayudan a clasificar el trabajo de acuerdo a su contenido.</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>ABSTRACT</strong></span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto... El abstract es el resumen escrito en ingl&eacute;s.</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>KEYWORDS</strong></span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">: Word 1; word 2; word 3;word4.</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las keywords son las palabras clave escritas en ingl&eacute;s.</span></span></span></p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente - investigador de la Universidad de Los Altos de Chiapas.&nbsp;</span></span></span></p>
            
            <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp;Estudiantes del CBTis 92 en</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
            
            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
            
            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>
            
            <p><strong>INTRODUCCI&Oacute;N</strong></p>
            
            <p>La introducci&oacute;n describe lo que trata el art&iacute;culo de acuerdo al t&iacute;tulo y al planteamiento del problema, con la finalidad de adentrarse en el estudio. Sirve para resaltar el tema que se est&aacute; abordando. La introducci&oacute;n se redacta al terminar de escribir el art&iacute;culo y antes del resumen y las palabras clave.</p>
            
            <p>PROBLEM&Aacute;TICA</p>
            
            <p>La problem&aacute;tica se refiere a describir lo que est&aacute; pasando en relaci&oacute;n con una situaci&oacute;n, con una persona o con una instituci&oacute;n; es narrar los hechos que caracterizan esa situaci&oacute;n, mostrando sus implicaciones.</p>
            
            <p><strong>PREGUNTA DE NVESTIGACI&Oacute;N</strong></p>
            
            <p>La pregunta de investigaci&oacute;n debe resumir lo que habr&aacute; de ser investigado, deben ser claras y concretas, las cuales representan el qu&eacute; del estudio.</p>
            
            <p>Los requisitos que debe cumplir la pregunta de investigaci&oacute;n:</p>
            
            <ul>
                <li>Que no se conozca la respuesta (si se conoce, no valdr&iacute;a la pena realizar el estudio).</li>
                <li>Que pueda responderse con evidencia&nbsp;&nbsp; &nbsp;emp&iacute;rica&nbsp;&nbsp; &nbsp;(datos</li>
                <li>observables o medibles).</li>
                <li>Que implique usar medios &eacute;ticos.</li>
                <li>Que sea clara.</li>
                <li>Que el conocimiento que se obtenga sea sustancial (que aporte conocimientos a un campo de estudio).</li>
            </ul>
            
            <p><strong>OBJETIVO DE INVESTIGACI&Oacute;N</strong></p>
            
            <p>El objetivo es la gu&iacute;a de estudio, establece lo que se pretende con el proyecto de investigaci&oacute;n, este debe expresarse con claridad y ser concreto, medible, apropiado y realista; hay que tenerlo presente durante todo el desarrollo.</p>
            
            <p><strong>JUSTIFICACI&Oacute;N</strong></p>
            
            <p>La justificaci&oacute;n indica las motivaciones que impulsan a plantear la investigaci&oacute;n y por qu&eacute; es relevante investigar ese tema. La justificaci&oacute;n indica el para qu&eacute; o por qu&eacute; debe efectuarse la investigaci&oacute;n, se tiene que explicar por qu&eacute; es conveniente llevar a cabo la investigaci&oacute;n y cu&aacute;les son los beneficios que se derivar&aacute;n de ella.</p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
            
            <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
            
            <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>
            
            <p style="text-align:center"><strong>REFERENTES TE&Oacute;RICOS</strong></p>
            
            <p>Se basan en la informaci&oacute;n documental que fundamentan la investigaci&oacute;n. El plantear los referentes te&oacute;ricos se da proceso de inmersi&oacute;n en el conocimiento existente y disponible que debe estar vinculado con nuestro planteamiento del problema.</p>
            
            <p style="text-align:center"><strong>METODOLOG&Iacute;A</strong></p>
            
            <p>La metodolog&iacute;a presenta informaci&oacute;n clara, concisa y concreta de las t&eacute;cnicas o procedimientos utilizados, as&iacute; como las condiciones bajo las cuales se llev&oacute; a cabo el estudio. En este apartado se colocan las fotografias c&oacute;rrespondientes al realizar la investigaci&oacute;n. La metodolog&iacute;a responde el &iquest;C&oacute;mo se realiz&oacute; la investigaci&oacute;n?</p>
            
            <p style="text-align:center"><strong>RESULTADOS</strong></p>
            
            <p>Los resultados son las observaciones que se realizan en todo el proceso de la investigaci&oacute;n, las cuales se pueden presentar con diagramas, cuadros, tablas o gr&aacute;ficas. El an&aacute;lisis debe ser claro y guardar relaci&oacute;n con el planteamiento del problema (problem&aacute;tica, objetivos, preguntas y justificaci&oacute;n). Agregar evidencias de la investigaci&oacute;n (fotografias, diagramas, transcripciones, etc.)</p>
            
            <p style="text-align:center"><strong>CONCLUSIONES</strong></p>
            
            <p>Las conclusiones describen las respuestas a la pregunta de investigaci&oacute;n de acuerdo a los resultados.</p>
            
            <p style="text-align:center"><strong>FUENTES DE CONSULTA</strong></p>
            
            <p>Las fuentes de consulta son los documentos (digitales o fisicos) que se revisaron para obtener la informaci&oacute;n correspondiente, estos deben ser citados en el formato APA.</p>
            
            <p>Ejemplo de un libro:</p>
            
            <p>Mor&aacute;n, G., y Alvarado, D. (2010). M&eacute;todos &nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;investigaci&oacute;n. M&eacute;xico: Pearson.</p>
            
            <p>Ejemplo de un art&iacute;culo cient&iacute;fico:</p>
            
            <p>Navaridas, F., y Jim&eacute;nez, M. (2016). Concepciones de los estudiantes sobre la eficacia de los ambientes de aprendizaje universitarios. Revista&nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;Investigaci&oacute;n Educativa, Vol. 34, N&uacute;m. 2, pp. 503-519.</p>
            
            <p>Cualquier duda u observaci&oacute;n favor de notificar al correo:</p>
            
            <p>proyectos.academicos@uach.edu.mx</p>
            
            <p style="text-align:center"><strong>OBSERVACIONES DE LA ESTRUCTURA DEL ART&Iacute;CULO:</strong></p>
            
            <p>S&oacute;lo la primera hoja es a una columna, todas las dem&aacute;s a dos columnas.</p>
            
            <p>La extensi&oacute;n m&iacute;nima de cada art&iacute;culo ser&aacute; de 6 cuartillas y la extensi&oacute;n m&aacute;xima de 8 cuartillas.</p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
            
            ');
            $table->enum('estatus',[0,1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
