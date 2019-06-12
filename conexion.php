<?php
//function conexion_d(){
try {
      $user = "root";
      $pass = "";
      $dbname = "dominios_bloquear";
      $db = new PDO("mysql:host=localhost; dbname=$dbname", $user, $pass);
      
	  /* $db = null;
      print "<p>... y se cierra la conexi&oacute;n<p>";
	   * 
	   */
 } catch (PDOException $e) {
        print "<p>Error: No se pudo conectar con la BBDD $dbname.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
      }
//}
?>