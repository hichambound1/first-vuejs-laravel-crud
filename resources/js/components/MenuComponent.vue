<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <router-link to="/home" class="navbar-brand">logo</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link to="/home" class="nav-link">home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/categorie" class="nav-link">categorie</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/produit" class="nav-link">produit</router-link>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="/login">login</a>
                    <a href="/register">register</a>
                
                </span>
            </div>
        </nav>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>

</template>
<script>
    export default {

    }

</script>
