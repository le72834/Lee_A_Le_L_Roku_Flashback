<?php 
//required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//1.Include database and objects

include_once '../config/database.php';
include_once '../objects/movie.php';

//2. Instantiate database and movie object

$database = new Database();
$db_connector = $database->getConnection();

$movie =  new Movie($db_connector);

//3. query movies based on different requests

if(isset($_GET['id'])) {
//b. /movie.read.php?id=1 ===> return the movie that has ID equal to 1
$results = $movie->getMovieByID($_GET['id']);
} elseif (isset($_GET['genre'])) {
//c. /movie/read.php?genre=action ===> return all action movies
$results = $movie->getMovieByGender($_GET['gender']);
} else {
//a. /movie/read.php ===> return all movies
$results =$movie->getMovies();
}





//4. Return the data in JSON format


echo json_encode($results);
exit;