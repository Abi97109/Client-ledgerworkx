(function() {
    var root = document.documentElement;
    var storageKey = 'clientPortalTheme';

    function getSavedTheme() {
        try {
            return localStorage.getItem(storageKey);
        } catch (e) {
            return null;
        }
    }

    function saveTheme(theme) {
        try {
            localStorage.setItem(storageKey, theme);
        } catch (e) {
            // Ignore storage failures in restricted environments.
        }
    }

    function setTheme(theme, toggleInput) {
        var dark = theme === 'dark';
        root.classList.toggle('dark-mode', dark);
        if (toggleInput) toggleInput.checked = dark;
    }

    function createSwitch() {
        var wrap = document.createElement('div');
        wrap.className = 'dark-mode-switch-wrap';
        wrap.innerHTML =
            '<span>Dark</span>' +
            '<label class="dark-mode-switch" aria-label="Toggle dark mode">' +
            '<input type="checkbox" class="dark-mode-switch-input">' +
            '<span class="dark-mode-slider"></span>' +
            '</label>';
        return wrap;
    }

    function init() {
        var navbar = document.querySelector('header.navbar');
        if (!navbar || navbar.querySelector('.dark-mode-switch-wrap')) return;

        var oldButton = navbar.querySelector('.dark-mode-btn');
        if (oldButton) oldButton.remove();

        var switchWrap = createSwitch();
        var switchInput = switchWrap.querySelector('.dark-mode-switch-input');

        var savedTheme = getSavedTheme();
        if (savedTheme !== 'dark' && savedTheme !== 'light') savedTheme = 'light';
        setTheme(savedTheme, switchInput);

        switchInput.addEventListener('change', function() {
            var nextTheme = switchInput.checked ? 'dark' : 'light';
            setTheme(nextTheme, switchInput);
            saveTheme(nextTheme);
        });

        var profile = navbar.querySelector('.profile');
        if (profile && profile.parentNode) {
            profile.parentNode.insertBefore(switchWrap, profile);
        } else {
            navbar.appendChild(switchWrap);
        }
    }

    var earlyTheme = getSavedTheme();
    if (earlyTheme === 'dark') root.classList.add('dark-mode');

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
