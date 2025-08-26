<?php
include '../config/db.php';

$sql = "SELECT livros.*, autores.nome AS nome_autor FROM livros LEFT JOIN autores ON livros.id_autor = autores.id_autor";
$result = $conn->query($sql);
?>
<h2>Livros</h2>
<a href="create_livros.php">Novo Livro</a>
<table border="1">
<tr>
    <th>ID</th><th>Título</th><th>Gênero</th><th>Ano</th><th>Autor</th><th>Ações</th>
</tr>
<?php while($l = $result->fetch_assoc()): ?>
<tr>
    <td><?= $l['id_livro'] ?></td>
    <td><?= htmlspecialchars($l['titulo']) ?></td>
    <td><?= htmlspecialchars($l['genero']) ?></td>
    <td><?= $l['ano_publicacao'] ?></td>
    <td><?= htmlspecialchars($l['nome_autor']) ?></td>
    <td>
        <a href="update_livros.php?id=<?= $l['id_livro'] ?>">Editar</a> | 
        <a href="delete_livros.php?id=<?= $l['id_livro'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>