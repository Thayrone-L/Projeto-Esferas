<?php
require_once __DIR__ . '/conecta.php';

//realiza a consulta de um id específico no banco e retorna os dados como valores para o modal de visualização de cadastro do listaCadastros.php

$id = isset($_GET["id"]) ? $_GET["id"] : "0";
$result = "SELECT * FROM contatos WHERE id= $id" ;
$resultado = mysqli_query($mysqli, $result);


if (($resultado) and ($resultado->num_rows != 0)) {
    
   $row = mysqli_fetch_assoc($resultado);

        echo " <form>
        <input type='input' id='id' value=". $row['id'] ."></input>
        <div class='row'>
            <div class='form__group nome'>
                <input type='input' class='form__field required' placeholder='Nome' name='nome' id='nome' required value=". $row['nome'] . "></input>
                <label for='nome' class='form__label'>Nome</label>
            </div>
            <div class='form__group sobrenome'>
            <input type='input' class='form__field required' placeholder='Sobrenome' name='sobrenome' id='sobrenome'
                required value= ". $row['sobrenome'] ."></input>
                <label for='sobrenome' class='form__label'>Sobrenome</label>
            </div>
        </div>
        <div class='row'>
                    <div class='form__group cpf'>
                        <input type='input' class='form__field required' placeholder='CPF' name='cpf' id='cpf' required
                            onblur='testaCPF()' value=".$row['cpf']."></input>
                            <label for='cpf' class='form__label'>CPF</label>
                        </div>
                    </div>
                    <div class='row' id='linhaEmail'>
                        <div id='elementoEmail'>
                            <div class='form__group email'>
                                <input type='input' class='form__field required' placeholder='E-mail' name='email' id='email'
                                    required onblur='validacaoEmail()'value=".$row['email']."></input>
                                <label for='email' class='form__label'>E-mail</label>
                            </div>
    
                        </div>
                    </div>
                    <div class='row ' id='linhaTelefone'>
                        <div id='elementoTelefone'>
                            <div class='form__group telefone'>
                                <input type='input' class='form__field required' placeholder='Telefone' name='telefone' id='telefone'
                                    required pattern='\([0-9]{2}\)[\s][0-9]{4,5}-[0-9]{4}' value='".$row['telefone']."'></input>
    
                                <label for='telefone' class='form__label'>Telefone</label>
                            </div>
    
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group endereco'>
                            <input type='input' class='form__field required' placeholder='Endereço' name='endereco' id='rua'
                                required value=" . $row['endereco'] . " ></input>
                            <label for='rua' class='form__label'>Endereço</label>
                        </div>
                        <div class='form__group numero'>
                            <input type='input' class='form__field required' placeholder='Número' name='numero' id='numero'
                                required value=" . $row['numero'] . "> </input>
                            <label for='numero' class='form__label'>Número</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group complemento'>
                            <input type='input' class='form__field' placeholder='Complemento' name='complemento'
                                id='complemento'value=" . $row['complemento'] . "></input>
                            <label for='complemento' class='form__label'>Complemento</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group bairro'>
                            <input type='input' class='form__field required' placeholder='Bairro' name='bairro' id='bairro'
                                required value=" . $row['bairro'] . "> </input>
                            <label for='bairro' class='form__label'>Bairro</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group cidade'>
                            <input type='input' class='form__field required' placeholder='Cidade' name='cidade' id='cidade'
                                required value=" . $row['cidade'] . "> </input>
                            <label for='cidade' class='form__label'>Cidade</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group estado'>
                            <input type='input' class='form__field required' placeholder='Estado' name='estado' id='uf' required value= " . $row['estado'] . "></input>
                            <label for='uf' class='form__label'>Estado</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form__group cep'>
                            <input type='input' class='form__field required' placeholder='CEP' name='cep' id='cep' required
                                onblur='pesquisacep(this.value);' value=" . $row['cep'] . "> </input>
                            <label for='cep' class='form__label'>CEP</label>
                        </div>
                    </div>
    
                    
    
                </form>";
    }
    


 
                     
                