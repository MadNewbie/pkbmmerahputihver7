const axios = require('axios');
const _data = window[`_userIndexData`];
const tableElement = document.getElementById('user-table');
let mainDataTable;

document.addEventListener('DOMContentLoaded', (event) => {
    methods.initDataTable();
});

const methods = {
    initDataTable() {
        const columns = [
            {class:'', data:'name'},
        ];

        if(_data.isPrivilege){
            columns.push({sortable:false, class:'nowrap text-right', data:'_menu'})
        }

        columns.forEach(x => x.searchable = false);

        const afterDrawDt = () => {
            methods.initDeleteButton();
        }

        mainDataTable = $(tableElement)
        .on('draw.dt', afterDrawDt)
        .DataTable({
            columns: columns,
            stateSave: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: _data.routeIndexData,
                type: "GET",
            },
            order: [[ 0, "desc"]],
        });
    },
    initDeleteButton() {
        const selector = '.btn-destroy';
        const deleteButtons = document.querySelectorAll(selector);
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener('click', (event) => {
                if(!confirm("Data yang sudah dihapus tidak dapat dikembalikan lagi. Apakah anda yakin menghapus data ini?")) return;
                let target = event.target;
                while(!target.matches(selector)){
                    target = target.parentNode;
                }
                const id = target.getAttribute('data-id');
                const url = _data.routeDestroyData.replace('999', id);
                axios.delete(url)
                    .then((response) => {
                        if(response.data == 1) {
                            alertify.success('Data berhasil dihapus');
                            mainDataTable.draw(false);
                        } else {
                            alertify.error(response.data);
                        }
                    })
            })
        });
    }
}