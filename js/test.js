var fs = require('fs');
fs.readFile('file.txt', {encoding: 'utf8'}, function(err, data) {
    if (err)
        throw err;
    console.log(data);
});

fs.writeFile('file.txt', 'Здесь был Node', function(err) {
    if (err)
        console.log("Ничего не вышло, и вот почему:", err);
    else
        console.log("Запись успешна. Все свободны.");
});
