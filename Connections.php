<?php
error_reporting(0);
class Db_Connect {

    private $HOST;
    private $USERNAME;
    private $PASSWORD;
    private $DB_NAME;
    private $connection;

    function __construct() {
        $this->HOST     = "localhost";
        $this->USERNAME = "project";
        $this->DB_NAME  = "WP";
        $this->PASSWORD = "project";

        $this->connection = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);

        if (mysqli_connect_errno($this->connection)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $this->writeQuery("SET sql_mode='traditional'");
        $this->writeQuery("USE " . $this->DB_NAME . ";");
    }

    function __destruct() {
        mysqli_close($this->connection);
    }

    function writeQuery($query) {
        $response = mysqli_query($this->connection, $query);

        if (!$response) {
            echo "Error Running Query: " . mysqli_error($this->connection);
        }

        return $response;
    }

}

?>