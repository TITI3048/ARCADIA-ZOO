const express = require('express');
const path = require('path');
const router = express.Router();

// Route pour servir accueil.html
router.get('/accueil', (req, res) => {
    res.sendFile(path.join(__dirname, 'accueil.html'));
});

module.exports = router;