<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
                <!--<img src="" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">-->
            </a>

            <div class="navbar-menu.isactive">
                <!--<a class="navbar-item" href="">-->
                    <!--Home-->
                <!--</a>-->
                <!--<a class="navbar-item" href="">-->
                    <!--About-->
                <!--</a>-->
                <router-link to="/home"  class="navbar-item">Home</router-link>
                <router-link to="/about"  class="navbar-item">About</router-link>
            </div>


            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    </nav>
</template>

<script>
    export default {
    }
</script>

<style scoped>

</style>