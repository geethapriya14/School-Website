<?php
include '../templates/admin_header.php';
include '../templates/admin_sidebar.php';
?>
<?php
include_once __DIR__ . "/../../templates/config.php";

$sql = "SELECT * FROM contact_enquiries";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enquiry Submissions</title>
</head>
<body>

<h2>Enquiry Submissions</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Enquiry Type</th>
        <th>Message</th>
        <th>Date</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $row['enquiry_type']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>

