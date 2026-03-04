                    document.addEventListener('DOMContentLoaded', function() {
                        const navToggle = document.querySelector('.nav-toggle');
                        const navLinks = document.querySelector('.nav-links');
                        navToggle && navToggle.addEventListener('click', () => {
                            const visible = navLinks.style.display === 'flex';
                            navLinks.style.display = visible ? 'none' : 'flex';
                        });

                        const packageCards = document.querySelectorAll('.packages .card[data-href]');
                        packageCards.forEach((card) => {
                            card.addEventListener('click', function(e) {
                                const link = card.getAttribute('data-href');
                                if (link) window.location.href = link;
                            });
                        });
            
                        // Profile dropdown toggle (reliable open/close on repeated clicks)
                        const profileToggle = document.getElementById('profileToggle');
                        const profileNameBtn = document.getElementById('profileNameBtn');
                        const profileArrow = document.getElementById('profileArrow');
                        const profileDropdown = document.getElementById('profileDropdown');
                        const profile = document.querySelector('.profile');
            
                        // Guard: ensure elements exist before wiring listeners
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
                                        e.stopPropagation(); // Stop the event from bubbling up to the document
                                        if (!elemExists) return;
                                        const isOpen = profileDropdown.classList.contains('active');
                                        if (isOpen) hideProfileDropdown();
                                        else showProfileDropdown();
                                    }
                        
                                    if (profileToggle) profileToggle.addEventListener('click', toggleProfileDropdown);
                                    if (profileNameBtn) profileNameBtn.addEventListener('click', toggleProfileDropdown);
                                    if (profileArrow) profileArrow.addEventListener('click', toggleProfileDropdown);
                        
                                    // Close dropdown when clicking outside
                                    document.addEventListener('click', function(e) {
                                        if (!profile) return;
                                        if (!profile.contains(e.target)) hideProfileDropdown();
                                    });
                        
                                    const modal = document.getElementById('modal');
                                    const modalTitle = document.getElementById('modal-title');
                                    const modalBody = document.getElementById('modal-body');
                                    const modalConfirm = document.querySelector('.modal-confirm');
                                    const modalCancel = document.querySelector('.modal-cancel');
                                    const modalClose = document.querySelector('.modal-close');
                                    const payNowBtn = document.querySelector('.pay-btn');
                                    const paymentDueAmountEl = document.querySelector('.stats .stat-box:last-child h2');
                                    const quickBlogLink = document.getElementById('quickBlogLink');
                                    const profileNameForPayment = document.body.dataset.profileName || '';
                                    const clientEmailForPayment = document.body.dataset.clientEmail || '';
                                    const clientPhoneForPayment = document.body.dataset.clientPhone || '';
                                    let modalConfirmAction = null;

                                    function openModal(title, body, onConfirm) {
                                        if (!modal || !modalTitle || !modalBody) return;
                                        modalTitle.textContent = title;
                                        modalBody.textContent = body;
                                        modal.classList.add('active');
                                        modal.setAttribute('aria-hidden', 'false');
                                        modalConfirmAction = typeof onConfirm === 'function' ? onConfirm : null;
                                    }

                                    function closeModal() {
                                        if (!modal) return;
                                        modal.classList.remove('active');
                                        modal.setAttribute('aria-hidden', 'true');
                                        modalConfirmAction = null;
                                    }

                                    function submitToPaymentGateway(payload) {
                                        const form = document.createElement('form');
                                        form.method = 'post';
                                        form.action = 'client-payment-gateway.php';

                                        Object.keys(payload).forEach(function(key) {
                                            const input = document.createElement('input');
                                            input.type = 'hidden';
                                            input.name = key;
                                            input.value = payload[key];
                                            form.appendChild(input);
                                        });

                                        document.body.appendChild(form);
                                        form.submit();
                                    }

                                    if (payNowBtn) {
                                        payNowBtn.addEventListener('click', function() {
                                            openModal(
                                                'Redirect to Payment Gateway',
                                                'You will be redirected to the payment gateway to complete this payment.',
                                                function() {
                                                    const amount = paymentDueAmountEl ? paymentDueAmountEl.textContent.trim() : 'Amount will be confirmed';
                                                    submitToPaymentGateway({
                                                        package_name: 'Dashboard Payment Due',
                                                        package_price: amount,
                                                        full_name: profileNameForPayment,
                                                        email: clientEmailForPayment,
                                                        phone: clientPhoneForPayment,
                                                        company_name: '',
                                                        notes: 'Initiated from dashboard Pay Now tile.',
                                                        plan: 'dashboard-payment'
                                                    });
                                                }
                                            );
                                        });
                                    }

                                    if (quickBlogLink) {
                                        quickBlogLink.addEventListener('click', function() {
                                            openModal(
                                                'Redirecting to Blog Page',
                                                'You will be redirected to the blog page.',
                                                function() {
                                                    window.location.href = 'blog.php';
                                                }
                                            );
                                        });
                                    }

                                    modalConfirm && modalConfirm.addEventListener('click', function() {
                                        const next = modalConfirmAction;
                                        closeModal();
                                        if (next) next();
                                    });

                                    modalCancel && modalCancel.addEventListener('click', closeModal);
                                    modalClose && modalClose.addEventListener('click', closeModal);
                                    modal && modal.addEventListener('click', function(e) {
                                        if (e.target === modal) closeModal();
                                    });

                                    document.addEventListener('keydown', function(e) {
                                        if (e.key === 'Escape') closeModal();
                                    });

                                    // Sign Out handler
                                    const signoutBtn = document.getElementById('signoutBtn');
                                    signoutBtn && signoutBtn.addEventListener('click', (e) => {
                                        e.preventDefault();
                                        hideProfileDropdown(); // Always close dropdown
                                        window.location.href = 'client-signoutaf.php';
                                    });
                    });
                
