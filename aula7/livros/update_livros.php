<?php
<?php
include '../config/db.php';

$filtro = "";
if (!empty($_GET['genero'])) {
    $filtro .= " AND genero = '" . $conn->real_escape_string($_GET['genero']) . "'";
}
if (!empty($_GET['autor'])) {
    $filtro .= " AND id_autor = " . intval($_GET['autor']);
}
if (!empty($_GET['ano'])) {
    $filtro .= " AND ano_publicacao = " . intval($_GET['ano']);
}

$sql = "SELECT livros.*, autores.nome AS nome_autor FROM livros 
        LEFT JOIN autores ON livros.id_autor = autores.id_autor
        WHERE 1=1 $filtro";
$result = $conn->query($sql);
?>

<h2>Lista de Livros</h2>
<form method="get">
    Gênero: <input type="text" name="genero">
    Autor (ID): <input type="number" name="autor">
    Ano: <input type="number" name="ano">
    <button type="submit">Filtrar</button>
</form>
<a href="create_livros.php">Novo Livro</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Gênero</th>
        <th>Ano</th>
        <th>Autor</th>
        <th>Ações</th>
    </tr>
    <?php while ($livro = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $livro['id_livro'] ?></td>
        <td><?= htmlspecialchars($livro['titulo']) ?></td>
        <td><?= htmlspecialchars($livro['genero']) ?></td>
        <td><?= $livro['ano_publicacao'] ?></td>
        <td><?= htmlspecialchars($livro['nome_autor']) ?></td>
        <td>
            <a href="update_livros.php?id=<?= $livro['id_livro'] ?>">Editar</a> | 
            <a href="delete_livros.php?id=<?= $livro['id_livro'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
