
require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.component('pagination', require('laravel-vue-pagination'));


Vue.component('table-categorie', require('./components/TableCategorieComponent.vue').default);
Vue.component('form-categorie', require('./components/FormCategorie.vue').default);
Vue.component('update-categorie', require('./components/UpdateCategorie.vue').default);
Vue.component('form-produit', require('./components/FormProduit.vue').default);
Vue.component('update-produit', require('./components/UpdateProduit.vue').default);
Vue.component('table-produit', require('./components/TableProduitCompnent.vue').default);
Vue.component('menu-component', require('./components/MenuComponent.vue').default);

import home from './components/TableCategorieComponent.vue';
import categorie from './components/TableCategorieComponent.vue';
import categorieform from './components/FormCategorie.vue';
import categorieupdate from './components/UpdateCategorie.vue';
import produitform from './components/FormProduit.vue';
import produitupdate from './components/UpdateProduit.vue';
import produit from './components/TableProduitCompnent.vue';
// import login from './components/TableCategorieComponent.vue';
// import register from './components/TableCategorieComponent.vue';

const routes =[
    {
        path: '/home',
        component :home,categorie,
    },
    {
        path: '/redirectproduit',
        redirect: 'produit'
    },
    {
        path: '/categorie',
        component :categorie
    },
    {
        path: '/categorie/create',
        component :categorieform
    },
   
    {
        path: '/categorie/edit/:id',
        component :categorieupdate
    },
    {
        path: '/produit/edit/:id',
        component :produitupdate
    },
    {
        path: '/produit/create',
        component :produitform
    },
    {
        path: '/produit',
        component :produit
    },
    

];
const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router:router,
});
