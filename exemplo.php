<!DOCTYPE html> 

<form method="POST">
    Digite um número: <input type="number" name="numero">
    <input type="submit" value="Verificar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = $_POST["numero"];
    if ($n % 2 == 0) {
        echo "<p>O número $n é par.</p>";
    } else {
        echo "<p>O número $n é ímpar.</p>";
    }
}
?>