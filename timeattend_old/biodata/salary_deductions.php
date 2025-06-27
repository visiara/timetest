<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");
$grade = isset($_GET['grade']) ? $_GET['grade'] : $grade;
$month = isset($_GET['month']) ? $_GET['month'] : $month;
$year = isset($_GET['year']) ? $_GET['year'] : $year;
$companyMain = isset($_GET['com']) ? $_GET['com'] : $companyMain;
$empid = isset($_GET['empid']) ? $_GET['empid'] : $eidy;
$type = isset($_GET['type']) ? $_GET['type'] : $type;
$nickname = $_GET['nickname'];
$amount = $_GET['amount'];
$month2 = $_GET['month2'];
$user = $_GET['user'];
$todelete = $_GET['todelete'];

// do addotions of allowances
if($type == 1){
    $createdate = time();
    $newmonth = ($month2 - 1);
    
    if($newmonth > 0){
        $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
        //$olddate = strtotime($year.'-'.$month.'-'.$d);
        $olddate = $year.'-'.$month.'-'.$d;

        $enddate = strtotime(date('Y-m-d', strtotime($olddate. ' + '.$newmonth.' months')));
    } else {
        $enddate = strtotime(date("Y-m-d"));
    }

    $insquery1 = mysqli_query($conn, "INSERT INTO salary_deduction_other (`company`, `createdate`, `createby`, `name`, `dvalue`, `month`, `year`, `ddate`, `employeeid`) VALUES ('$companyMain', '$createdate', '$user', '$nickname', '$amount', '$month', '$year', '$enddate', '$empid')");
}

// do deletions of allowances
if($type == 3){
    $insquery1 = mysqli_query($conn, "DELETE FROM salary_deduction_other WHERE id='$todelete'");
}

?>
<div class="list-group list-group-striped mb-3">
<?php
$dedselect1=mysqli_query($conn, "SELECT * FROM salary_deduction WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
while ($dedselect = mysqli_fetch_array($dedselect1))
{
$dedid = $dedselect["id"];
$dedname = $dedselect["name"];
$dedvalue = $dedselect["dvalue"];
?>
    <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
        <input type="checkbox" name="dedid[]" value="<?php echo $dedid; ?>" checked>
        <input type="hidden" name="dedname[]" value="<?php echo $dedname; ?>" checked>
        <input type="hidden" name="dedvalue[]" value="<?php echo $dedvalue; ?>" checked>
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-medium"><?php echo $dedname; ?></p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo number_format($dedvalue, 2); ?></span>
        </div>
    </div><!-- list-group-item -->
<?php
}
?>
    <!-- <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start bg-info">
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-white tx-medium">Total</p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-white tx-medium">Display</span>
        </div>
    </div> -->
</div>

<?php
$dtime2 = time();
$da=cal_days_in_month(CAL_GREGORIAN,$month,$year);
$dtime = strtotime($year.'-'.$month.'-'.$da);

$dedselect12=mysqli_query($conn, "SELECT * FROM salary_deduction_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
$dedselect2count = mysqli_num_rows($dedselect12);
if($dedselect2count > 0){ ?>
<p class="mg-b-0 tx-inverse tx-medium">Deduction Other</p>
<div class="list-group list-group-striped mt-1">
<?php
while ($dedselect2 = mysqli_fetch_array($dedselect12))
{
$dedid2 = $dedselect2["id"];
$dedname2 = $dedselect2["name"];
$dedvalue2 = $dedselect2["dvalue"];
?>
    <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
        <input type="checkbox" name="dedid2[]" value="<?php echo $dedid2; ?>" checked>
        <input type="hidden" name="dedname2[]" value="<?php echo $dedname2; ?>" checked>
        <input type="hidden" name="dedvalue2[]" value="<?php echo $dedvalue2; ?>" checked>
        <a href="javascript:;" onclick="deddelete(<?php echo $dedid2; ?>,<?php echo $grade; ?>,<?php echo $empid; ?>)"><i class="fa fa-window-close tx-danger mg-l-10"></i></a>
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-medium"><?php echo $dedname2; ?></p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo number_format($dedvalue2, 2); ?></span>
        </div>
    </div><!-- list-group-item -->
<?php
}
?>
    <!-- <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start bg-info">
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-white tx-medium">Total</p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-white tx-medium">Display</span>
        </div>
    </div> -->

</div>
<?php
}
?>