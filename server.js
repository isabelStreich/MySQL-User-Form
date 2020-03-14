'use strict'

const express = require('express')
const path = require('path')

const app = express()
app.use(express.static('doc'))

const PORT = 8081

app.listen(PORT, function () {
    console.log('Server listening on: http://localhost:%s', PORT)
    require('open')('http://localhost:' + PORT + '/programmation-web-3.xml')
})
