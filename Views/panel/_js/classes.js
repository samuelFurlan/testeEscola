sideMenu("menu_classes");

$("#table-classes").DataTable({
    ajax: {
        url: URL + '/tabelas/turmas',
        type: 'POST'
    },
    language: {
        url: URL + '/views/assets/vendors/DataTables/pt_br.json'
    }
});

$("#new-classes-form").submit(function (e) {
    e.preventDefault();
    let bnt = $("#button-submit");
    bnt.prop('disabled', true);
    bnt.html("<span class=\"spinner-border\" role=\"status\" aria-hidden=\"true\"></span>");
    let forms = $(this);

    sendAjax(forms.attr("action"), forms.serialize(), function (callback) {
        bnt.html("Salvar").prop('disabled', false);
        if (callback.erro) {
            returnMessage(callback.erro, "FF0000", "8B0000");
        } else if (callback.success === 200) {
            $('#table-classes').DataTable().ajax.reload();
            $("#btn-reset").click();
            returnMessage("Salvo com sucesso!");
        }
    });
});


function editClasses(id){
    $("#btn-reset").click();
    sendAjax("/turmas/editar", {id : id}, function (callback) {
        if (callback.erro) {
            returnMessage(callback.erro, "FF0000", "8B0000");
        } else if (callback.success === 200) {
            $("#classes_id").val(callback.classes_id);
            $("#classes_description").val(callback.classes_description);
            $("#classes_year").val(callback.classes_year);
            $("#classes_vacancies").val(callback.classes_vacancies);
            $("#classes_status").val(callback.classes_status);
            $("html, body").animate({scrollTop: 0});
        }
    });
}