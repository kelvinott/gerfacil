var jbkrAlert = (function () {
    var criarModal = function () {
        var modal = $('<div class="modal modal-alerta"><div style="max-width:800px;" class="modal-dialog"><div class="modal-content"><div class="modal-body" style="padding:0;"></div></div></div></div>');
        modal.modal('show').on('hidden', function () {
            $('.modal-alerta').remove();
        });
    };

    var exibirAlerta = function (titulo, mensagem) {
        criarModal();
        var conteudo = $('<div class="alert alert-warning"> <div style="background-color: #FFEED5">' +
            '<b><i class="icon-warning-sign"></i> ' + titulo + '</b></div>' +
            '<div style="display:inline-block;">' + mensagem + '</div>'  +
            '<div style="display:inline-block; padding-left:10px;"><button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button></div></div>');
        $('.modal-alerta .modal-body').html(conteudo);

    };

    var exibirErro = function (titulo, mensagem) {
        criarModal();
        var conteudo = $('<div class="alert alert-danger"><div style="background-color: #F5D2D2">' +
            '<b><i class="icon-exclamation-sign"></i> ' + titulo + '</b></div></br>' +
            '' + mensagem + '' +
            '<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button></div>');
        $('.modal-alerta .modal-body').html(conteudo);
    };

    var exibirSucesso = function (titulo, mensagem) {
        criarModal();
        var conteudo = $('<div class="alert alert-success"><div style="background-color: #D6EDCC">' +
            '<b><i class="icon-info-sign"></i> ' + titulo + '</b></div>' +
            '<div style="display:inline-block;">' + mensagem + '</div>' +
            '<div style="display:inline-block; padding-left:10px;"><button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button></div></div>');
        $('.modal-alerta .modal-body').html(conteudo);
    };

    var exibirInfo = function (titulo, mensagem) {
        criarModal();
        var conteudo = $('<div class="alert alert-info"> <div style="background-color: #bce8f1">' +
            '<b><i class="icon-info-sign"></i> ' + titulo + '</b></div></br>' +
            '' + mensagem + '' +
            '<button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button></div>');
        $('.modal-alerta .modal-body').html(conteudo);

    };

    return {
        alerta: exibirAlerta,
        erro: exibirErro,
        sucesso: exibirSucesso,
        info: exibirInfo
    };
})();
