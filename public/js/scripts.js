(function(win, doc){
    'use strict';

    function preencherTabelaIncidentes(){
        const tabelaIncidente = $('[data-js="tabela-incidentes"]');
        $.ajax({
            url: '/api/incidente/all',
            type: "GET",
            data: '',
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    let htmlItens = Array.prototype.reduce.call(response.response, (acu, item) => {
                        return acu + htmlRegistroTabela(item);
                    }, '');
                    tabelaIncidente.find('tbody').html(htmlItens);
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
    }

    function htmlRegistroTabela(item) {
        let data = new Date(item.created_at);
        return (
            `<tr>
                <td>${item.id}</td>
                <td>${item.titulo}</td>
                <td>${item.descricao}</td>
                <td>${item.criticidade}</td>
                <td>${item.tipo_incidente}</td>
                <td>${item.status}</td>
                <td>${data.toLocaleDateString()}</td>
                <td><a href="#" data-id="${item.id}" data-js="alterar-incidente">Alterar<a/></td>
                <td><a href="#" data-id="${item.id}" data-js="deletar-incidente">Deletar<a/></td>
            </tr>`
        )
    }

    function preencherTipoCriticidade(){
        const tipoCriticidadeSelect = $('[data-js="tipo-criticidade-select"]');
        $.ajax({
            url: '/api/tipo-criticidade/all',
            type: "GET",
            data: '',
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    let htmlItens = Array.prototype.reduce.call(response.response, (acu, item) => {
                        return acu + htmlOptionTipoCriticidade(item);
                    }, '');
                    tipoCriticidadeSelect.html(htmlItens);
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
    }

    function htmlOptionTipoCriticidade(item) {
        return (
            `<option value="${item.id}">${item.nome}</option>`
        )
    }

    function preencherTipoIncidente(){
        const tipoIncidenteSelect = $('[data-js="tipo-incidente-select"]');
        $.ajax({
            url: '/api/tipo-incidente/all',
            type: "GET",
            data: '',
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    let htmlItens = Array.prototype.reduce.call(response.response, (acu, item) => {
                        return acu + htmlOptionTipoIncidente(item);
                    }, '');
                    tipoIncidenteSelect.html(htmlItens);
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
    }

    function htmlOptionTipoIncidente(item) {
        return (
            `<option value="${item.id}">${item.nome}</option>`
        )
    }

    $(document).on('submit', '[data-js="form-gravar-incidente"]', function(){
        const data = new FormData(this);
        $.ajax({
            url: 'api/incidente',
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    preencherTabelaIncidentes();
                    $('.modal-cadastro-incidente').modal('hide');
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
        return false;
    });

    $(document).on('click', '[data-js="deletar-incidente"]', function(){
        $.ajax({
            url: 'api/incidente/'+$(this).data('id'),
            type: "DELETE",
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    preencherTabelaIncidentes();
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
        return false;
    })

    $(document).on('click', '[data-js="alterar-incidente"]', function(){
        const formAlterarIncididente = $('[data-js="form-alterar-incidente"]')
        const idIncidente = $(this).data('id')
        $('.modal-alteracao-incidente').modal('show');
        $.ajax({
            url: '/api/incidente/'+idIncidente,
            type: "GET",
            data: '',
            processData: false,
            contentType: false,
            beforeSend: function(xhr) {

            },
            success: function(response){
                if(response.status){
                    formAlterarIncididente.find('input[name="titulo"]').val(response.response.titulo)
                    formAlterarIncididente.find('select[name="tipo_id_criticidade"]').val(response.response.criticidade_id)
                    formAlterarIncididente.find('select[name="tipo_id_incidente"]').val(response.response.tipo_incidente_id)
                    formAlterarIncididente.find('textarea[name="descricao"]').val(response.response.descricao)
                    formAlterarIncididente.find('input[name="status"]').prop('checked', response.response.status > 0)
                    formAlterarIncididente.find('input[name="id"]').val(idIncidente)
                }
            },
            complete: function() {

            },
            error: function (request, status, error) {

            }
        });
        return false;
    })

    $(document).on('submit', '[data-js="form-alterar-incidente"]', function(){
        const data = new FormData(this);
        const checkedStatus = $(this).find('input[name="status"]:checked').length > 0;
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "api/incidente/"+data.get('id'),
            "method": "PUT",
            "headers": {
              "Content-Type": "application/json"
            },
            "processData": false,
            "data": JSON.stringify({
                "tipo_id_incidente": data.get('tipo_id_incidente'),
                "tipo_id_criticidade": data.get('tipo_id_criticidade'),
                "titulo": data.get('titulo'),
                "descricao": data.get('descricao'),
                "status": checkedStatus ? 1 : 0
            })
        }

        $.ajax(settings).done(function (response) {
            if(response.status){
                preencherTabelaIncidentes();
                $('.modal-alteracao-incidente').modal('hide');
            }
        });
        return false;
    });


    $(document).ready(function(){
        preencherTabelaIncidentes();
        preencherTipoCriticidade();
        preencherTipoIncidente();
    })
})(window, document);
