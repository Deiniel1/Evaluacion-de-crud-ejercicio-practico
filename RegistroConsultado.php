<html>
	<head>
		<title>Registro Aprendiz Borrado</title>
	</head>

	<body>
		<font face=helvetica>
		<center>
		
		<?php
			//llamado a la funcion de conexion
			require_once 'conexion.php';

			//mostrar los registros de la tabla datos de acuerdo al control
			$registro = mysqli_query($conexion,"select * from estudiante where id_apr = '$_REQUEST[cod]'") or die("error".mysqli_error($conexion));
		
			if($reg=mysqli_fetch_array($registro)){

				echo '<br><br><br><center><font face=tahoma><table width=30% border=1 cellspacing=0><tr><th>';
				echo 'Ficha Tecnica del Aprendiz<br><br>';
				echo 'Id: '			.$reg['ID_APR']. '<br>';
				echo 'Nombre: '		.$reg['NOM_APR'].'<br>';
				echo 'Apellido: '	.$reg['APE_APR'].'<br>';
				echo 'Tip Doc: '	.$reg['TDO_APR'].'<br>';
				echo 'Documento: '	.$reg['NDO_APR'].'<br>';
				echo 'Teléfono: '	.$reg['TEL_APR'].'<br>';
				
				$ff=$reg['FOT_APR'];
				echo "<br><br><img src=\"$ff\" width=200 height=200></img>";
				echo '</th></tr></table>';
			}
			else{

				echo '<center><h3><font color=red>El registro del aprendiz No Existe';
			}
			mysqli_close($conexion);
		?>
		<br>
		<center>
		<form action=MenuPrincipal.html>
			<input type=submit value="Ir Menu Principal">
		</form>
		<form action=ConsultarAprendiz.html>
			<input type=submit value="Consultar Otro Aprendiz">
		</form>
	</body>
</html>