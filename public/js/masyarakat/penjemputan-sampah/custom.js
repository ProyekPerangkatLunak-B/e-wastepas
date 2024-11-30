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

    // Tambah sampah ke dalam box
    const boxSemuaSampah = document.getElementById("boxSemuaSampah");
    const kategori = document.getElementById("kategori");
    const jenis = document.getElementById("jenis");
    const berat = document.getElementById("berat");
    const catatan = document.getElementById("catatan");
    const boxKosong = document.getElementById("box-kosong");

    window.tambahKeBox = function () {
        if (kategori.value == "" || jenis.value == "" || berat.value == "") {
            // Jika kategori, jenis, atau berat kosong, tampilkan pesan error
            btnOk.setAttribute("type", "button");
            alertModal.classList.remove("hidden");
            alertMessage.innerHTML =
                "Silahkan Isi Data Sampah Terlebih Dahulu!";
            updateAlertClasses("cancel");
            // Menambahkan event listener untuk menutup modal saat tombol OK diklik
            btnOk.removeEventListener("click", closeAlertModal);
            btnOk.addEventListener("click", closeAlertModal);
        } else {
            if (!boxKosong.classList.contains("hidden"))
                boxKosong.classList.add("hidden");
            // Jika kategori, jenis, dan berat sudah diisi, tambahkan ke box
            btnOk.setAttribute("type", "button");
            alertModal.classList.remove("hidden");
            alertMessage.innerHTML = "Data berhasil ditambahkan ke dalam box!";
            updateAlertClasses("inserted");
            // Menambahkan event listener untuk menutup modal saat tombol OK diklik
            btnOk.removeEventListener("click", closeAlertModal);
            btnOk.addEventListener("click", closeAlertModal);
            const box = `

            <div class="relative flex items-center justify-between w-[500px] h-[120px] px-10 py-4 bg-gray-100 border border-green-500 rounded-2xl opacity-100">
                <input type="text" value="${
                    kategori.value
                }" name="kategori[]" hidden>
                <input type="text" value="${jenis.value}" name="jenis[]" hidden>
                <input type="text" value="${berat.value}" name="berat[]" hidden>

                <div class="flex flex-col justify-start w-[60%] space-y-1">
                    <p class="font-semibold truncate">${
                        kategori.options[kategori.selectedIndex].text
                    }</p>
                    <p class="font-semibold truncate">${
                        jenis.options[jenis.selectedIndex].text
                    }</p>
                </div>

                <p class="text-xl font-bold text-green-500 w-[30%] text-right">${
                    berat.value
                }x</p>
            </div>
                    `;
            boxSemuaSampah.innerHTML += box;
            resetInput();
            toggleModal(false);
        }
    };

    function resetInput() {
        kategori.selectedIndex = 0;
        jenis.selectedIndex = 0;
        berat.value = "";
        catatan.value = "";
    }

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
        } else if (status == "inserted") {
            btnOk.classList.add(
                "bg-secondary-normal",
                "hover:bg-secondary-400"
            );
            btnOk.classList.remove("bg-red-normal", "hover:bg-red-300");
            notifikasiAlert.classList.add("text-secondary-normal");
            notifikasiAlert.classList.remove("text-red-normal");
            underlineAlert.classList.add("bg-secondary-normal");
            underlineAlert.classList.remove("bg-red-normal");
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

// START Semua Select 2
document.addEventListener("DOMContentLoaded", function () {
    $("#daerah").select2({
        placeholder: "Pilih Daerah",
        allowClear: true,
    });

    $("#dropbox").select2({
        placeholder: "Pilih Dropbox",
        allowClear: true,
        // ajax: {
        //     url: "/api/dropbox-option",
        //     dataType: "json",
        //     delay: 250,
        //     data: function (params) {
        //         return {
        //             q: params.term,
        //         };
        //     },
        //     processResults: function (data) {
        //         return {
        //             results: data,
        //         };
        //     },
        // },
    });

    $("#kategori").select2({
        placeholder: "Pilih Kategori Sampah",
        allowClear: true,
    });

    $("#jenis").select2({
        placeholder: "Pilih jenis sampah",
        allowClear: true,
        // ajax: {
        //     url: "/api/jenis-option/2",
        //     dataType: "json",
        //     delay: 250,
        //     data: function (params) {
        //         return {
        //             q: params.term,
        //         };
        //     },
        //     processResults: function (data) {
        //         return {
        //             results: data,
        //         };
        //     },
        // },
    });
});

// END Semua Select 2
