const express = require('express');
const app = express();

let port = 3000;
const path = require('path');
console.log(__dirname)
const staticPath = path.join(__dirname, "../public");


 app.engine('html', require('ejs').renderFile);
 app.set('view engine', 'html');
 app.set('views', staticPath);



app.use(express.static(staticPath))
app.get('/', (req, res) => {
    res.render('index.html');
});

app.use(express.urlencoded({ extended: false }));



app.listen(port, () => {
    console.log(`Listening to the port ${port}`);
});
