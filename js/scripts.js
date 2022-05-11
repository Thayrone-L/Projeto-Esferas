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



    }
    else {
        document.getElementById("email").style.color = "#FF0F0F";
        iniciaModal("modal-cadastrado", "Email inválido!");
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
        iniciaModal("modal-cadastrado", "CEP não encontrado.");

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
            iniciaModal("modal-cadastrado", "Formato de CEP inválido.");

        }
    }
    else {

        limpa_formulário_cep();
    }
};



function cadastra() {

    var vnome = document.getElementById('nome').value;
    var vsobrenome = document.getElementById('sobrenome').value;
    var vcpf = document.getElementById('cpf').value;
    var vemail = document.getElementById('email').value;
    var vtelefone = document.getElementById('telefone').value;
    var vcep = document.getElementById('cep').value;
    var vendereco = document.getElementById('rua').value;
    var vnumero = document.getElementById('numero').value;
    var vcomplemento = document.getElementById('complemento').value;
    var vbairro = document.getElementById('bairro').value;
    var vcidade = document.getElementById('cidade').value;
    var vestado = document.getElementById('uf').value;

    var param = { nome : vnome , sobrenome : vsobrenome , cpf : vcpf , email : vemail , telefone : vtelefone , cep : vcep , endereco : vendereco , numero : vnumero , complemento : vcomplemento , bairro : vbairro , cidade : vcidade , estado : vestado };
    console.log(param);
    if(check_form()){
    $.get("dados/cadastra.php", param).done(function(data) {
        iniciaModal("modal-cadastrado", data);
    });
    }
}

function atualiza() {
    var vid = document.getElementById('id').value;
    var vnome = document.getElementById('nome').value;
    var vsobrenome = document.getElementById('sobrenome').value;
    var vcpf = document.getElementById('cpf').value;
    var vemail = document.getElementById('email').value;
    var vtelefone = document.getElementById('telefone').value;
    var vcep = document.getElementById('cep').value;
    var vendereco = document.getElementById('rua').value;
    var vnumero = document.getElementById('numero').value;
    var vcomplemento = document.getElementById('complemento').value;
    var vbairro = document.getElementById('bairro').value;
    var vcidade = document.getElementById('cidade').value;
    var vestado = document.getElementById('uf').value;

    var param = { id:vid, nome : vnome , sobrenome : vsobrenome , cpf : vcpf , email : vemail , telefone : vtelefone , cep : vcep , endereco : vendereco , numero : vnumero , complemento : vcomplemento , bairro : vbairro , cidade : vcidade , estado : vestado };
    console.log(param);
    
    if (check_form()) {
        
        $.get("dados/atualiza.php", param).done(function (data) {
        console.log(data);
        document.getElementById('modal-alteracao').classList.remove('mostrar');
        iniciaModalResposta("modal-resposta", data);
    });
    }
}




function check_form(){
    var inputs = document.getElementsByClassName('required');
  var len = inputs.length;
  var valid = true;
  for(var i=0; i < len; i++){
     if (!inputs[i].value){ valid = false; }
  }
  if (!valid){
     iniciaModal("modal-cadastrado",'Por favor preencha todos os campos.');
    return false;
  } else { return true; }
}

function iniciaModal(modalID, data) {



    const modal = document.getElementById(modalID);
    if (modal) {

        modal.classList.add('mostrar');
        document.getElementById('mensagem').innerText = data;
        modal.addEventListener('click', (e) => {
            if (e.target.id == modalID || e.target.className == 'fechar') {
                modal.classList.remove('mostrar');
                localStorage.fechaModal = modalID;
            }
        });
    }


}

function iniciaModalResposta(modalID, data) {



    const modal = document.getElementById(modalID);
    if (modal) {

        modal.classList.add('mostrar');
        document.getElementById('mensagem-Resposta').innerText = data;
        modal.addEventListener('click', (e) => {
            if (e.target.id == modalID || e.target.id == 'fechar') {
                modal.classList.remove('mostrar');
                document.location.reload(true);
                localStorage.fechaModal = modalID;
            }
        });
    }
}

function testaCPF() {
    var Soma;
    var Resto;
    Soma = 0;
    strCPF = document.getElementById('cpf').value;
    nStrCPF = strCPF.normalize('NFD').replace(/([\u0300-\u036f]|[^0-9a-zA-Z\s])/g, '');
    console.log(nStrCPF);
    if (nStrCPF == "00000000000") {
        iniciaModal("modal-cadastrado", "CPF inválido!");
        document.getElementById("cpf").focus();

    }

    for (i = 1; i <= 9; i++) {
        Soma = Soma + parseInt(nStrCPF.substring(i - 1, i)) * (11 - i);
    }
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) {
        Resto = 0;
    }
    if (Resto != parseInt(nStrCPF.substring(9, 10))) {
        iniciaModal("modal-cadastrado", "CPF inválido!");
        document.getElementById("cpf").focus();
    }
    Soma = 0;
    for (i = 1; i <= 10; i++) {
        Soma = Soma + parseInt(nStrCPF.substring(i - 1, i)) * (12 - i);
    }
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) {
        Resto = 0;
    }
    if (Resto != parseInt(nStrCPF.substring(10, 11))) {
        iniciaModal("modal-cadastrado", "CPF inválido!");
        document.getElementById("cpf").focus();
    }

}