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
            const docTiles = document.querySelectorAll('.doc-tile');
            const docModal = document.getElementById('docModal');
            const docModalClose = document.getElementById('docModalClose');
            const docModalTitle = document.getElementById('docModalTitle');
            const docModalMeta = document.getElementById('docModalMeta');
            const docPreview = document.getElementById('docPreview');
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

            function openDocModal(tile) {
                const title = tile.querySelector('.doc-title')?.textContent || 'Document';
                const meta = tile.querySelector('.doc-meta')?.textContent || '';
                docModalTitle.textContent = title;
                docModalMeta.textContent = meta;
                docPreview.innerHTML = '<i class="fas fa-file-lines"></i>' +
                    '<strong>' + title + '</strong><br>This document is available and selected.';
                docModal.classList.add('active');
                docModal.setAttribute('aria-hidden', 'false');
            }

            function closeDocModal() {
                docModal.classList.remove('active');
                docModal.setAttribute('aria-hidden', 'true');
            }

            docTiles.forEach(tile => {
                tile.addEventListener('click', function() {
                    openDocModal(tile);
                });
            });

            docModalClose.addEventListener('click', closeDocModal);
            docModal.addEventListener('click', function(e) {
                if (e.target === docModal) closeDocModal();
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeDocModal();
            });
        });
    
