<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
</head>
<body>
    <div><form action="<?= base_url("contactos/adicionar");?>" method="POST" enctype="multipart/form-data">
        <fieldset>
            <h1 class="h3 d-inline align-middle">Añadir nuevo registro</h1>
            <div class="mb-3">
				<h1 class="h3 d-inline align-middle">Forms</h1>
			</div>
            <div class="card">
				<div class="card-header">
						<h3 class="card-title mb-0">Nombre</h3>
				</div>
				<div class="card-body">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese nombre">
				</div>
                <div class="card-header">
						<h3 class="card-title mb-0">Telefono</h3>
				</div>
				<div class="card-body">
                    <input type="number" id="telefono"name="telefono" class="form-control" placeholder="Ingrese telefono"><br>
				</div>
                <div class="card-header">
						<h3 class="card-title mb-0">Email</h3>
				</div>
				<div class="card-body">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese email"><br>
				</div>
                <div class="card-body">
                    <input type="file" id="inputAddres" name="upload" class="form-control" accept=".jpg , .png"><br>
				</div>
			</div>
            <center><input type="submit" value="GUARDAR" id="GUARDAR"  class="btn btn-success"></center>
        </fieldset>
    </div></form>
</body>
</html>