<template>
<div class="bg-image">
  <div id="app">
    <header>
      <nav>
        <button @click="toggleMenu">Menu</button>
        <ul v-if="showMenu">
          <li><router-link to="/">Ingresar</router-link></li>
          <li><router-link to="/Reclutamiento">Reclutamieto</router-link></li>
          <li><router-link to="/contact">Licenciamiento</router-link></li>
          <li><router-link to="/contact">Filiacion</router-link></li>
        </ul>
      </nav>
    </header>
   <main>
      <router-view/>
    </main>
  </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      showMenu: false
    }
  },
  methods: {
    toggleMenu() {
      this.showMenu = !this.showMenu;
    }
  }
}
</script>

<style>
header {
  background-color: #010e06;
  color: #fff;
  padding: 2rem;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav ul li {
  margin-right: 1rem;
}

nav a {
  color: #fff;
  text-decoration: none;
}

nav a:hover {
  text-decoration: underline;
}

.bg-image {
  background-image: url('./imagenes/fondocutro.jpg');
  background-size: cover;
  background-position: center;
  height: 100vh;
  margin: 0;
}
</style>