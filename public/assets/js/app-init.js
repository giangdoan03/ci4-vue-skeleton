window.currentUser = null;

function initApp() {
    console.log('App init started');

    axios.get('/api/me')
        .then(function(response) {
            if (response.data.status === 'success') {
                window.currentUser = response.data.user;
                console.log('App init - currentUser:', window.currentUser);

                // Bắn sự kiện cho component khác
                document.dispatchEvent(new CustomEvent('userDataReady', { detail: window.currentUser }));
            } else {
                console.warn('App init - User not authenticated');
            }
        })
        .catch(function(error) {
            console.error('App init - Error fetching user data:', error);
        });
}

// Gọi initApp khi DOM ready
$(function() {
    initApp();
});
