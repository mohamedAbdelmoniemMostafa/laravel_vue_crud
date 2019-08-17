<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .hidden{
            display: none !important;
        }
    </style>
</head>
<body>



<div id="vue-crud-wrapper">

    <div class="container">
        {{--<h4>--}}
            {{--<p class="text-center alert alert-danger "  :class="{hidden:hasError}">Please fill all fields!</p>--}}
        {{--</h4>--}}
        <add_form :item="newItem" v-on:create="create"></add_form>

        <show_data :items="items"  :old_modal="showModal"  v-on:destroy="destroy" v-on:edit="edit()"></show_data>


        {{--<div class="table table-borderless" id="table">--}}
            {{--<table class="table table-borderless" id="table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>ID</th>--}}
                    {{--<th>Name</th>--}}
                    {{--<th>Age</th>--}}
                    {{--<th>Profession</th>--}}
                    {{--<th>Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tr v-for="item in items">--}}
                    {{--<td>@{{ item.id }}</td>--}}
                    {{--<td>@{{ item.name }}</td>--}}
                    {{--<td>@{{ item.age }}</td>--}}
                    {{--<td>@{{ item.profession }}</td>--}}

                    {{--<td id="show-modal" @click="showModal=true; set(item.id, item.name, item.age, item.profession)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
                        {{--<span class="fa fa-pencil" aria-hidden="true"></span>--}}
                    {{--</td>--}}
                    {{--<td @click.prevent="destroy(item)" class="btn btn-danger">--}}
                        {{--<span class="fa fa-trash" aria-hidden="true"></span>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</div>--}}

        {{--<div v-if="showModal" @close="showModal=false" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
            {{--<div class="modal-dialog" role="document">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<h5 class="modal-title" id="exampleModalLabel">update @{{this.e_name}} data</h5>--}}
                        {{--<button type="button" class="close"  @click="showModal=false" data-dismiss="modal" aria-label="Close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<input type="hidden" disabled class="form-control" id="e_id" name="id"--}}
                               {{--required  :value="this.e_id">--}}
                        {{--Name: <input type="text" class="form-control" id="e_name" name="name"--}}
                                     {{--required  :value="this.e_name" @keyup.enter="editItem()">--}}
                        {{--Age: <input type="number" class="form-control" id="e_age" name="age"--}}
                                    {{--required  :value="this.e_age" @keyup.enter="editItem()">--}}
                        {{--Profession: <input type="text" class="form-control" id="e_profession" name="profession"--}}
                                           {{--required  :value="this.e_profession" @keyup.enter="editItem()">--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="showModal = false">Cancel</button>--}}
                        {{--<button type="button" class="btn btn-primary" @click="edit()">Update</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>


</div>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    var msg = $('#alert').text();
    if(msg != ''){
    $('document').ready(function (msg) {
            // alert(msg);

       });
    }


</script>
</html>
