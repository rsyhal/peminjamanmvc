
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const searchForm = document.getElementById("searchForm");
        const resetButton = document.getElementById("resetButton");

        // Ketika formulir pencarian dikirim (submit), Anda dapat menangani pencarian di sini
        searchForm.addEventListener("submit", function (event) {
            event.preventDefault(); // Mencegah pengiriman formulir
            const searchTerm = searchInput.value.toLowerCase(); // Ambil nilai pencarian dan ubah ke huruf kecil

            // Loop melalui baris tabel untuk mencari yang cocok dengan pencarian
            const tableRows = document.querySelectorAll("#example tbody tr");
            tableRows.forEach(function (row) {
                const cell = row.querySelector("td:nth-child(2)"); // Ganti dengan kolom yang sesuai dengan pencarian Anda
                if (cell) {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        row.style.display = "table-row";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        });

        // Ketika tombol reset diklik, tampilkan kembali semua baris tabel
        resetButton.addEventListener("click", function () {
            const tableRows = document.querySelectorAll("#example tbody tr");
            tableRows.forEach(function (row) {
                row.style.display = "table-row";
            });
            searchInput.value = ""; // Bersihkan input pencarian
        });
    });

