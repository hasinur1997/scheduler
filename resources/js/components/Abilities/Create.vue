<template>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Create new ability</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="">
            <div class="card-body">
                <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Ability Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" v-model="name"  placeholder="Enter ability name">
                </div>
                </div>
                <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea v-model="description" id="desription" cols="" rows="" class="form-control"></textarea>
                </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-default" @click.prevent="addAbility">Create Ability</button>
            </div>

        </form>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                name: '',
                description: '',
            }
        },

        methods: {
            addAbility() {
                let self = this;
                let ability = {
                    name: this.name,
                    description: this.description
                }
                axios.post('/abilities', ability)
                    .then(response => {
                        bus.$emit('add_ability', response.data);
                        self.name        = '';
                        self.description = '';
                    })
                    .catch()
            }
        },

        created() {

        }
    }
</script>