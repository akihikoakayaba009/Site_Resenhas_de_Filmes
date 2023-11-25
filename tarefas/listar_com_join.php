<?php

include '../conexao.php'; 

$sql = "SELECT filmes.id AS id_filme,
                filmes.titulo, 
                descricao,
                filmes.ano_de_lancamento,
                nota,
               diretores.id AS id_diretor, 
               diretores.nome AS nome_diretor,
               elenco.id AS id_elenco, 
               elenco.nome AS nome_elenco   

         FROM  filmes
                INNER JOIN diretores 
                ON filmes.id_diretor = diretores.id
                INNER JOIN elenco 
                ON filmes.id_elenco = elenco.id";
        
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID do Filme</th>
            <th>Título</th>
            <th>descricao</th>
            <th>Ano de Lançamento</th>
            <th>nota</th>
            <th>ID do Diretor</th>
            <th>Nome do Diretor</th>
            <th>ID do Elenco</th>
            <th>Nome do Elenco</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["id_filme"] . "</td>
            <td>" . $row["titulo"] . "</td>
            <td>" . $row["descricao"] . "</td>
            <td>" . $row["ano_de_lancamento"] . "</td>
            <td>" . $row["nota"] . "</td>
            <td>" . $row["id_diretor"] . "</td>
            <td>" . $row["nome_diretor"] . "</td>
            <td>" . $row["id_elenco"] . "</td>
            <td>" . $row["nome_elenco"] . "</td>
            <td><a href='editar_Resenha_Filme.php?id=" . $row["id"] . "'>Editar</a> | 
            <a href='deletar_resenha.php?id=" . $row["id"] . "'>Deletar</a></td>";
            echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

$conexao->close();

?>
