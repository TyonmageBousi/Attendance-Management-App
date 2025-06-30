// test-db.js
const { Pool } = require('pg')

const pool = new Pool({
    connectionString: 'postgresql://postgres:adgj1234@localhost:5432/arivadb' // ここは自分の接続情報に書き換え
})

async function testConnection() {
    try {
        const res = await pool.query('SELECT NOW()')
        console.log('DB接続成功！ 現在時刻:', res.rows[0].now)
    } catch (err) {
        console.error('DB接続失敗:', err)
    } finally {
        await pool.end()
    }
}

testConnection()
