<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the script is accessed via a GET request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT id, title, author, published_year FROM books";
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Error: ' . $conn->error, E_USER_ERROR);
    }

    echo "<h2>All Books</h2>";

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published Year</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["title"]}</td>
                    <td>{$row["author"]}</td>
                    <td>{$row["published_year"]}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
