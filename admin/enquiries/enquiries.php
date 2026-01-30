<?php
include '../templates/admin_header.php';
include '../templates/admin_sidebar.php';
include '../../templates/config.php';

$result = mysqli_query($conn, "SELECT * FROM enquiries");
?>

<main>
    <h3>Enquiry Submissions</h3>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['message'] ?></td>
        </tr>
        <?php } ?>
    </table>
</main>

<?php include '../templates/admin_footer.php'; ?>
