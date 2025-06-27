<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$p = $_GET['p'];
$companyMain = $_GET['com'];

if ($p == 1) {
    $bookpay1 = mysqli_query($conn, "SELECT * FROM photos WHERE applicant_id = '$q' AND company='$companyMain'");
    while ($bookpay = mysqli_fetch_array($bookpay1)) {
        $photo_preview = $bookpay["photo_preview"];
    }
?>
    <div class="col-lg-12 text-center">
        <div class="pd-20 bd-r bd-success">
            <h3 class="tx-inverse mg-b-25">Profile Picture</h3>
            <img src="data:image/png;base64,<?php echo $photo_preview; ?>" class="wd-300 ">
        </div>
    </div><!-- col-6 -->

<?php
} elseif ($p == 2) {
?>
    <style>
        .ca {
            float: left;
            width: 100px;
            border: 1px solid silver;
            margin: 0 0 5px 5px;
            padding: 4px;
        }
    </style>
    <div class="col-lg-12 text-center" style="padding:10px 0 5px 20px;">
        <?php
        $bookpay1 = mysqli_query($conn, "SELECT * FROM employee_fingerprints WHERE applicant_id = '$q' AND company='$companyMain'");
        while ($bookpay = mysqli_fetch_array($bookpay1)) {
            $fingerid = $bookpay["fingerid"];
            $bitByte = $bookpay["bitByte"];
        ?>
            <div class="ca pd-10">
                <span>
                    <h6 class="tx-inverse mg-b-25">Finger <?php echo $fingerid; ?></h6>
                </span><br>
                <img src="data:image/png;base64,<?php echo $bookpay['bitByte']; ?>" class="img-fluid">
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>