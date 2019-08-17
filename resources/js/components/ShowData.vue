<template>
    <div>
        <div class="table table-borderless" id="table1">
            <table class="table table-borderless" id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Profession</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.age }}</td>
                    <td>{{ item.profession }}</td>

                    <td id="show-modal" @click="old_modal=true; set(item.id, item.name, item.age, item.profession)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </td>
                    <td @click.prevent="destroy(item)" class="btn btn-danger">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </td>
                </tr>
            </table>
        </div>

        <div v-if="old_modal" @close="old_modal=false" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">update {{this.e_name}} data</h5>
                        <button type="button" class="close" @click="modal=false" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" disabled class="form-control" id="e_id" name="id"
                               required  :value="this.e_id">
                        Name: <input type="text" class="form-control" id="e_name" name="name"
                                     required  :value="this.e_name" @keyup.enter="edit()">
                        Age: <input type="number" class="form-control" id="e_age" name="age"
                                    required  :value="this.e_age" @keyup.enter="edit()">
                        Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                                           required  :value="this.e_profession" @keyup.enter="edit()">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="old_modal=false">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="edit()">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        // data:function(){
        //   return{
        //       modal:false
        //   }
        // },
        props:{
            items:{type:Array},
            old_modal:{type:Boolean}
        },
        methods:{
            destroy:function(item){
                this.$emit('destroy',item);
            },
            set:function (val_id, val_name, val_age, val_profession) {
              // this.$emit('set',val_id, val_name, val_age, val_profession);
                this.e_id = val_id;
                this.e_name = val_name;
                this.e_age = val_age;
                this.e_profession = val_profession;
            },
            edit:function () {
                this.$emit('edit')
            },

        },
        mounted() {
            // this.modal=this.old_modal;
            this.$emit('getVueItems');
            console.log('Component mounted.')
        }
    }
</script>
