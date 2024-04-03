<?php 
class Database {
    private $host;
    private $user;
    private $password;
    private $database;
    public $conn;

    public function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$database = new Database('localhost', 'root', 'root', 'jcp_vacances');
$database->connect();
?>

