<?php
require_once "pagina_principal.php";
require ("conexion.php");
//CABECERA
cabecera("Qué regla vas a eliminar?", MENU_VOLVER);
/*SI SE DEJA EL FORMULARIO VACIO, SE VOLVERA A MOSTRAR*/
if(!$_POST){
	echo '
<form method="POST"> <!--El formulario utiliza el metodo POST-->
<p>Dominios:';
        echo '<select name="domain_d">';
		
		
		    foreach($db->query("select * from dominios where activo = 'SI'") as $fila) {
      echo '<option value="'.$fila['dominio'].'">'.$fila['dominio'].'<option/>';
    }
echo '</select>
<table>
          <tr>
            <td>Escriba la ip de la regla a eliminar:</td>
            <td><input type="text" name="ip" size="15" maxlength="15" /> </td>
          </tr>
      </table>';


echo '
</p>
<p>
      <input type="submit" value="Enviar" />
      <input type="reset" value="Borrar" />
</p>
</form>';
// $db = conexion_d();
}
else{
	
$d=$_POST["domain_d"];
$ip = $_POST["ip"];
$c = exec("sudo iptables -L | grep $d | grep $ip") ;
	if ($d != NULL) {
		if((filter_var($ip, FILTER_VALIDATE_IP)) && ($c != null))
		{
	exec("sudo iptables -D FORWARD -p tcp -s $ip --dport 443 -m string --string $d --algo bm -j REJECT");
	 exec("sudo iptables -D FORWARD -p tcp -s $ip --dport 843 -m string --string $d --algo bm -j REJECT");
	$db->query("UPDATE dominios set activo = 'NO' WHERE dominio = '$d'");
	echo "Regla iptables eliminada correctamente!";
		}
		else {
			echo "Error: No existe la regla con la ip buscada";
		}	
	
	}
	else {
		echo "Error al borrar o leer regla de iptables";
	}
}

pie("2019-01-28");
?>
