<?php
include '../../config/db.php';
$result = mysqli_query($conn, "SELECT * FROM events ORDER BY created_at DESC");
?>

<table border="1">
<tr>
  <th>Title</th>
  <th>Image</th>
  <th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['title'] ?></td>
  <td>
    <img src="../../uploads/events/<?= $row['image'] ?>" width="100">
  </td>
  <td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>
