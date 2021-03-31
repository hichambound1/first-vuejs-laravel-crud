<template>
    <div class="m-5 bg-light p-5">
        <div class="row">
           <router-link to="/produit/create" class="btn btn-success mb-4">add produit</router-link>
        </div>
        <div class="responsive-table">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">categorie</th>
                        <th scope="col">user</th>
                        <th scope="col">action</th>
                        
                    
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="produit in produits.data" :key="produit.id">
                        <th scope="row">{{produit.id}}</th>
                        <td>{{produit.name}}</td>
                        <td>{{produit.categorie_id}}</td>
                        <td>{{produit.user_id}}</td>
                        <td>
                             <router-link :to="`/produit/edit/${produit.id}`"    class="btn btn-warning">update</router-link>
                            <button class="btn btn-danger" @click="deleteproduit(produit.id)">delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
         <pagination :data="produits" @pagination-change-page="getResults"></pagination>
   
    </div>
</template>
<script>
        
    export default {

        data() {
            return {
                produits: {}
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/produitslist')
            .then(response =>this.produits = response.data)
            .catch(error=>console.log(error));
        },
        mounted() {
            // Fetch initial results
            this.getResults();
        },
        methods: {
            deleteproduit(id){
                axios.delete('http://127.0.0.1:8000/produit/delete/' + id)
                .then(response => console.log(response),this.$router.push('/produit'))
                .catch(error => console.log(error));
            },
            getResults(page = 1) {
                axios.get('http://127.0.0.1:8000/produitslist?page=' + page)
                    .then(response => {
                        this.produits = response.data;
                    });
            }
        }
    
    }
</script>

