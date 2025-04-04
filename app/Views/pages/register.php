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

                    <!-- Register form -->
                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute.</p>
                        </div>

                        <form id="register-form">

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" name="name" type="text" id="fullname" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" name="email" type="email" id="emailaddress" placeholder="Enter your email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password" required>
                                    <div class="input-group-text toggle-password" style="cursor: pointer;">
                                        <span class="password-eye">👁️</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input name="confirmPassword" type="password" id="confirmPassword" class="form-control" placeholder="Confirm your password" required>
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                            </div>

                            <p class="text-danger text-center mt-3" id="register-message" style="display: none;"></p>

                        </form>

                    </div>
                    <!-- End register form -->

                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            Already have an account?
                            <a href="/login" class="text-muted ms-1"><b>Log In</b></a>
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
            const confirmInput = $('#confirmPassword');
            const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
            passwordInput.attr('type', type);
            confirmInput.attr('type', type);
        });

        // Handle register form submit
        $('#register-form').on('submit', function(e) {
            e.preventDefault();

            const formData = {
                name: $('#fullname').val(),
                email: $('#emailaddress').val(),
                password: $('#password').val(),
                confirmPassword: $('#confirmPassword').val()
            };

            // Check password match before sending
            if (formData.password !== formData.confirmPassword) {
                $('#register-message').text('Passwords do not match!').show();
                return;
            }

            api.register(formData)
                .then(function (response) {
                    if (response.data.status === 'success') {
                        window.location.href = '/login';
                    } else {
                        let message = response.data.message;
                        if (typeof message === 'object') {
                            message = Object.values(message).join(', ');
                        }
                        $('#register-message').text(message).show();
                    }
                })
                .catch(function (error) {
                    const errorMessage = error.response?.data?.message || 'Registration failed!';
                    $('#register-message').text(errorMessage).show();
                });

        });

    });
</script>
<?= $this->endSection() ?>
