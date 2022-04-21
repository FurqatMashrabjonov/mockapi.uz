<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="text-dark">Mening Proektlarim </h4>
                        <div class="float-end">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-2 border rounded shadow">my projects</div>
                        <section>
                            <b-button>Click Me</b-button>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Projects",
    props: ['projects']
}
</script>

<style scoped>

</style>
