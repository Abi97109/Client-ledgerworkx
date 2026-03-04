document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');
    navToggle && navToggle.addEventListener('click', function() {
        const visible = navLinks && navLinks.style.display === 'flex';
        if (navLinks) navLinks.style.display = visible ? 'none' : 'flex';
    });

    const profileToggle = document.getElementById('profileToggle');
    const profileNameBtn = document.getElementById('profileNameBtn');
    const profileArrow = document.getElementById('profileArrow');
    const profileDropdown = document.getElementById('profileDropdown');
    const profile = document.querySelector('.profile');
    const signoutBtn = document.getElementById('signoutBtn');

    const elemExists = profileDropdown && (profileToggle || profileNameBtn || profileArrow);

    function showProfileDropdown() {
        if (!profileDropdown) return;
        profileDropdown.classList.add('active');
        if (profileArrow) profileArrow.classList.add('rotate');
    }

    function hideProfileDropdown() {
        if (!profileDropdown) return;
        profileDropdown.classList.remove('active');
        if (profileArrow) profileArrow.classList.remove('rotate');
    }

    function toggleProfileDropdown(e) {
        e.stopPropagation();
        if (!elemExists) return;
        const isOpen = profileDropdown.classList.contains('active');
        if (isOpen) hideProfileDropdown();
        else showProfileDropdown();
    }

    if (profileToggle) profileToggle.addEventListener('click', toggleProfileDropdown);
    if (profileNameBtn) profileNameBtn.addEventListener('click', toggleProfileDropdown);
    if (profileArrow) profileArrow.addEventListener('click', toggleProfileDropdown);

    document.addEventListener('click', function(e) {
        if (!profile) return;
        if (!profile.contains(e.target)) hideProfileDropdown();
    });

    if (signoutBtn) {
        signoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            hideProfileDropdown();
            window.location.href = 'client-signoutaf.php';
        });
    }

    const openBtn = document.getElementById('openRequestModal');
    const modal = document.getElementById('requestModal');
    const closeBtn = document.getElementById('closeRequestModal');
    const cancelBtn = document.getElementById('cancelRequestModal');
    const packageInput = document.getElementById('requestPackage');
    const selectedPlanName = document.body.dataset.selectedPlanName || '';

    if (packageInput) {
        packageInput.value = selectedPlanName;
    }

    function openModal() {
        if (!modal) return;
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
    }

    if (openBtn) {
        openBtn.addEventListener('click', openModal);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });
});
    
