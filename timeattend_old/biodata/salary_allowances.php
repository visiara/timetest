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

    $insquery1 = mysqli_query($conn, "INSERT INTO salary_allowance_other (`company`, `createdate`, `createby`, `name`, `dvalue`, `month`, `year`, `ddate`, `employeeid`) VALUES ('$companyMain', '$createdate', '$user', '$nickname', '$amount', '$month', '$year', '$enddate', '$empid')");
}

// do deletions of allowances
if($type == 3){
    $insquery1 = mysqli_query($conn, "DELETE FROM salary_allowance_other WHERE id='$todelete'");
}

?>
<div class="list-group list-group-striped mb-3">
<?php
$allselect1=mysqli_query($conn, "SELECT * FROM salary_allowance WHERE company='$companyMain' AND salaryscale='$grade' ORDER BY id asc");
while ($allselect = mysqli_fetch_array($allselect1))
{
$allowid = $allselect["id"];
$allowname = $allselect["name"];
$allowvalue = $allselect["dvalue"];
?>
    <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
        <input type="checkbox" name="allowid[]" value="<?php echo $allowid; ?>" checked>
        <input type="hidden" name="allowname[]" value="<?php echo $allowname; ?>" checked>
        <input type="hidden" name="allowvalue[]" value="<?php echo $allowvalue; ?>" checked>
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-medium"><?php echo $allowname; ?></p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo number_format($allowvalue, 2); ?></span>
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

$allselect12=mysqli_query($conn, "SELECT * FROM salary_allowance_other WHERE company='$companyMain' AND employeeid='$empid' AND month='$month' AND year='$year' OR (company='$companyMain' AND employeeid='$empid' AND ddate >= '$dtime') ORDER BY id asc");
$allselect2count = mysqli_num_rows($allselect12);
if($allselect2count > 0){ ?>
<p class="mg-b-0 tx-inverse tx-medium">Allowance Other</p>
<div class="list-group list-group-striped mt-1">
<?php
while ($allselect2 = mysqli_fetch_array($allselect12))
{
$allowid2 = $allselect2["id"];
$allowname2 = $allselect2["name"];
$allowvalue2 = $allselect2["dvalue"];
?>
    <div class="list-group-item pd-y-10 pd-x-10 d-xs-flex align-items-center justify-content-start">
        <input type="checkbox" name="allowid2[]" value="<?php echo $allowid2; ?>" checked>
        <input type="hidden" name="allowname2[]" value="<?php echo $allowname2; ?>" checked>
        <input type="hidden" name="allowvalue2[]" value="<?php echo $allowvalue2; ?>" checked>
        <a href="javascript:;" onclick="allowdelete(<?php echo $allowid2; ?>,<?php echo $grade; ?>,<?php echo $empid; ?>)"><i class="fa fa-window-close tx-danger mg-l-10"></i></a>
        <div class="mg-xs-l-15 mg-t-10 mg-xs-t-0 mg-r-auto">
            <p class="mg-b-0 tx-inverse tx-medium"><?php echo $allowname2; ?></p>
        </div>
        <div class="d-flex align-items-center mg-t-10 mg-xs-t-0">
            <span class="tx-inverse tx-medium"><?php echo number_format($allowvalue2, 2); ?></span>
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