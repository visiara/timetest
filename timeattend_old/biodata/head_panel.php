    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-200 transition">
            <h4 id="brTime" class="br-time center" style="color:black !important;"></h4>
        </div><!-- input-group -->
        <div class="input-group hidden-xs-down wd-300 transition">
            <h4 id="brDate" class="br-date center" style="color:black !important;"></h4>
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <?php if($noticount > 0){ ?>
              <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
              <?php } ?>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notifications</label>
                <a href="">Mark All as Read</a>
              </div><!-- d-flex -->
              <div class="media-list">
                <!-- loop starts here -->
                <?php
$huyac=mysqli_query($conn, "SELECT * FROM notifications WHERE admin='2' AND user = '$uid' AND company='$companyMain' AND hasread='0' ORDER BY id desc");
while ($hugyac = mysqli_fetch_array($huyac))
{
  $dtype1 = $hugyac["dtype1"];
  $dtype2 = $hugyac["dtype2"];
  $dtype3 = $hugyac["dtype3"];
  $fullname = $hugyac["fullname"];
  $story = $hugyac["story"];
  $theddate = $hugyac["ddate"];
  $department = $hugyac["department"];
  $hasread = $hugyac["hasread"];
  $noteprofilepic = $hugyac["noteprofilepic"];

  if($hasread == '1'){
    $read = "read";
  } else {
    $read = "";
  }

  if($dtype1 == '1'){
    $thelink = "leaves.php";
  } else {
    $thelink = "exemptions.php";
  }
?>
                <a href="<?php echo $thelink; ?>" class="media-list-link <?php echo $read; ?>">
                  <div class="media">
                    <img src="../images/profilepics/<?php echo $noteprofilepic; ?>" alt="">
                    <div class="media-body">
                      <p class="noti-text"><strong><?php echo $fullname; ?></strong> <?php echo $story; ?></p>
                      <span><?php echo date("F j, Y, g:ia", $theddate); ?></span>
                    </div>
                  </div><!-- media -->
                </a>
<?php } ?>
                <!-- loop ends here -->
                <div class="dropdown-footer">
                  <a href="allnotifications.php"><i class="fas fa-angle-down"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $loggedinname; ?></span>
              <img src="../images/profilepics/<?php echo $loggedprofilepic; ?>" class="wd-32 rounded-circle" width="32" height="32" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="../images/profilepics/<?php echo $loggedprofilepic; ?>" class="wd-80 rounded-circle" width="80" height="80" alt=""></a>
                <h6 class="logged-fullname"><?php echo $loggedinfullname; ?></h6>
                <p><?php echo $loggedemail; ?></p>
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="javascript:;" data-toggle="modal" data-target="#editprofile"><i class="icon ion-ios-person"></i> Edit Login Detail</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#editprofilep"><i class="icon ion-ios-person"></i> Change Profile Picture</a></li>
                <li><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>

        <div class="navicon-right">
          <a id="btnRightMenu888" href="" class="pos-relative">
            <!--<i class="icon ion-ios-gear-outline"></i>-->
            <!-- start: if statement -->

            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->       
        
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    
    
<!-- Edit Profile -->
          <div id="editprofile" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Login Detail</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="editprofile2" action="" method="POST">
<input type="hidden" name="changepassword" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Access Information!</h3>
                          
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="User Name" value="<?php echo $uid; ?>" readonly required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="password" name="pword" class="form-control" placeholder="Password" value="<?php echo $pwd; ?>" required>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="editprofile2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->    

<!-- Force change Edit Profile -->
<div id="editprofilef" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Login Detail</h6>
                </div>
                <div class="modal-body pd-0">
<form id="editprofile2f" action="" method="POST">
<input type="hidden" name="changepassword" value="1">
<input type="hidden" name="ison" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Password Change!</h3>
                          <h5 class="tx-inverse mg-b-25">Change password to protect your account!</h5>
                          We have detected that you are still using the default password, please fill the form below to change your password to better protect your account.

    <div class="mg-t-20 mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>User Name: <span class="tx-danger">*</span></label>
        <input type="text" name="uname" class="form-control" placeholder="User Name" value="<?php echo $uid; ?>" readonly required>
      </div><!-- form-group -->
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Password: <span class="tx-danger">*</span></label>
        <input type="password" name="pword" class="form-control" placeholder="New Password" required>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="editprofile2f">Save changes</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal --> 

<!-- Edit Profile Picture -->
<div id="editprofilep" class="modal fade effect-newspaper">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
              <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Profile Picture</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-0">
<form id="editprofilep2" action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="lo" value="1">
                  <div class="row no-gutters">
                    <!-- col-12 -->
                    <div class="col-lg-12 bg-white">
                      <div class="pd-20">
                          <h3 class="tx-inverse mg-b-25">Profile Picture!</h3>
                          
    <div class="tx-center mg-b-20">
    <img src="../images/profilepics/<?php echo $loggedprofilepic; ?>" class="wd-200 rounded-circle" alt="">
    </div>
    
    <div class=" mg-b-20">
      <div class="form-group mg-b-0-force">
        <label>Choose Picture: <span class="tx-danger">*</span></label>
<div class="custom-file">
  <input type="file" id="ppic" name="filename" class="custom-file-input" onchange="dede()">
  <label class="custom-file-label" id="custom-file-label"></label>
</div>
      </div><!-- form-group -->
    </div>
       
                      </div><!-- pd-20 -->
                    </div><!-- col-6 -->
                  </div><!-- row -->
</form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-size-xs" form="editprofilep2">Save changes</button>
                  <button type="button" class="btn btn-secondary tx-size-xs" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->   

<script>
    function dede(){
      var e = document.getElementById("ppic").files[0].name;
      document.getElementById("custom-file-label").innerHTML = e;
    }
</script>