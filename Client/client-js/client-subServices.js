        document.addEventListener('DOMContentLoaded', function() {
            const navToggle = document.querySelector('.nav-toggle');
            const navLinks = document.querySelector('.nav-links');
            navToggle && navToggle.addEventListener('click', () => {
                const visible = navLinks.style.display === 'flex';
                navLinks.style.display = visible ? 'none' : 'flex';
            });

            const profileToggle = document.getElementById('profileToggle');
            const profileNameBtn = document.getElementById('profileNameBtn');
            const profileArrow = document.getElementById('profileArrow');
            const profileDropdown = document.getElementById('profileDropdown');
            const profile = document.querySelector('.profile');
            let profileOpen = false;

            function showProfileDropdown() {
                if (!profileDropdown) return;
                profileDropdown.classList.add('active');
                if (profileArrow) profileArrow.classList.add('rotate');
                profileOpen = true;
            }

            function hideProfileDropdown() {
                if (!profileDropdown) return;
                profileDropdown.classList.remove('active');
                if (profileArrow) profileArrow.classList.remove('rotate');
                profileOpen = false;
            }

            function toggleProfileDropdown(e) {
                e && e.stopPropagation();
                if (profileOpen) hideProfileDropdown();
                else showProfileDropdown();
            }

            if (profileToggle) profileToggle.addEventListener('click', toggleProfileDropdown);
            if (profileNameBtn) profileNameBtn.addEventListener('click', toggleProfileDropdown);
            if (profileArrow) profileArrow.addEventListener('click', toggleProfileDropdown);

            document.addEventListener('click', function(e) {
                if (!profile) return;
                if (!profile.contains(e.target)) hideProfileDropdown();
            });

            const signoutBtn = document.getElementById('signoutBtn');
            signoutBtn && signoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (typeof hideProfileDropdown === 'function') hideProfileDropdown();
                window.location.href = 'client-signoutaf.php';
            });

            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modal-title');
            const modalBody = document.getElementById('modal-body');
            const modalConfirm = document.getElementById('modalConfirm');
            const modalClose = document.getElementById('signoutClose');
            const modalCancel = document.getElementById('modalCancel');
            let modalCallback = null;

            function openModal(title, body, onConfirm) {
                modalTitle.textContent = title;
                modalBody.textContent = body;
                modal.setAttribute('aria-hidden', 'false');
                modalCallback = onConfirm || null;
            }

            function closeModal() {
                modal.setAttribute('aria-hidden', 'true');
                modalCallback = null;
            }

            modalConfirm && modalConfirm.addEventListener('click', () => {
                if (modalCallback) modalCallback();
                closeModal();
            });
            modalClose && modalClose.addEventListener('click', closeModal);
            modalCancel && modalCancel.addEventListener('click', closeModal);
            modal && modal.addEventListener('click', (ev) => {
                if (ev.target === modal) closeModal();
            });

            const subserviceModal = document.getElementById('subserviceModal');
            const subserviceTitle = document.getElementById('subserviceTitle');
            const subserviceDescription = document.getElementById('subserviceDescription');
            const subserviceAmount = document.getElementById('subserviceAmount');
            const subserviceYears = document.getElementById('subserviceYears');
            const subserviceProceed = document.getElementById('subserviceProceed');
            const subserviceClose = document.getElementById('subserviceClose');
            const subserviceCancel = document.getElementById('subserviceCancel');
            const subserviceFormModal = document.getElementById('subserviceFormModal');
            const subserviceFormTitle = document.getElementById('subserviceFormTitle');
            const subserviceFormClose = document.getElementById('subserviceFormClose');
            const subserviceFormCancel = document.getElementById('subserviceFormCancel');
            const subserviceRequestForm = document.getElementById('subserviceRequestForm');
            let selectedServiceName = '';

            document.querySelectorAll('.subservice-trigger').forEach((btn) => {
                btn.addEventListener('click', function() {
                    selectedServiceName = this.dataset.name || '';
                    subserviceTitle.textContent = selectedServiceName;
                    subserviceDescription.textContent = this.dataset.description || '';
                    subserviceAmount.textContent = this.dataset.amount || 'N/A';
                    subserviceYears.textContent = this.dataset.years || 'N/A';
                    subserviceModal.setAttribute('aria-hidden', 'false');
                });
            });

            function closeSubserviceModal() {
                subserviceModal.setAttribute('aria-hidden', 'true');
            }

            subserviceClose && subserviceClose.addEventListener('click', closeSubserviceModal);
            subserviceCancel && subserviceCancel.addEventListener('click', closeSubserviceModal);
            subserviceModal && subserviceModal.addEventListener('click', function(e) {
                if (e.target === subserviceModal) closeSubserviceModal();
            });

            function openSubserviceFormModal() {
                subserviceFormTitle.textContent = 'Request Service - ' + selectedServiceName;
                subserviceFormModal.setAttribute('aria-hidden', 'false');
            }

            function closeSubserviceFormModal() {
                subserviceFormModal.setAttribute('aria-hidden', 'true');
            }

            subserviceFormClose && subserviceFormClose.addEventListener('click', closeSubserviceFormModal);
            subserviceFormCancel && subserviceFormCancel.addEventListener('click', closeSubserviceFormModal);
            subserviceFormModal && subserviceFormModal.addEventListener('click', function(e) {
                if (e.target === subserviceFormModal) closeSubserviceFormModal();
            });

            subserviceProceed && subserviceProceed.addEventListener('click', function() {
                closeSubserviceModal();
                openSubserviceFormModal();
            });

            subserviceRequestForm && subserviceRequestForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Service request submitted for: ' + selectedServiceName);
                this.reset();
                closeSubserviceFormModal();
            });
        });
    
