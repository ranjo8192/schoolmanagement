var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var mongoDbConnection =require('./mongoDbConnection');
var mongodb = require('mongodb');
var MongoClient = mongodb.MongoClient;
var url = "mongodb://localhost:27017/";
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
	userSession = req.session;
	console.log("check post first::" +userSession.username);
	//res.end();
	if(userSession.username){
		console.log("Check post at root for user name:::::" +userSession.username);
		res.render('pages/index');
	}
	else {
		res.render('pages/login');
	}
	
});

/*****************Login Starts***************************/
app.post('/userLogin', function(req,res){
	var userSession = req.session;
	var username = req.body.username;
	var upassword = req.body.password;
	userSession.username = req.body.username;
	console.log(username);
	console.log(upassword);
	//console.log(userSession);

MongoClient.connect(url , function(err, client){
	if(err){
		throw err;
	}
	else {
		var db = client.db('mydb');
		db.collection('users').find({'email':username,'user_password':upassword}).toArray(function(err , result){
			if(err){
				throw err;

			}
			else {
				console.log(result.length);
				if(result.length == 0){
					console.log("Username Does not exists..");
					res.render('pages/login');
					res.end();
				}
				else{
				console.log("Your entries is correct..We matched you & rediecting to the dashboard!");	
				console.log(result[0].email);
				console.log(result[0].user_password);
				//userSession = username;
				username = userSession.username;
				console.log(username);
				res.render('pages/index', {username});
				client.close();
					
				}

				
			}
		});
		// console.log("Hey Connection with mongo db has been created successfully..CHeers!!!");
		// console.log(db);
		// res.end();
		
	}
});
	
});

/*****************Start User Logout ***********************/
app.get('/userLogout', function(req, res){
	userSession = req.session;

	req.session.destroy(function(err){
		if(err){
			throw err;
		}
		else {
			console.log("successfully Logout, Now redirecting to the login page..");
			res.render('pages/login');
			res.end();
		}
	});
});
/*****************End User Logout *************************/

/*****************Login Ends*****************************/
app.get('/register', function(req, res){
	res.render('pages/register');
});

/****************User Registration************************/
app.post('/userRegistration', function(req, res){
	var userSession = req.session;
	var userName = req.body.username;
	var userId = req.body.email;
	var userType = req.body.usertype;
	var uPassword = req.body.password;
	var confmuPassword = req.body.confmupassword;

	console.log(userName+" "+userId+" "+userType+" "+uPassword+" "+confmuPassword);
	res.end();

	MongoClient.connect(url , function(err, client){
	if(err){
		throw err;
	}
	else {
		var db = client.db('mydb');
		var newuser = {user_name: userName, email: userId, user_type: userType, user_password: uPassword};

		db.collection('users').insert(newuser, function(err , response){
			if(err){
				throw err;

			}
			else {
				console.log(response);
				console.log("New User addedd successfully..!");
				res.render('pages/login');
				res.end();
				// if(result.length == 0){
				// 	console.log("Username Does not exists..");
				// 	res.end();
				// }
				// else{
				// console.log("Your entries is correct..We matched you & rediecting to the dashboard!");	
				// console.log(result[0].email);
				// client.close();
				// res.render('pages/index');	
				// }

				
			}
		});
		// console.log("Hey Connection with mongo db has been created successfully..CHeers!!!");
		// console.log(db);
		// res.end();
		
	}
});

});



var server = app.listen(30000, function(req,res){
	console.log("Server is listening at http://localhost:30000/");
});