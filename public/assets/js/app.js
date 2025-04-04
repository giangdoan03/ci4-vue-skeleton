import LoginForm from './components/LoginForm.js';
import RegisterForm from './components/RegisterForm.js';
import DashboardPage from './components/DashboardPage.js';
import UserDropdown from './components/UserDropdown.js';

const { createApp } = Vue;

const app = createApp({});

app.component('login-form', LoginForm);
app.component('register-form', RegisterForm);
app.component('dashboard-page', DashboardPage);
app.component('user-dropdown', UserDropdown);
document.addEventListener('click', function (e) {
    if (e.target.closest('.button-toggle-menu')) {
        console.log('Toggle button clicked!');

        const html = document.documentElement;
        const body = document.body;

        // Toggle class on body
        body.classList.toggle('sidebar-enable');
        body.classList.toggle('show');

        // Toggle class on html
        html.classList.toggle('menuitem-active');

        // Optionally, toggle attributes (nếu cần)
        const currentSize = html.getAttribute('data-sidenav-size');
        html.setAttribute('data-sidenav-size', currentSize === 'default' ? 'condensed' : 'default');
    }
});


app.mount('#app');
