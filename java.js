
var mysql = require("mysql");
var con = mysql.createConnection({
    host: "localhost",
    user: "customer_db",
    password: "root",
    database: "",
});

con.connect(function(err){
    con.query("SELECT * FROM custmers", function(err, result, fields){
        console.log(result);
        console.log("six")
    });
});


