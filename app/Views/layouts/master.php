<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CI4 + jQuery Project</title>

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

    <!-- Content -->
    <div id="app">
        <?php echo view('components/topbar'); ?>
        <?php echo view('components/sidebar'); ?>
        <?= $this->renderSection('content') ?>
        <?php echo view('components/footer'); ?>
    </div>

</div>

<!-- JS: jQuery + Axios -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/assets/js/axios.min.js"></script>

<!-- API helper -->
<script src="/assets/js/api.js"></script> <!-- Quan trọng! ✅ -->

<script src="/assets/js/app-init.js"></script>

<!-- Các section JS riêng -->
<?= $this->renderSection('scripts') ?>



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

<!-- App js -->
<script src="/assets/js/app.min.js"></script>

</body>
</html>
