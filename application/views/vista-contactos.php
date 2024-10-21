
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>VISTA-CONTROLADOR</title>
</head>
<body>

	
<div class="row">		

		<div class="card flex-fill">
			<div class="card-header">
				<h5 class="card-title mb-0">Lista de contactos</h5>
				<a type="button" class="btn btn-warning" href="<?= base_url('reportes/imprimir');?>" target="_blank">IMPRIMIR</a>
				<table class="table table-hover my-0">
					<tr id="tr1">
						<td id="tr1">Nro</td>
						<td id="tr2">nombre</td>
						<td id="tr3">telefono</td>
						<td id="tr4">email</td>
						<td></td>
					</tr>
					<?php $i=1; foreach($ver as $fila){?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= ($fila->nombre)?></td>
						<td><?= ($fila->telefono)?></td>
						<td><?= ($fila->email)?></td>
						<td><a id="a1" href="<?= base_url('contactos/eliminar/'.$fila->id);?>" class="btn btn-danger">ELIMINAR</a></td>
						<td><a id="a2" href="<?= base_url('contactos/editar/'.$fila->id);?>" class="btn btn-warning">EDITAR</a></td>
						<td><a id="a2" href="<?= base_url('reportes/imprimir_user/'.$fila->id);?>"  class="btn btn-primary" target="_blank">IMPRIMIR</a></td>
					</tr>	
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
