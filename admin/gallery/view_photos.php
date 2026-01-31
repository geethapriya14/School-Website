<?php
include '/gallery_db.php';

$query = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Photos</title>
    <style>
        .photo { display:inline-block; margin:10px; text-align:center; }
        .photo img { width:200px; height:150px; display:block; }
    </style>
</head>
<body>
<h2>Gallery</h2>
<p><a href="add_photo.php">Add Photo</a></p>

<?php
while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="photo">';
    echo '<img src="' . $row['file_path'] . '" alt="' . $row['title'] . '">';
    echo '<p>' . $row['title'] . '</p>';
    echo '<a href="delete_photo.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this photo?\')">Delete</a>';
    echo '</div>';
}
?>
</body>
</html>
