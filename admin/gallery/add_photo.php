<?php
include '/gallery_db.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];

    // File upload
    $target_dir = "uploads/";
    $file_name = basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $file_name;

    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        // Insert into DB
        $query = "INSERT INTO gallery (title, file_path) VALUES ('$title', '$target_file')";
        if(mysqli_query($conn, $query)){
            $msg = "Photo uploaded successfully!";
        } else {
            $msg = "DB Error: " . mysqli_error($conn);
        }
    } else {
        $msg = "Failed to upload photo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Photo</title>
</head>
<body>
<h2>Add Photo</h2>
<?php if(isset($msg)) echo "<p>$msg</p>"; ?>
<form method="POST" enctype="multipart/form-data">
    <label>Title:</label>
    <input type="text" name="title" required><br><br>
    <label>Photo:</label>
    <input type="file" name="photo" required><br><br>
    <input type="submit" name="submit" value="Upload">
</form>
<p><a href="view_photos.php">View Photos</a></p>
</body>
</html>
