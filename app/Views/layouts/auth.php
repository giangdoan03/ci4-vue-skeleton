<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?: 'Authentication' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <!-- Theme Config Js -->
    <script src="/assets/js/hyper-config.js"></script>

    <!-- Vendor css -->
    <link href="/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="authentication-bg position-relative">
<div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 800">
        <g fill-opacity="0.22">
            <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx="400" cy="400" r="600"></circle>
            <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx="400" cy="400" r="500"></circle>
            <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx="400" cy="400" r="300"></circle>
            <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx="400" cy="400" r="200"></circle>
            <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx="400" cy="400" r="100"></circle>
        </g>
    </svg>
</div>

<!-- Vue mount point -->
<div id="app">
    <?= $this->renderSection('content') ?>
</div>

<footer class="footer footer-alt">
    2018 - <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
</footer>

<!-- JS: Vue + Axios -->
<script src="/assets/js/vue.global.prod.js"></script>
<script src="/assets/js/axios.min.js"></script>

<!-- Vue App -->
<script type="module" src="/assets/js/app.js"></script>

<!-- Vector Map Js -->
<script src="/assets/js/jsvectormap.min.js"></script>
<script src="/assets/js/world-merc.js"></script>
<script src="/assets/js/world.js"></script>



</body>
</html>
