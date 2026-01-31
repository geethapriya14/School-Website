<?php
// Include templates
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/navigation.php';
?>
<!--Main content-->
<?php
include 'config/db.php';
$result = mysqli_query($conn, "SELECT * FROM events ORDER BY created_at DESC");
?>

<div class="events-container">
<?php while($row = mysqli_fetch_assoc($result)) { ?>
  
  <div class="event-card">
    <img src="uploads/events/<?= $row['image'] ?>">
    <h3><?= $row['title'] ?></h3>
    <p><?= $row['description'] ?></p>
  </div>

<?php } ?>
</div>

<!--footer>
<?php
require_once __DIR__ . '/templates/footer.php';
?>