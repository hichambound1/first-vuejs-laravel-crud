<template>
    <div class="m-5 p-5 card bg-light">
      <form >
         <div class="form-group w-50 mx-auto m-4">
            <p class="text-uppercase font-weight-bolder text-center">update produit number {{ $route.params.id}}</p>
        </div>
        <div class="form-group w-50 mx-auto">
          <label for="name">produit name</label>
          <input type="text" name="name" v-model="name" id="name" class="form-control" placeholder="name">
        </div>
        <div class="form-group w-50 mx-auto">
                <textarea name="discription" v-model="discription" id="discription" class="form-control" ></textarea>
        </div>
        <div class="form-group w-50 mx-auto">
          <label for="categorie">categorie</label>
                  <select class="form-control" v-model="categorie_id"  name="categorie_id" id="categorie_id">
                    <option v-for="categorie in categories" :value='categorie.id' :key="categorie.id" >{{categorie.name}}</option>
                </select>
        </div> 
        <div class="form-group w-50 mx-auto">
        <button type="submit" class="btn btn-warning form-control " @click="updateproduit(idproduit)">update</button>
        
        </div>
    </form>
    </div>
    
</template>
<script>
export default {
  data() {
    return {
      
        categories: {},
        discription:'',
                name:'',
                categorie_id:'',

    }
  },
  created() {
          axios.get('http://127.0.0.1:8000/categories')
          .then(response =>this.categories = response.data)
          .catch(error=>console.log(error));
      },
    mounted() {
          this.getproduit(this.$route.params.id); 
        },
        methods: {
          
           getproduit(id) {
                axios.get('http://127.0.0.1:8000/produit/edit/' + id)
                    .then(response => {
                      this.idproduit= response.id,
                      this.name = response.data.name,
                      this.discription = response.data.discription,
                      this.categorie_id = response.data.categorie_id
                    
                    }  )
                    .catch(error => console.log(error));
            },
            updateproduit(id) {
                axios.patch('http://127.0.0.1:8000/produit/edit/' + this.$route.params.id, {
                        name: this.name,
                        discription: this.discription,
                        categorie_id: this.categorie_id,

                    })
                    .then(response => console.log(response),this.$router.push('/categorie'))
                    .catch(error => console.log(error));

            }
            
        },
}
</script>
