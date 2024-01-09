<?php
require 'connection.php';

?>
<?php

require 'authentication.php'; 

$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
$user_role = $_SESSION['user_role'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}


$page_name = "Location";
include("include/sidebar.php");

?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



<div class="row">
    <div class="col-md-12">
        <br>
        <div class="well well-custom">
            <center>
                <h3 >Location Access of Clock In</h3>
            </center>
            <div class="gap"></div>

            <div class="gap"></div>

            <div class="table-responsive">
                <table class="table table-codensed table-custom">
                    <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Date and Time</th>
                            <th>Maps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'connection.php';
                        $rows = mysqli_query($conn, "SELECT * FROM tb_data ORDER BY id DESC");
                        $i = 1;

                        foreach ($rows as $row) :
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row["user_id"]; ?></td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row['in_time']; ?></td>
                                <td style="width: 300px; height: 150px; "><iframe src='https://www.google.com/maps?q=<?php echo $row["latitute"]; ?>,<?php echo $row["longitute"]; ?>&hl=es;z=14&output=embed' style="width: 100%; height: 100%;"></iframe></td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php

include("include/footer.php");



?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

