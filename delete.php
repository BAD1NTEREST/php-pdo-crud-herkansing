<?php
    $conn = new mysqli('php-pdo-crud-herkansing.com', 'root' , '', 'php-pdo-crud-herkansing');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM Achtbaan WHERE Id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Record is succesvol verwijderd";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    header("Location: index.php");
?>
