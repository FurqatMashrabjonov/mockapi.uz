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

                <div v-for="(field, index) in resource.fields" :key="index" class="row rounded m-2 p-2">
                    <div class="col-5">
                        <b-input type="text" rounded v-model="resource.fields[index].name"></b-input>
                    </div>
                    <div class="col-5">
                        <b-field>
                            <b-select v-model="resource.fields[index].type_id" placeholder="Tanlang" rounded>
                                <option v-for="type in types" :key="type.id"
                                        :selected="resource.fields[index] === type.id" :value="type.id">{{ type.name }}
                                </option>
                            </b-select>
                        </b-field>
                    </div>
                    <div class="col-2">
                        <box-icon name='x-circle' style="cursor: pointer;" type='solid' color='#3e44d6'
                                  @click="deleteField(index)"></box-icon>
                    </div>
                </div>

                <div class="float-start">
                    <b-button type="button" @click="addField" color="primary" size="sm">
                        +add field
                    </b-button>
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
    props: ['project'],
    data() {
        return {
            resource: {
                name: '',
                fields: [
                    {
                        'name': 'id',
                        'type_id': 2,
                    },
                    {
                        'name': 'created_at',
                        'type_id': 3
                    },
                    {
                        'name': 'name',
                        'type_id': 1
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
        addField() {
            this.resource.fields.push({
                'name': '',
                'type_id': 2
            });
        },
        deleteField(index) {
            this.resource.fields.splice(index, 1);
        },
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
            this.resource.project_id = this.project.id;
            axios.post('/resources', this.resource)
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
