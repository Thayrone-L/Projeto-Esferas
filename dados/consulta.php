<?php
require_once __DIR__ . '/conecta.php';


$result = "SELECT * FROM contatos";
$resultado = mysqli_query($mysqli, $result);


if (($resultado) and ($resultado->num_rows != 0)) {
    
    while ($row = mysqli_fetch_assoc($resultado)) {

        echo "<tr class='linha'>
        <td class='id'>" . $row['id'] . "</td>
        <td>" . $row['nome'] . "</td>
        <td>" . $row['sobrenome'] . "</td>
        <td>" . $row['telefone'] . "</td>
        <td>" . $row['email'] . "</td>
    </tr>";
    }
    
} else {
    echo "Nenhum usuário encontrado";
}
