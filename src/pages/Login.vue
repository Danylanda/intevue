<template>
  <div class="container">
    <div class="login-form">
      <div class="user-image">
        <img src="./imagenes/prfi.jpg" alt="User Image">
      </div>
      <div class="form-group" v-if="showEmailPassword">
        <input type="email" id="email" placeholder="Correo electrónico" v-model="email">
      </div>
      <div class="form-group" v-if="showEmailPassword">
        <input type="password" id="contraseña" placeholder="Contraseña" v-model="contraseña">
        <button class="btn-primary" @click.prevent="login">Iniciar Sesión</button>//como hago para que se vaya a principal.vue? 
      </div>
      
      <div v-if="!showEmailPassword">
        <div class="form-group">
          <input type="text" id="email" placeholder="Email" v-model="email">
          <input type="password" id="contraseña" placeholder="Contraseña" v-model="contraseña">
        </div>
        <button class="btn-primary" @click.prevent="register">Registrarse</button>
        <button class="btn-primary" @click.prevent="registerWithGoogle">Registrarse con Google</button>
      </div>
      <div class="register-link" @click="toggleRegisterMode">
        <span v-if="!showEmailPassword">Volver a</span>
        <span v-else>No tienes cuenta? <span class="register-text">Registrarse</span></span>
        <a v-if="!showEmailPassword" href="#">Iniciar Sesion</a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      contraseña: '',
      name: '',
      apellido: '',
      showEmailPassword: true
    };
  },
  methods: {
    toggleRegisterMode() {
      this.showEmailPassword =!this.showEmailPassword;
    },
    async login() {
      try {
        const response = await axios.post('/login', {
          email: this.email,
          contraseña: this.contraseña
        });
        const data = response.data;
        if (data.message === 'Autenticación exitosa') {
          // Autenticación exitosa, redirigir a la página principal
        } else {
          // Autenticación fallida, mostrar mensaje de error
        }
      } catch (error) {
        console.error(error);
      }
    },
    async register() {
      try {
        const response = await axios.post('/register', {
          name: this.name,
          apellido: this.apellido,
          email: this.email,
          contraseña: this.contraseña
        });
        const data = response.data;
        if (data.message === 'Registro exitoso') {
          // Registro exitoso, redirigir a la página principal
        } else {
          // Registro fallido, mostrar mensaje de error
        }
      } catch (error) {
        console.error(error);
      }
    },
    async registerWithGoogle() {
      // Lógica de registro con Google aquí
    }
  }
}
</script>

<style>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100%; 
}
body {
  background-image: url('./imagenes/fondocutro.jpg');
  background-size: cover;
  margin: 0;
  padding: 0;
}
.login-form {
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-left: auto;
  margin-right: auto;
  width: 360px;
}
.user-image {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}
.user-image img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
}
.form-group {
  margin-bottom: 15px;
}
.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}
.form-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 120px;
  box-sizing: border-box;
  margin-top: 10px; 
}
.btn-primary {
  background-color: #007bff;
color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 120px;
  cursor: pointer;
  width: 100%;
  margin-top: 10px;
}
.register-link {
  display: flex;
  justify-content: center;
  margin-top: 15px;
}
.register-link span {
  margin-right: 5px;
}
.register-link a {
  color: #007bff;
  text-decoration: none;
}
.register-text {
  color: #007bff; 
  text-decoration: none;
  cursor: pointer;
}
</style>