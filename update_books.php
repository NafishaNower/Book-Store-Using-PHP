<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_book_id = $_POST["update_book_id"];
    $new_title = $_POST["new_title"];
    $new_author = $_POST["new_author"];
    $new_published_year = $_POST["new_published_year"];

    $updates = [];

    if (!empty($new_title)) {
        $updates[] = "title = '$new_title'";
    }
    if (!empty($new_author)) {
        $updates[] = "author = '$new_author'";
    }
    if (!empty($new_published_year)) {
        $updates[] = "published_year = $new_published_year";
    }

    if (!empty($updates)) {
        $sql = "UPDATE books SET " . implode(", ", $updates) . " WHERE id = $update_book_id";

        if ($conn->query($sql) === TRUE) {
            header("Location: display_books.php");
            exit();
        } else {
            echo "Error updating book: " . $conn->error;
        }
    } else {
        echo "No fields provided for update.";
    }
}

$conn->close();
?>
