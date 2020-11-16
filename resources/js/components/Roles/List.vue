<template>
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Striped Full Width Tab</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Task</th>
                <th>Progress</th>
                <th style="width: 40px">Label</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="ability in abilities" v-bind:key="ability.id">
                <td>{{ ability.id }}</td>
                <td>{{ ability.name }}</td>
                <td>
                    {{ ability.description }}
                </td>
                <td><span class="badge bg-danger">55%</span></td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
export default {

    data() {
        return {
            abilities: [],
            item: 0,
        }
    },

    methods: {
        getAbilities() {
            axios.get('/abilities/list')
                .then( response => {
                    this.abilities = response.data;
                })
                .catch( error => {
                    console.log('Somethign went wrong please try again');
                })
        },

        getItem() {
            let self = this;
            bus.$on('add_ability', (data) => {
                self.abilities.push(data);
            });  
        }
    },

    created() {
        this.getAbilities();
        this.getItem();
    }
}
</script>