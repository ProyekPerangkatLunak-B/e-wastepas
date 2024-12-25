document.addEventListener("DOMContentLoaded", function () {
    // START modal tambah sampah

    // Fungsi untuk membuka atau menutup modal tambah sampah
    window.toggleModal = function (open) {
        const modalOverlay = document.getElementById("modal-overlay");
        modalOverlay.classList.toggle("hidden", !open);
    };

    // Variabel untuk modal konfirmasi
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
    const totalSampah = document.getElementById("totalSampah");
    let idBox = 0;

    // Fungsi untuk menambahkan sampah ke dalam box
    window.tambahKeBox = async function () {
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
            if (!$("#box-kosong")[0].classList.contains("hidden"))
                $("#box-kosong")[0].classList.add("hidden");
            // Jika kategori, jenis, dan berat sudah diisi, tambahkan ke box
            btnOk.setAttribute("type", "button");
            alertModal.classList.remove("hidden");
            alertMessage.innerHTML = "Data berhasil ditambahkan ke dalam box!";
            updateAlertClasses("inserted");
            // Menambahkan event listener untuk menutup modal saat tombol OK diklik
            btnOk.removeEventListener("click", closeAlertModal);
            btnOk.addEventListener("click", closeAlertModal);

            totalSampah.innerHTML = parseInt(totalSampah.innerHTML) + 1;

            idBox++;

            // Ambil Gambar
            try {
                const jenisData = await fetch(
                    `/api/jenis?search=${
                        jenis.options[jenis.selectedIndex].text
                    }`
                )
                    .then((response) => response.json())
                    .then((data) => data);
                const namaGambar = jenisData[0].gambar;
                const imagePath = `/img/masyarakat/gambarKategoriSampah/${namaGambar}`;
                var image = $(location).attr("origin");
                image += imagePath;

                const box = `
                <div class="relative flex items-center justify-between w-[90%] h-[120px] border-0 shadow-sm rounded-2xl overflow-hidden border-secondary-normal" id="boxInput${idBox}">
                    <button type="button" class="absolute top-0 right-0 flex flex-col items-center justify-center w-[76px] h-full rounded-l-lg bg-red-normal text-white-normal hover:bg-red-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-400 focus-visible:ring-offset-0" onclick="hapusDariBox(${idBox})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mb-1 bi bi-trash ms-2" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        <span class="text-sm ms-2">Hapus</span>
                    </button>

                    <div class="relative flex items-center justify-between w-[89%] h-full bg-gray-100 border shadow-sm rounded-2xl overflow-hidden border-secondary-normal">
                        <div class="flex items-center justify-center w-[120px] h-full overflow-hidden">
                            <img src="${image}" alt="Sampah" class="object-cover w-full h-full">
                        </div>
                        <input type="text" value="${
                            kategori.value
                        }" name="kategori[]" hidden>
                        <input type="text" value="${
                            jenis.value
                        }" name="jenis[]" hidden>
                        <input type="text" value="${
                            berat.value
                        }" name="berat[]" hidden>
                        <div class="flex flex-col items-center justify-center flex-1 px-2 ms-10 min-w-[120px]">
                            <p class="overflow-hidden text-sm font-medium text-center text-gray-600 text-wrap whitespace-nowrap text-ellipsis">
                            Kategori: ${
                                kategori.options[kategori.selectedIndex].text
                            }
                            </p>
                            <p class="overflow-hidden font-bold text-center text-black text-md text-pretty whitespace-nowrap text-ellipsis">
                                ${jenis.options[jenis.selectedIndex].text}
                            </p>
                        </div>
                        <div class="flex flex-col items-center justify-center min-w-[80px]">
                            <p class="font-bold text-green-500 me-4 text-md">
                            ${berat.value} Kilogram
                            </p>
                        </div>
                    </div>
                </div>
                `;

                boxSemuaSampah.innerHTML += box;
                resetInput();
                toggleModal(false);
            } catch (error) {
                console.error("Error fetching jenis data:", error);
                alert("Terjadi kesalahan saat mengambil data jenis sampah.");
            }
        }
    };

    window.hapusDariBox = function (id) {
        const box = document.getElementById("boxInput" + id);
        box.remove();
        totalSampah.innerHTML = parseInt(totalSampah.innerHTML) - 1;
        if (totalSampah.innerHTML == 0) {
            $("#box-kosong")[0].classList.remove("hidden");
        }
    };

    // Fungsi untuk reset
    window.resetInput = function () {
        $("#kategori").val("").trigger("change");
        $("#jenis").val("").trigger("change");
        berat.value = "";
        catatan.value = "";
    };

    // Fungsi untuk membuka modal konfirmasi
    window.kirimKonfirmasi = function () {
        if (
            totalSampah.innerHTML == 0 ||
            document.getElementById("daerah").value == "" ||
            document.getElementById("dropbox").value == "" ||
            document.getElementById("tanggal_penjemputan").value == "" ||
            document.getElementById("alamat_penjemputan").value == ""
        ) {
            btnOk.setAttribute("type", "button");
            alertModal.classList.remove("hidden");
            alertMessage.innerHTML = "Lengkapi data terlebih dahulu!";
            updateAlertClasses("cancel");
            btnOk.removeEventListener("click", closeAlertModal);
            btnOk.addEventListener("click", closeAlertModal);
            return;
        }
        openConfirmationModal();
    };

    // Menampilkan modal konfirmasi
    function openConfirmationModal() {
        confirmModal.classList.remove("hidden");
    }

    // Fungsi untuk mengirim form setelah konfirmasi
    window.sendAddRequest = function () {
        confirmModal.classList.add("hidden");
        alertModal.classList.remove("hidden");
        btnOk.setAttribute("type", "submit");
        alertMessage.innerHTML = "Permintaan Penjemputan Sedang Diproses!";
        updateAlertClasses("success");
    };

    // Menutup modal konfirmasi
    window.cancelAddRequest = function () {
        confirmModal.classList.add("hidden");
    };

    window.submitKeterangan = function () {
        const keterangan = document.getElementById("textareaKeterangan").value;
        if (keterangan.trim() === "") {
            alert("Keterangan tidak boleh kosong!");
            return;
        }
        // Set the keterangan value to the hidden input in the confirmation form
        document.getElementById("alasanPembatalan").value = keterangan;
        closeKeteranganModal();
        openConfirmationModal();
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
            btnOk.classList.remove("bg-red-normal", "hover:bg-red-400");
            btnOk.classList.add(
                "bg-secondary-normal",
                "hover:bg-secondary-300"
            );
            notifikasiAlert.classList.add("text-secondary-normal");
            notifikasiAlert.classList.remove("text-red-normal");
            underlineAlert.classList.add("bg-secondary-normal");
            underlineAlert.classList.remove("bg-red-normal");
        } else if (status == "cancel") {
            // Status gagal
            btnOk.classList.remove(
                "bg-secondary-normal",
                "hover:bg-secondary-300"
            );
            btnOk.classList.add("bg-red-normal", "hover:bg-red-400");
            notifikasiAlert.classList.add("text-red-normal");
            notifikasiAlert.classList.remove("text-secondary-normal");
            underlineAlert.classList.add("bg-red-normal");
            underlineAlert.classList.remove("bg-secondary-normal");
        } else if (status == "inserted") {
            btnOk.classList.remove("bg-red-normal", "hover:bg-red-300");
            btnOk.classList.add(
                "bg-secondary-normal",
                "hover:bg-secondary-300"
            );
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
    // END modal kirim permintaan dan notifikasi berhasil dan gagal

    // START Reset form
    const resetModal = document.getElementById("resetModal");
    const closeResetModal = document.getElementById("closeResetModal");
    const resetFormButton = document.getElementById("resetFormButton");

    window.showResetModal = function () {
        resetModal.classList.remove("hidden");
    };

    window.hideResetModal = function () {
        resetModal.classList.add("hidden");
    };

    window.resetForm = function () {
        showResetModal();
    };

    window.confirmResetForm = function () {
        const boxSemuaSampah = $("#boxSemuaSampah")[0].children;

        const tanggal = $("#tanggal_penjemputan");
        const alamat = $("#alamat_penjemputan");
        const catatan = $("#catatan");

        if (totalSampah.innerHTML != 0) totalSampah.innerHTML = 0;
        if (tanggal.val() != "") tanggal.val("");
        if (alamat.val() != "") alamat.val("");
        if (catatan.val() != "") catatan.val("");

        if (boxSemuaSampah.length == 0) return;
        else {
            for (let i = 1; i <= idBox; i++) {
                const box = boxSemuaSampah[i];
                box.remove();
            }
            $("#box-kosong")[0].classList.remove("hidden");
            resetSelect2();
            idBox = 0;
        }

        // Show success alert
        alertModal.classList.remove("hidden");
        alertMessage.innerHTML = "Form berhasil direset!";
        updateAlertClasses("success");
        btnOk.setAttribute("type", "button");
        btnOk.removeEventListener("click", closeAlertModal);
        btnOk.addEventListener("click", closeAlertModal);

        // Hide reset modal
        hideResetModal();
    };

    window.cancelResetForm = function () {
        // Show cancel alert
        alertModal.classList.remove("hidden");
        alertMessage.innerHTML = "Reset form dibatalkan!";
        updateAlertClasses("cancel");
        btnOk.setAttribute("type", "button");
        btnOk.removeEventListener("click", closeAlertModal);
        btnOk.addEventListener("click", closeAlertModal);

        // Hide reset modal
        hideResetModal();
    };

    closeResetModal.addEventListener("click", window.cancelResetForm);
    resetFormButton.addEventListener("click", window.confirmResetForm);

    document
        .getElementById("showResetModalBtn")
        .addEventListener("click", window.resetForm);

    // END Reset form

    window.resetSelect2 = function () {
        $("#kategori").val("").trigger("change");
        $("#jenis").val("").trigger("change");
        $("#daerah").val("").trigger("change");
        $("#dropbox").val("").trigger("change");
    };

    // START modal detail permintaan penjemputan
    window.openModal = function () {
        document.getElementById("alertModal").classList.remove("hidden");
    };

    window.closeModal = function () {
        document.getElementById("alertModal").classList.add("hidden");
    };
    // END modal detail permintaan penjemputan

    // START Pesan Error ketika data tidak dimasukkan
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
    // END Pesan Error ketika data tidak dimasukkan

    // START MODAL KETERANGAN PEMBATALAN PENJEMPUTAN
    window.openKeteranganModal = function () {
        document.getElementById("keteranganModal").classList.remove("hidden");
    };

    window.closeKeteranganModal = function () {
        document.getElementById("keteranganModal").classList.add("hidden");
    };

    window.openConfirmKeteranganModal = function () {
        closeKeteranganModal();
        document.getElementById("alertModal").classList.remove("hidden");
    };

    window.closeModal = function () {
        document.getElementById("alertModal").classList.add("hidden");
    };
    // END MODAL KETERANGAN PEMBATALAN PENJEMPUTAN

    // START Semua Select 2
    $("#kategori").select2({
        placeholder: "Pilih Kategori Sampah",
        allowClear: true,
        ajax: {
            url: "/api/kategori",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id_kategori,
                            text: item.nama_kategori,
                        };
                    }),
                };
            },
        },
    });

    $("#jenis").select2({
        placeholder: "Pilih jenis sampah",
        allowClear: true,
        ajax: {
            url: function () {
                const kategoriId = $("#kategori").val();
                return kategoriId ? `/api/jenis/${kategoriId}` : "/api/jenis";
            },
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id_jenis,
                            text: item.nama_jenis,
                        };
                    }),
                };
            },
        },
    });

    $("#daerah").select2({
        placeholder: "Pilih Daerah",
        allowClear: true,
        ajax: {
            url: "/api/daerah",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id_daerah,
                            text: item.nama_daerah,
                        };
                    }),
                };
            },
        },
    });

    $("#dropbox").select2({
        placeholder: "Pilih Dropbox",
        allowClear: true,
        ajax: {
            url: function () {
                const daerahId = $("#daerah").val();
                return daerahId ? `/api/dropbox/${daerahId}` : "/api/dropbox";
            },
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term, // Kirimkan keyword pencarian
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id_dropbox,
                            text: item.nama_dropbox,
                        };
                    }),
                };
            },
        },
    });

    let isAjaxTriggered = false;

    $("#kategori").on("change", function () {
        if (!isAjaxTriggered) {
            $("#jenis").val(null).trigger("change");
        }
        isAjaxTriggered = false;
    });

    $("#jenis").on("change", function () {
        const jenisId = $(this).val();
        if (jenisId) {
            $.ajax({
                url: `/api/kategori-by-jenis/${jenisId}`,
                dataType: "json",
                success: function (data) {
                    if (data && data.id_kategori) {
                        isAjaxTriggered = true;
                        $("#kategori").select2("trigger", "select", {
                            data: {
                                id: data.id_kategori,
                                text: data.nama_kategori,
                            },
                        });
                    }
                },
            });
        }
    });

    $("#daerah").on("change", function () {
        if (!isAjaxTriggered) {
            $("#dropbox").val(null).trigger("change");
        }
        isAjaxTriggered = false;
    });

    $("#dropbox").on("change", function () {
        const dropboxId = $(this).val();
        if (dropboxId) {
            $.ajax({
                url: `/api/daerah-by-dropbox/${dropboxId}`,
                dataType: "json",
                success: function (data) {
                    if (data && data.id_daerah) {
                        isAjaxTriggered = true;
                        $("#daerah").select2("trigger", "select", {
                            data: {
                                id: data.id_daerah,
                                text: data.nama_daerah,
                            },
                        });
                    }
                },
            });
        }
    });
    // END Semua Select 2
});
