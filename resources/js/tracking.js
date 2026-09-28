document.addEventListener('DOMContentLoaded', function() {
    const payButton = document.getElementById('pay-button');
    
    if (payButton) {
        // Menarik snapToken dari atribut 'data-snap-token' di tombol HTML
        const snapToken = payButton.getAttribute('data-snap-token');

        payButton.addEventListener('click', function () {
            if (typeof window.snap !== 'undefined' && snapToken) {
                window.snap.pay(snapToken, {
                    onSuccess: function(){
                        alert("Pembayaran berhasil!");
                        window.location.reload();
                    },
                    onPending: function(){
                        alert("Menunggu pembayaran Anda!");
                    },
                    onError: function(){
                        alert("Pembayaran gagal!");
                    },
                    onClose: function(){
                        alert("Anda menutup popup sebelum menyelesaikan pembayaran.");
                    }
                });
            } else {
                alert("Sistem pembayaran belum siap. Silakan muat ulang halaman.");
            }
        });
    }
});