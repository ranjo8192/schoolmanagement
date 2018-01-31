var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var mongoDbConnection = require('./mongoDbConnection');
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

	var con = mongoDbConnection.dbConnection();
	con.connect(function(err){
		if(err){
			throw err;
		}
		else {
			console.log("connection is imported successfully");
			res.end();
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
