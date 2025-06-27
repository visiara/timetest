<?php
$k="2";
if($k=="2"){
?>
<!-- ########## START: RIGHT PANEL ########## -->
<div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#settings"><i class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 contact-scrollbar active" id="settings" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-15">Quick Settings</label>

          <?php 
          $breakoption2 = $breakoption=="0" ? $breakoption2="1" : $breakoption2="0"; 
          $breakoption3 = $breakoption=="0" ? $breakoption3="" : $breakoption3="checked"; 

          $breakoptionk2 = $kpion=="0" ? $breakoptionk2="none" : $breakoptionk2="block"; 
          $breakoptionk = $kpion=="0" ? $breakoptionk="" : $breakoptionk="checked"; 

          $breakoptionS2 = $salaryon=="0" ? $breakoptionS2="none" : $breakoptionS2="block"; 
          $breakoptionS = $salaryon=="0" ? $breakoptionS="" : $breakoptionS="checked"; 
          ?>
          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Break Option</h6>
            <p class="op-5 tx-13">Allow devices to show Break-In & Break-Out options.</p>
            <div id="switchbutton15" class="br-switchbutton <?php echo $breakoption3; ?>" onclick="myFuncBreak()">
              <input type="hidden" id="switch15" name="switch15" value="<?php echo $breakoption2; ?>">
              <span></span>
            </div><!-- br-switchbutton -->
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Incomplete Clock-Out</h6>
            <p class="op-5 tx-13">Number in HOURS to deduct from incomplete clock-out.</p>
            <div class="br-switchbutton333">
              <input type="number" name="icomp" id="icomp" value="<?php echo $deducttime; ?>" onchange="uppycomp()" onblur="uppycomp()">
              <span></span>
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Salary ( % of Net Salary )</h6>
            <!--<p class="op-5 tx-13">% of Salary allocated to attendance.</p>-->
            <div class="br-switchbutton333">
              <input type="number" name="atcomp" id="atcomp" value="<?php echo $atcomp; ?>" onchange="atcomp()" onblur="atcomp()">
              <span></span>
            </div>
          </div>

          <?php if($masterkpi == "1"){ ?>
          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">KPI Module ( % of Net Salary )</h6>
            <!--<p class="op-5 tx-13">Enable KPI Module</p>-->
            <div id="switchbuttonK" class="br-switchbutton mt-3 <?php echo $breakoptionk; ?>" onclick="myFuncBreakKpi()">
              <input type="hidden" name="switch35" value="true">
              <span></span>
            </div>
            <div id="switchbutton3334" class="br-switchbutton3334 mt-3" style="display:<?php echo $breakoptionk2; ?>">
              <input type="number" name="kpi" id="kpi" value="<?php echo $kpidata; ?>" onchange="myFuncBreakKpi2()" onblur="myFuncBreakKpi2()">
              <span></span>
            </div>
          </div>
          <?php } ?>

          <?php if($mastersalary == "1"){ ?>
          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Attendance Module ( % of Net Salary )</h6>
            <!--<p class="op-5 tx-13">Enable Salary Module.</p>-->
            <div id="switchbuttonS" class="br-switchbutton mt-3 <?php echo $breakoptionS; ?>" onclick="myFuncBreakSala()">
              <input type="hidden" name="switch45" value="true">
              <span></span>
            </div>
            <div id="switchbutton3335" class="br-switchbutton3335 mt-3" style="display:<?php echo $breakoptionS2; ?>">
              <input type="number" name="sala" id="sala" value="<?php echo $salarydata; ?>" onchange="myFuncBreakSala2()" onblur="myFuncBreakSala2()" readonly>
              <span></span>
            </div>
          </div>
<script>

document.addEventListener('DOMContentLoaded', function () {
  // do something here ...
  //document.getElementById(kpi).setAttribute("min", "40");
}, false);

document.addEventListener("DOMContentLoaded", function(event) { 

  var a = $("#kpi").val;
  var b = $("#sala").val;


  //do work
    $("#kpi").attr({
       "max" : 100 - b,        // substitute your own
       "min" : 0          // values (or variables) here
    });

    $("#sala").attr({
       "max" : 100 - a,        // substitute your own
       "min" : 0          // values (or variables) here
    });
});
</script>
          <?php } ?>
<script>
  function myFuncBreak() {
     var para = document.getElementById("switchbutton15");
  
     if(para.classList.contains("checked")) {
        para.classList.remove("checked");
        breakDo(0);
     } else {
        para.classList.add("checked");
        breakDo(1);
     }
  }

  function breakDo(str){
   var str2 = "<?php echo $companyMain; ?>";
   if (str.length == 0) {
        //document.getElementById("assedit").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("assedit").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=1", true);
        xmlhttp.send();
    }
  }

  function uppycomp(){
   var str2 = "<?php echo $companyMain; ?>";
   var str = document.getElementById("icomp").value;
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            }
        };
        xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=2", true);
        xmlhttp.send();
  }

  function atcomp(){
   var str2 = "<?php echo $companyMain; ?>";
   var str = document.getElementById("atcomp").value;

   var kpi = document.getElementById("kpi").value;
   var sala = document.getElementById("sala").value;
   var total = (+kpi + +sala + +str);
   var tot2 = (100 - (+kpi + +sala));

   if(total > 100){
    alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
    document.getElementById("atcomp").value = tot2;
   } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
                
      }
    };
    xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=7", true);
    xmlhttp.send();
   }

  }

  function uppycomp2(a,b,c){
   var str2 = "<?php echo $companyMain; ?>";
   var str = document.getElementById(b).value;
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            }
        };
        xmlhttp.open("GET", "dosettings.php?q=" + a + "&com=" + str2 + "&type=" + c + "&value=" + str, true);
        xmlhttp.send();
  }

  function myFuncBreakKpi() {
     var para = document.getElementById("switchbuttonK");
  
     if(para.classList.contains("checked")) {
        para.classList.remove("checked");
        document.getElementById("switchbutton3334").style.display = "none";
        uppycomp2(0,'kpi',3);
     } else {
        para.classList.add("checked");
        document.getElementById("switchbutton3334").style.display = "block";
        uppycomp2(1,'kpi',3);
     }
  }

  function myFuncBreakSala() {
     var para = document.getElementById("switchbuttonS");
  
     if(para.classList.contains("checked")) {
        para.classList.remove("checked");
        document.getElementById("switchbutton3335").style.display = "none";
        uppycomp2(0,'sala',4);
     } else {
        para.classList.add("checked");
        document.getElementById("switchbutton3335").style.display = "block";
        uppycomp2(1,'sala',4);
     }
  }

  function myFuncBreakKpi2(){
   var str2 = "<?php echo $companyMain; ?>";
   var str = document.getElementById("kpi").value;

   var atcomp = document.getElementById("atcomp").value;
   var kpi = document.getElementById("kpi").value;
   var sala = document.getElementById("sala").value;
   var total = (+kpi + +sala + +atcomp);
   var tot2 = (100 - (+sala + +atcomp));

    if(total > 100){
      alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
      document.getElementById("kpi").value = tot2;
    } else {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            }
        };
        xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=5", true);
        xmlhttp.send();
    }
  }

  function myFuncBreakSala2(){
   var str2 = "<?php echo $companyMain; ?>";
   var str = document.getElementById("sala").value;

   var atcomp = document.getElementById("atcomp").value;
   var kpi = document.getElementById("kpi").value;
   var sala = document.getElementById("sala").value;
   var total = (+kpi + +sala + +atcomp);
   var tot2 = (100 - (+kpi + +atcomp));

    if(total > 100){
      alert("Maximum reached. Total of KPI, Attendance and Salary is more than 100%. Maximum is " + tot2 + " ortherwise reduce others");
      document.getElementById("sala").value = tot2;
    } else {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            }
        };
        xmlhttp.open("GET", "dosettings.php?q=" + str + "&com=" + str2 + "&type=6", true);
        xmlhttp.send();
    }
  }
</script>

           <!--
          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Location Services</h6>
            <p class="op-5 tx-13">Allowing us to access your location</p>
            <div class="br-switchbutton">
              <input type="hidden" name="switch3" value="false">
              <span></span>
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Newsletter Subscription</h6>
            <p class="op-5 tx-13">Enables you to send us news and updates send straight to your email.</p>
            <div class="br-switchbutton checked">
              <input type="hidden" name="switch4" value="true">
              <span></span>
            </div>
          </div>
          -->

          <div class="pd-y-10 pd-x-25">
            <h6 class="tx-13 tx-normal tx-white mg-b-20">More Settings</h6>
            <a href="devices.php" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Device Settings</a>
            <a href="locations.php" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Location Settings</a>
            <a href="departments.php" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Department Settings</a>
          </div>
        </div>
      </div><!-- tab-content -->

    </div><!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
<?php
}
?>