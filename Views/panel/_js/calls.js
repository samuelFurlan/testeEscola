sideMenu("menu_calls");

$("#table-calls").DataTable({
    ajax: {
        url: URL + '/tabelas/chamadas',
        type: 'POST'
    },
    language: {
        url: URL + '/views/assets/vendors/DataTables/pt_br.json'
    }
});

function openCall(id){

}