<?php
require_once("../models/drivers/conexDB.php");
require_once("../models/entities/report.php");
require_once("../models/entities/categoria.php");

$db = new Database();
$conn = $db->connect();

$reportModel = new Report($conn);
$categoriaModel = new Categoria($conn);
$categorias = $categoriaModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>➕ Registrar gasto</h2>

<form method="POST" action="../controllers/gastosController.php">
    <label>Mes:</label>
    <input type="text" name="month" required><br>

    <label>Año:</label>
    <input type="number" name="year" required><br>

    <label>Categoría:</label>
    <select name="idCategory" required>
        <?php foreach ($categorias as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Valor:</label>
    <input type="number" name="value" step="0.01" min="0.01" required><br><br>

    <input type="submit" value="Registrar">
</form>

<a href="gastos.php">🔙 Volver</a>

</body>
</html>
