import { login } from '../api.js';

export default {
    template: `
    <div class="card-body p-4">
      <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
        <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
      </div>

      <form @submit.prevent="handleLogin">
        <div class="mb-3">
          <label for="emailaddress" class="form-label">Email address</label>
          <input v-model="form.email" class="form-control" type="email" id="emailaddress" required placeholder="Enter your email">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group input-group-merge">
              <input :type="showPassword ? 'text' : 'password'" v-model="form.password" id="password" class="form-control" placeholder="Enter your password">
              <div class="input-group-text" @click="togglePassword">
                <span class="password-eye"></span>
              </div>
            </div>
        </div>

        <div class="mb-3 mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
            <label class="form-check-label" for="checkbox-signin">Remember me</label>
          </div>
        </div>

        <div class="mb-3 mb-0 text-center">
          <button class="btn btn-primary" type="submit"> Log In </button>
        </div>

        <p v-if="message" class="text-danger text-center mt-3">{{ message }}</p>
      </form>
    </div>
    `,
    setup() {
        const { ref } = Vue;

        const form = ref({ email: '', password: '' });
        const message = ref('');
        const showPassword = ref(false); // 👈 thêm biến kiểm soát trạng thái

        const togglePassword = () => {
            showPassword.value = !showPassword.value;
        };

        const handleLogin = async () => {
            try {
                const response = await login(form.value);

                if (response.data.status === 'success') {
                    window.location.href = '/dashboard';
                } else {
                    message.value = response.data.message;
                }
            } catch (error) {
                message.value = error.response?.data?.message || 'Login failed';
            }
        };

        return { form, message, handleLogin, showPassword, togglePassword };
    }

};
