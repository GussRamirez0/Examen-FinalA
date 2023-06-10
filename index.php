<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=Final_0907_23_8082', 'root', '',$pdo_options);


    if(isset($_POST['accion']) &&
    $_POST['accion'] == "crear"){   
        $insert = $conexion->prepare("INSERT INTO alumno (carnet, nombre, dpi, direccion) VALUES (:carnet, :nombre, :dpi, :direccion)");
        $insert->bindValue('carnet', $_POST['carnet']);
        $insert->bindValue('nombre', $_POST['nombre']);
        $insert->bindValue('dpi', $_POST['dpi']);
        $insert->bindValue('direccion', $_POST['direccion']);

        $insert->execute();
    }    

    $select = $conexion->query("SELECT carnet, nombre, grado, telefono FROM alumno");
    ?>

    <marquee direction="up"><h1>Luis Gustavo Ramirez Berganza<br></h1></marquee>
<div class="contenedor">
<table border="1">
    <thead> 
        <tr>    
            <th>Carnet</th>
            <th>Nombre</th>
            <th>Grado</th>
            <th>Telefono</th>
        </tr>
    </thead>
    <tbody?>    
        <?php foreach($select->fetchAll() as $alumno) { ?>
            <tr>    
                <td> <?php echo $alumno ["carnet"] ?> </td>
                <td> <?php echo $alumno ["nombre"] ?> </td>
                <td> <?php echo $alumno ["grado"] ?> </td>
                <td> <?php echo $alumno ["telefono"] ?> </td>
            </tr>
        <?php } ?>
    </tbody>    
</table>
        </div>
</body>
</html>