<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: gray;
            padding: 20px;
        }
        
        h2 {
            text-align: center;
            color:black;
        }
        
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color:white;
            padding: 20px;
            border-radius: 8px;
        }
        
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        input{
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid gray;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        a{
            width: 100%;
            background-color: green  ;
            color:white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            border-bottom:none;
        }
        a:hover{
            background-color:gray;
        }
        
        input:hover {
            background-color: yellow;
        }
        
        fieldset {
            border: 1px solid gray;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        legend {
            font-weight: bold;
            padding: 8px;
            border: 1px solid gray;
            border-radius: 8px;
            align: center;
        }
        
        </style>
</head>
<body>
    <div>
        <?php if(empty($datos)){ ?>
<form action="<?= base_url("contactos/adicionar");?>" method="POST">
<fieldset>
    <legend>EDITAR DATOS</legend>
    <label for="">Nombre:</label>
    <input type="text" id="nombre" name="nombre" ><br><br>
    <label for="">Telefono:</label>
    <input type="number" id="telefono"name="telefono" ><br><br>
    <label for="">E-mail:</label>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Actualizar" id="editar" name="editar">
</fieldset>
</form>
<?php
}else{
    $i=1; foreach($datos as $fila){

        ?>
        <form action="" method="POST">
        <fieldset>
            <legend>EDITAR DATOS</legend>
            <label for="">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $fila->nombre?>"><br><br>
            <label for="">Telefono:</label>
            <input type="number" id="telefono"name="telefono" value="<?= $fila->telefono?>"><br><br>
            <label for="">E-mail:</label>
            <input type="email" id="email" name="email" value="<?= $fila->email?>"><br><br>
            <input type="submit" value="Actualizar" id="editar" name="editar">
        </fieldset>
        </form>
        <?php } } ?>
    </div>
    
</body>
</html>