<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <router-link :to="{name: 'projects'}">Loyihalar</router-link>
                <box-icon name='right-arrow-alt' color="rgba( 14, 23, 232, 1 )"></box-icon>
                {{ project.name }} this will be actions
                <div class="card">
                    <div class="card-header bg-light flex-column">
                        <span class="is-large" style="font-weight: bold">Api url</span>

                        <h4 class="text-dark" style="font-size: 14px" v-html="project.url_display"></h4>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <section>
                            <b-button
                                label="+Resurs yaratish"
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
                                    <CreateResourceModal v-bind="formProps"
                                                         @created="resourceCreated"
                                                         @close="props.close"
                                                         :project="project"
                                    ></CreateResourceModal>
                                </template>
                            </b-modal>
                        </section>
                        <br>
                        <span class="is-medium" v-if="project.resources.length === 0">Resurslar mavjud emas</span>
                        <div class="flex" v-else>
                            <div v-for="resource in project.resources"
                                 class="p-2 m-2 rounded float-start bg-gray"
                                 style="cursor: pointer;"
                                 :key="resource.id">
                                {{resource.name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import CreateResourceModal from "./CreateResourceModal";

export default {
    name: "ProjectSingle",
    components: {
        CreateResourceModal
    },
    data() {
        return {
            project: Object,
            isComponentModalActive: false,
            formProps: {}
        }
    },
    created() {
        this.getProject()
    },
    methods: {
        resourceCreated(resource) {
            this.project.resources.push(resource)
            console.log(resource)
        },
        getProject() {
            axios.get('/pro/' + this.$route.params.token)
                .then(response => {
                    this.project = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        createResourceModal() {

        }
    }
}
</script>

<style scoped>

</style>
