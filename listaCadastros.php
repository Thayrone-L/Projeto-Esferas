<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/inputs.css" />
    <link rel="stylesheet" href="css/estilomodal.css" />
    <link rel="stylesheet" href="css/estilotabela.css" />
    <title>Projeto Esferas</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>

<div class="container">
    <div class="painelblue blue">
        <h2>Lista de contatos</h2>
        <a href="index.html"><img src="css/seta.png" class="setablue"></a>
        <table id='minhaTabela'>
            <thead>
                <tr>
                    <th class='id'>ID</th>
                    <th class='nome'>Nome</th>
                    <th class='sobrenome'>Sobrenome</th>
                    <th class='telefone'>Telefone</th>
                    <th class='email'>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "dados/consulta.php";

                if (($resultado) and ($resultado->num_rows != 0)) {

                    while ($row = mysqli_fetch_assoc($resultado)) {

                ?><tr class='linha'>
                            <td class='id'> <?php "" . $row['id'] . "" ?> </td>
                            <td> <?php "" . $row['nome'] . "" ?> </td>
                            <td> <?php "" . $row['sobrenome'] . "" ?> </td>
                            <td> <?php "" . $row['telefone'] . "" ?> </td>
                            <td> <?php "" . $row['email'] . "" ?> </td>
                        </tr>
                <?php    }
                } else {
                    echo "Nenhum usuário encontrado";
                }
                ?>
            </tbody>
        </table>
        <button class="buttonAtualiza" id="visualizarDados">Visualizar Dados</button>
        <button class="buttonExclui" id="excluirDados">Excluir cadastro</button>
    </div>
</div>




<div id="modal-alteracao" class="modal-container">
    <div class="modalblue">
        <button class="fecha fecharblue">x</button>
        <h3 id="mensagem" class="subtitulo">Cadastre-se na Newsletter</h3>
        <button class='button' type='button' onclick='atualiza()'>Atualizar</button>
        
    </div>
</div>

<div id="modal-resposta" class="modal-container">
    <div class="modalresposta">
        <button id="fechar"class="fecharblue">x</button>
        <h3 id="mensagem-Resposta" class="subtitulo">Cadastre-se na Newsletter</h3>
    </div>
</div>

<script src="js/scrTabela.js"></script>
<script src="js/scripts.js"></script>
</body>

</html>