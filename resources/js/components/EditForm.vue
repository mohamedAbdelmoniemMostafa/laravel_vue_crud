<template>
    <div v-if="pass_modal" @close="new_modal=false" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">update <strong>{{item.name}}</strong> data</h5>
                    <button type="button" class="close" @click="new_modal=false" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" disabled class="form-control" id="e_id" name="id"
                           required  :value="item.id">
                    Name: <input type="text" class="form-control" id="e_name" name="name"
                                 required  :value="item.name" @keyup.enter="edit()">
                    Age: <input type="number" class="form-control" id="e_age" name="age"
                                required  :value="item.age" @keyup.enter="edit()">
                    Profession: <input type="text" class="form-control" id="e_profession" name="profession"
                                       required  :value="item.profession" @keyup.enter="edit()">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="new_modal = false">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="edit()">Update</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return{
                new_modal:false
            }
        },
        props:{
            pass_modal:{type:Boolean},
            item:{type:Object},
        },
        methods:{
            edit:function () {
                this.$emit('edit_form');
            },

        },
        mounted() {
            console.log('Edit Component mounted.');
        }
    }
</script>
