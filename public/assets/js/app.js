document.addEventListener('click', function (e) {
    if (e.target.closest('.button-toggle-menu')) {
        const html = document.documentElement;
        const body = document.body;

        body.classList.toggle('sidebar-enable');
        body.classList.toggle('show');

        html.classList.toggle('menuitem-active');

        const currentSize = html.getAttribute('data-sidenav-size');
        html.setAttribute('data-sidenav-size', currentSize === 'default' ? 'condensed' : 'default');
    }
});
