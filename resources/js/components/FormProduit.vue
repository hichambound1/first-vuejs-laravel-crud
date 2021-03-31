<template>
    <div class="m-5 p-5 card bg-light">
        <form>
            
            <div class="form-group w-50 mx-auto m-4">
                <p class="text-uppercase font-weight-bolder text-center">create produit</p>
            </div>
            <div class="form-group w-50 mx-auto">
                <label for="name">produit name</label>
                <input type="text" name="name" id="name" v-model="name" class="form-control" placeholder="name">
            </div>
            <div class="form-group w-50 mx-auto">
                <textarea name="discription" v-model="discription" id="discription" class="form-control" >discription</textarea>
            </div>
            <div class="form-group w-50 mx-auto">
                  <label for="categorie_id">categorie</label>
                <select class="form-control" v-model="categorie_id"  name="categorie_id" id="categorie_id">
                    <option v-for="categorie in categories" :value='categorie.id' :key="categorie.id">{{categorie.name}}</option>

                </select>
            </div>
            <div class="form-group w-50 mx-auto">
                <button type="submit" class="btn btn-primary form-control" @click="addproduit()">Submit</button>
            </div>
        </form>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                allproduits: {},
                categories:{},
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
        
        methods: {
            addproduit(){
                axios.post('http://127.0.0.1:8000/addproduit',{
                    name :this.name,
                    categorie_id :this.categorie_id,
                    discription:this.discription,
                })
                .then(response=>console.log(response),this.$router.push('/produit')
)
                .catch(error=>console.log(error));

            }
        },
    }

</script>
