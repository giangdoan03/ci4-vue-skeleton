import { register } from '../api.js';

export default {
    template: `
    <div class="card-body p-4">

        <div class="text-center w-75 m-auto">
            <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
        </div>

        <form @submit.prevent="handleRegister">

            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input class="form-control" v-model="form.name" type="text" id="fullname" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="emailaddress" class="form-label">Email address</label>
                <input class="form-control" v-model="form.email" type="email" id="emailaddress" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" v-model="form.password" id="password" class="form-control" placeholder="Enter your password" required>
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input class="form-control" v-model="form.confirmPassword" type="password" id="confirmPassword" placeholder="Confirm your password" required>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-primary" type="submit">Sign Up</button>
            </div>

            <p v-if="message" class="text-danger text-center">{{ message }}</p>

        </form>
    </div>
    `,
    setup() {
        const { ref } = Vue;

        const form = ref({
            name: '',
            email: '',
            password: '',
            confirmPassword: ''
        });

        const message = ref('');

        const handleRegister = async () => {
            if (form.value.password !== form.value.confirmPassword) {
                message.value = 'Passwords do not match!';
                return;
            }

            try {
                const response = await register(form.value);

                if (response.data.status === 'success') {
                    window.location.href = '/login';
                } else {
                    // Nếu message là object lỗi validate
                    if (typeof response.data.message === 'object') {
                        message.value = Object.values(response.data.message).join(', ');
                    } else {
                        message.value = response.data.message;
                    }
                }
            } catch (error) {
                message.value = error.response?.data?.message || 'Registration failed';
            }
        };

        return { form, message, handleRegister };
    }
};
