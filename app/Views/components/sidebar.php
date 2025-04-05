<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="/" class="logo logo-light">
        <span class="logo-lg">
            <img src="/assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="/" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-dark-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -->
    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="/profile">
                <img src="/assets/images/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="/dashboard" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Quản lý QR Code</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarQrCode" aria-expanded="false" aria-controls="sidebarQrCode" class="side-nav-link">
                    <i class="mdi mdi-qrcode"></i>
                    <span> QR Code </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarQrCode">
                    <ul class="side-nav-second-level">
                        <li><a href="/qrcode/create">Tạo mã QR mới</a></li>
                        <li><a href="/qrcode">Danh sách mã QR</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Quản lý Sản phẩm</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProduct" aria-expanded="false" aria-controls="sidebarProduct" class="side-nav-link">
                    <i class="mdi mdi-cube-outline"></i>
                    <span> Sản phẩm </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProduct">
                    <ul class="side-nav-second-level">
                        <li><a href="/product/create">Thêm sản phẩm mới</a></li>
                        <li><a href="/product">Danh sách sản phẩm</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Quản lý Doanh nghiệp</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBusiness" aria-expanded="false" aria-controls="sidebarBusiness" class="side-nav-link">
                    <i class="mdi mdi-domain"></i>
                    <span> Doanh nghiệp </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBusiness">
                    <ul class="side-nav-second-level">
                        <li><a href="/business/create">Thêm doanh nghiệp mới</a></li>
                        <li><a href="/business">Danh sách doanh nghiệp</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Người đại diện</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPerson" aria-expanded="false" aria-controls="sidebarPerson" class="side-nav-link">
                    <i class="mdi mdi-account-multiple"></i>
                    <span> Người đại diện </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPerson">
                    <ul class="side-nav-second-level">
                        <li><a href="/person/create">Thêm người đại diện</a></li>
                        <li><a href="/person">Danh sách người đại diện</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="/scanlog" class="side-nav-link">
                    <i class="mdi mdi-history"></i>
                    <span> Lịch sử quét mã QR </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProfile" aria-expanded="false" aria-controls="sidebarProfile" class="side-nav-link">
                    <i class="mdi mdi-account-circle"></i>
                    <span> Tài khoản của tôi </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProfile">
                    <ul class="side-nav-second-level">
                        <li><a href="/profile">Thông tin cá nhân</a></li>
                        <li><a href="/profile/change-password">Đổi mật khẩu</a></li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="/logout" class="side-nav-link">
                    <i class="mdi mdi-logout"></i>
                    <span> Đăng xuất </span>
                </a>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
