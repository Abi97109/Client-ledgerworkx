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
            const modalConfirm = document.querySelector('.modal-confirm');
            const modalClose = document.querySelector('.modal-close');
            const modalCancel = document.querySelector('.modal-cancel');
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

            const taskList = document.getElementById('taskList');
            const taskDetailModal = document.getElementById('taskDetailModal');
            const taskModalTitle = document.getElementById('taskModalTitle');
            const taskModalText = document.getElementById('taskModalText');
            const taskModalGo = document.getElementById('taskModalGo');
            const taskModalClose = document.getElementById('taskModalClose');
            const taskModalCancel = document.getElementById('taskModalCancel');
            let taskTargetUrl = '';

            function closeTaskModal() {
                taskDetailModal.classList.remove('active');
                taskDetailModal.setAttribute('aria-hidden', 'true');
                taskTargetUrl = '';
            }

            taskList.addEventListener('click', function(e) {
                const item = e.target.closest('.task-item');
                if (!item) return;

                taskModalTitle.textContent = item.dataset.title;
                taskModalText.textContent = 'Status: ' + item.dataset.status + '\n\n' + item.dataset.detail;
                taskModalGo.textContent = item.dataset.targetLabel || 'Go';
                taskTargetUrl = item.dataset.target || '';

                taskDetailModal.classList.add('active');
                taskDetailModal.setAttribute('aria-hidden', 'false');
            });

            taskModalGo.addEventListener('click', function() {
                if (!taskTargetUrl) return;
                window.location.href = taskTargetUrl;
            });

            taskModalClose.addEventListener('click', closeTaskModal);
            taskModalCancel.addEventListener('click', closeTaskModal);
            taskDetailModal.addEventListener('click', function(e) {
                if (e.target === taskDetailModal) closeTaskModal();
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeTaskModal();
            });
        });
    
