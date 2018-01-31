var mongodb = require('mongodb');
var MongoClent = mongodb.MongoClient;
var url = "mongodb://localhost:27017/mydb";

exports.dbConnection = function(){
var con = MongoClient.connect(url, function(err,db){
	if (err){
		through err;
	}
	else{
		console.log("connection with database has been stablished successfully..!");
		db.close();
	}
});
return con;
};