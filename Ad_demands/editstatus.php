<?php
    $host = 'localhost';
    $dbname = 'pfa';
    $username = 'root';
    $password = '';

            try {
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // echo "Connecté à $dbname sur $host avec succès.";

               // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $query = "SELECT of_id, of_sujet,of_description, image, of_duree FROM offre where of_status = 0";

                // $contacts = $stmt->fetchAll();
                $contacts = $conn -> query($query);
                    
            }
            catch (PDOException $e) {
              die("Impossible de se connecter à la base de données $dbname :" );
            }

            if(isset($_GET['update'])){
                $id = $_GET['update'];
                $query1 = "UPDATE offre SET of_status = 1 WHERE of_id = :id ";

                $sth=$conn->prepare($query1);
                      $sth->bindParam(':id',$id);
                      $sth->execute();

                      header("location:index.php");
            }
            
        
?>