<?php 
class Database
{
    private $host = 'localhost';
    private $db_name = 'db_movie';
    private $username = 'root';
    private $password = 'root';

    public $conn;
    public function getConnection() {
        //get the database connection
        $this->conn = null;

        $db_dsn = array (
            'host'=>$this->host,
            'dbname'=>$this->db_name,
            'charset'=>'utf8'

        );
        if (getenv('IDP_ENVIRONMENT')==='docker'){
            //This code is for help Docker user get it connection
            $db_dsn['host'] = 'mysql';
            $this->username = 'docker_u';
            $this->password = 'docker_p';
    }
    try{
        //put in the code that may come with errors
        //database connection
        $dsn = 'mysql:'.http_build_query($db_dsn, '', ';');
        $this->conn = new PDO($dsn, $this->username, $this->password);
    }
    catch(PDOException $exception){
        //tell the php how you want to deal with the errors
        echo json_encode(
            array(
                'error'=> 'Database connection failed',
                'message'=>$exception->getMessage()
            )
            );
            exit;
    }

    
    return $this->conn;

}
}