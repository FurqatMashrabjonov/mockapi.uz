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
                <b-field label="Resurs nomini kiriting">
                    <b-input
                        type="text"
                        v-model="resource.name"
                        placeholder="Misol : products, todos, etc."
                    >
                    </b-input>
                </b-field>


                <h3 style="float: left">Sxema</h3>
                <br>

                <div v-for="(field, index) in resource.fields" :key="index"  class="row rounded m-2 p-2">
                    <div class="col-5">
                        <b-input type="text" rounded v-model="resource.fields[index].name"></b-input>
                    </div>
                    <div class="col-5">
                        <b-field>
                            <b-select v-model="resource.fields[index].type_id" placeholder="Tanlang" rounded>
                                <option v-for="type in types" :key="type.id" :value="type.id">{{type.name}}</option>
                            </b-select>
                        </b-field>
                    </div>
                    <div class="col-2 is-rounded bg-danger">
                        X
                    </div>
                </div>

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
            resource: {
                name: '',
                fields: [
                    {
                        'name': 'id',
                        'type_id': 0,
                    },
                    {
                        'name': 'created_at',
                        'type_id': 0
                    },
                    {
                        'name': 'name',
                        'type_id': 0
                    }
                ]
            },
            types: []
        }
    },
    created() {
        this.getTypes();
    },
    methods: {
        getTypes() {
            axios.get('/types')
                .then(response => {
                    this.types = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
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
