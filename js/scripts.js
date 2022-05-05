$(document).ready(function () {
    $('#telefone').mask('(99) 99999-9999');
    $('#cep').mask('99999-999');
    $('#cpf').mask('999.999.999-99');
});

function validacaoEmail() {
    field = document.getElementById('email');
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@") + 1, field.value.length);
    if ((usuario.length >= 1) &&
        (dominio.length >= 3) &&
        (usuario.search("@") == -1) &&
        (dominio.search("@") == -1) &&
        (usuario.search(" ") == -1) &&
        (dominio.search(" ") == -1) &&
        (dominio.search(".") != -1) &&
        (dominio.indexOf(".") >= 1) &&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
        document.getElementById("email").style.color = "#000";
        mostra("maisEmail");


    }
    else {
        document.getElementById("email").style.color = "#FF0F0F";
        alert("E-mail invalido");
    }
}

function limpa_formulário_cep() {
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");

}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {

        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);

    }
    else {

        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {


    var cep = valor.replace(/\D/g, '');


    if (cep != "") {


        var validacep = /^[0-9]{8}$/;


        if (validacep.test(cep)) {


            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";



            var script = document.createElement('script');


            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';


            document.body.appendChild(script);

        }
        else {

            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    }
    else {

        limpa_formulário_cep();
    }
};

/*

function mostra(id) {
    document.getElementById(id).style.visibility = "visible";
}

function clona(linha,id) {
    var elementoOriginal = document.getElementById(id);
    var elementoClone = elementoOriginal.cloneNode(true);
    elementoClone.firstChild.value = 0;
    // inserindo o elemento na paǵina
    document.getElementById(linha).appendChild(elementoClone);
}

*/