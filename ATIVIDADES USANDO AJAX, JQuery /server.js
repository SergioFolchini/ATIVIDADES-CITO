const express = require('express');
const multer = require('multer');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();

app.use(express.static('.'));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Configuração do multer para salvar arquivos na pasta uploads/
const storage = multer.diskStorage({
    destination: function (req, file, callback) {
        callback(null, '/upload/');
    },
    filename: function (req, file, callback) {
        callback(null, `${Date.now()}_${file.originalname}`);
    }
});

const upload = multer({ storage: storage });


app.post('/upload/', upload.single('arquivo'), (req, res) => {
    if (!req.file) {
        return res.status(400).send('Nenhum arquivo foi enviado.');
    }
    res.send('Upload concluído com sucesso!');
});

app.post('/formulario', (req, res) => {

    res.send({
        ...req.body,
        id: 1
    })

})
app.get('/parOuImpar', (req, res) => {
    // req.body

    // req.query
    const par = parseInt(req.query.numero) % 2 === 0
    res.send({
        resultado: par ? 'par' : 'impar'
    })
})

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Servidor rodando na porta ${PORT}...`));
