<?php
include "" . __DIR__ . "/header.php";

//include ("".$_SERVER['DOCUMENT_ROOT']."/tams/stats.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="HECKER PEOPLE Project.">
    <meta name="author" content="Visiara Ltd">

    <!-- Meta -->
    <meta name="description" content="HECKER PEOPLE Project - TAMS">
    <meta name="author" content="ThemePixels">

    <title>HECKER PEOPLE</title>

    <!-- vendor css -->
    <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="../css/admin/admin.css">
    <link rel="stylesheet" href="../css/admin/styles.css?rand=<?php echo rand(); ?>">

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #loading-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #loading-overlay span {
            color: white;
            font-size: 20px;
            background: black;
            padding: 10px 20px;
            border-radius: 5px;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body onload="showPage('asset1.php');">

    <!-- ########## START: LEFT PANEL ########## -->
    <?php
    include '../auth/admin_header.php';

    include "" . __DIR__ . "/adminHeader.php";
    include "" . __DIR__ . "/sidebar.php";
    ?>
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <?php
    include "" . __DIR__ . "/rightSidebar.php";
    ?>
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <?php

    ?>
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div>

        <div
            class="ht-md-50 wd-200 wd-md-auto bg-dark pd-y-20 pd-md-y-0 pd-md-x-20 d-md-flex align-items-center justify-content-center">

        </div><!-- ht-65 -->

        <div class="br-pagetitle">
            <i class="icon ion-ios-filing-outline"></i>
            <div>
                <h4>Asset Manager</h4>
                <p class="mg-b-0">This is the file manager where you can manage files into different types of files.</p>
            </div>
        </div>

        <div class="">
            <?php echo $status; ?>

            <div id="loading-overlay"><span>Loading...</span></div>

            <div class="row row-sm mg-t-20" id="pageDiv">

            </div><!-- row -->

        </div><!--  -->

        <!-- modals -->

        <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="fileUploadForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fileName">File Name:</label>
                                <input type="text" id="fileName" name="fileName" class="form-control" required>
                            </div>

                            <!--<div class="form-group">
                                <label for="fileType">File Type:</label>
                                <select id="fileType" name="fileType" class="form-control" required>
                                    <option value="">Select File Type</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Docx">Docx</option>
                                    <option value="Image">Image</option>
                                    <option value="Audio">Audio</option>
                                    <option value="Video">Video</option>
                                    <option value="Archive">Archive</option>
                                </select>
                            </div>-->

                            <div class="form-group">
                                <label for="fileLabel">Label:</label>
                                <input type="text" id="fileLabel" name="fileLabel" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fileClassification">Classification:</label>
                                <select id="fileClassification" name="fileClassification" class="form-control" required>
                                    <option value="">Select File Classification</option>
                                    <option value="confidential">Confidential</option>
                                    <option value="public">Public</option>
                                    <option value="internal">Internal</option>
                                    <option value="restricted">Restricted</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fileInput">Upload File:</label>
                                <input type="file" id="fileInput" name="fileInput" class="form-control" required>
                            </div>

                            <input type="hidden" name="upload" value="1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit File Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="editFileId" name="editFileId">

                            <div class="form-group">
                                <label for="editFileLabel">Label:</label>
                                <input type="text" id="editFileLabel" name="editFileLabel" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="editFileClassification">Classification:</label>
                                <select id="editFileClassification" name="editFileClassification" class="form-control"
                                    required>
                                    <option value="Confidential">Confidential</option>
                                    <option value="Public">Public</option>
                                    <option value="Internal">Internal</option>
                                    <option value="Restricted">Restricted</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php

        // BE IN ALL PAGES
        include '../auth/admin_footer.php';

        ?>

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../lib/moment/min/moment.min.js"></script>
    <script src="../lib/peity/jquery.peity.min.js"></script>
    <script src="../lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../lib/rickshaw/vendor/d3.min.js"></script>
    <script src="../lib/rickshaw/vendor/d3.layout.min.js"></script>
    <script src="../lib/rickshaw/rickshaw.min.js"></script>

    <script src="../lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

    <script src="../js/bracket.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../js/widgets.js"></script>

    <script>
        function showPage(page) {
            showLoading();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("pageDiv").innerHTML = this.responseText;
                    doTable();
                }

                hideLoading();
            };
            xmlhttp.open("GET", page, true);
            xmlhttp.send();
        }

        function doTable() {
            $('#mainTableClass').DataTable({
                responsive: false,
                //dom: 'Brtip',
                paging: true,
                ordering: true,
                info: false,
                search: true,
                bLengthChange: false,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                    //lengthMenu: '_MENU_ items/page',
                }
            });

            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });
        }

        function showLoading() {
            $('#loading-overlay').show();
        }

        function hideLoading() {
            $('#loading-overlay').hide();
        }
    </script>

    <script>
        $(function() {
            'use strict';

            $('.datatable1').DataTable({
                responsive: false,
                dom: 'Brtip',
                paging: true,
                ordering: true,
                info: false,
                search: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ ',
                    //lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>

    <script>
        $(function() {
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function() {
                minimizeMenu();
            });

            //minimizeMenu();

            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input").attr({
                "max": 10, // substitute your own
                "min": 2 // values (or variables) here
            });
        });

        $(document).ready(function() {
            var a = "<?php echo $coldays; ?>";
            if (a == '0') {
                //jQuery.noConflict(); 
                $('#editprofilef').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {

            $("#fileUploadForm").on('submit', function(e) {
                e.preventDefault();
                showLoading();
                $.ajax({
                    type: 'POST',
                    url: 'assetgo.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.status == 1) {
                            $("#fileUploadModal").modal('hide');
                            alert(response.message);
                            showPage('asset1.php?ty=All');
                        } else {
                            alert(response.message);
                        }
                        hideLoading();
                    }
                });
            });

            $("#editForm").on('submit', function(e) {
                e.preventDefault();
                showLoading();

                $.ajax({
                    type: 'POST',
                    url: 'assetgo.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.status == 1) {
                            $("#editModal").modal('hide');
                            alert(response.message);
                            showPage('asset1.php?ty=All');
                        } else {
                            alert(response.message);
                        }
                        hideLoading();
                    }
                });
            });

            $("#requisitionForm3").on('submit', function(e) {
                e.preventDefault();
                showLoading();
                $.ajax({
                    type: 'POST',
                    url: 'templatego.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(response) {
                        if (response.status == 1) {
                            $("#viewTemplateModal").modal('hide');
                            alert(response.message);
                            showPage('template2.php');
                        } else {
                            alert(response.message);
                            //$('#messagedetail1').html(response.message);
                        }
                        hideLoading();
                    }
                });
            });

        });

        function editFile(id, label, classification) {
            document.getElementById("editFileId").value = id;
            document.getElementById("editFileLabel").value = label;
            document.getElementById("editFileClassification").value = classification;
            $("#editModal").modal("show");
        }

        function deleteFile(id) {
            if (confirm("Are you sure you want to delete this file?")) {
                fetch("assetgo.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `delefileId=${id}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 1) {
                            alert(data.message);
                            showPage('asset1.php?ty=All');
                        } else {
                            alert(data.message);
                        }
                    });
            }
        }

        function deleteSelectedFiles() {
            var selectedFiles = Array.from(document.querySelectorAll(".file-checkbox:checked"))
                .map(checkbox => checkbox.value);

            if (selectedFiles.length === 0) {
                alert("No files selected for deletion.");
                return;
            }

            if (confirm("Are you sure you want to delete the selected files?")) {
                fetch("assetgo.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: `delefileId2=${selectedFiles.join(',')}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 1) {
                            alert(data.message);
                            showPage('asset1.php?ty=All');
                        } else {
                            alert(data.message);
                        }
                    });
            }
        }

        function toggleSelectAll(isChecked) {
            document.querySelectorAll(".file-checkbox").forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        }

        document.getElementById("selectAllCheckbox").addEventListener("change", function() {
            toggleSelectAll(this.checked);
        });
    </script>

</body>

</html>