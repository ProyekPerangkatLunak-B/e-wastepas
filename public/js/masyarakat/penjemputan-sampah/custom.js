// Modal Permintaan Penjemputan Sampah
document.addEventListener("DOMContentLoaded", function () {
    // Ekspose fungsi ke jendela global
    window.toggleModal = function (open) {
        document.getElementById("modal-overlay").style.display = open
            ? "flex"
            : "none";
    };

    window.openModal = function () {
        document.getElementById("alertModal").classList.remove("hidden");
    };

    window.closeModal = function () {
        document.getElementById("alertModal").classList.add("hidden");
    };
});

// Select 2 untuk permintaan-penjemputan
$(document).ready(function () {
    $("select").select2();
});
