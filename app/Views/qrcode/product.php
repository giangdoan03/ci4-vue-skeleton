<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0">Tạo QR cho Sản phẩm</h4>
    </div>
    <div class="card-body">
        <form class="qr-form" data-type="product">
            <div class="mb-3">
                <label class="form-label">ID Sản phẩm</label>
                <input type="number" class="form-control" name="reference_id" placeholder="Nhập ID sản phẩm" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tạo QR Code</button>
            </div>

            <div class="form-message text-center mt-3 text-danger" style="display: none;"></div>
        </form>
    </div>
</div>
