<?php
require_once "pagina_principal.php";
require ("conexion.php");
//CABECERA
cabecera("Que vas a bloquear?", MENU_VOLVER);

/*SI SE DEJA EL FORMULARIO VACIO, SE VOLVERA A MOSTRAR*/
if(!$_POST){
	echo '
<form method="POST"> <!--El formulario utiliza el metodo POST-->
<p>Dominios:';
        echo '<select name="domain">';
		
		
		    foreach($db->query("select * from dominios WHERE activo = 'NO'") as $fila) {
      echo '<option value="'.$fila['dominio'].'">'.$fila['dominio'].'<option/>';
    }
echo '</select>
<table>
          <tr>
            <td>Escriba la ip:</td>
            <td><input type="text" name="ip" size="15" maxlength="15" /> </td>
          </tr>
      </table>

';
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
	
$d=$_POST["domain"];
$ip=$_POST["ip"];
//echo $d;
	if ($d != NULL) {
		if(filter_var($ip, FILTER_VALIDATE_IP))
		{
   			exec("sudo iptables -A FORWARD -p tcp -s $ip --dport 443 -m string --string $d --algo bm -j REJECT");
			exec("sudo iptables -A FORWARD -p tcp -s $ip --dport 843 -m string --string $d --algo bm -j REJECT");
			echo exec("sudo iptables -L | grep $d ") ;
			$db->query("UPDATE dominios set activo = 'SI' WHERE dominio = '$d'");;
		}
		else
		{
   			echo 'IP no es valida';
		}
	
	}
	else {
		echo "Error al insertar o leer regla de iptables";
	}
}
pie("2019-01-28");
?>