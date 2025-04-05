window.api = {
    // POST request helper
    post: function (url, data) {
        return axios.post(url, data).catch(this.handleError);
    },

    // GET request helper
    get: function (url) {
        return axios.get(url).catch(this.handleError);
    },

    // Global error handler
    handleError: function (error) {
        console.error('API error:', error);
        throw error; // để cho .catch phía ngoài xử lý
    },

    // ========== Auth ==========
    login: function (data) {
        return this.post('/api/login', data);
    },

    register: function (data) {
        return this.post('/api/register', data);
    },

    getCurrentUser: function () {
        return this.get('/api/me');
    },

    logout: function () {
        return this.post('/api/logout', {});
    },

    // ========== QR Code ==========
    createQrCode: function (data) {
        return this.post('/api/qrcode/create', data);
    },

    listQrCode: function () {
        return this.get('/api/qrcode/list');
    },

    deleteQrCode: function (id) {
        return this.post('/api/qrcode/delete', { id: id });
    },

    // Mở rộng sau này...
};
