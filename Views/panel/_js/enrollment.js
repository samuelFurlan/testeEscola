sideMenu("menu_enrollment");

let options = {
    onComplete: function (cpf) {
        searchStudent(cpf);
    }
};

$("#students_cpf").mask("000.000.000-00", options);

function searchStudent(cpf) {
    sendAjax("/matricula/aluno", {cpf: cpf}, function (callback) {
        if (callback.erro) {
            returnMessage(callback.erro, "FF0000", "8B0000");
        } else if (callback.success === 200) {
            $("#students_id").val(callback.student_id);
            $("#students_name").val(callback.student_name);
        }
    });
}

$("#table-enrollment").DataTable({
    ajax: {
        url: URL + '/tabelas/matriculas',
        type: 'POST'
    },
    language: {
        url: URL + '/views/assets/vendors/DataTables/pt_br.json'
    }
});

$("#new-enrollment-form").submit(function (e) {
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
            $('#table-enrollment').DataTable().ajax.reload();
            $("#btn-reset").click();
            returnMessage("Salvo com sucesso!");
        }
    });
});


function editEnrollment(id) {
    $("#btn-reset").click();
    sendAjax("/matriculas/editar", {id: id}, function (callback) {
        if (callback.erro) {
            returnMessage(callback.erro, "FF0000", "8B0000");
        } else if (callback.success === 200) {
            $("#enrollment_id").val(callback.enrollment_id);
            $("#students_id").val(callback.enrollment_fk_student);
            $("#students_cpf").val(callback.enrollment_student_cpf);
            $("#students_name").val(callback.enrollment_student_name);
            $("#classes_id").val(callback.enrollment_fk_classes);
            $("#enrollment_date").val(callback.enrollment_date);
            $("#enrollment_status").val(callback.enrollment_status);
            $("html, body").animate({scrollTop: 0});
        }
    });
}