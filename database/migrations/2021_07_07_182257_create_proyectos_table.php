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
            
            <p style="text-align:right">&nbsp;</p>
            
            <p>&nbsp;</p>
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
