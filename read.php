<?php
    $conn = new mysqli('php-pdo-crud-herkansing.com', 'root' , '', 'php-pdo-crud-herkansing');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Achtbaan ORDER BY Topsnelheid DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>De 5 snelste achtbanen van Europa</h1>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Id</th>
                <th>Achtbaan</th>
                <th>Pretpark</th>
                <th>Land</th>
                <th>Snelheid (km/u)</th>
                <th>Hoogte (m)</th>
                <th>Verwijderen</th>
              </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Id"]. "</td>
                    <td>" . $row["NaamAchtbaan"]. "</td>
                    <td>" . $row["NaamPretpark"]. "</td>
                    <td>" . $row["Land"]. "</td>
                    <td>" . $row["Topsnelheid"]. "</td>
                    <td>" . $row["Hoogte"]. "</td>
                    <td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["Id"] . "'>
                            <input type='image' src='red_cross.png' alt='Verwijderen' width='20' height='20'>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>