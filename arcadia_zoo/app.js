const express = require('express');
const zooRoutes = require('./routes/zoo');

const app = express();
const port = 3000;

app.use('/zoo', zooRoutes);

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});

module.exports = app;