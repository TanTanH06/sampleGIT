<?php
require_once "includes/dbconnect.php";
require_once "includes/function.php";

// File upload directory
$upload_directory = "uploads/news/";

// === INSERT/UPDATE News ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['txtid']) ? intval($_POST['txtid']) : 0;
    $title = htmlspecialchars(trim($_POST['txtTitle']));
    $author = filter_var(trim($_POST['txtAuthor']), FILTER_SANITIZE_STRING);
    $dateposted = $_POST['txtDatePosted'];
    $story = trim($_POST['txtStory']);
    
    // Handle file upload
    $picture = null;
    if (isset($_FILES['Picture']) && $_FILES['Picture']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['Picture'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid("news_") . '.' . $extension;

        if (!is_dir($upload_directory)) {
            mkdir($upload_directory, 0755, true);
        }

        if (move_uploaded_file($file['tmp_name'], $upload_directory . $newName)) {
            $picture = $newName;
        } else {
            echo "Failed to upload image.";
            exit();
        }
    }

    try {
        if ($id === 0) {
            // INSERT
            $sql = "INSERT INTO news (title, author, datePosted, story, picture) VALUES (?, ?, ?, ?, ?)";
            $data = array($title, $author, $dateposted, $story, $picture);
        } else {
            // UPDATE (keep old image if new one not uploaded)
            if ($picture) {
                $sql = "UPDATE news SET title=?, author=?, datePosted=?, story=?, picture=? WHERE newsID=?";
                $data = array($title, $author, $dateposted, $story, $picture, $id);
            } else {
                $sql = "UPDATE news SET title=?, author=?, datePosted=?, story=? WHERE newsID=?";
                $data = array($title, $author, $dateposted, $story, $id);
            }
        }

        $stmt = $con->prepare($sql);
        $stmt->execute($data);

        header("Location: news.php");
        exit();
    } catch (PDOException $th) {
        echo 'Error saving record: ' . $th->getMessage();
    }
}

// === DELETE News ===
if (isset($_GET['delid'])) {
    $delSQL = "DELETE FROM news WHERE md5(newsID) = ?";
    $data = array($_GET['delid']);

    try {
        $stmtdel = $con->prepare($delSQL);
        $stmtdel->execute($data);
        header("Location: news.php");
        exit();
    } catch (PDOException $th) {
        echo 'Error deleting record: ' . $th->getMessage();
    }
}
?>
