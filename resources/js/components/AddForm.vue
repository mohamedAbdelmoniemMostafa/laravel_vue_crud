<template>
        <!--<div><span>lol : </span>{{item.name}}</div>-->
    <div>
        <div class="col-xs-12">
            <div class="form-group" >
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                       required v-model="item.name" placeholder=" Enter some name" @keyup.enter="create()">
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age"
                       required v-model="item.age" placeholder=" Enter your age" @keyup.enter="create()">
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group">
                <label for="profession">Profession:</label>
                <input type="text" class="form-control" id="profession" name="profession"
                       required v-model="item.profession" placeholder=" Enter your profession" @keyup.enter="create()">
            </div>
        </div>

        <button class="btn btn-primary" @click.prevent="create()" @keyup.enter="create()" id="btn" name="btn">
            <span class="glyphicon glyphicon-plus"></span> ADD
        </button>

    </div>


</template>

<script>
    export default {
        props:{
            item:{type:Object}
        },
        methods:{
            create:function(){
                this.$emit('create');
            },

        },
        mounted() {
            console.log('Add Component mounted.')
        }
    }
</script>
