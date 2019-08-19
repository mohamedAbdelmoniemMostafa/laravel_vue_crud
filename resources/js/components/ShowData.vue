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

                    <td  @click="modal=true; set(item.id, item.name, item.age, item.profession)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </td>
                    <td @click.prevent="destroy(item)" class="btn btn-danger">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </td>
                </tr>
            </table>
        </div>
        <edit_form v-on:edit_form="edit" :item="itemList"  :pass_modal="modal"></edit_form>

    </div>

</template>

<script>
    export default {
        data:function(){
          return{
              modal:false,
              itemList:{'id':'','name':'','age':'','profession':''},
          }
        },
        props:{
            items:{type:Array},
        },
        methods:{
            destroy:function(item){
                this.$emit('destroy',item);
            },
            set:function (val_id, val_name, val_age, val_profession) {
                this.e_id = val_id;
                this.e_name = val_name;
                this.e_age = val_age;
                this.e_profession = val_profession;
                // this. itemList.splice(0, 1);
                this.itemList.id = this.e_id;
                this.itemList.name = this.e_name;
                this.itemList.age = this.e_age;
                this.itemList.profession = this.e_profession;
            },
            edit:function () {
                this.$emit('edit');
                this.modal = false;
            },

        },
        mounted() {
            var _this = this;
            $(document).on('hide.bs.modal','#exampleModal', function () {
                _this.modal=false;
            });
            console.log('Show Component mounted.');

        }
    }

</script>
