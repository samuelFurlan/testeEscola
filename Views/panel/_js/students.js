sideMenu("menu_students");

let options =  {
    onComplete: function(cpf) {
        if (!validarCPF(cpf)){
            alert("CPF Inválido!");
            $("#students_cpf").val("").focus();
        }
    }
};

$("#students_cpf").mask("000.000.000-00",options);

function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g,'');
    if(cpf == '') return false;
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

$("#table-students").DataTable({
    ajax: {
        url: URL + '/tabelas/alunos',
        type: 'POST'
    },
    language: {
        url: URL + '/views/assets/vendors/DataTables/pt_br.json'
    }
});

$("#new-students-form").submit(function (e) {
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
            $('#table-students').DataTable().ajax.reload();
            $("#btn-reset").click();
            returnMessage("Salvo com sucesso!");
        }
    });
});


function editStudent(id){
    $("#btn-reset").click();
    sendAjax("/alunos/editar", {id : id}, function (callback) {
        if (callback.erro) {
            returnMessage(callback.erro, "FF0000", "8B0000");
        } else if (callback.success === 200) {
            $("#students_id").val(callback.student_id);
            $("#students_name").val(callback.student_name);
            $("#students_birth").val(callback.student_birth);
            $("#students_cpf").val(callback.student_cpf);
            $("#students_status").val(callback.student_status);
            $("html, body").animate({scrollTop: 0});
        }
    });
}