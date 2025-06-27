<?php
include ("".$_SERVER['DOCUMENT_ROOT']."/includes/config.php");

$TodayDate = date('Y-m-d');
$TodayYear = date('Y');
$TodayMonth = date('m');
$TodayDay = date('d');
$TodayDayName = date('l');
$weekDay = date('w');
$weekid = date('W');
$paymentDate=date('Y-m-d', strtotime($TodayDate));
$deda = strtotime($TodayDate);
    
$EmployeeQuery=mysqli_query($conn, "SELECT * FROM employee");
  while ($EmployeeQueryResult = mysqli_fetch_array($EmployeeQuery))
  {
    $employeeid = $EmployeeQueryResult["employeeid"];
    $location = $EmployeeQueryResult["location"];
    $department = $EmployeeQueryResult["department"];
    $workshift = $EmployeeQueryResult["workshift"];
    $companyMain = $EmployeeQueryResult["company"];
    
    $ShiftQuery=mysqli_query($conn, "SELECT * FROM workshift WHERE id = '$workshift'");
    while ($ShiftQueryResult = mysqli_fetch_array($ShiftQuery))
    {
      $shifttype = $ShiftQueryResult["shifttype"];
      $saturday = $ShiftQueryResult["saturday"];
      $sunday = $ShiftQueryResult["sunday"];
      $holiday = $ShiftQueryResult["holiday"];
      $expectedTimin1 = $ShiftQueryResult["timein"];
      $expectedTimeOut1 = $ShiftQueryResult["timeout"];
      $eTotal = $ShiftQueryResult["hours"];

      $monday = $ShiftQueryResult["monday"];
      $tuesday = $ShiftQueryResult["tuesday"];
      $wednesday = $ShiftQueryResult["wednesday"];
      $thursday = $ShiftQueryResult["thursday"];
      $friday = $ShiftQueryResult["friday"];
    }

    $expectedTimin = strtotime("$TodayDate $expectedTimin1");
    $expectedTimeOut50 = date("Y-m-d H:i:s", strtotime($TodayDate.' '.$expectedTimin1. " + ".floor($eTotal)." hours"));
    if(filter_var($eTotal, FILTER_VALIDATE_INT) !== false){
      $expectedTimeOut = strtotime($expectedTimeOut50);
    } else {
      $expectedTimeOut = strtotime($expectedTimeOut50. " + 30 mins");
    }
    
    $LeaveQuery1=mysqli_query($conn, "SELECT * FROM leaves WHERE employeeid = '$employeeid' AND company='$companyMain' AND approvals = '0' AND CURDATE() BETWEEN startdate and enddate");
    $LeaveQuery = mysqli_num_rows($LeaveQuery1);
    
    $ExemptionQuery1=mysqli_query($conn, "SELECT * FROM exemption WHERE employeeid = '$employeeid' AND company='$companyMain' AND approvals = '0' AND CURDATE() BETWEEN startdate and enddate");
    $ExemptionQuery = mysqli_num_rows($ExemptionQuery1);

      // new runs
      //$LeaveQuery = 0;
      //$ExemptionQuery = 1;

      $HolQuery1=mysqli_query($conn, "SELECT * FROM holidays WHERE status = 'Active' AND company='$companyMain' AND CURDATE() BETWEEN date and date2"); //date = '$TodayDate' AND 
      $HolQuery = mysqli_num_rows($HolQuery1);

      if (($holiday=="0") && ($HolQuery > 0)){
         while ($HolQueryResult = mysqli_fetch_array($HolQuery1))
         {
            $attendancevalue = $HolQueryResult["id"];
            $attendancereport = "Holiday";
         }
      } else {
         if (($saturday=="0") && ($weekDay == 6)){
            $attendancereport = "WeekEnd"; 
            $attendancevalue = $weekDay;
         } else {
            if (($sunday=="0") && ($weekDay == 0)){
               $attendancereport = "WeekEnd"; 
               $attendancevalue = $weekDay;
            } else {
               if ($LeaveQuery > 0){
                  while ($LeaveQuery2 = mysqli_fetch_array($LeaveQuery1))
                  {
                   $attendancevalue = $LeaveQuery2["leavetype"];
                   $attendancereport = "Leave";
                  }
               } else {
                  if ($ExemptionQuery > 0){
                     while ($ExemptionQuery2 = mysqli_fetch_array($ExemptionQuery1))
                     {
                      $attendancevalue = $ExemptionQuery2["leavetype"];
                      $attendancereport = "Exemption"; 
                     }
                  }else{
                     if (($monday=="0") && ($weekDay == 1)){
                        $attendancereport = "InActive"; 
                        $attendancevalue = $workshift;
                     } else {
                        if (($tuesday=="0") && ($weekDay == 2)){
                           $attendancereport = "InActive"; 
                           $attendancevalue = $workshift;
                        } else {
                           if (($wednesday=="0") && ($weekDay == 3)){
                              $attendancereport = "InActive"; 
                              $attendancevalue = $workshift;
                           } else {
                              if (($thursday=="0") && ($weekDay == 4)){
                                 $attendancereport = "InActive"; 
                                 $attendancevalue = $workshift;
                              } else {
                                 if (($friday=="0") && ($weekDay == 5)){
                                    $attendancereport = "InActive"; 
                                    $attendancevalue = $workshift;
                                 } else {
                                    $attendancereport = "Active"; 
                                    $attendancevalue = $workshift;
                                 }
                              }
                           }
                        }
                     }
                  }
               }
            }
         }
      }
      // end new runs

   $TolQuery1x=mysqli_query($conn, "SELECT * FROM attendance WHERE date = '$TodayDate' AND employeeid = '$employeeid' AND company='$companyMain'");
   $TolQueryx = mysqli_num_rows($TolQuery1x);
   if($TolQueryx > 0){

   } else {
      $saveinsert1 = "INSERT INTO attendance (`date`, `month`, `year`, `day`, `dayname`, `employeeid`, `location`, `employeedept`, `attendancereport`, `attendancevalue`, `daydatetime`, `company`, `weekday`, `weekid`, `expectedTimin`, `expectedTimeOut`, `eTotal`) VALUES ('$TodayDate', '$TodayMonth', '$TodayYear', '$TodayDay', '$TodayDayName', '$employeeid', '$location', '$department', '$attendancereport', '$attendancevalue', '$deda', '$companyMain', '$weekDay', '$weekid', '$expectedTimin', '$expectedTimeOut', '$eTotal')";
      mysqli_query($conn, $saveinsert1);
   }
    
  }



  ////////////// save keeping old runs
  /*
  if($holiday=="1"){
   $HolQuery1=mysqli_query($conn, "SELECT * FROM holidays WHERE date = '$TodayDate' AND status = 'Active' AND company='$companyMain'");
   $HolQuery = mysqli_num_rows($HolQuery1);
   if ($HolQuery > 0){
     while ($HolQueryResult = mysqli_fetch_array($HolQuery1))
     {
      $attendancevalue = $HolQueryResult["id"];
     }
     $attendancereport = "Holiday";
   } else {
      $attendancereport = "Active"; 
      $attendancevalue = $workshift;
   }
}elseif (($weekDay == 6) && ($saturday == '0')){
   $attendancereport = "WeekEnd"; 
   $attendancevalue = $weekDay;
}elseif (($weekDay == 0) && ($sunday == '0')){
   $attendancereport = "WeekEnd"; 
   $attendancevalue = $weekDay;
}elseif ($LeaveQuery > 0){
   while ($LeaveQuery2 = mysqli_fetch_array($LeaveQuery1))
   {
    $attendancevalue = $LeaveQuery2["leavetype"];
   }
   $attendancereport = "Leave";
}elseif ($ExemptionQuery > 0){
   while ($ExemptionQuery2 = mysqli_fetch_array($ExemptionQuery1))
   {
    $attendancevalue = $ExemptionQuery2["leavetype"];
   }
   $attendancereport = "Exemption"; 
}else{
   $attendancereport = "Active"; 
   $attendancevalue = $workshift;
}
*/
  //////////////
?>
