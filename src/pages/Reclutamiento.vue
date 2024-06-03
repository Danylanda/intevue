<template>
  <div>
    <button class="btn-registrar float-right" @click="showModal = true">Registrar</button> 
    <Modal v-if="showModal" @close="closeModal" @personaAgregada="agregarPersona" :showModal="showModal" />
  
    <h3 class="text-2xl font-bold text-left py-2">Reclutamiento</h3>
    <div class="overflow-x-auto relative sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6">
              Nombres y Apellidos
            </th>
            <th scope="col" class="py-3 px-6">
              <div class="flex items-center">
                Estado Civil
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path>
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="py-3 px-6">
              <div class="flex items-center">
                Lugar de Nacimiento
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path>
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="py-3 px-6">
              <div class="flex items-center">
                Departamento
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path>
                  </svg></a>
              </div>
            </th>
            <th scope="col" class="py-3 px-6">
              <span class="sr-only">Editar </span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="persona in personas" :key="persona.nombre" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            
            <td class="py-4 px-6 text-right">
              <button class="btn-blue">Editar</button>
              <button class="btn-red">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-4">
 </div>
</template>

<script>
import Modal from './Modal.vue';

export default {
  name: 'Reclutamiento',
  components: {
    Modal
  },
  data() {
    return {
      showModal: false,
      personas: []
    }
  },
  methods: {
    closeModal() {
      this.showModal = false;
    },
    agregarPersona(persona) {
      this.personas.push(persona);
    }
  }
}
</script>

<style scoped>
.btn-registrar {
  display: flex;
  justify-content: flex-end;
  width: fit-content;
  padding: 10px 10px;
  background-color: #3FB27F;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-registrar:hover {
  background-color: #2c8b5a;
}
</style>