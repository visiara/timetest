<?php
// BE IN ALL PAGES
include("" . __DIR__ . "/header.php");
include("" . __DIR__ . "/stats.php");

include('../auth/admin_header.php');

include("" . __DIR__ . "/adminHeader.php");
include("" . __DIR__ . "/sidebar.php");
include("" . __DIR__ . "/pageName.php");

// include("" . __DIR__ . "/rightSidebar.php");

?>

<?php echo $status; ?>


<!-- Body -->
<main class="d-flex flex-column overflow-auto mb-4 gap-4 px-3">


    <?php
    include_once(__DIR__ . '/dashboard/topCards.php');
    include_once(__DIR__ . '/dashboard/attendanceTodayCard.php');
    include_once(__DIR__ . '/dashboard/exemptionCard.php');
    include_once(__DIR__ . '/dashboard/absenteeLogCard.php');
    include_once(__DIR__ . '/dashboard/bottomCards.php');

    // BE IN ALL PAGES
    include('../auth/admin_footer.php');

    ?>
</main>