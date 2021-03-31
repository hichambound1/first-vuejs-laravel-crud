<template>
    <div class="m-5 card bg-light">
        <form class="m-50">
            <div class="form-group w-50 mx-auto m-4">
                <p class="text-uppercase font-weight-bolder text-center">update categorie number {{ $route.params.id}}
                </p>
            </div>
            <div class="form-group w-50 mx-auto m-4">
                <label for="name"> categorie name</label>
                <input type="text" name="name" v-model="name"  id="name" class="form-control"
                    placeholder="name">
            </div>
            <div class="form-group w-50 mx-auto m-4">
                <input type="submit" name="submit" value="update" @click="updatecategorie(categorie.id)"
                    class="form-control btn btn-warning">
            </div>

        </form>

    </div>
</template>
<script>
    export default {

        data() {
            return {
                categorie: '',
                name: '',
                idroute: this.$route.params.id,
            }
        },
        mounted() {
            // Fetch initial results
            if(this.name== ''){

              this.getcategorie(this.$route.params.id);
            }
        },
        methods: {
            getcategorie(id) {
                axios.get('http://127.0.0.1:8000/categorie/edit/' + id)
                    .then(response => {this.name = response.data.name }  )
                    .catch(error => console.log(error));
            },




            updatecategorie(id) {
                axios.patch('http://127.0.0.1:8000/categorie/edit/' + this.$route.params.id, {
                        name: this.name,
                    })
                    .then(response => console.log(response))
                    .catch(error => console.log(error));

            }

        },

    }

</script>
