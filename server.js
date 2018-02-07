var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var mongoDbConnection =require('./mongoDbConnection');
var mongodb = require('mongodb');
var MongoClient = mongodb.MongoClient;
var url = "mongodb://localhost:27017/mydb";
var app = express();


app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
app.use(session({
    secret: "sshhh",
    name: "expresscookie",
    //store: sessionStore, // connect-mongo session store
    proxy: true,
    resave: true,
    saveUninitialized: true
}));
app.use(express.static('public'))
app.set('view engine', 'ejs');
app.set('views', './views');

var userSession; 




app.get('/', function(req, res){
	res.render('pages/login');
});

/*****************Login Starts***************************/
app.post('/userLogin', function(req,res){
	var userSession = req.session;
	username = req.body.username;
	upassword = req.body.password;
	console.log(username);
	console.log(upassword);
	console.log(userSession);

MongoClient.connect(url , function(err, db){
	if(err){
		throw err;
	}
	else {

		db.collection('users', function(err , collection){
			if(err){
				throw err;
			}
			else {
				console.log(collection);
				collection.find();
				res.end();
			}
		});
		// console.log("Hey Connection with mongo db has been created successfully..CHeers!!!");
		// console.log(db);
		// res.end();
		
	}
})
	
});

/*****************Login Ends*****************************/
app.get('/register', function(req, res){
	res.render('pages/register');
});



var server = app.listen(30000, function(req,res){
	console.log("Server is listening at http://localhost:30000/");
});