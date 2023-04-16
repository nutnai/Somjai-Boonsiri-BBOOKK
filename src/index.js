const express = require('express')
const path = require('path')
const cors = require('cors')
const db = require('./database/db')

const app = express()

app.use(cors())
app.use(express.urlencoded({ extended: true }))
app.use(express.json())
app.use(express.static(path.join(__dirname, '../public/')))

const PORT = 3000

app.get('/books', (req, res) => {
  db.query('SELECT * FROM test', (err, result) => {
    if (err) {
      res.send({ err: err })
    }
    res.send(result)
  })
})

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, '../public/index.html'))
})

app.listen(PORT, () => console.log(`Server is running at port ${PORT}`))
