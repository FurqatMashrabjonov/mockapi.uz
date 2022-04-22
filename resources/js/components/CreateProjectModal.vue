<template>
    <form action="">
        <div class="modal-card">
            <header class="modal-card-head" style="background-color: #ffffff; border: none;padding: 10px">
                <p class="modal-card-title">&nbsp;</p>
                <button
                    type="button"
                    class="delete"
                    @click="$emit('close')"/>
            </header>
            <section class="modal-card-body">
                <b-field label="Loyiha nomini kiriting">
                    <b-input
                        type="text"
                        v-model="project.name"
                        placeholder="Misol : Todo, Products"
                        >
                    </b-input>
                </b-field>

                <b-field label="Prefixni kiriting">
                    <b-input
                        type="text"
                        v-model="project.prefix"
                        placeholder="Misol: /products"
                        >
                    </b-input>
                </b-field>
            </section>
            <footer class="modal-card-foot">
                <b-button
                    label="Yaratish"
                    type="is-primary"
                    @click="createProject"
                />
            </footer>
        </div>
    </form>
</template>

<script>
export default {
    name: "CreateProjectModal",
    data() {
        return {
            project: {
                name: '',
                prefix: ''
            }
        }
    },
    methods: {
        createProject() {
            axios.post('/pro', this.project)
                .then(response => {
                    this.$emit('close')
                    this.$emit('created', response.data)
                    // console.log(response.data)
                })
                .catch(error => {
                    console.log(error.response.data)
                })
        }
    }
}
</script>

<style scoped>

</style>
