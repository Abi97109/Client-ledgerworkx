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

            const serviceDetailModal = document.getElementById('serviceDetailModal');
            const serviceModalTitle = document.getElementById('serviceModalTitle');
            const serviceModalStatus = document.getElementById('serviceModalStatus');
            const serviceModalDate = document.getElementById('serviceModalDate');
            const serviceModalText = document.getElementById('serviceModalText');
            const serviceModalClose = document.getElementById('serviceModalClose');
            const serviceLinks = document.querySelectorAll('.service-link');

            const serviceDetails = {
                'business-setup-government': {
                    title: 'Business Setup & Government',
                    started: '08 Feb 2026',
                    status: 'Active',
                    detail: 'Handles company setup, licensing, and follow-up with government authorities for required approvals and submissions.'
                },
                'accounting-finance-cfo': {
                    title: 'Accounting, Finance & CFO',
                    started: '02 Feb 2026',
                    status: 'Active',
                    detail: 'Covers bookkeeping, financial reporting, and CFO advisory to support planning, cash flow, and financial decision making.'
                },
                'taxation-compliance': {
                    title: 'Taxation & Compliance',
                    started: '29 Jan 2026',
                    status: 'Active',
                    detail: 'Manages tax filings, compliance checkpoints, and deadline tracking to keep records aligned with statutory obligations.'
                },
                'legal-secretarial': {
                    title: 'Legal & Secretarial',
                    started: '20 Jan 2026',
                    status: 'Active',
                    detail: 'Supports contract drafting, board documentation, and legal-secretarial actions required for corporate governance.'
                },
                'audit-documentation': {
                    title: 'Audit & Documentation',
                    started: '16 Jan 2026',
                    status: 'Active',
                    detail: 'Maintains organized audit documentation and verification-ready files for smooth internal and external reviews.'
                },
                'advisory-strategy': {
                    title: 'Advisory & Strategy',
                    started: '10 Jan 2026',
                    status: 'Active',
                    detail: 'Provides strategic guidance on business growth, risk planning, and operational improvements.'
                },
                'technology-integration': {
                    title: 'Technology Integration',
                    started: '04 Jan 2026',
                    status: 'Active',
                    detail: 'Integrates tools and systems across operations to improve automation, reporting, and process efficiency.'
                },
                'hr-payroll-support': {
                    title: 'HR & Payroll Support',
                    started: '02 Jan 2026',
                    status: 'Active',
                    detail: 'Covers payroll processing, HR workflow coordination, and employee record support for daily operations.'
                }
            };

            function openServiceModal(serviceData) {
                serviceModalTitle.textContent = serviceData.title;
                serviceModalStatus.textContent = serviceData.status;
                serviceModalDate.textContent = 'Started: ' + serviceData.started;
                serviceModalText.textContent = serviceData.detail;
                serviceDetailModal.classList.add('active');
                serviceDetailModal.setAttribute('aria-hidden', 'false');
            }

            function closeServiceModal() {
                serviceDetailModal.classList.remove('active');
                serviceDetailModal.setAttribute('aria-hidden', 'true');
            }

            serviceLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = link.dataset.serviceId;
                    const serviceData = serviceDetails[id];
                    if (!serviceData) return;
                    openServiceModal(serviceData);
                });
            });

            serviceModalClose.addEventListener('click', closeServiceModal);
            serviceDetailModal.addEventListener('click', function(e) {
                if (e.target === serviceDetailModal) closeServiceModal();
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeServiceModal();
            });
        });
    
