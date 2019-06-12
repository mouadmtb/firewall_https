<?php
/**
 * ZODIAC SIGNS - mostrar_tabla_zodiacsigns.php
 *
 * IES Virgen del Carmen de Jaén
 * Implantación de Aplicaciones Web 2º ASIR
 *
 * Basado en el código de:
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-27
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "pagina_principal.php";

cabecera("Ver dominios sin bloquear", MENU_VOLVER);


require("conexion.php");
 $consulta="SELECT * FROM dominios where activo= 'NO'";
?>
</head>
  <body>
    <table border="2" cellpadding="2" cellspacing="0">
    <tr><th colspan="4">NO bloqueados</th></tr>
<?php
foreach ($db->query($consulta) as $fila){
	$url=$fila['dominio'];
	$activo=$fila['activo'];
?>
<tr>
	<td><?php echo ($url);?></td>
	<td><?php echo ($activo);?></td>
</tr>

<?php

}
echo "la tabla se ha creado existosamente";
?>
 	</table>
  </body>
</html>
<?php
pie("2017-01-09");
?>
