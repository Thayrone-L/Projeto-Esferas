<?php
require_once __DIR__ . '/conecta.php';

//consultar no banco de dados
$result = "SELECT * FROM contatos";
$resultado = mysqli_query($mysqli, $result);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado) AND ($resultado->num_rows != 0)){
    echo     "<table>
    <tr>
        <td class='nome'>Nome</td>
        <td class='sobrenome'>Sobrenome</td>
        <td class='telefone'>Telefone</td>
    </tr>";
	while($row = mysqli_fetch_assoc($resultado)){
    
    echo "<tr  class='even'>
        <td class='nome'>".$row['nome']."</td>
        <td class='sobrenome'>".$row['sobrenome']."</td>
        <td class='telefone'>".$row['telefone']."</td>
    </tr>";

	}
    echo "</table>";

}else{
	echo "Nenhum usuário encontrado";
}