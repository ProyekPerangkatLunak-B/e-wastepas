// START modal tambah sampah
document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk membuka atau menutup modal tambah sampah
    window.toggleModal = function (open) {
        const modalOverlay = document.getElementById("modal-overlay");
        modalOverlay.classList.toggle("hidden", !open);
    };
});
// END modal tambah sampah

// START modal kirim permintaan dan notifikasi berhasil dan gagal
document.addEventListener("DOMContentLoaded", function () {
    const confirmModal = document.getElementById("confirmModal");
    const btnOk = document.getElementById("closeAlertModal");
    const alertModal = document.getElementById("alertModal");
    const alertMessage = document.getElementById("alertMessage");
    const notifikasiAlert = document.getElementById("notifikasiAlert");
    const underlineAlert = document.getElementById("underlineAlert");

    // Fungsi untuk membuka modal konfirmasi
    window.kirimKonfirmasi = function () {
        openConfirmationModal();
    };

    // Menampilkan modal konfirmasi
    function openConfirmationModal() {
        confirmModal.classList.remove("hidden");
    }

    // Fungsi untuk mengirim form setelah konfirmasi
    window.sendAddRequest = function () {
        alertModal.classList.remove("hidden");
        btnOk.setAttribute("type", "submit");
        alertMessage.innerHTML = "Permintaan Penjemputan Sedang Diproses!";
        updateAlertClasses("success");
    };

    // Menutup modal konfirmasi
    window.cancelAddRequest = function () {
        confirmModal.classList.add("hidden");
        btnOk.setAttribute("type", "button");
        alertModal.classList.remove("hidden");
        alertMessage.innerHTML = "Permintaan Penjemputan dibatalkan";
        updateAlertClasses("cancel");

        // Menambahkan event listener untuk menutup modal saat tombol OK diklik
        btnOk.removeEventListener("click", closeAlertModal);
        btnOk.addEventListener("click", closeAlertModal);
    };

    // Fungsi untuk menutup modal alert
    function closeAlertModal() {
        alertModal.classList.add("hidden");
        underlineAlert.classList.remove("bg-secondary-normal", "bg-red-normal");
    }

    // Fungsi untuk memperbarui class pada alert dan underline berdasarkan status
    function updateAlertClasses(status) {
        removeAlertClass(notifikasiAlert, underlineAlert);
        removeButtonClass(btnOk);

        if (status == "success") {
            // Status berhasil
            btnOk.classList.add(
                "bg-secondary-normal",
                "hover:bg-secondary-300"
            );
            btnOk.classList.remove("bg-red-normal", "hover:bg-red-400");
            notifikasiAlert.classList.add("text-secondary-normal");
            notifikasiAlert.classList.remove("text-red-normal");
            underlineAlert.classList.add("bg-secondary-normal");
            underlineAlert.classList.remove("bg-red-normal");
        } else if (status == "cancel") {
            // Status gagal
            btnOk.classList.add("bg-red-normal", "hover:bg-red-400");
            btnOk.classList.remove(
                "bg-secondary-normal",
                "hover:bg-secondary-300"
            );
            notifikasiAlert.classList.add("text-red-normal");
            notifikasiAlert.classList.remove("text-secondary-normal");
            underlineAlert.classList.add("bg-red-normal");
            underlineAlert.classList.remove("bg-secondary-normal");
        }
    }

    // Fungsi untuk menghapus class pada button
    function removeButtonClass(btn) {
        btn.classList.remove("bg-secondary-normal", "hover:bg-secondary-300");
        btn.classList.remove("bg-red-normal", "hover:bg-red-400");
    }

    // Fungsi untuk menghapus class pada alert dan underline
    function removeAlertClass(...elements) {
        elements.forEach(function (el) {
            el.classList.remove(
                "text-secondary-normal",
                "text-red-normal",
                "bg-secondary-normal",
                "bg-red-normal",
                "hover:bg-secondary-300",
                "hover:bg-red-400"
            );
        });
    }
});
// END modal kirim permintaan dan notifikasi berhasil dan gagal

// START modal detail permintaan penjemputan
window.openModal = function () {
    document.getElementById("alertModal").classList.remove("hidden");
};

window.closeModal = function () {
    document.getElementById("alertModal").classList.add("hidden");
};
// END modal detail permintaan penjemputan

// START Pesan Error ketika data tidak dimasukkan
document.addEventListener("DOMContentLoaded", function () {
    const errorMessage = document.getElementById("error-message");
    const dismissButton = document.getElementById("dismiss-button");

    // Cek jika tombol dismiss ada
    if (dismissButton) {
        dismissButton.addEventListener("click", function () {
            if (errorMessage) {
                errorMessage.style.display = "none";
            }
        });
    }
});
// END Pesan Error ketika data tidak dimasukkan
