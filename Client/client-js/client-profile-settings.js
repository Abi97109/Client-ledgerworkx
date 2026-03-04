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
            const avatarBox = document.getElementById('avatarBox');
            const avatarPreview = document.getElementById('avatarPreview');
            const changePhotoBtn = document.getElementById('changePhotoBtn');
            const photoInput = document.getElementById('photoInput');
            const identityEmailText = document.getElementById('identityEmailText');
            const businessEmailValue = document.getElementById('businessEmailValue');
            const contactPhoneValue = document.getElementById('contactPhoneValue');
            const editEmailBtn = document.getElementById('editEmailBtn');
            const editPhoneBtn = document.getElementById('editPhoneBtn');
            const contactEditModal = document.getElementById('contactEditModal');
            const contactEditClose = document.getElementById('contactEditClose');
            const contactEditCancel = document.getElementById('contactEditCancel');
            const contactEditConfirm = document.getElementById('contactEditConfirm');
            const contactEditTitle = document.getElementById('contactEditTitle');
            const contactEditLabel = document.getElementById('contactEditLabel');
            const contactEditInput = document.getElementById('contactEditInput');
            const otpModal = document.getElementById('otpModal');
            const otpClose = document.getElementById('otpClose');
            const otpInput = document.getElementById('otpInput');
            const otpMetaText = document.getElementById('otpMetaText');
            const otpTimer = document.getElementById('otpTimer');
            const otpEditBtn = document.getElementById('otpEditBtn');
            const otpResendBtn = document.getElementById('otpResendBtn');
            const otpCancelBtn = document.getElementById('otpCancelBtn');
            const themePreferenceInputs = document.querySelectorAll('input[name="displayTheme"]');
            const defaultNavbarProfileSrc = profileToggle ? profileToggle.getAttribute('src') : '';
            const defaultAvatarPreviewSrc = avatarPreview ? avatarPreview.getAttribute('src') : '';
            const defaultAvatarHasPhoto = avatarBox ? avatarBox.classList.contains('has-photo') : false;
            const defaultBusinessEmail = businessEmailValue ? businessEmailValue.textContent.trim() : '';
            const defaultContactPhone = contactPhoneValue ? contactPhoneValue.textContent.trim() : '';
            let currentBusinessEmail = defaultBusinessEmail;
            let currentContactPhone = defaultContactPhone;
            let editField = '';
            let pendingOtpField = '';
            let pendingOtpValue = '';
            let otpTimeLeft = 120;
            let otpTimerId = null;
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

            function setThemePreference(theme) {
                const nextTheme = theme === 'dark' ? 'dark' : 'light';
                document.documentElement.classList.toggle('dark-mode', nextTheme === 'dark');
                themePreferenceInputs.forEach((input) => {
                    input.checked = input.value === nextTheme;
                });

                const darkModeSwitch = document.querySelector('.dark-mode-switch-input');
                if (darkModeSwitch) {
                    darkModeSwitch.checked = nextTheme === 'dark';
                }

                try {
                    localStorage.setItem('clientPortalTheme', nextTheme);
                } catch (err) {}
            }

            function syncThemePreferenceFromCurrentTheme() {
                const currentTheme = document.documentElement.classList.contains('dark-mode') ? 'dark' : 'light';
                themePreferenceInputs.forEach((input) => {
                    input.checked = input.value === currentTheme;
                });
            }

            modalConfirm && modalConfirm.addEventListener('click', () => {
                if (modalCallback) modalCallback();
                closeModal();
            });
            modalClose && modalClose.addEventListener('click', closeModal);
            modalCancel && modalCancel.addEventListener('click', closeModal);
            modal && modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            themePreferenceInputs.forEach((input) => {
                input.addEventListener('change', function() {
                    if (!this.checked) return;
                    setThemePreference(this.value);
                });
            });

            document.addEventListener('change', function(e) {
                if (!e.target || !e.target.classList || !e.target.classList.contains('dark-mode-switch-input')) return;
                const switchTheme = e.target.checked ? 'dark' : 'light';
                syncThemePreferenceFromCurrentTheme();
                themePreferenceInputs.forEach((input) => {
                    input.checked = input.value === switchTheme;
                });
            });

            syncThemePreferenceFromCurrentTheme();

            function openContactEditModal(type, prefillValue) {
                if (!contactEditModal || !contactEditInput || !contactEditTitle || !contactEditLabel) return;

                editField = type;
                if (type === 'email') {
                    contactEditTitle.textContent = 'Edit Business Email';
                    contactEditLabel.textContent = 'New Business Email';
                    contactEditInput.type = 'email';
                    contactEditInput.value = typeof prefillValue === 'string' ? prefillValue : currentBusinessEmail;
                } else {
                    contactEditTitle.textContent = 'Edit Phone Number';
                    contactEditLabel.textContent = 'New Phone Number';
                    contactEditInput.type = 'text';
                    contactEditInput.value = typeof prefillValue === 'string' ? prefillValue : currentContactPhone;
                }

                contactEditModal.setAttribute('aria-hidden', 'false');
                setTimeout(() => contactEditInput.focus(), 0);
            }

            function closeContactEditModal() {
                if (!contactEditModal) return;
                contactEditModal.setAttribute('aria-hidden', 'true');
                editField = '';
            }

            editEmailBtn && editEmailBtn.addEventListener('click', () => openContactEditModal('email'));
            editPhoneBtn && editPhoneBtn.addEventListener('click', () => openContactEditModal('phone'));

            contactEditClose && contactEditClose.addEventListener('click', closeContactEditModal);
            contactEditCancel && contactEditCancel.addEventListener('click', closeContactEditModal);
            contactEditModal && contactEditModal.addEventListener('click', (e) => {
                if (e.target === contactEditModal) closeContactEditModal();
            });

            function clearPendingOtpState() {
                pendingOtpField = '';
                pendingOtpValue = '';
                if (otpInput) otpInput.value = '';
            }

            function formatOtpTime(seconds) {
                const mins = Math.floor(seconds / 60);
                const secs = seconds % 60;
                return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            function stopOtpTimer() {
                if (otpTimerId) {
                    clearInterval(otpTimerId);
                    otpTimerId = null;
                }
            }

            function updateOtpTimer() {
                if (!otpTimer) return;
                otpTimer.textContent = formatOtpTime(otpTimeLeft);
            }

            function startOtpTimer() {
                stopOtpTimer();
                otpTimeLeft = 120;
                updateOtpTimer();
                otpTimerId = setInterval(() => {
                    otpTimeLeft -= 1;
                    if (otpTimeLeft <= 0) {
                        otpTimeLeft = 0;
                        updateOtpTimer();
                        stopOtpTimer();
                        openModal('OTP Expired', 'Your OTP has expired. Please click Resend OTP.');
                        return;
                    }
                    updateOtpTimer();
                }, 1000);
            }

            function openOtpModal() {
                if (!otpModal || !otpMetaText) return;
                otpMetaText.textContent = pendingOtpField === 'email'
                    ? 'Enter the OTP sent to your new email address.'
                    : 'Enter the OTP sent to your new phone number.';
                otpModal.setAttribute('aria-hidden', 'false');
                if (otpInput) otpInput.value = '';
                startOtpTimer();
                setTimeout(() => otpInput && otpInput.focus(), 0);
            }

            function closeOtpModal() {
                if (!otpModal) return;
                otpModal.setAttribute('aria-hidden', 'true');
                stopOtpTimer();
            }

            function applyOtpUpdate() {
                if (pendingOtpField === 'email') {
                    currentBusinessEmail = pendingOtpValue;
                    if (businessEmailValue) businessEmailValue.textContent = currentBusinessEmail;
                    if (identityEmailText) identityEmailText.textContent = currentBusinessEmail;
                    closeOtpModal();
                    clearPendingOtpState();
                    openModal('Saved', 'Your business email has been saved successfully.');
                    return;
                }

                if (pendingOtpField === 'phone') {
                    currentContactPhone = pendingOtpValue;
                    if (contactPhoneValue) contactPhoneValue.textContent = currentContactPhone;
                    closeOtpModal();
                    clearPendingOtpState();
                    openModal('Saved', 'Your phone number has been saved successfully.');
                }
            }

            otpClose && otpClose.addEventListener('click', () => {
                closeOtpModal();
                clearPendingOtpState();
            });
            otpCancelBtn && otpCancelBtn.addEventListener('click', () => {
                closeOtpModal();
                clearPendingOtpState();
            });
            otpModal && otpModal.addEventListener('click', (e) => {
                if (e.target === otpModal) {
                    closeOtpModal();
                    clearPendingOtpState();
                }
            });

            otpEditBtn && otpEditBtn.addEventListener('click', () => {
                const field = pendingOtpField;
                const value = pendingOtpValue;
                closeOtpModal();
                if (field) openContactEditModal(field, value);
            });

            otpResendBtn && otpResendBtn.addEventListener('click', () => {
                if (!pendingOtpField || !pendingOtpValue) return;
                startOtpTimer();
                openModal('OTP Sent', 'A new OTP has been sent successfully.');
            });

            otpInput && otpInput.addEventListener('input', () => {
                otpInput.value = otpInput.value.replace(/\D/g, '').slice(0, 6);
                if (otpInput.value.length < 6) return;

                if (otpTimeLeft <= 0) {
                    openModal('OTP Expired', 'Your OTP has expired. Please click Resend OTP.');
                    return;
                }

                applyOtpUpdate();
            });

            contactEditConfirm && contactEditConfirm.addEventListener('click', () => {
                if (!contactEditInput) return;
                const value = contactEditInput.value.trim();
                if (!value) {
                    openModal('Invalid Value', 'Please enter a value before confirming.');
                    return;
                }

                if (editField === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        openModal('Invalid Email', 'Please enter a valid email address.');
                        return;
                    }

                    pendingOtpField = 'email';
                    pendingOtpValue = value;
                    closeContactEditModal();
                    openOtpModal();
                    return;
                }

                if (editField === 'phone') {
                    const phoneRegex = /^[0-9+\-()\s]{7,20}$/;
                    if (!phoneRegex.test(value)) {
                        openModal('Invalid Phone Number', 'Please enter a valid phone number.');
                        return;
                    }

                    pendingOtpField = 'phone';
                    pendingOtpValue = value;
                    closeContactEditModal();
                    openOtpModal();
                }
            });

            const signoutBtn = document.getElementById('signoutBtn');
            signoutBtn && signoutBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (typeof hideProfileDropdown === 'function') hideProfileDropdown();
                window.location.href = 'client-signoutaf.php';
            });

            const logoutBtn = document.getElementById('logoutBtn');
            logoutBtn && logoutBtn.addEventListener('click', () => {
                openModal('Sign Out', 'Are you sure you want to sign out? You will be logged out of your account.', () => {
                    alert('You have been signed out.');
                });
            });

            const saveSettingsBtn = document.getElementById('saveSettingsBtn');
            saveSettingsBtn && saveSettingsBtn.addEventListener('click', () => {
                openModal('Save Settings', 'Do you want to save these client settings?', () => {
                    alert('Settings saved successfully.');
                });
            });

            const resetSettingsBtn = document.getElementById('resetSettingsBtn');

            function resetAllSettings() {
                document.querySelectorAll('.pref-item input[type="checkbox"]').forEach((box) => {
                    box.checked = box.dataset.defaultChecked === 'true';
                });
                document.querySelectorAll('.pref-item input[type="radio"]').forEach((radio) => {
                    radio.checked = radio.dataset.defaultChecked === 'true';
                });

                const defaultThemeInput = document.querySelector('input[name="displayTheme"][data-default-checked="true"]');
                setThemePreference(defaultThemeInput ? defaultThemeInput.value : 'light');

                if (photoInput) photoInput.value = '';
                if (avatarPreview) avatarPreview.src = defaultAvatarPreviewSrc || '';
                if (avatarBox) avatarBox.classList.toggle('has-photo', defaultAvatarHasPhoto);
                if (profileToggle && defaultNavbarProfileSrc) profileToggle.src = defaultNavbarProfileSrc;
                currentBusinessEmail = defaultBusinessEmail || '';
                currentContactPhone = defaultContactPhone || '';
                if (businessEmailValue) businessEmailValue.textContent = currentBusinessEmail;
                if (identityEmailText) identityEmailText.textContent = currentBusinessEmail;
                if (contactPhoneValue) contactPhoneValue.textContent = currentContactPhone;
                closeContactEditModal();
                closeOtpModal();
                clearPendingOtpState();
            }

            resetSettingsBtn && resetSettingsBtn.addEventListener('click', () => {
                openModal('Reset Settings', 'Do you want to reset all settings to default values?', () => {
                    resetAllSettings();
                });
            });

            changePhotoBtn && changePhotoBtn.addEventListener('click', () => {
                if (photoInput) photoInput.click();
            });

            photoInput && photoInput.addEventListener('change', function() {
                const file = this.files && this.files[0] ? this.files[0] : null;
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    openModal('Invalid File', 'Please select an image file (JPG, PNG, or WEBP).');
                    this.value = '';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    openModal('File Too Large', 'Please upload an image smaller than 5 MB.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(evt) {
                    const dataUrl = evt && evt.target ? evt.target.result : '';
                    if (!dataUrl) return;

                    if (avatarPreview) avatarPreview.src = dataUrl;
                    if (avatarBox) avatarBox.classList.add('has-photo');
                    if (profileToggle) profileToggle.src = dataUrl;

                    openModal('Profile Photo Updated', 'Your profile photo has been updated successfully.');
                };
                reader.readAsDataURL(file);
            });
        });
    
