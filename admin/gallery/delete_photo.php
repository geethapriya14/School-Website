<?php
include '/gallery_db.php'; // make sure path is correct

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Get the file to delete
    $sql = "SELECT photo_path FROM gallery WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){
        $file = $row['photo_path'];  // or file_path if you stored the full path

        // Delete file from folder
        $file_path = "uploads/".$file; // relative to delete_photo.php
        if(file_exists($file_path)){
            unlink($file_path);  // delete file
        }

        // Delete record from DB
        $del_sql = "DELETE FROM gallery WHERE id='$id'";
        mysqli_query($conn, $del_sql);

        header("Location: view_photos.php");  // redirect back
        exit;
    } else {
        echo "File not found in database.";
    }
}
?>
