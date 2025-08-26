<?php
include '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano_publicacao'];
    $id_autor = $_POST['id_autor'];

    $anoAtual = date('Y');
    if ($ano < 1500 || $ano > $anoAtual) {
        echo "Ano inválido!";
    } else {
        $sql = "INSERT INTO livros (titulo, genero, ano_publicacao, id_autor) VALUES ('$titulo', '$genero', $ano, $id_autor)";
        if ($conn->query($sql)) {
            echo "Livro cadastrado! <a href='read_livros.php'>Voltar</a>";
            exit;
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}

$autores = $conn->query("SELECT * FROM autores");
?>
<h2>Novo Livro</h2>
<form method="post">
    Título: <input type="text" name="titulo" required><br>
    Gênero: <input type="text" name="genero"><br>
    Ano de Publicação: <input type="number" name="ano_publicacao" required><br>
    Autor:
    <select name="id_autor" required>
        <?php while($a = $autores->fetch_assoc()): ?>
            <option value="<?= $a['id_autor'] ?>"><?= htmlspecialchars($a['nome']) ?></option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Salvar</button>
</form>