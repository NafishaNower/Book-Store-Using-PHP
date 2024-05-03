<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the script is accessed via a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_book_id = $_POST["delete_book_id"];

    $sql = "DELETE FROM books WHERE id = $delete_book_id";
    if ($conn->query($sql) === TRUE) {
        echo "Book with ID $delete_book_id has been deleted successfully.";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
}

$conn->close();
?>
