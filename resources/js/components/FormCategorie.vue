<template>
    <div class="m-5 card bg-light">
    <form class="m-50" >
         <div class="form-group w-50 mx-auto m-4">
            <p class="text-uppercase font-weight-bolder text-center">create categorie</p>
        </div>
        <div class="form-group w-50 mx-auto m-4">
          <label for="name"> categorie name</label>
          <input type="text" name="name" id="name"  v-model="name" class="form-control" placeholder="name">
        </div>
        <div class="form-group w-50 mx-auto m-4">
          <input type="submit" name="submit" @click="addcategorie()" class="form-control btn btn-primary">
        </div>
       
    </form>

    </div>
</template>
<script>
export default {
    data() {
      return {
        name:''
      }
    },

   methods: {
     addcategorie(){
       axios.post('http://127.0.0.1:8000/addcategorie',{
         name :this.name,
       })
       .then(response=>console.log(response),this.$router.push('/categorie'))
       .catch(error=>console.log(error));
       
     }
     
   },
}
</script>
