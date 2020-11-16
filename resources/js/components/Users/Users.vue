<template>
    <div>
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                    <button 
                        type="button" 
                        class="btn btn-tool" 
                    >
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group" data-select2-id="46">
                    <select 
                        class="select2 select2-hidden-accessible" 
                        multiple="true" 
                        data-placeholder="Select a State" 
                        style="width: 100%;" 
                        data-select2-id="7" 
                        tabindex="-1" 
                        aria-hidden="true"
                        v-model="users"
                    >
                        <option  
                            v-for="user in users" 
                            :data-select2-id="user.id" 
                            :key="user.id"
                            :value="user.id"
                            :selected="contains(user) == true ? 'selected' : ''"
                        >
                            {{ user.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-sm" value="Add users" @click="addUser">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['team', 'project'],
        data() {
            return {
                selectUsers: [],
                users: [],
                assinedUsers: [],
            }
        },

        methods: {
            getTeamUsers() {
                axios.get(`/team/${this.team.id}/members`)
                    .then( result => {
                        this.users = result.data
                    })
                    .catch( errors => {
                        console.log(errors)
                    })
            },

            getProjectUsers() {
                axios.get(`/team/${this.team.id}/projects/${this.project.id}/users`)
                    .then(result => {
                        this.assinedUsers = result.data
                    })
                    .catch(errors => {
                        console.log(errors)
                    })
            },
            addUser() {

            },
            contains(user) {
                if (this.assinedUsers.some(member => member.id == user.id)) {
                    return true
                }

                return false
            }
        },

        created() {
            this.getTeamUsers()
            this.getProjectUsers()
        }
    }
</script>