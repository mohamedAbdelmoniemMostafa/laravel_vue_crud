<template>
    <div v-if="modal" @close="modal=false" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">update {{e_name}} data</h5>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="showModal = false">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="edit()">Update</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            modal:{type:Boolean},
        },
        methods:{
            edit:function () {
                this.$emit('edit')
            },


        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
