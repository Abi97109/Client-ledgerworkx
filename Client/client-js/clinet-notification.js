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

            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const notificationGrid = document.getElementById('notificationGrid');
            const emptyState = document.getElementById('emptyState');
            const seenStorageKey = 'ledgerworx_notifications_seen';

            function getSeenMap() {
                try {
                    const stored = localStorage.getItem(seenStorageKey);
                    return stored ? JSON.parse(stored) : {};
                } catch (err) {
                    return {};
                }
            }

            function setSeen(id) {
                if (!id) return;
                const map = getSeenMap();
                map[id] = true;
                try {
                    localStorage.setItem(seenStorageKey, JSON.stringify(map));
                } catch (err) {
                    // ignore storage write issues
                }
            }

            function applySeenState() {
                const seenMap = getSeenMap();
                const tiles = Array.from(notificationGrid.querySelectorAll('.notification-tile'));
                tiles.forEach((tile) => {
                    const id = tile.dataset.id;
                    const defaultSeen = tile.dataset.seen === 'true';
                    const isSeen = Object.prototype.hasOwnProperty.call(seenMap, id) ? !!seenMap[id] : defaultSeen;
                    tile.dataset.seen = isSeen ? 'true' : 'false';

                    const dot = tile.querySelector('.notification-dot');
                    if (!dot) return;
                    dot.classList.toggle('seen', isSeen);
                    dot.classList.toggle('unseen', !isSeen);
                });
            }

            function applyFilters() {
                const query = searchInput.value.trim().toLowerCase();
                const sortValue = sortSelect.value;
                const tiles = Array.from(notificationGrid.querySelectorAll('.notification-tile'));

                tiles.forEach(tile => {
                    const text = tile.innerText.toLowerCase();
                    tile.style.display = text.includes(query) ? '' : 'none';
                });

                const visibleTiles = tiles.filter(tile => tile.style.display !== 'none');

                visibleTiles.sort((a, b) => {
                    const tA = new Date(a.dataset.time).getTime();
                    const tB = new Date(b.dataset.time).getTime();

                    if (sortValue === 'oldest') return tA - tB;
                    if (sortValue === 'title') return a.dataset.title.localeCompare(b.dataset.title);
                    return tB - tA;
                }).forEach(tile => notificationGrid.appendChild(tile));

                emptyState.style.display = visibleTiles.length ? 'none' : 'block';
            }

            notificationGrid.addEventListener('click', function(e) {
                const tile = e.target.closest('.notification-tile');
                if (!tile) return;
                const id = tile.dataset.id;
                if (!id) return;

                setSeen(id);
                applySeenState();
                window.location.href = 'client-notificationex.php?id=' + encodeURIComponent(id);
            });

            searchInput.addEventListener('input', applyFilters);
            sortSelect.addEventListener('change', applyFilters);
            applySeenState();
            applyFilters();
        });
    
