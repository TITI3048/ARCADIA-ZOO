const express = require('express');
const app = express();
const allRoutes = require('./allroutes');

// Utiliser les routes définies dans allRoutes
app.use('/', allRoutes.route);

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});

module.exports = app;