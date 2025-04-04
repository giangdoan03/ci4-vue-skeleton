// Hàm login
export async function login(data) {
    return await axios.post('/api/login', data, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
}

// Hàm register
export async function register(data) {
    return await axios.post('/api/register', data, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
}

export async function logout() {
    return await axios.post('/api/logout', {}, {
        headers: { 'Content-Type': 'application/json' }
    });
}

export async function getCurrentUser() {
    return await axios.get('/api/me');
}

