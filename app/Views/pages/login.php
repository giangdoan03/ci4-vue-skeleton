<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-header py-4 text-center bg-primary">
                        <a href="/">
                            <span><img src="/assets/images/logo.png" alt="logo" height="22"></span>
                        </a>
                    </div>

                    <!-- Login form -->
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form id="login-form">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input name="email" class="form-control" type="email" id="emailaddress" required placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text toggle-password" style="cursor: pointer;">
                                        <span class="password-eye">👁️</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Log In </button>
                            </div>

                            <p class="text-danger text-center mt-3" id="login-message" style="display: none;"></p>
                        </form>
                    </div>
                    <!-- End login form -->

                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Don't have an account?
                            <a href="/register" class="text-muted ms-1"><b>Sign Up</b></a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {

        // Toggle password visibility
        $('.toggle-password').on('click', function() {
            const passwordInput = $('#password');
            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
        });

        // Handle login form submit
        $('#login-form').on('submit', function(e) {
            e.preventDefault();

            const formData = {
                email: $('#emailaddress').val(),
                password: $('#password').val()
            };

            api.login(formData)
                .then(function (response) {
                    if (response.data.status === 'success') {
                        window.location.href = '/dashboard';
                    } else {
                        $('#login-message').text(response.data.message || 'Đăng nhập thất bại!').show();
                    }
                })
                .catch(function (error) {
                    const errorMessage = error.response?.data?.message || 'Có lỗi xảy ra khi đăng nhập!';
                    $('#login-message').text(errorMessage).show();
                });
        });

    });
</script>
<?= $this->endSection() ?>
