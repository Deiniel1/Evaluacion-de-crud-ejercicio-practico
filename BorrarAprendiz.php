<html>
	<head>
		<title>Borrar Registro Aprendiz</title>
	</head>

	<body>
		<font face=helvetica>
		<center>
		<h3> LISTADO DE APRENDICES - BORRAR</center>
		
		<?php
			//llamado a la funcion de conexion
			require_once 'conexion.php';

			//mostrar los registros de la tabla datos
			$registro=mysqli_query($conexion,'select*from estudiante') or die("error".mysqli_error($conexion));
			echo '<table border=1 bgcolor=lightgray width=85% align=center>';
			echo '<tr><th>Id</th>';
			echo '<th>Nombre</th>';
			echo '<th>Apellido</th>';
			echo '<th>Tipo Doc</th>';
			echo '<th>Numero Doc</th>';
			echo '<th>Direccion</th>';
			echo '<th>Foto</th></tr>';
			
			while($reg=mysqli_fetch_array($registro)){
				echo '<tr bgcolor=lightblue><td align=center>'.$reg['ID_APR'].'</td>';
				echo '<td align=center>'.$reg['NOM_APR'].'</td>';
				echo '<td align=center>'.$reg['APE_APR'].'</td>';
				echo '<td align=center>'.$reg['TDO_APR'].'</td>';
				echo '<td align=center>'.$reg['NDO_APR'].'</td>';				
				echo '<td align=center>'.$reg['TEL_APR'].'</td>';
				$ff=$reg['FOT_APR'];
				echo "<td align=center width=10%><img src=\"$ff\" width=100 height=100></img></td></tr>";
			}//cierre while

			echo '</table>';
			mysqli_close($conexion);
		?>
		<br><br>
		<font face=tahoma color=blue>
		<center>
		<form action="RegistroBorrado.php" method="post">
		Ingrese el Codigo del Aprendiz a Borrar:
		<br><br>
		<input type=text name=cod size=5><br><br>
		<input type=submit value="Borrar Registro">
		</form>
		<br><br>
		<center>
		<form action=menu.php>
			<input type=submit value="Ir Menu Principal">
		</form>
	</body>
</html>