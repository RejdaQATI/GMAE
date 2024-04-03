
<?php

include "db.php";

class Voyage
{
    protected $id_voyage;
    protected $id_categorie;
    protected $id_formule;
    protected $title;
    protected $image_url;
    protected $description;
    protected $date_debut;
    protected $date_fin;
    protected $price;
    protected $dbc;

    public function __construct() {
        $this->dbc= new Database('localhost', 'root', 'root', 'jcp_vacances');
        $this->dbc->connect();
    }


    public function insertVoyage($id_categorie,$id_formule,$title,$image_url,$description,$date_debut,$date_fin,$price)
    {
    
        try {
        $insertblabla="INSERT INTO voyage (id_categorie, id_formule, title, image_url, description, date_debut, date_fin, price) VALUES (:id_categorie, :id_formule, :title,  :image_url, :description, :date_debut, :date_fin, :price)";
            $sth=$this->dbc->conn->prepare($insertblabla);
            $sth->bindParam(':id_categorie', $id_categorie);
            $sth->bindParam(':id_formule', $id_formule);
            $sth->bindParam(':title', $title);
            $sth->bindParam(':image_url', $image_url);
            $sth->bindParam(':description', $description);
            $sth->bindParam(':date_debut', $date_debut);
            $sth->bindParam(':date_fin', $date_fin);
            $sth->bindParam(':price', $price);
            $sth->execute();
            
            echo "Record inserted successfully";
        } catch (PDOException $e) {
            echo "Error inserting record: " . $e->getMessage();
        }
    }
    public function getAllVoyages() {
        try {
            $query = "SELECT * FROM voyage";
            $stmt = $this->dbc->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

public function delete($id_voyage){
    $deleteVoy = "DELETE FROM voyage WHERE `id_voyage`=".$id_voyage;
    $sth=$this->dbc->conn->prepare($deleteVoy);
    $sth->execute();

}

public function getAllCategories() {
    try {
        $query = "SELECT * FROM categorie";
        $stmt = $this->dbc->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function getVoyageDetails($id_voyage) {
    try {
        $query = "SELECT * FROM voyage WHERE id_voyage = :id_voyage";
        $stmt = $this->dbc->conn->prepare($query);
        $stmt->bindParam(':id_voyage', $id_voyage);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function update($id_voyage, $id_categorie,$id_formule,$title,$image_url,$description,$date_debut,$date_fin,$price) {
    $UpdateVoy = "UPDATE voyage SET id_categorie = :id_categorie, id_formule = :id_formule, title = :title, image_url = :image_url, description = :description, date_debut = :date_debut, date_fin = :date_fin, price = :price WHERE id_voyage = :id_voyage";

    $sth=$this->dbc->conn->prepare($UpdateVoy);

    $sth->bindParam(':id_categorie', $id_categorie);
    $sth->bindParam(':id_formule', $id_formule);
    $sth->bindParam(':title', $title);
    $sth->bindParam(':image_url', $image_url);
    $sth->bindParam(':description', $description);
    $sth->bindParam(':date_debut', $date_debut);
    $sth->bindParam(':date_fin', $date_fin);
    $sth->bindParam(':price', $price);
    $sth->bindParam(':id_voyage', $id_voyage);

    $sth->execute();

}
public function searchVoyages($searchTerm) {
    try {
        $query = "SELECT * FROM voyage WHERE description LIKE :searchTerm OR title = :searchTerm";
        $stmt = $this->dbc->conn->prepare($query);
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

}

