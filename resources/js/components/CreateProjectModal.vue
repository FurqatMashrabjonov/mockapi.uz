<template>
    <form action="">
        <div class="modal-card" style="width: auto">
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
                        placeholder="Misol : Todo, Products"
                        required>
                    </b-input>
                </b-field>

                <b-field label="Password">
                    <b-input
                        type="text"
                        placeholder="Loyiha prefiksini kiriting"
                        required>
                    </b-input>
                </b-field>

                <b-checkbox>Remember me</b-checkbox>
            </section>
            <footer class="modal-card-foot">
                <b-button
                    label="Close"
                    @click="$emit('close')" />
                <b-button
                    label="Login"
                    type="is-primary" />
            </footer>
        </div>
    </form>
</template>

<script>
export default {
    name: "CreateProjectModal"
}
</script>

<style scoped>

</style>
