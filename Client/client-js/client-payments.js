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

            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modal-title');
            const modalBody = document.getElementById('modal-body');
            const modalConfirm = document.querySelector('.modal-confirm');
            const modalClose = document.querySelector('#modal .modal-close');
            const modalCancel = document.querySelector('.modal-cancel');
            const dueNowAmountEl = document.querySelector('.payment-card.due-now .payment-card-amount');
            const upcomingAmountEl = document.querySelector('.payment-card.upcoming .payment-card-amount');
            const paidAmountEl = document.querySelector('.payment-card.paid .payment-card-amount');
            let modalCallback = null;

            function parseAedAmount(text) {
                if (!text) return 0;
                const normalized = text.replace(/[^0-9.-]/g, '');
                const parsed = Number(normalized);
                return Number.isFinite(parsed) ? parsed : 0;
            }

            function formatAedAmount(value) {
                const safeValue = Number.isFinite(value) ? value : 0;
                return 'AED ' + new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                }).format(safeValue);
            }

            function updatePaymentSummaryTotals() {
                let dueNowTotal = 0;
                let upcomingTotal = 0;
                let paidTotal = 0;

                document.querySelectorAll('.payment-item').forEach((item) => {
                    const amountText = item.querySelector('.payment-item-amount') ? item.querySelector('.payment-item-amount').textContent : '';
                    const statusBadge = item.querySelector('.status-badge');
                    const amount = parseAedAmount(amountText);
                    if (!statusBadge) return;

                    if (statusBadge.classList.contains('paid')) {
                        paidTotal += amount;
                        return;
                    }

                    if (statusBadge.classList.contains('upcoming')) {
                        upcomingTotal += amount;
                        return;
                    }

                    if (statusBadge.classList.contains('payment-required') || statusBadge.classList.contains('not-completed')) {
                        dueNowTotal += amount;
                    }
                });

                if (dueNowAmountEl) dueNowAmountEl.textContent = formatAedAmount(dueNowTotal);
                if (upcomingAmountEl) upcomingAmountEl.textContent = formatAedAmount(upcomingTotal);
                if (paidAmountEl) paidAmountEl.textContent = formatAedAmount(paidTotal);
            }

            updatePaymentSummaryTotals();

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

            const signoutBtn = document.getElementById('signoutBtn');
            signoutBtn && signoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (typeof hideProfileDropdown === 'function') hideProfileDropdown();
                window.location.href = 'client-signoutaf.php';
            });

            const paymentDetailsModal = document.getElementById('paymentDetailsModal');
            const paymentDetailsClose = document.getElementById('paymentDetailsClose');
            const paymentDetailCancel = document.getElementById('paymentDetailCancel');
            const paymentDetailPayNow = document.getElementById('paymentDetailPayNow');
            const paymentDetailPayLater = document.getElementById('paymentDetailPayLater');
            const paymentDetailService = document.getElementById('paymentDetailService');
            const paymentDetailRequest = document.getElementById('paymentDetailRequest');
            const paymentDetailAmount = document.getElementById('paymentDetailAmount');
            const paymentDetailStatus = document.getElementById('paymentDetailStatus');
            const paymentDetailNote = document.getElementById('paymentDetailNote');
            let selectedPaymentDetails = null;

            function normalizeTitle(text) {
                return (text || '').replace(/[?]+/g, '-').trim();
            }

            function extractPaymentItemData(button) {
                const item = button.closest('.payment-item');
                if (!item) {
                    return {
                        title: 'Service Payment',
                        requestId: 'N/A',
                        amount: 'N/A',
                        status: 'Pending',
                        note: 'Review the payment details and choose how you want to proceed.'
                    };
                }

                const titleEl = item.querySelector('.payment-item-title');
                const requestEl = item.querySelector('.payment-item-request-id');
                const amountEl = item.querySelector('.payment-item-amount');
                const statusEl = item.querySelector('.status-badge');

                return {
                    title: titleEl ? normalizeTitle(titleEl.textContent) : 'Service Payment',
                    requestId: requestEl ? requestEl.textContent.replace('Request ID:', '').trim() : 'N/A',
                    amount: amountEl ? amountEl.textContent.trim() : 'N/A',
                    status: statusEl ? statusEl.textContent.replace(/\s+/g, ' ').trim() : 'Pending',
                    note: 'Review the service payment details and choose Pay Now or Pay Later.'
                };
            }

            function extractPaymentCardData(button) {
                const card = button.closest('.payment-card');
                if (!card) {
                    return {
                        title: 'Service Payment',
                        requestId: 'N/A',
                        amount: 'N/A',
                        status: 'Pending',
                        note: 'Review the payment details and choose how you want to proceed.'
                    };
                }

                const titleEl = card.querySelector('.payment-card-title');
                const amountEl = card.querySelector('.payment-card-amount');
                const subEl = card.querySelector('.payment-card-sub');
                const subText = subEl ? subEl.textContent.replace(/\s+/g, ' ').trim() : 'N/A';
                const parsedRequest = subText.toLowerCase().startsWith('request id:')
                    ? subText.replace(/request id:/i, '').trim()
                    : 'N/A';

                return {
                    title: titleEl ? titleEl.textContent.trim() : 'Service Payment',
                    requestId: parsedRequest,
                    amount: amountEl ? amountEl.textContent.trim() : 'N/A',
                    status: subText,
                    note: 'Review summary payment details and choose Pay Now or Pay Later.'
                };
            }

            function openPaymentDetails(data) {
                selectedPaymentDetails = data;
                paymentDetailService.textContent = data.title || 'N/A';
                paymentDetailRequest.textContent = data.requestId || 'N/A';
                paymentDetailAmount.textContent = data.amount || 'N/A';
                paymentDetailStatus.textContent = data.status || 'N/A';
                paymentDetailNote.textContent = data.note || 'Review the payment details and choose how you want to proceed.';
                paymentDetailsModal.setAttribute('aria-hidden', 'false');
            }

            function closePaymentDetails() {
                paymentDetailsModal.setAttribute('aria-hidden', 'true');
            }

            paymentDetailsClose && paymentDetailsClose.addEventListener('click', closePaymentDetails);
            paymentDetailCancel && paymentDetailCancel.addEventListener('click', closePaymentDetails);
            paymentDetailsModal && paymentDetailsModal.addEventListener('click', (ev) => {
                if (ev.target === paymentDetailsModal) closePaymentDetails();
            });

            paymentDetailPayNow && paymentDetailPayNow.addEventListener('click', () => {
                const title = selectedPaymentDetails && selectedPaymentDetails.title ? selectedPaymentDetails.title : 'this payment';
                const amount = selectedPaymentDetails && selectedPaymentDetails.amount ? selectedPaymentDetails.amount : 'N/A';
                closePaymentDetails();
                openModal('Redirect To Payment Gateway', `You are being redirected to payment gateway for ${title} (${amount}). Continue?`, () => {
                    alert('Redirecting to payment gateway...');
                });
            });

            paymentDetailPayLater && paymentDetailPayLater.addEventListener('click', () => {
                const title = selectedPaymentDetails && selectedPaymentDetails.title ? selectedPaymentDetails.title : 'this payment';
                closePaymentDetails();
                openModal('Pay Later', `${title} has been marked as pay later. You can complete payment anytime from this page.`, () => {});
            });

            const paymentActionButtons = document.querySelectorAll('.payment-item .action-btn');
            const paymentCardButtons = document.querySelectorAll('.payment-summary .payment-card-button');

            paymentActionButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const label = button.textContent.trim().toLowerCase();
                    const data = extractPaymentItemData(button);

                    if (label === 'pay now' || label === 'retry payment') {
                        openModal('Redirect To Payment Gateway', `You are being redirected to payment gateway for ${data.title} (${data.amount}). Continue?`, () => {
                            alert('Redirecting to payment gateway...');
                        });
                        return;
                    }

                    if (label === 'view receipt') {
                        const query = new URLSearchParams({
                            title: data.title,
                            request: data.requestId,
                            amount: data.amount
                        });
                        window.location.href = `client-receiptpdf.php?${query.toString()}`;
                        return;
                    }

                    if (label === 'view details') {
                        openPaymentDetails(data);
                    }
                });
            });

            paymentCardButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const label = button.textContent.trim().toLowerCase();
                    const data = extractPaymentCardData(button);

                    if (label === 'pay now') {
                        openModal('Redirect To Payment Gateway', `You are being redirected to payment gateway for ${data.title} (${data.amount}). Continue?`, () => {
                            alert('Redirecting to payment gateway...');
                        });
                        return;
                    }

                    if (label === 'view receipt') {
                        const query = new URLSearchParams({
                            title: data.title,
                            request: data.requestId,
                            amount: data.amount
                        });
                        window.location.href = `client-receiptpdf.php?${query.toString()}`;
                        return;
                    }

                    if (label === 'view details') {
                        openPaymentDetails(data);
                    }
                });
            });
        });
    


