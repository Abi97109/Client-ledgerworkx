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

            const uploadedGrid = document.getElementById('uploadedGrid');
            const pendingGrid = document.getElementById('pendingGrid');
            const docFileInput = document.getElementById('docFileInput');
            const deleteConfirmModal = document.getElementById('deleteConfirmModal');
            const deleteDocName = document.getElementById('deleteDocName');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            let fileTargetTile = null;
            let fileAction = '';
            let pendingDeleteTile = null;

            function getDocName(tile) {
                const titleEl = tile.querySelector('.doc-title');
                return titleEl ? titleEl.textContent.trim() : 'Document';
            }

            function openDeleteConfirm(tile) {
                pendingDeleteTile = tile;
                deleteDocName.textContent = getDocName(tile);
                deleteConfirmModal.classList.add('active');
                deleteConfirmModal.setAttribute('aria-hidden', 'false');
            }

            function closeDeleteConfirm() {
                deleteConfirmModal.classList.remove('active');
                deleteConfirmModal.setAttribute('aria-hidden', 'true');
                pendingDeleteTile = null;
            }

            function formatDate() {
                return new Date().toLocaleDateString('en-GB', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
            }

            function openFilePicker(action, tile) {
                fileAction = action;
                fileTargetTile = tile;
                docFileInput.value = '';
                docFileInput.click();
            }

            function refreshPendingEmptyState() {
                const tiles = pendingGrid.querySelectorAll('.doc-tile');
                const existingMsg = pendingGrid.querySelector('.empty-pending-msg');

                if (tiles.length === 0 && !existingMsg) {
                    const emptyMsg = document.createElement('div');
                    emptyMsg.className = 'doc-meta empty-pending-msg';
                    emptyMsg.style.gridColumn = '1 / -1';
                    emptyMsg.style.textAlign = 'center';
                    emptyMsg.style.padding = '16px';
                    emptyMsg.textContent = 'No pending documents.';
                    pendingGrid.appendChild(emptyMsg);
                }

                if (tiles.length > 0 && existingMsg) {
                    existingMsg.remove();
                }
            }

            function movePendingToUploaded(tile, fileName) {
                tile.querySelector('.doc-status').className = 'fa-solid fa-circle-check doc-status uploaded';
                tile.querySelector('.doc-status').setAttribute('aria-label', 'uploaded');
                tile.querySelector('.doc-meta').textContent = 'Updated: ' + formatDate() + ' (' + fileName + ')';
                tile.querySelector('.doc-actions').innerHTML =
                    '<button class="btn btn-view">View</button>' +
                    '<button class="btn btn-delete">Delete</button>' +
                    '<button class="btn btn-reupload">Reupload</button>';
                uploadedGrid.appendChild(tile);
                refreshPendingEmptyState();
            }

            function downloadDocument(tile) {
                const docName = getDocName(tile);
                const safeName = docName.replace(/[^a-z0-9]+/gi, '_').replace(/^_+|_+$/g, '');
                const fileContent =
                    'Document: ' + docName + '\n' +
                    'Source: Company Shared Documents\n' +
                    'Downloaded: ' + new Date().toLocaleString();

                const blob = new Blob([fileContent], { type: 'text/plain' });
                const url = URL.createObjectURL(blob);
                const anchor = document.createElement('a');
                anchor.href = url;
                anchor.download = (safeName || 'document') + '.txt';
                document.body.appendChild(anchor);
                anchor.click();
                anchor.remove();
                setTimeout(function() {
                    URL.revokeObjectURL(url);
                }, 0);
            }

            document.addEventListener('click', function(e) {
                const btn = e.target.closest('button');
                if (!btn) return;

                const tile = btn.closest('.doc-tile');
                if (!tile) return;

                if (btn.classList.contains('btn-view')) {
                    alert('Viewing: ' + getDocName(tile));
                    return;
                }

                if (btn.classList.contains('btn-download')) {
                    downloadDocument(tile);
                    return;
                }

                if (btn.classList.contains('btn-delete')) {
                    openDeleteConfirm(tile);
                    return;
                }

                if (btn.classList.contains('btn-upload')) {
                    openFilePicker('upload', tile);
                    return;
                }

                if (btn.classList.contains('btn-reupload')) {
                    openFilePicker('reupload', tile);
                }
            });

            cancelDeleteBtn.addEventListener('click', closeDeleteConfirm);

            confirmDeleteBtn.addEventListener('click', function() {
                if (pendingDeleteTile) {
                    pendingDeleteTile.remove();
                    refreshPendingEmptyState();
                }
                closeDeleteConfirm();
            });

            deleteConfirmModal.addEventListener('click', function(e) {
                if (e.target === deleteConfirmModal) {
                    closeDeleteConfirm();
                }
            });

            docFileInput.addEventListener('change', function() {
                if (!docFileInput.files || !docFileInput.files.length || !fileTargetTile) return;

                const selectedFileName = docFileInput.files[0].name;
                const docName = getDocName(fileTargetTile);

                if (fileAction === 'upload') {
                    movePendingToUploaded(fileTargetTile, selectedFileName);
                    alert('Uploaded "' + selectedFileName + '" for ' + docName + '.');
                } else if (fileAction === 'reupload') {
                    fileTargetTile.querySelector('.doc-meta').textContent = 'Updated: ' + formatDate() + ' (' + selectedFileName + ')';
                    alert('Reuploaded "' + selectedFileName + '" for ' + docName + '.');
                }

                fileAction = '';
                fileTargetTile = null;
                docFileInput.value = '';

                refreshPendingEmptyState();
            });
        });
    
