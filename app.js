
const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hello World\n');
});

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});

const sendmail = require('sendmail')();

sendmail({
    from: 'programador@rbvradios.com.br',
    to: 'programador@rbvradios.com.br, zfrancajunior@gmail.com',
    subject: 'test sendmail',
    html: 'Mail of test sendmail ',
}, function (err, reply) {
    console.log(err && err.stack);
    console.dir(reply);
});