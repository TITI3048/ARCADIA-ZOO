const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

app.use(express.static(__dirname));

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'accueil.html'));
});

app.listen(port, () => {
    console.log(`Serveur en écoute sur http://localhost:${port}`);
});