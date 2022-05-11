var tabela = document.getElementById("minhaTabela");
var linhas = tabela.getElementsByClassName("linha");
$(document).ready(function () {
    $('#minhaTabela').DataTable({
        language: {
            processing: "Processando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ itens",
            info: "Exibindo de _START_ a _END_ do total de: _TOTAL_ elementos",
            infoEmpty: "Exibindo de 0 a 0 do total de: 0 elementos",
            infoFiltered: "(filtrado de _MAX_ itens no total)",
            infoPostFix: "",
            loadingRecords: "Carregando...",
            zeroRecords: "Nenhum item para exibir",
            emptyTable: "Nenhum dado disponível na tabela",
            paginate: {
                first: "Primeiro",
                previous: "Anterior",
                next: "Próximo",
                last: "Último"
            },
            aria: {
                sortAscending: ": habilita a ordenação da coluna em ordem crescente",
                sortDescending: ": habilita a ordenação da coluna em ordem decrescente"
            }
        }
    });
    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];
        linha.addEventListener("click", function () {

            console.log(linha);
            selLinha(this, false);
        });
    }

});


function selLinha(linha, multiplos) {
    if (!multiplos) {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        for (var i = 0; i < linhas.length; i++) {
            var linha_ = linhas[i];
            linha_.classList.remove("selecionado");
        }
    }
    linha.classList.toggle("selecionado");
}


var btnVisualizar = document.getElementById("visualizarDados");

btnVisualizar.addEventListener("click", function () {
    var selecionados = tabela.getElementsByClassName("selecionado");

    if (selecionados.length < 1) {
        alert("Selecione pelo menos uma linha");
        return false;
    }

    var idPassado = "";

    for (var i = 0; i < selecionados.length; i++) {
        var selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        idPassado = selecionado[0].innerHTML;
    }

    $.get("dados/consultaid.php", { id: idPassado }).done(function (data) {

        iniciaModalTabela("modal-alteracao", data);
    });

});

var btnExcluir = document.getElementById("excluirDados");

btnExcluir.addEventListener("click", function () {
    var selecionados = tabela.getElementsByClassName("selecionado");

    if (selecionados.length < 1) {
        alert("Selecione pelo menos uma linha");
        return false;
    }

    var idPassado = "";

    for (var i = 0; i < selecionados.length; i++) {
        var selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        idPassado = selecionado[0].innerHTML;
    }

    $.get("dados/exclui.php", { id: idPassado }).done(function (data) {

        iniciaModalResposta("modal-resposta", data);
    });

});


function iniciaModalTabela(modalID, data) {



    const modal = document.getElementById(modalID);
    if (modal) {

        modal.classList.add('mostrar');
        document.getElementById('mensagem').innerHTML = data;
        modal.addEventListener('click', (e) => {
            if (e.target.id == modalID || e.target.className == 'fecharblue') {
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