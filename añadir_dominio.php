<?php
require_once "pagina_principal.php";
require ("conexion.php");
//require_once 'validar_D.php';
//CABECERA
cabecera("No encuentras el dominio que buscas? Añadelo!", MENU_VOLVER);

/*SI SE DEJA EL FORMULARIO VACIO, SE VOLVERA A MOSTRAR*/
if(!$_POST){
	echo '
<form method="POST"> <!--El formulario utiliza el metodo POST-->
<p>Dominio a insertar <input type="text" name="name"/></p>

';
echo '
</p>
<p>
      <input type="submit" value="Enviar" />
      <input type="reset" value="Borrar" />
</p>
</form>';
}
else{
//Preparamos la comprobación de que el dominio exista en la base de datos
	
	$añade=$_POST["name"];
	$insertar = "INSERT into dominios values('$añade', 'NO')";
	//$nuevo_dominio=$db->query("select dominio from dominios where dominio='$añade'");

	


				if ($añade != NULL) {
				
					if (!preg_match('/.(com|net|org|biz|info|mobi|us|cc|bz|tv|ws|name|co|me|es)(\.[a-z]{1,3})?\z/i', $añade)){
						echo'No has escrito bien el dominio.';
					}			
					else {
						
						$db->query($insertar);
						echo'Dominio insertado con éxito! :)';
					}
									}
				else {
		echo "No has insertado nada! Intentalo otra vez!";
					}
			}
//}
pie("2019-01-28");
?>