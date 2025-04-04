export default {
    template: `
    <div>
      <h3>User Dashboard</h3>
      <p v-if="user">Hello, {{ user.email }}!</p>
      <button @click="logout">Logout</button>
    </div>
  `,
    setup() {
        const { ref, onMounted } = Vue;
        const user = ref(null);

        const fetchUser = async () => {
            try {
                const response = await axios.get('/api/me');
                if (response.data.status === 'success') {
                    user.value = response.data.user;
                } else {
                    window.location.href = '/login';
                }
            } catch (error) {
                window.location.href = '/login';
            }
        };

        const logout = async () => {
            await axios.post('/api/logout', {}, {
                headers: { 'Content-Type': 'application/json' }
            });
            window.location.href = '/login';
        };

        onMounted(fetchUser);

        return { user, logout };
    }
};
