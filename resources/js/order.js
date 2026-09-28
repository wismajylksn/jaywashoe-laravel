document.addEventListener('DOMContentLoaded', function() {
    const minusBtns = document.querySelectorAll('.btn-qty-minus');
    const plusBtns = document.querySelectorAll('.btn-qty-plus');
    const triggerText = document.getElementById('serviceTriggerText');
    const qtyInputs = document.querySelectorAll('.qty-input');
    const submitBtn = document.getElementById('submitBtn');

    // Element Promo & Tagihan
    const billingBox = document.getElementById('billingBox');
    const subtotalText = document.getElementById('subtotalText');
    const discountRow = document.getElementById('discountRow');
    const discountAmountText = document.getElementById('discountAmountText');
    const discountBadge = document.getElementById('discountBadge');
    const originalTotalText = document.getElementById('originalTotalText');
    const finalTotalText = document.getElementById('finalTotalText');
    const promoInput = document.getElementById('promoCodeInput');
    const promoBtn = document.getElementById('applyPromoBtn');
    const promoMessage = document.getElementById('promoMessage');

    // State Variabel
    let currentSubtotal = 0;
    let activePromo = null;

    // Formatter Uang Rupiah
    const formatRupiah = (number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    };

    // Fungsi Hitung Total Keseluruhan
    function calculateFinalTotal() {
        let finalTotal = currentSubtotal;
        let discountAmount = 0;

        if (currentSubtotal > 0) {
            billingBox.style.display = 'block';
            submitBtn.disabled = false;

            if (activePromo) {
                if (activePromo.type === 'percent') {
                    discountAmount = currentSubtotal * (activePromo.value / 100);
                    discountBadge.textContent = `${activePromo.value}%`;
                } else {
                    discountAmount = activePromo.value;
                    discountBadge.textContent = "Potongan";
                }

                if (discountAmount > currentSubtotal) discountAmount = currentSubtotal;

                finalTotal = currentSubtotal - discountAmount;
                discountRow.style.display = 'flex';
                discountAmountText.textContent = `- ${formatRupiah(discountAmount)}`;
                originalTotalText.style.display = 'inline-block';
                originalTotalText.textContent = formatRupiah(currentSubtotal);
            } else {
                discountRow.style.display = 'none';
                originalTotalText.style.display = 'none';
            }
        } else {
            billingBox.style.display = 'none';
            submitBtn.disabled = true;
        }

        subtotalText.textContent = formatRupiah(currentSubtotal);
        finalTotalText.textContent = formatRupiah(finalTotal);
    }

    // Fungsi Update Saat Item Ditambah/Kurang
    function updateCart() {
        let totalQty = 0;
        currentSubtotal = 0;

        qtyInputs.forEach(input => {
            let qty = parseInt(input.value) || 0;
            let price = parseInt(input.getAttribute('data-price')) || 0;
            totalQty += qty;
            currentSubtotal += (qty * price);
        });

        if (totalQty > 0) {
            triggerText.innerHTML = `<span style="font-weight: 700; color: #0F172A;">${totalQty} Item</span> 
                                     <span style="color: #4F46E5; font-weight: 800; margin-left: 8px;">(${formatRupiah(currentSubtotal)})</span>`;
        } else {
            triggerText.textContent = "-- Pilih jenis perawatan --";
            triggerText.style.color = "#94A3B8";
            triggerText.style.fontWeight = "500";
        }

        calculateFinalTotal();
    }

    // --- FETCH API PROMO LOGIC ---
    if(promoBtn) {
        promoBtn.addEventListener('click', async function() {
            const code = promoInput.value.trim();
            if(!code) return;

            if (currentSubtotal === 0) {
                promoMessage.textContent = 'Pilih layanan dulu ya sebelum pakai promo!';
                promoMessage.style.color = '#EF4444';
                return;
            }

            promoBtn.disabled = true;
            promoBtn.textContent = 'Mengecek...';
            promoMessage.textContent = '';

            try {
                const response = await fetch('/check-promo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'ngrok-skip-browser-warning': '69420'
                    },
                    body: JSON.stringify({ promo_code: code })
                });

                if (!response.ok) throw new Error('Network response was not ok');
                const data = await response.json();

                if (data.valid) {
                    promoMessage.textContent = '✅ ' + data.message;
                    promoMessage.style.color = '#10B981';
                    promoInput.readOnly = true;
                    activePromo = { type: data.type, value: data.value };
                    calculateFinalTotal();
                } else {
                    promoMessage.textContent = '❌ ' + data.message;
                    promoMessage.style.color = '#EF4444';
                    activePromo = null;
                    calculateFinalTotal();
                }
            } catch (error) {
                console.error("Error detail:", error);
                promoMessage.textContent = 'Terjadi kesalahan jaringan, coba lagi.';
                promoMessage.style.color = '#EF4444';
            }

            promoBtn.disabled = false;
            promoBtn.textContent = 'Terapkan';
        });
    }

    if(promoInput) {
        promoInput.addEventListener('click', function() {
            if (this.readOnly) {
                this.readOnly = false;
                this.value = '';
                promoMessage.textContent = '';
                activePromo = null;
                calculateFinalTotal();
            }
        });
    }

    minusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.nextElementSibling;
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
                updateCart();
            }
        });
    });

    plusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            updateCart();
        });
    });

    if(submitBtn) submitBtn.disabled = true;

    // Cegah Double Submit
    const orderForm = document.querySelector('form');
    if(orderForm && submitBtn) {
        orderForm.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Memproses...
            `;
        });
    }
});