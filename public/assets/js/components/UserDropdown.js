import { logout, getCurrentUser } from '../api.js';

export default {
    template: `
    <li class="dropdown" v-if="user">
      <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <span class="account-user-avatar">
          <img src="/assets/images/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
        </span>
        <span class="d-lg-flex flex-column gap-1 d-none">
          <h5 class="my-0">{{ user.name }}</h5>
          <h6 class="my-0 fw-normal">User</h6>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
        <div class="dropdown-header noti-title">
          <h6 class="text-overflow m-0">Welcome!</h6>
        </div>

        <a href="javascript:void(0);" class="dropdown-item">
          <i class="mdi mdi-account-circle me-1"></i>
          <span>My Account</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item">
          <i class="mdi mdi-account-edit me-1"></i>
          <span>Settings</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item">
          <i class="mdi mdi-lifebuoy me-1"></i>
          <span>Support</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item">
          <i class="mdi mdi-lock-outline me-1"></i>
          <span>Lock Screen</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item" @click="handleLogout">
          <i class="mdi mdi-logout me-1"></i>
          <span>Logout</span>
        </a>
      </div>
    </li>
  `,
    setup() {
        const { ref, onMounted } = Vue;
        const user = ref(null);

        const fetchUser = async () => {
            try {
                const response = await getCurrentUser();
                if (response.data.status === 'success') {
                    user.value = response.data.user;
                }
            } catch (error) {
                console.error(error);
            }
        };

        const handleLogout = async () => {
            await logout();
            window.location.href = '/login';
        };

        onMounted(fetchUser);

        return { user, handleLogout };
    }
};
