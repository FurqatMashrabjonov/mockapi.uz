<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="text-dark">Mening Proektlarim</h4>
                    </div>
                    <div class="card-body">
                        <div class="p-2 border rounded shadow">
                            <div class="p-2 mb-2 border rounded hoverable" @click="projectSingle(project.token)"
                                         v-for="project in pro" :key="project.id">
                                {{ project.name }}
                            </div>
                        </div>
                        <br>
                        <section>
                            <b-button
                                label="+Create"
                                type="is-primary"
                                size="is-small"
                                @click="isComponentModalActive = true"/>

                            <b-modal
                                v-model="isComponentModalActive"
                                has-modal-card
                                trap-focus
                                :destroy-on-hide="false"
                                aria-role="dialog"
                                aria-label="Create Project Modal"
                                close-button-aria-label="Close"
                                aria-modal>
                                <template #default="props">
                                    <create-project-modal v-bind="formProps"
                                                          @created="projectCreated"
                                                          @close="props.close"></create-project-modal>
                                </template>
                            </b-modal>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CreateProjectModal from "./CreateProjectModal";

export default {
    name: "Projects",
    // props: ['projects'],
    components: {
        'create-project-modal': CreateProjectModal
    },
    data() {
        return {
            isComponentModalActive: false,
            formProps: {
                email: 'evan@you.com',
                password: 'testing'
            },
            pro: []
        }
    },
    created() {
        this.getProjects();
    },
    methods: {
        openCreateProjectModal() {
            this.$emit('open-create-project-modal');
        },
        projectSingle(token) {
            this.$router.push({
                name: 'project_single',
                params: {
                    token: token
                }
            });
        },
        getProjects() {
            axios.get('/pro')
                .then(response => {
                    this.pro = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        projectCreated(project) {
            this.getProjects()
        }
    }
}
</script>

<style scoped>
.hoverable:hover {
    background-color: #e8e2e2;
    cursor: pointer;
}
</style>
