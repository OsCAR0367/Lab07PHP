<?php
session_start();

if(isset($_SESSION['nombre']) && isset($_SESSION['agenteID']) && isset($_SESSION['departamentoID']) && isset($_SESSION['numMisiones']) && isset($_SESSION['descripcionMision'])) {
    $nombre = $_SESSION['nombre'];
    $agenteID = $_SESSION['agenteID'];
    $departamentoID = $_SESSION['departamentoID'];
    $numMisiones = $_SESSION['numMisiones'];
    $descripcionMision = $_SESSION['descripcionMision'];

    session_unset();
    session_destroy();
} else {
    header("Location: ejer01.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Datos del Agente Secreto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        label {
            font-weight: bold;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirmación de Datos del Agente Secreto</h2>
        <p>Los siguientes datos del agente secreto han sido recibidos y almacenados de forma segura:</p>
        <label for="nombre">Nombre:</label>
        <p><?php echo $nombre; ?></p>
        <label for="agenteID">Agente ID:</label>
        <p><?php echo $agenteID; ?></p>
        <label for="departamentoID">Departamento ID:</label>
        <p><?php echo $departamentoID; ?></p>
        <label for="numMisiones">Número de Misiones:</label>
        <p><?php echo $numMisiones; ?></p>
        <label for="descripcionMision">Descripción de la Nueva Misión:</label>
        <p><?php echo $descripcionMision; ?></p>
        <p>¡Los datos han sido recibidos con éxito!</p>
    </div>
</body>
</html>
