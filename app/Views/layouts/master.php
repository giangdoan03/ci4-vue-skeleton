<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CI4 + Vue Project</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Daterangepicker css -->
    <link href="/assets/css/daterangepicker.css" rel="stylesheet" type="text/css">

    <!-- Vector Map css -->
    <link href="/assets/css/jsvectormap.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="/assets/js/hyper-config.js"></script>

    <!-- Vendor css -->
    <link href="/assets/css/vendor.min.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style">

    <!-- Icons css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">


</head>
<body>

<div class="wrapper">

    <!-- Vue mount point -->
    <div id="app">
        <!-- Header -->
        <?php echo view('components/topbar'); ?>
        <?php echo view('components/sidebar'); ?>
        <?= $this->renderSection('content') ?>
        <!-- Footer -->
        <?php echo view('components/footer'); ?>
    </div>


</div>

<!-- JS: Vue + Axios -->
<script src="/assets/js/vue.global.prod.js"></script>
<script src="/assets/js/axios.min.js"></script>

<!-- Vue App -->
<script type="module" src="/assets/js/app.js"></script>



<!-- Vendor js -->
<script src="/assets/js/vendor.min.js"></script>

<!-- Daterangepicker js -->
<script src="/assets/js/moment.min.js"></script>
<script src="/assets/js/daterangepicker.js"></script>

<!-- Apex Charts js -->
<script src="/assets/js/apexcharts.min.js"></script>

<!-- Vector Map Js -->
<script src="/assets/js/jsvectormap.min.js"></script>
<script src="/assets/js/world-merc.js"></script>
<script src="/assets/js/world.js"></script>

<!-- Dashboard App js -->
<script src="/assets/js/demo.dashboard.js"></script>

<!-- App js -->
<script src="/assets/js/app.min.js"></script>

</body>
</html>
