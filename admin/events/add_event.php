<?php
include '../templates/admin_header.php';
include '../templates/admin_sidebar.php';
?>
<form action="save_events.php" method="POST" enctype="multipart/form-data">
  
  <label>Event Title</label><br>
  <input type="text" name="title" required><br><br>

  <label>Event Description</label><br>
  <textarea name="description" rows="5" required></textarea><br><br>

  <label>Event Image</label><br>
  <input type="file" name="image" accept="image/*" required><br><br>

  <button type="submit">Upload Event</button>

</form>
