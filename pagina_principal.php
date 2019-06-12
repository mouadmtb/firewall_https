<?php
define("MENU_PRINCIPAL", "menuPrincipal");
define("Eliminar_Regla", "menuborrado");
define("Añadir_regla", "menuañadir");
define("dominios_bloqueados", "menubloq");
define("dominios_no_bloqueados", "menuno");
define("añadir_dom", "menu_añadir");
 // Menú principal
define("MENU_VOLVER",    "menuVolver");    // Menú Volver a inicio

function cabecera($texto, $menu)
{
    print "<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <title>Firewall para HTTPS - $texto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href=\"mclibre_php_soluciones_proyectos_comun.css\" rel=\"stylesheet\" type=\"text/css\" />
  </head>
<body>
<h1>Firewall HTTPS - $texto</h1>
<div id=\"menu\">
  <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
           print "  <li><a href=\"tabla_dominios.php\">Ver dominios disponibles</a></li>\n";
		    print "  <li><a href=\"formulario_borrado.php\">Eliminar Regla</a></li>\n";
		 print "  <li><a href=\"formulario_firewall.php\">Añadir regla</a></li>\n";
		 print "  <li><a href=\"tabla_dominios_bloqueados.php\">dominios bloqueados</a></li>\n";
		 print "  <li><a href=\"tabla_dominios_bloqueados_no.php\">dominios sin bloquear</a></li>\n";
		 print "  <li><a href=\"añadir_dominio.php\">Añadir dominio</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "    <li><a href=\"index.php\">ATRÁS</a></li>\n";
    } 
    else {
        print "    <li>Error en la selección de menú</li>\n";
    }
    print "  </ul>
</div>

<div id=\"contenido\">\n";
}

/*
   $fecha de última modificación de la página que realiza la llamada
   aaaa-mm-dd
*/
function pie($fecha)
{
print "</div>\n";
  $cadenaFecha = formatearFecha($fecha);
  echo <<< FINPIE
    <footer>
      <p class="ultmod">
        Última modificación de esta página:
        <time datetime="$fecha">$cadenaFecha</time> (Mouad Taiebi Boumohcine)</p>
    </footer>
  </body>
</html>
FINPIE;
}
/*
   $fecha en formato "aaaa-mm-dd" se pasa a "dd de mes de aaaa"

   Configuración de idioma, para que el mes salga en español
   http://php.net/manual/es/function.setlocale.php

   strftime — Formatea una fecha/hora local según una configuración local
   http://php.net/manual/es/function.strftime.php

   strtotime — Convierte una descripción de fecha/hora textual en Inglés a una fecha Unix
   http://php.net/manual/es/function.strtotime.php
*/

function formatearFecha($fecha)
{
  define('formatoFecha','%d de %B de %Y'); 
  setlocale(LC_ALL,'es_ES.UTF-8');
  return strftime(formatoFecha, strtotime($fecha));
}
/*
function pie()
{
    print '</div>

<div id="pie">
<address>
  Este programa utiliza código del curso "Páginas web con PHP" disponible en <a
  href="http://www.mclibre.org/">http://www.mclibre.org</a><br />
  cuyo autor es Bartolomé Sintes Marco<br />
  Última modificación de este programa: 12 de enero de 2015 (Rafael García Cabrera)
</address>
<p class="licencia">El programa PHP que genera esta página está bajo
<a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o
posterior</a>.</p>
</div>
</body>
</html>';
}
*/
?>
