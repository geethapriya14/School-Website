<?php
include '/gallery_db.php';

$result = mysqli_query($conn, "SELECT * FROM events ORDER BY id DESC");

echo '<div class="gallery">';
while($row = mysqli_fetch_assoc($result)){
    echo '<div>';
    echo '<img src="uploads/events/'.$row['image'].'" width="200">';
    echo '<p>'.$row['title'].'</p>';
    echo '</div>';
}
echo '</div>';
