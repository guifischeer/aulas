<?php
include '../config/db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM livros WHERE id_livro=$id");
}
header("Location: read_livros.php");
exit;