<script>
import axios from 'axios';

export default {
  props: {
    showModal: {
      type: Boolean,
      required: true
    }
  },
  data() {
    return {
      nombre: '',
      apellido: '',
      lugarNacimiento: '',
      departamento: ''
    }
  },
  methods: {
    agregarPersona() {
      const persona = {
        nombre: this.nombre,
        apellido: this.apellido,
        lugarNacimiento: this.lugarNacimiento,
        departamento: this.departamento
      };

      axios.post('../pages/fetch.php','../pages/process.php', persona)
        .then(response => {
          if (response.data.success) {
            alert('Registro exitoso');
            this.$emit('personaAgregada', persona);
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
      this.$emit('close');
      this.nombre = '';
      this.apellido = '';
      this.lugarNacimiento = '';
      this.departamento = '';
    }
  }
}
</script>
