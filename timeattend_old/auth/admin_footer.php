</div>
</div>
</div>
</div>

</div>
</div>
</div>
<!--begin::Javascript-->
<script>
    var hostUrl = "./assets/";
</script>

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="./assets/plugins/global/plugins.bundle.js"></script>
<script src="./assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="./assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="./assets/js/custom/pages/user-profile/general.js"></script>
<script src="./assets/js/widgets.bundle.js"></script>
<script src="./assets/js/custom/widgets.js"></script>
<script src="./assets/js/custom/apps/chat/chat.js"></script>
<script src="./assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="./assets/js/custom/utilities/modals/create-app.js"></script>
<script src="./assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
<script src="./assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
<script src="./assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
<script src="./assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
<script src="./assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
<script src="./assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

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

<script src="../js/widgets.js"></script>
<script src="../js/bracket.js"></script>

<!-- ######################### DASHBOARD  #################################################  -->


<script>
    // $(function() {
    //     'use strict';

    //     $('#datatable1').DataTable({
    //         responsive: false,
    //         dom: 'Brtip',
    //         paging: true,
    //         ordering: true,
    //         info: false,
    //         search: false,
    //         language: {
    //             searchPlaceholder: 'Search...',
    //             sSearch: '',
    //             lengthMenu: '_MENU_ ',
    //             //lengthMenu: '_MENU_ items/page',
    //         }
    //     });

    //     // Select2
    //     $('.dataTables_length select').select2({
    //         minimumResultsForSearch: Infinity
    //     });

    // });
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
    function confirmActivation(id) {
        if (id == 'InActive') {
            return confirm('Are you sure you want to De-Activate this Data?');
        } else {
            return confirm('Are you sure you want to Activate this Data?');
        }
    }

    function confirmEdit() {
        return confirm('Are you sure you want to Edit this Data?');
    }

    function confirmDelete() {
        return confirm('Are you sure you want to Delete this Data?');
    }

    function confirmRestore() {
        return confirm('Are you sure you want to Restore this Data?');
    }
</script>
<!-- ######################### DASHBOARD  ENDS #################################################  -->



</body>

</html>