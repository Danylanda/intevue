// server.js
const express = require('express');
const mysql = require('mysql2/promise');
const app = express();

app.use(express.json());

// Configuración de la base de datos
const dbConfig = {
  host: '3306',
  user: 'root',
  password: '',
  database: 'usuarios'
};

// Conexión a la base de datos
const db = mysql.createPool(dbConfig);

// Ruta para el inicio de sesión
app.post('/login', async (req, res) => {
  const { email, password } = req.body;
  try {
    const [rows] = await db.execute(`SELECT * FROM login WHERE emaillog = ? AND contraseñalog = ?`, [email, password]);
    if (rows.length > 0) {
      res.json({ message: 'Autenticación exitosa' });
    } else {
      res.status(401).json({ message: 'Autenticación fallida' });
    }
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: 'Error interno del servidor' });
  }
});

// Ruta para el registro
app.post('/register', async (req, res) => {
  const { name, apellido, email, password } = req.body;
  try {
    await db.execute(`INSERT INTO login (nombrelog, apellidolog, emaillog, contraseñalog) VALUES (?, ?, ?, ?)`, [name, apellido, email, password]);
    res.json({ message: 'Registro exitoso' });
  } catch (error) {
    console.error(error);
    res.status(500).json({ message: 'Error interno del servidor' });
  }
});

// Iniciar servidor
const port = 3360;
app.listen(port, () => {
  console.log(`Servidor iniciado en el puerto ${port}`);
});