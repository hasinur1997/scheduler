<template>
    <div>
        <div class="alert alert-info" role="alert" v-if="success">
            {{ message }}
        </div>
        <a
            class="btn btn-info mb-4" 
            data-toggle="collapse" 
            href="#addNewTask" 
            role="button" 
            aria-expanded="false" 
            aria-controls="collapseExample"
            @click="resetData"
        >
            Add New Task
        </a>

        <div class="collapse" id="addNewTask" v-if="createTask">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Create New Task</h3>
                </div>
                <div class="card-body">  
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            v-model="name" id="name" 
                            class="form-control" 
                            :class="[ 'name' in errors ? invalidInput : '' ]"
                        >
                        <span class="invalid-feedback" v-if=" 'name' in errors">
                            <strong>{{ errors.name[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea 
                            id="description" 
                            class="form-control" 
                            v-model="description"
                            :class="[ 'description' in errors ? invalidInput : '' ]"
                        >                            
                        </textarea>
                        <span class="invalid-feedback" v-if=" 'description' in errors">
                            <strong>{{ errors.description[0] }}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="">Milestone</label>
                        <select v-model="milestone" class="form-control">
                            <option 
                                :value="milestone.id" 
                                v-for="milestone in milestones" 
                                :key="milestone.id"
                            >
                                {{ milestone.name }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create Task" class="btn btn-default" @click="addTask">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                       <template v-for="task in tasks">
                           <template v-if="taskEditing == task.id">
                                <tr :key="'taskedit' + task.id">
                                    <td colspan="5">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input 
                                                type="text" 
                                                v-model="name" id="name" 
                                                class="form-control" 
                                                :class="[ 'name' in errors ? invalidInput : '' ]"
                                            >
                                            <span class="invalid-feedback" v-if=" 'name' in errors">
                                                <strong>{{ errors.name[0] }}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea 
                                                id="description" 
                                                class="form-control"  
                                                v-model="description"
                                                :class="[ 'description' in errors ? invalidInput : '' ]"
                                            >                            
                                            </textarea>
                                            <span class="invalid-feedback" v-if=" 'description' in errors">
                                                <strong>{{ errors.description[0] }}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Milestone</label>
                                            <select v-model="milestone" class="form-control">
                                                <option 
                                                    :value="milestone.id" 
                                                    v-for="milestone in milestones" 
                                                    :key="milestone.id"
                                                    :selected="task.milestone_id == milestone.id ? true : false"
                                                >
                                                    {{ milestone.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Cansel" class="btn btn-danger" @click="taskEditing = false">
                                            <input type="submit" value="Save" class="btn btn-info" @click="updateTask">
                                        </div>    
                                    </td>
                                </tr>
                            </template>

                            <template v-else>
                                <tr :key="task.id">
                                    <td><i class="fa fa-tasks" aria-hidden="true"></i></td>
                                    <td>{{ task.name }}</td>
                                    <td 
                                        class="project_progress"
                                    >
                                        <div 
                                            class="progress progress-sm"
                                        >
                                            <div 
                                                role="progressbar" 
                                                aria-volumenow="57" 
                                                aria-volumemin="0" 
                                                aria-volumemax="100" 
                                                class="progress-bar bg-green" 
                                                :style="'width:' + task.progress + '%;'"
                                            >
                                            </div>
                                        </div> 
                                        <small>
                                            <template v-if="task.total_tasks != 0">
                                                {{ task.progress }}% Complete
                                            </template>

                                            <template v-else>
                                                No subtasks available
                                            </template>
                                        </small>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a 
                                            class="btn btn-tool" 
                                            data-toggle="collapse" 
                                            :href="'#task' + task.id" 
                                            role="button" 
                                            aria-expanded="false" 
                                            aria-controls="collapseExample"
                                        >
                                            <i :class="['fas', taskOpen == task.id ? 'fa-minus' : 'fa-plus']" @click="openTask(task)"></i>
                                        </a>
                                        <a 
                                            href="" 
                                            class="btn btn-info btn-xs"
                                            data-toggle=""
                                            :data-target="'#edit_tasks' + task.id"
                                            @click.prevent="editTask(task)"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a> 
                                        <a 
                                            href="#" 
                                            class="btn btn-danger btn-xs"
                                            @click.prevent="deleteTask(task)"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="collapse" :id="'task' + task.id" :key="'task' + task.id">
                                    <td colspan="5">
                                        <subtasks 
                                            :task="task" 
                                            :team="team_id" 
                                            :project="project_id" 
                                            :users="users"
                                            :subtasks="task.sub_tasks"
                                        >
                                        </subtasks>
                                    </td>
                                </tr>
                            </template>
                       </template>
                    </tbody>
                </table>
            </div>  
        </div>        
    </div>
</template>

<script>
    export default {
        props:['team_id', 'project_id', 'users', 'milestones'],
     
        data() {
            return {
                createTask: false,
                task_id: 0,
                name: '',
                description: '',
                tasks: [],
                errors: [],
                invalidInput: 'is-invalid',
                success: false,
                message: '',
                taskOpen: false,
                taskEditing: false,
                milestone: '',
            }
        },

        methods: {

            addTask() {
                let self = this;
                let task = {
                    name: this.name,
                    description: this.description,
                    milestone: this.milestone,
                }

                axios.post(`/team/${self.team_id}/projects/${self.project_id}/tasks`, task )
                    .then(result => {
                        self.tasks.push(result.data)
                        self.name = ''
                        self.description = ''
                        self.success = true
                        this.createTask = false
                        this.message = 'Your task has been created successfully'
                    })
                    .catch((error) => {
                        self.errors = error.response.data.errors
                    })  
            },

            updateTask() {
                let task = {
                    name: this.name,
                    description: this.description,
                    milestone: this.milestone,
                }

                axios.put(`/team/${this.team_id}/projects/${this.project_id}/tasks/${this.task_id}`, task )
                    .then(result => {
                        // this.tasks.push(task)
                        this.taskEditing = false
                        this.success = true
                        this.errors = []
                        this.message = 'Your task has been updated successfully'

                        this.tasks = this.tasks.map( task => {
                            if (task.id == this.task_id) {
                                task.name = this.name
                                task.description = this.description
                                task.milestone_id = this.milestone
                            }

                            return task
                         } )
                    })
                    .catch((error) => {
                        this.errors = error.response.data.errors
                    })
            },

            setData(id, name, description) {
                // console.log(id)
                this.task_id = id
                this.name = name
                this.description = description
            },

            resetData() {
                this.name = '',
                this.description = ''
                this.createTask = true
                this.taskEditing = false
                this.errors = []
                this.openTask = false

            },

            getTasks() {
                
                axios.get(`/team/${this.team_id}/projects/${this.project_id}/tasks`)
                    .then(result => {
                        this.tasks = result.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    }) 
            },

            openTask(task) {
                this.taskOpen = this.taskOpen == task.id ? false : task.id
            },

            editTask(task) {
                this.errors = []
                this.taskEditing = task.id
                this.task_id = task.id
                this.name = task.name
                this.description = task.description
                this.createTask = false
                this.milestone = task.milestone_id
            },

            deleteTask(task) {
                console.log(task)
                if (confirm('Are you sure want to delete this task ?')) {
                    axios.delete(`/team/${this.team_id}/projects/${this.project_id}/tasks/${task.id}`)
                        .then(result => {
                            let index = this.tasks.findIndex(item => item.id == task.id)
                            this.tasks.splice(index, 1)
                            this.success = true
                            this.message = 'Your task has been deleted successfully'
                        })
                }
            }
        },

        created()
        {
            this.getTasks()
        }
    }
</script>

<style>
    
</style>