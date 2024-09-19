const express = require('express');
const router = express.Router();

router.get('/animals', (req, res) => {
    const animals = [
        { id: 1, name: 'Lion' },
        { id: 2, name: 'Tiger' },
        { id: 3, name: 'Bear' }
    ];
    res.json(animals);
});

module.exports = router;