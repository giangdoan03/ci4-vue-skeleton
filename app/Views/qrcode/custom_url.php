<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0">Tạo QR từ Đường dẫn tuỳ chọn</h4>
    </div>
    <div class="card-body">
        <form class="qr-form" data-type="custom_url">
            <div class="mb-3">
                <label class="form-label">Đường dẫn URL</label>
                <input type="url" class="form-control" name="custom_url" placeholder="https://example.com" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tạo QR Code</button>
            </div>

            <div class="form-message text-center mt-3 text-danger" style="display: none;"></div>
        </form>
    </div>
</div>
