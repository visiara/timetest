<?php
include_once('../includes/config.php');
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

    <meta charset="utf-8" />

    <meta property="og:site_name" content="<?php echo $siteName ?>" />
    <!-- <link rel="shortcut icon" href="assets/media/logos/favicon.ico" /> -->
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Sora:wght@100..800&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />

    <link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- vendor css -->
    <link href="../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <link href="../lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/admin/styles.css?rand=<?php echo rand(); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/admin.css?rand=<?php echo rand(); ?>"> -->


    <link href=".../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href=".../assets/plugins/global/style.bundle.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="<?php echo $localUrl; ?>css/admin/styles.css?rand=<?php echo rand(); ?>">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: system-ui;
        }

        /* 
        .odd td {
            border-bottom: 1px solid grey;
        } */

        .btn-primary {
            color: white !important;
        }

        .overlay-card {
            max-width: 900px;
            margin: 60px auto;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.08);
            border-radius: 1rem;
        }

        .border-divider {
            height: 2px;
            background-color: #eee;
        }

        .scroll-handle {
            width: 13px;
            height: 25px;
            background-color: #c1c1c1;
        }

        /* Fix overflow and height issues */
        .select2-container .select2-selection--single {
            height: 38px;
            /* Match Bootstrap form-control */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Text inside the selection */
        .select2-container .select2-selection__rendered {
            padding-right: 30px;
            /* Add space for arrow */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Arrow positioning */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 6px;
        }
    </style>
</head>