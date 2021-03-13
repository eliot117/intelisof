require('./bootstrap');

require('admin-lte/plugins/jquery/jquery.min.js');

require('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js');

require('admin-lte/dist/js/adminlte.min.js');

require('admin-lte/plugins/datatables/jquery.dataTables.min.js');

require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');

require('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js');

require('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');

$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
});

require('admin-lte/plugins/jquery-ui/jquery-ui.min.js');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
