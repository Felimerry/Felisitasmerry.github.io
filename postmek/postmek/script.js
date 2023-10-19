$(document).ready(function(){
    $(document).ready(function(){
        // Menangani klik tombol "Ubah"
        $(document).on('click', '.edit-button', function(){
            // Mendapatkan data dari elemen tabel (contoh: ID, nama, jumlah pemain, alamat)
            var id = $(this).data('id');
            var namaTim = prompt("Masukkan nama tim baru:");
            var jumlahPemain = prompt("Masukkan jumlah pemain baru:");
            var alamatTim = prompt("Masukkan alamat tim baru:");
    
            // Melakukan AJAX request untuk mengubah data
            $.ajax({
                url: 'ubah_tim.php',
                method: 'POST',
                data: {id: id, nama_tim: namaTim, jumlah_pemain: jumlahPemain, alamat_tim: alamatTim},
                success: function(response){
                    console.log(response); // Cetak pesan ke konsol browser
                }
            });
        });
    
        // Menangani klik tombol "Hapus"
        $(document).on('click', '.delete-button', function(){
            // Mendapatkan ID dari elemen tombol
            var id = $(this).data('id');
    
            // Melakukan AJAX request untuk menghapus data
            $.ajax({
                url: 'hapus_tim.php',
                method: 'POST',
                data: {id: id},
                success: function(response){
                    console.log(response); // Cetak pesan ke konsol browser
                }
            });
        });
    });
    
    $("#form-tim").submit(function(event){
        event.preventDefault();

        var namaTim = $("#nama_tim").val();
        var jumlahPemain = $("#jumlah_pemain").val();
        var alamatTim = $("#alamat_tim").val();

        $.ajax({
            url: "tambah_tim.php",
            method: "POST",
            data: { nama_tim: namaTim, jumlah_pemain: jumlahPemain, alamat_tim: alamatTim },
            success: function(response){
                $("#hasil-pendaftaran").html(response);
                // Panggil fungsi untuk memuat data tim setelah pendaftaran sukses
                loadDataTim();
            }
        });
    });

    function loadDataTim(){
        $.ajax({
            url: "load_tim.php",
            method: "GET",
            success: function(data){
                $("#data-tim").html(data);
            }
        });
    }

    // Memuat data tim saat halaman dimuat
    loadDataTim();
});

$(document).ready(function(){
    // Memuat data saat halaman dimuat
    loadDataTim();

    // Menangani klik tombol "Ubah"
    $(document).on('click', '.edit-button', function(){
        var id = $(this).data('id');
        var namaTim = prompt("Masukkan nama tim baru:");
        var jumlahPemain = prompt("Masukkan jumlah pemain baru:");
        var alamatTim = prompt("Masukkan alamat tim baru:");

        $.ajax({
            url: 'ubah_tim.php',
            method: 'POST',
            data: {id: id, nama_tim: namaTim, jumlah_pemain: jumlahPemain, alamat_tim: alamatTim},
            success: function(response){
                alert(response);
                loadDataTim(); // Memuat data lagi setelah berhasil mengubah
            }
        });
    });

    // Menangani klik tombol "Hapus"
    $(document).on('click', '.delete-button', function(){
        var id = $(this).data('id');
        var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data tim ini?");
        
        if (konfirmasi) {
            $.ajax({
                url: 'hapus_tim.php',
                method: 'POST',
                data: {id: id},
                success: function(response){
                    alert(response);
                    loadDataTim(); // Memuat data lagi setelah berhasil menghapus
                }
            });
        }
    });
});

// Fungsi untuk memuat data tim
function loadDataTim() {
    fetch('load_tim.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('data-table').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
}

