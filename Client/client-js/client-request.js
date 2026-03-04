        document.addEventListener('DOMContentLoaded', function() {
            // Navigation toggle for mobile
            const navToggle = document.querySelector('.nav-toggle');
            const navLinks = document.querySelector('.nav-links');
            navToggle && navToggle.addEventListener('click', () => {
                const visible = navLinks.style.display === 'flex';
                navLinks.style.display = visible ? 'none' : 'flex';
            });

            // Profile dropdown toggle
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

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!profile) return;
                if (!profile.contains(e.target)) hideProfileDropdown();
            });

            // Settings, Account Details, and Sign Out handlers
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

            // Make request cards clickable
            const cards = document.querySelectorAll('.request-card');
            cards.forEach(card => {
                card.style.cursor = 'pointer';
            });
        });

        // Request data
        const requests = [{
                title: 'Business Setup - Trade License Issuance',
                icon: 'fas fa-briefcase',
                iconColor: '#f39c12',
                status: 'In Progress',
                dueDate: 'Apr 25, 2024',
                category: 'Business Setup',
                overview: 'Prepare and submit Quarterly Financial Report for the specified timeframe. Ensure all financial statements are accurate and up-to-date.',
                instructions: [
                    'Review and finalize the income statement, balance sheet, and cash flow statement.',
                    'Ensure all entries are accurate and reconciled.',
                    'Upload the completed report through the Submit Report button below.'
                ],
                staffName: 'Jane Smith',
                staffRole: 'Trade License Specialist',
                progress: [{
                        label: 'Submitted',
                        completed: true
                    },
                    {
                        label: 'Review',
                        completed: true
                    },
                    {
                        label: 'Processing',
                        completed: true
                    },
                    {
                        label: 'Pending',
                        completed: false
                    },
                    {
                        label: 'Completed',
                        completed: false
                    }
                ],
                actionBtn: 'Upload Documents'
            },
            {
                title: 'Accounting & Finance - Monthly Bookkeeping',
                icon: 'fas fa-file-invoice',
                iconColor: '#16a085',
                status: 'Under Review',
                dueDate: 'May 10, 2024',
                category: 'Accounting',
                overview: 'Complete monthly bookkeeping and reconciliation of all accounts. Ensure accurate record keeping and financial reporting.',
                instructions: [
                    'Record all transactions in the accounting software.',
                    'Reconcile bank accounts and credit cards.',
                    'Prepare monthly financial statements and reports.'
                ],
                staffName: 'John Davis',
                staffRole: 'Senior Accountant',
                progress: [{
                        label: 'Submitted',
                        completed: true
                    },
                    {
                        label: 'Review',
                        completed: true
                    },
                    {
                        label: 'Processing',
                        completed: false
                    },
                    {
                        label: 'Pending',
                        completed: false
                    },
                    {
                        label: 'Completed',
                        completed: false
                    }
                ],
                actionBtn: 'Review Details'
            },
            {
                title: 'Taxation - VAT Filing',
                icon: 'fas fa-calculator',
                iconColor: '#6f42c1',
                status: 'Completed',
                dueDate: 'Mar 15, 2024',
                category: 'Taxation',
                overview: 'File VAT return with tax authorities. Ensure compliance with all tax regulations and deadlines.',
                instructions: [
                    'Compile all VAT transactions and invoices.',
                    'Calculate VAT amounts accurately.',
                    'Submit VAT return to the relevant tax authority.'
                ],
                staffName: 'Sarah Wilson',
                staffRole: 'Tax Consultant',
                progress: [{
                        label: 'Submitted',
                        completed: true
                    },
                    {
                        label: 'Review',
                        completed: true
                    },
                    {
                        label: 'Processing',
                        completed: true
                    },
                    {
                        label: 'Approved',
                        completed: true
                    },
                    {
                        label: 'Completed',
                        completed: true
                    }
                ],
                actionBtn: 'View Confirmation'
            }
        ];

        let activeRequestIndex = null;
        const uploadedDocumentsByRequest = {};

        function renderUploadedDocuments(index) {
            const uploadedDocsList = document.getElementById('modalUploadedDocuments');
            const actionBtn = document.getElementById('modalActionBtn');
            if (!uploadedDocsList || typeof index !== 'number') return;

            const request = requests[index];
            const docs = uploadedDocumentsByRequest[index] || [];
            uploadedDocsList.innerHTML = '';

            if (docs.length === 0) {
                const li = document.createElement('li');
                li.className = 'uploaded-doc-empty';
                li.textContent = 'No documents uploaded yet.';
                uploadedDocsList.appendChild(li);
                if (actionBtn && request && request.actionBtn.toLowerCase().includes('upload')) {
                    actionBtn.textContent = request.actionBtn;
                }
                return;
            }

            docs.forEach((fileName) => {
                const li = document.createElement('li');
                li.textContent = fileName;
                uploadedDocsList.appendChild(li);
            });

            if (actionBtn && request && request.actionBtn.toLowerCase().includes('upload')) {
                actionBtn.textContent = 'Upload More Documents';
            }
        }

        function openRequestModal(index) {
            const request = requests[index];
            const modal = document.getElementById('requestModal');
            activeRequestIndex = index;

            // Set modal data
            document.getElementById('modalTitle').textContent = request.title;
            document.getElementById('modalIcon').innerHTML = `<i class="${request.icon}"></i>`;
            document.getElementById('modalIcon').style.background = request.iconColor;
            document.getElementById('modalDueDate').textContent = request.dueDate;
            document.getElementById('modalCategory').textContent = request.category;
            document.getElementById('modalOverview').textContent = request.overview;
            document.getElementById('modalStaffName').textContent = request.staffName;
            document.getElementById('modalStaffRole').textContent = request.staffRole;
            document.getElementById('modalActionBtn').textContent = request.actionBtn;

            // Build progress steps
            const progressSteps = document.getElementById('progressSteps');
            progressSteps.innerHTML = '';
            request.progress.forEach((step, i) => {
                const stepDiv = document.createElement('div');
                stepDiv.className = 'progress-step';
                if (step.completed && i < request.progress.length - 1) {
                    stepDiv.classList.add('completed');
                } else if (step.completed) {
                    stepDiv.classList.add('active');
                }

                const circle = document.createElement('div');
                circle.className = 'progress-step-circle';
                circle.textContent = step.completed ? 'OK' : (i + 1);
                stepDiv.appendChild(circle);

                const label = document.createElement('span');
                label.textContent = step.label;
                stepDiv.appendChild(label);

                if (i < request.progress.length - 1) {
                    const line = document.createElement('div');
                    line.className = 'progress-step-line';
                    if (step.completed) line.classList.add('active');
                    stepDiv.appendChild(line);
                }

                progressSteps.appendChild(stepDiv);
            });

            // Build instructions
            const instructions = document.getElementById('modalInstructions');
            instructions.innerHTML = '';
            request.instructions.forEach(instruction => {
                const li = document.createElement('li');
                li.textContent = instruction;
                instructions.appendChild(li);
            });

            renderUploadedDocuments(index);

            // Show modal
            modal.classList.add('active');
        }

        function closeRequestModal() {
            const modal = document.getElementById('requestModal');
            modal.classList.remove('active');
        }

        function handleRequestPrimaryAction() {
            if (activeRequestIndex === null) return;
            const request = requests[activeRequestIndex];
            const action = (request.actionBtn || '').toLowerCase();

            if (action.includes('upload')) {
                const input = document.getElementById('requestDocumentInput');
                if (input) input.click();
                return;
            }

            if (action.includes('review')) {
                const modalBody = document.querySelector('#requestModal .modal-body');
                const sections = document.querySelectorAll('#requestModal .modal-section');
                if (modalBody) modalBody.scrollTo({ top: 0, behavior: 'smooth' });
                sections.forEach((section) => {
                    section.classList.add('review-highlight');
                    setTimeout(() => section.classList.remove('review-highlight'), 850);
                });
                return;
            }

            if (action.includes('confirmation')) {
                window.location.href = 'client-documents.php';
            }
        }

        const requestDocumentInput = document.getElementById('requestDocumentInput');
        requestDocumentInput && requestDocumentInput.addEventListener('change', function(e) {
            if (activeRequestIndex === null) return;
            const selectedFiles = Array.from(e.target.files || []);
            if (selectedFiles.length === 0) return;

            const existing = uploadedDocumentsByRequest[activeRequestIndex] || [];
            selectedFiles.forEach((file) => {
                if (!existing.includes(file.name)) existing.push(file.name);
            });
            uploadedDocumentsByRequest[activeRequestIndex] = existing;
            renderUploadedDocuments(activeRequestIndex);
            requestDocumentInput.value = '';
        });

        const modalActionBtn = document.getElementById('modalActionBtn');
        modalActionBtn && modalActionBtn.addEventListener('click', handleRequestPrimaryAction);

        // Close modal when clicking outside
        document.getElementById('requestModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRequestModal();
            }
        });
    

