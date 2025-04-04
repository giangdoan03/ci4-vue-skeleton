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

                    <register-form></register-form>

                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="pages-login.html" class="text-muted ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col-->
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
