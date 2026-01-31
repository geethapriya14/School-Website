<?php
include '../../config/db.php'; // adjust path

$title = $_POST['title'];
$description = $_POST['description'];

$image_name = time() . '_' . $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

$upload_path = "../../uploads/events/" . $image_name;

move_uploaded_file($image_tmp, $upload_path);

$sql = "INSERT INTO events (title, description, image)
        VALUES ('$title', '$description', '$image_name')";

mysqli_query($conn, $sql);

header("Location: view_event.php");
?>
