
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import {errorAlert,addAlert,updateAlert} from './helpers.js';
// var help = require('./helpers.js');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add_form', require('./components/AddForm.vue').default);
Vue.component('show_data', require('./components/ShowData.vue').default);
Vue.component('edit_form', require('./components/EditForm.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#vue-crud-wrapper',
    data:{
        items:[],
        newItem:{'name':'','age':'','profession':''},
    },
    methods:{
        create:function () {
            var _this = this;
            var input = this.newItem;
            axios.post('/vueitems',input).then(function (response) {
                if(response.data.hasOwnProperty('error')){
                    errorAlert(response.data);
                }else{
                    _this.newItem = {'name':''};
                    _this.getVueItems();
                    addAlert(response);
                }
            })
        },
        getVueItems: function () {
            var _this = this;
            axios.get('/vueitems').then(function (response) {
                _this.items = response.data;
            });
        },
        edit: function(){
            var i_val = document.getElementById('e_id');
            var n_val = document.getElementById('e_name');
            var a_val = document.getElementById('e_age');
            var p_val = document.getElementById('e_profession');

            axios.post('/edititems/' + i_val.value, {name: n_val.value, age: a_val.value,profession: p_val.value })
                .then(response => {

                    if(response.data.hasOwnProperty('error')){
                        errorAlert(response.data);
                    }else{
                        this.getVueItems();
                        updateAlert(response);
                    }

                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();


                });
        },
        destroy: function(item) {
            var _this = this;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-2',
                    cancelButton: 'btn btn-danger ml-2',
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
            }).then((result) => {
                if (result.value) {
                    axios.post('/vueitems/' + item.id).then(function (response) {
                        _this.getVueItems();
                        _this.hasDeleted = false;
                        swalWithBootstrapButtons.fire({
                                type:'success',
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                timer:1000
                        });
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        type:'error',
                        title:'Cancelled',
                        text: 'Your imaginary file is safe :)',
                        timer:1000
                    })
                }
            });

        }

    },
    mounted: function () {
        this.getVueItems();
    },

});
