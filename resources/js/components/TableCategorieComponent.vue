<template>
    <div class="mt-4">
        <router-link to="/categorie/create" class="btn btn-success mb-4">add categorie</router-link>
        <div class="responsive-table">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="categorie in categories.data" :key="categorie.id">
                        <th scope="row">{{categorie.id}}</th>
                        <td>{{categorie.name}}</td>
                        <td>
                           <router-link :to="`/categorie/edit/${categorie.id}`" class="btn btn-warning">update</router-link>
                            <button class="btn btn-danger" @click="deletecat(categorie.id)">delete</button>
                        </td>
                        
                    
                    </tr>
                </tbody>
            </table>
        </div>
        <pagination :data="categories" @pagination-change-page="getResults"></pagination>
    </div>
</template>
<script>
export default {

    data() {
        return {
            categories: {},
           
        }
    },
    created() {
        axios.get('http://127.0.0.1:8000/categorieslist')
        .then(response =>this.categories = response.data)
        .catch(error=>console.log(error));
    },
    
   
    mounted() {
		// Fetch initial results
		this.getResults();
	},
    methods: {
        
         deletecat(id){
        axios.delete('http://127.0.0.1:8000/categorie/delete/' + id)
        .then(response => console.log(response),this.$router.push('/'))
        .catch(error => console.log(error));
    },
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/categorieslist?page=' + page)
				.then(response => {
					this.categories = response.data;
				});
		}
	}
   
}
</script>
