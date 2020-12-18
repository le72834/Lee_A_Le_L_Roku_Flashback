<?php 
class Movie {
    private $conn;

    public $movie_table = 'tbl_movies';
    public $genre_table = 'tbl_genre';
    public $movie_genre_linking_table = 'tbl_mov_genre';

    public function __construct($db_connector) {
        $this->conn = $db_connector;
    }
    public function getMovies() {
        //TODO: this will return all movies
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) AS genre_name';
        $query .= 'FROM '.$this->movie_table. 'm';
        $query .= ' LEFT JOIN '.$this->$movie_genre_linking_table.' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN '.$this->$genre_table.' g ON g.genre_id = link.genre_id';
        $query .= ' GROUP BY m.movies_id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMovieByGenre($genre) {
        //TODO: this will return movies that under given genre
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) AS genre_names';
        $query .= 'FROM '.$this->movie_table. 'm';
        $query .= ' LEFT JOIN '.$this->$movie_genre_linking_table.' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN '.$this->$genre_table.' g ON g.genre_id = link.genre_id';
        $query .= ' WHERE g.genre_name LIKE "%'.$genre.'%"';
        $query .= ' GROUP BY m.movies_id';
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMovieByID($id) {
        //TODO: this will return one movie that matches its ID
        //$query = 'SELECT * FROM '.$this->movie_table.' WHERE `movies_id` = '.$id;
         // make sure $query contains the right query?
        // echo $query;
        // exit;
        $query = 'SELECT m.*, GROUP_CONCAT(g.genre_name) AS genre_names';
        $query .= 'FROM '.$this->movie_table. 'm';
        $query .= ' LEFT JOIN '.$this->$movie_genre_linking_table.' link ON link.movies_id = m.movies_id';
        $query .= ' LEFT JOIN '.$this->$genre_table.' g ON g.genre_id = link.genre_id';
        $query .= ' WHERE g.genre_id = "'.$id.'"';
        $query .= ' GROUP BY m.movies_id';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}