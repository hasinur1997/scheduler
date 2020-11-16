<template>
    <div>
        <table class="table table-striped table-sm ">
            <thead>
            <tr>
                <th>Sub Task
                    <a 
                        href=""
                        data-toggle="modal" 
                        :data-target="'#subtask' + task.id" 
                        @click="resetForm"                 
                    >
                        <i class="fas fa-plus create-subtask"></i>
                    </a>
                </th>
                <th>
                    Assigned User
                </th>
                <th>
                    Description
                </th>
                <th>
                    Start Date
                </th>
                <th>
                    End Date
                </th>
                <th>
                    Completed Date
                </th>
                <th>
                    Working Time
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="subtask in subtasks" :key="subtask.id">
                <td>{{ subtask.name }}</td>
                <td>{{ subtask.user.name }}</td>
                <td>{{ subtask.description }}</td>
                <td>{{ subtask.start_date }}</td>
                <td>{{ subtask.end_date }}</td>
                <td>{{ subtask.completed_date }}</td>
                <td>{{ subtask.working_time }}</td>
                <td class="project-actions text-right">
                    <a 
                        href="" 
                        data-toggle="modal" 
                        :data-target="'#subtask' + task.id" 
                        class="btn btn-info btn-xs"
                        @click="editSubTask(subtask)"
                    >
                        <i class="fas fa-pencil-alt"></i>
                    </a> 
                    <a 
                        href="#" 
                        class="btn btn-danger btn-xs"
                        @click.prevent="deleteSubTask(subtask)"
                    >
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>    

        <!-- Modal -->
        <div>
        <div 
            class="modal fade" 
            :id="'subtask' + task.id" 
            tabindex="-1" 
            role="dialog" 
            ref="vuemodal"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Sub Task</h5>
                    <button 
                        type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-label="Close"
                        @click="errors = []"
                    >
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            class="form-control" 
                            v-model="name"
                            :class="[ 'name' in errors ? 'is-invalid' : '' ]"
                        >
                        <span class="invalid-feedback" v-if=" 'name' in errors">
                            <strong>{{ errors.name[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea 
                            v-model="description" 
                            id="description" 
                            class="form-control"
                            :class="[ 'description' in errors ? 'is-invalid' : '' ]"
                        >
                        </textarea>
                        <span class="invalid-feedback" v-if=" 'description' in errors">
                            <strong>{{ errors.description[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="users">Assigned Users</label>
                        <select 
                            v-model="selectUser" 
                            :class="[ 'form-control', 'user_id' in errors ? 'is-invalid' : '' ]"
                        >
                            <option 
                                v-for="user in users" 
                                :key="user.id" 
                                :value="user.id"
                            >
                                {{ user.name }}
                            </option>
                        </select>
                        <span class="invalid-feedback" v-if=" 'user_id' in errors">
                            <strong>{{ errors.user_id[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input 
                            type="text" 
                            id="start_date"  
                            v-model="start_date" 
                            class="form-control"
                            :class="[ 'start_date' in errors ? 'is-invalid' : '' ]"
                        >
                        <span class="invalid-feedback" v-if=" 'start_date' in errors">
                            <strong>{{ errors.start_date[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input 
                            type="text" 
                            id="end_date"  
                            v-model="end_date" 
                            class="form-control"
                            :class="[ 'end_date' in errors ? 'is-invalid' : '' ]"
                        >

                        <span class="invalid-feedback" v-if=" 'end_date' in errors">
                            <strong>{{ errors.end_date[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="completed_date">Completed Date</label>
                        <input 
                            type="text" 
                            id="completed_date"  
                            v-model="completed_date" 
                            class="form-control"
                            :class="[ 'completed_date' in errors ? 'is-invalid' : '' ]"
                        >

                        <span class="invalid-feedback" v-if=" 'completed_date' in errors">
                            <strong>{{ errors.completed_date[0] }}</strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="working_time">Working Time</label>
                        <input 
                            type="text" 
                            id="working_time"  
                            v-model="working_time" 
                            class="form-control"
                            :class="[ 'working_time' in errors ? 'is-invalid' : '' ]"
                        >

                        <span class="invalid-feedback" v-if=" 'working_time' in errors">
                            <strong>{{ errors.working_time[0] }}</strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="errors = []" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="updateSubTask"  v-if="is_editing">Update Changes</button>
                    <button type="button" class="btn btn-primary" @click="addSubTask"  v-else>Save changes</button>
                    
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['task', 'team', 'project', 'users', 'subtasks'],
    data() {
        return {
            errors: [],
            name: '',
            description: '',
            start_date: '',
            end_date: '',
            completed_date: '',
            working_time: '',
            selectUser: [],
            is_modal_open: false,
            subtask_id: '',
            is_editing: false,
            showModal: false,
            dismissModal: '',
        }
    },

    methods: {
        addSubTask() {
            let subtask = {
                name: this.name,
                description: this.description,
                start_date: this.start_date,
                end_date: this.end_date,
                completed_date: this.completed_date,
                working_time: this.working_time,
                user_id: this.selectUser
            }

            axios.post(`/team/${this.task.id}/subtasks`, subtask)
                .then(result => {
                    this.subtasks.push(result.data)
                    this.is_modal_open = false
                    this.errors = []
                    this.showModal = false
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
        },

        updateSubTask() {
            let subtask = {
                name: this.name,
                description: this.description,
                start_date: this.start_date,
                end_date: this.end_date,
                completed_date: this.completed_date,
                working_time: this.working_time,
                user_id: this.selectUser
            }

            axios.put(`/team/${this.task.id}/subtasks/${this.subtask_id}`, subtask)
                .then(current => {
                    current = current.data
                    this.is_modal_open = false
                    this.errors = []
                    this.is_editing = false

                    this.subtasks = this.subtasks.map( subTask => {
                        if (subTask.id == this.subtask_id) {
                            subTask.name = current.name
                            subTask.user = current.user
                            subTask.description = current.description
                            subTask.start_date = current.start_date
                            subTask.end_date = current.end_date
                            subTask.completed_date = current.completed_date
                        }

                        return subTask
                    } )
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
        },

        editSubTask(subTask) {
            this.showModal = true
            this.subtask_id = subTask.id
            this.name = subTask.name
            this.description = subTask.description
            this.start_date = subTask.start_date
            this.end_date = subTask.end_date
            this.completed_date = subTask.completed_date
            this.working_time = subTask.working_time
            this.selectUser = subTask.user_id
            this.is_modal_open = true
            this.is_editing = true
        },
        
        deleteSubTask(subTask) { 
            if (confirm('Are you sure want to delete this task ?')) {
                axios.delete(`/team/${this.task.id}/subtasks/${subTask.id}`)
                    .then(result => {
                        let index = this.subtasks.findIndex(item => item.id == subTask.id)
                        this.subtasks.splice(index, 1)
                    })
            }
        },

        resetForm() {
            this.name = ''
            this.description = ''
            this.start_date = ''
            this.end_date = ''
            this.completed_date = ''
            this.working_time = ''
            this.selectUser = ''
            this.subtask_id = ''
            this.is_modal_open = true
            this.showModal = true
        }

    },

    created() {
        // this.getSubTask()
    }
}
</script>

<style>
    .modal-active {
        display: block;
    }

    .create-subtask{
        font-size: 10px !important;
        padding: 3px !important;
        color: #3c3c3c !important;
        border: 1px solid !important;
        border-radius: 100% !important;
        margin: 5px !important;
    }
</style>