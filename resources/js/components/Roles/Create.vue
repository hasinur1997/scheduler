<template>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Create new role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="">
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" v-model="name"  placeholder="Enter role name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea v-model="description" id="desription" cols="" rows="" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label"> Permissions</label>
                    <div class="col-sm-9">
                        <label for="manage-team">
                            <input type="checkbox" id="manage-team"  value="manage_teams"> Manage Team
                        </label>
                        <label for="manage-project">
                            <input type="checkbox" id="manage-project" value="manage_projects"> Manage Projects
                        </label>
                        <label for="update">
                            <input type="checkbox" id="update"> Update
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-default" @click.prevent="addRole">Create Role</button>
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
            addRole() {
                let self = this;
                let ability = {
                    name: this.name,
                    description: this.description
                }
                axios.post('/roles', ability)
                    .then(response => {
                        bus.$emit('add_role', response.data);
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