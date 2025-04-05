<?= $this->extend('layouts/master') ?>

<?= $this->section('content') ?>
<div class="content-page pt-3">
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-3 mb-2 mb-sm-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active show" id="v-pills-product-tab" data-bs-toggle="pill" href="#v-pills-product" role="tab">
                            <i class="mdi mdi-cube-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Sản phẩm</span>
                        </a>
                        <a class="nav-link" id="v-pills-business-tab" data-bs-toggle="pill" href="#v-pills-business" role="tab">
                            <i class="mdi mdi-domain d-md-none d-block"></i>
                            <span class="d-none d-md-block">Doanh nghiệp</span>
                        </a>
                        <a class="nav-link" id="v-pills-person-tab" data-bs-toggle="pill" href="#v-pills-person" role="tab">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Người dùng</span>
                        </a>
                        <a class="nav-link" id="v-pills-custom-tab" data-bs-toggle="pill" href="#v-pills-custom" role="tab">
                            <i class="mdi mdi-link-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Custom URL</span>
                        </a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- Sản phẩm -->
                        <div class="tab-pane fade active show" id="v-pills-product" role="tabpanel">
                            <?php echo view('qrcode/product'); ?>
                        </div>

                        <!-- Doanh nghiệp -->
                        <div class="tab-pane fade" id="v-pills-business" role="tabpanel">
                            <?php echo view('qrcode/business'); ?>
                        </div>

                        <!-- Người dùng -->
                        <div class="tab-pane fade" id="v-pills-person" role="tabpanel">
                            <?php echo view('qrcode/person'); ?>
                        </div>

                        <!-- Custom URL -->
                        <div class="tab-pane fade" id="v-pills-custom" role="tabpanel">
                            <?php echo view('qrcode/custom_url'); ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    console.log('QR Code Create page script initialized');

    function submitForm(formElement, type) {
        const formData = $(formElement).serializeArray();

        if (window.currentUser && window.currentUser.id) {
            formData.push({ name: 'user_id', value: window.currentUser.id });
        } else {
            $(formElement).find('.form-message').text('Không xác định được người dùng!').show();
            return;
        }

        formData.push({ name: 'type', value: type });

        api.createQrCode(formData)
            .then(function (response) {
                if (response.data.status === 'success') {
                    window.location.href = '/qrcode/list';
                } else {
                    $(formElement).find('.form-message').text(response.data.message || 'Tạo QR thất bại!').show();
                }
            })
            .catch(function (error) {
                const message = error.response?.data?.message || 'Đã xảy ra lỗi!';
                $(formElement).find('.form-message').text(message).show();
            });
    }


    $(function() {
        // Mỗi form có class chung .qr-form
        $('.qr-form').on('submit', function(e) {
            e.preventDefault();

            const type = $(this).data('type');
            submitForm(this, type);
        });
    });
</script>
<?= $this->endSection() ?>
