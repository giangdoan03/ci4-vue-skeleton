<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <a href="/" class="logo-light">
                    <span class="logo-lg">
                        <img src="/assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <a href="/" class="logo-dark">
                    <span class="logo-lg">
                        <img src="/assets/images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="/assets/images/logo-dark-sm.png" alt="small logo">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <!-- Topbar Search Form -->
            <div class="app-search dropdown d-none d-lg-block">
                <form>
                    <div class="input-group">
                        <input type="search" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                        <span class="mdi mdi-magnify search-icon"></span>
                        <button class="input-group-text btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
            <!-- Mobile search -->
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                    <i class="ri-search-line font-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <!-- Notifications -->
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                    <i class="ri-notification-3-line font-22"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-16 fw-semibold">Notification</h6>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);" class="text-dark text-decoration-underline">
                                    <small>Clear All</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Notification items -->
                </div>
            </li>

            <!-- User Dropdown -->
            <li class="dropdown" id="user-dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button">
                    <span class="account-user-avatar">
                        <img id="user-avatar" src="/assets/images/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0" id="user-name">Guest</h5>
                        <h6 class="my-0 fw-normal" id="user-role">Visitor</h6>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-lifebuoy me-1"></i>
                        <span>Support</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="mdi mdi-lock-outline me-1"></i>
                        <span>Lock Screen</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item logout-btn">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

        </ul>
    </div>
</div>
<!-- ========== Topbar End ========== -->

<?= $this->section('scripts') ?>
<script>
    $(function() {
        console.log('Topbar script initialized');

        function fillUserData(user) {
            if (!user) {
                console.warn('No user data provided to Topbar');
                return;
            }

            console.log('Topbar received user data:', user);
            $('#user-name').text(user.name || user.username || 'Guest');
            $('#user-role').text(user.username || 'User');

            const avatarUrl = user.avatar.startsWith('http') ? user.avatar : window.location.origin + user.avatar;
            $('#user-avatar').attr('src', avatarUrl);
        }

        function waitForUserData() {
            if (window.currentUser) {
                fillUserData(window.currentUser);
            } else {
                // Đợi event hoặc check lại sau 100ms
                document.addEventListener('userDataReady', function(event) {
                    console.log('event', event)
                    fillUserData(event.detail);
                });

                setTimeout(waitForUserData, 100); // Retry sau 100ms
            }
        }

        waitForUserData();

        $(document).on('click', '.logout-btn', function(e) {
            e.preventDefault();
            axios.post('/api/logout')
                .then(function() {
                    window.location.href = '/login';
                })
                .catch(function(error) {
                    console.error('Logout failed:', error);
                });
        });
    });

</script>
<?= $this->endSection() ?>

