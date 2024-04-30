<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Datos del Agente Secreto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"], input[type="password"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    
    session_start();

    
    function validateInput($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nombre = validateInput($_POST['nombre']);
        $agenteID = validateInput($_POST['agenteID']);
        $departamentoID = validateInput($_POST['departamentoID']);
        $numMisiones = validateInput($_POST['numMisiones']);
        $descripcionMision = validateInput($_POST['descripcionMision']);

         $agenteID = password_hash($agenteID, PASSWORD_DEFAULT);
         $departamentoID = password_hash($departamentoID, PASSWORD_DEFAULT);

        $_SESSION['nombre'] = $nombre;
        $_SESSION['agenteID'] = $agenteID;
        $_SESSION['departamentoID'] = $departamentoID;
        $_SESSION['numMisiones'] = $numMisiones;
        $_SESSION['descripcionMision'] = $descripcionMision;

        header("Location: confirmacion.php");
        exit();
    }
    ?>

    <h2>Ingreso de Datos del Agente Secreto</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="agenteID">Agente ID:</label><br>
        <input type="password" id="agenteID" name="agenteID" required><br>

        <label for="departamentoID">Departamento ID:</label><br>
        <input type="password" id="departamentoID" name="departamentoID" required><br>

        <label for="numMisiones">Número de Misiones:</label><br>
        <input type="text" id="numMisiones" name="numMisiones" required><br>

        <label for="descripcionMision">Descripción de la Nueva Misión:</label><br>
        <textarea id="descripcionMision" name="descripcionMision" rows="4" required></textarea><br>

        <input type="submit" value="Enviar Datos">
    </form>
</body>
</html>
