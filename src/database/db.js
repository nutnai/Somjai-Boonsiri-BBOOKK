const mysql = require('mysql2')
const dbConnection = mysql.createPool({
  host: 'sql.freedb.tech',
  user: 'freedb_bbookk',
  password: 'mn#4V9j&27*B4h9',
  database: 'freedb_bbookk',
})

module.exports = dbConnection
