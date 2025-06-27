<?php
include __DIR__ . "/../includes/config.php"; // go one level up

$q = $_GET['q'];
$ddate = $_GET['d'];
$companyMain = $_GET['com'];
?>
<div class="col-12 bg-white">
  <div class="pd-20">
    <h3><?php echo date("l, d F Y", strtotime("$ddate")); ?></h3>
    <table id="datatable1" class="table table-bordered display responsive ">
      <thead class="thead-colored thead-dark">
        <tr>
          <th class="">User ID</th>
          <th class="">Full name</th>
          <th class="">Time-In</th>
          <th class="">Time Out</th>
          <th class="">Total Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $x = '0';
        $huserbd5 = mysqli_query($conn, "SELECT * FROM employee WHERE employeeid = '$q' AND company='$companyMain'");
        while ($huserb1d5 = mysqli_fetch_array($huserbd5)) {
          $eid = $huserb1d5["id"];
          $employeeid = $huserb1d5["employeeid"];
          $fname = $huserb1d5["fname"];
          $mname = $huserb1d5["mname"];
          $lname = $huserb1d5["lname"];

          $hu = mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$ddate' AND employeeid = '$q' AND company='$companyMain'");
          $huy = mysqli_num_rows($hu);
          while ($hug = mysqli_fetch_array($hu)) {
            $timeInseconds = $hug["timeInseconds"];
            $timeOutseconds = $hug["timeOutseconds"];
          }

          if ($huy > 0) {
            $timeInseconds2 = ($timeInseconds / 1000);
            $timeOutseconds2 = ($timeOutseconds / 1000);

            $timeIn = $timeInseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeInseconds2);
            $timeOut = $timeOutseconds == '0' ? '0' : date("Y-m-d h:i:s A", $timeOutseconds2);
            $hourdiff = $timeOutseconds == '0' ? '0' :  round(($timeOutseconds2 - $timeInseconds2) / 3600, 1);
          } else {
            $timeInseconds2 = 0;
            $timeOutseconds2 = 0;

            $timeIn = 0;
            $timeOut = 0;
            $hourdiff = 0;
          }

          $x = $x + '1';
        ?>
          <tr>
            <td><?php echo $employeeid; ?></td>
            <td><?php echo $lname . " " . $mname . " " . $fname; ?></td>
            <td><?php echo $timeIn; ?></td>
            <td><?php echo $timeOut; ?></td>
            <td><?php echo $hourdiff . ' Hours'; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div><!-- pd-20 -->
</div><!-- col-6 -->
<!-- pd-20 
<div class="col-12 bg-white">
    <div class="pd-20">
    <img src="data.png" class="img-fluid" alt="">
    </div>-->
</div><!-- col-6 -->