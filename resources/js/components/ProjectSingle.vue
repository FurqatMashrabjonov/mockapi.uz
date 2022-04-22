<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <router-link :to="{name: 'projects'}">Loyihalar</router-link> <box-icon name='right-arrow-alt' color="rgba( 14, 23, 232, 1 )"></box-icon> {{ project.name }}  this will be actions
                <div class="card">
                    <div class="card-header bg-light flex-column">
                        <span class="is-large" style="font-weight: bold">Api url</span>

                        <h4 class="text-dark" style="font-size: 14px">{{ project.url }}</h4>
                    </div>
                    <div class="card-body" style="text-align: center">
                       <span class="is-medium" v-if="project.resources.length === 0">Resurslar mavjud emas</span>
                        <div v-else>sada</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProjectSingle",
    data() {
        return {
            project: Object
        }
    },
    created() {
        this.getProject()
    },
    methods: {
        getProject() {
            axios.get('/pro/' + this.$route.params.token)
                .then(response => {
                    this.project = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>

</style>
