<template>
  <div>
    <button class="btn-registrar float-right" @click="showModal = true">Registrar</button>

    <div class="modal" v-if="showModal">
      <div class="modal-content">
        <span class="close" @click="cerrarModal">&times;</span>
        <h2 class="modal-title">Agregar Persona</h2>
        <form @submit.prevent="agregarPersona">
          <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre" v-model="nombre" required class="form-input">
          </div>
          <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" id="apellido" v-model="apellido" required class="form-input">
          </div>
          <div class="form-group">
            <label for="lugarNacimiento">Lugar de Nacimiento:</label>
            <input type="text" id="lugarNacimiento" v-model="lugarNacimiento" required class="form-input">
          </div>
          <div class="form-group">
            <label for="departamento">Departamento:</label>
            <input type="text" id="departamento" v-model="departamento" required class="form-input">
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>

    <div>
      <h2>Lista de Personas</h2>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Estado Civil</th>
            <th>Nacimiento</th>
            <th>Departamento</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="persona in personas" :key="persona.id">
            <td>{{ persona.id }}</td>
            <td>{{ persona.nombres }}</td>
            <td>{{ persona.estadocivil }}</td>
            <td>{{ persona.nacimiento }}</td>
            <td>{{ persona.departamento }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      showModal: false,
      nombre: '',
      apellido: '',
      lugarNacimiento: '',
      departamento: '',
      personas: []
    }
  },
  created() {
    this.fetchPersonas();
  },
  methods: {
    fetchPersonas() {
      axios.get('../pages/fetch.php')
        .then(response => {
          if (response.data.success) {
            this.personas = response.data.data;
          } else {
            alert('Error: ' + response.data.message);
          }
        })
        .catch(error => {
          alert('Error: ' + error);
        });
    },
    agregarPersona() {
      const persona = {
        nombre: this.nombre,
        apellido: this.apellido,
        lugarNacimiento: this.lugarNacimiento,
        departamento: this.departamento
      };

      axios.post('../pages/process.php', persona)
        .then(response => {
          if (response.data.success) {
            alert('Registro exitoso');
            this.fetchPersonas(); // Actualizar la lista de personas después de registrar
            this.cerrarModal();
          } else {
            alert('Error: ' + response.data.message);
          }
        })
        .catch(error => {
          alert('Error: ' + error);
        });
    },
    cerrarModal() {
      this.showModal = false;
      this.nombre = '';
      this.apellido = '';
      this.lugarNacimiento = '';
      this.departamento = '';
    }
  }
}
</script>

<style scoped>
/* Estilos CSS para el modal */
.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  max-width: 400px;
  width: 100%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-title {
  margin-top: 0;
}

.form-group {
  margin-bottom: 15px;
}

.form-input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn {
  display: inline-block;
  padding: 8px 16px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: bold;
  cursor: pointer;
}

.btn-primary {
  background-color: #3FB27F;
  color: #fff;
  border: none;
}
</style>
