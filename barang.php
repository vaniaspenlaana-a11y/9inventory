<?php include '../konektor.html'; ?>

<!DOCTYPE html>

<html lang="id">
<head>
    <title>UMKM 9Inventory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
      rel="stylesheet">

<style>
/* Fungsi CSS untuk tampilan */
/* Mengatur warna latar belakang seluruh halaman */
body{
    background-color:#800020; /* Warna merah maroon */
}

/* Mengatur tampilan tulisan logo/judul navbar */
.navbar-brand{

    /* Menggunakan font Poppins dari Google Fonts */
    font-family:'Poppins',sans-serif;

    /* Ukuran huruf */
    font-size:28px;

    /* Ketebalan huruf (semi bold) */
    font-weight:600;

    /* Lebar elemen dibuat penuh */
    width:100%;

    /* Posisi teks di tengah */
    text-align:center;
}

</style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        UMKM 9Inventory
    </a>
</nav>
<div class="container bg-white shadow-lg p-4 ">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Barang</h3>

    <a href="#"
       class="btn btn-info btn-sm"
       data-toggle="modal"
       data-target="#myModalinsert">
        + Tambah Barang
    </a>
</div>

<input type="text"
       id="myInput"
       class="form-control mb-3"
       placeholder="Cari barang...">

<div class="table-responsive">

    <table class="table table-striped table-hover"
           id="myTable">

        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $no=1;
        $data=mysqli_query($konektor,"SELECT * FROM barang");

        while($d=mysqli_fetch_array($data)){
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['kodebarang']; ?></td>
            <td><?= $d['namabarang']; ?></td>
            <td>Rp <?= number_format($d['harga']); ?></td>
            <td><?= $d['satuan']; ?></td>
            <td><?= $d['stok']; ?></td>

            <td>

                <a href="#"
                   class="btn btn-warning btn-sm btn-edit"
                   data-toggle="modal"
                   data-target="#myModalupdate"

                   data-id="<?= $d['idbarang']; ?>"
                   data-kode="<?= $d['kodebarang']; ?>"
                   data-nama="<?= $d['namabarang']; ?>"
                   data-harga="<?= $d['harga']; ?>"
                   data-satuan="<?= $d['satuan']; ?>"
                   data-stok="<?= $d['stok']; ?>">

                   Ubah
                </a>

                <a href="deletebarang.html?idbarang=<?= $d['idbarang']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus data ini?')">
   Hapus
</a>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

</div>
</div>

<!-- MODAL TAMBAH -->

<div class="modal fade" id="myModalinsert">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="createbarang.html">

            <div class="modal-header">
                <h4 class="modal-title">
                    Tambah Data Barang
                </h4>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body">
            <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Kode Barang</span>
    </div>
    <input type="text" class="form-control"
                       name="kodebarang"
                       required>

  </div>
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Nama Barang</span>
    </div>
    <input type="text" class="form-control"
                       name="namabarang"
                       required>

  </div>
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Harga</span>
    </div>
    <input type="text" class="form-control"
                       name="harga"
                       required>

  </div>
                
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Satuan</span>
    </div>
                <select class="form-control"
                        name="satuan"
                        required>

                    <option value="">
                        -- Pilih Satuan --
                    </option>

                    <option value="pcs">Pcs</option>
                    <option value="pack12">Pack (12 pcs)</option>
                    <option value="dus6">Dus (isi 6)</option>
                    <option value="dus12">Dus (isi 12)</option>
                    <option value="dus24">Dus (isi 24)</option>
                    <option value="dus48">Dus (isi 48)</option>

                </select>
                </div>
                <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Stok</span>
    </div>
    <input type="text" class="form-control"
                       name="stok"
                       required>

  </div>

            </div>

            <div class="modal-footer">

                <button type="submit"
                        class="btn btn-success">
                    Simpan
                </button>

                <button type="button"
                        class="btn btn-danger"
                        data-dismiss="modal">
                    Tutup
                </button>

            </div>

        </form>

    </div>
</div>
```

</div>

<!-- MODAL UPDATE -->

<div class="modal fade" id="myModalupdate">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="updatebarang.html">
        <input type="hidden"
           id="idbarang"
           name="idbarang">

    <div class="modal-header">
        <h4 class="modal-title">
            Ubah Data Barang
        </h4>
    </div>

            <div class="modal-body">

            <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Kode Barang</span>
    </div>
    <input type="text"
                       class="form-control"
                       id="kodebarang"
                       name="kodebarang"
                       required>

  </div>
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Nama Barang</span>
    </div>
    <input type="text"
                       class="form-control"
                       id="namabarang"
                       name="namabarang"
                       required>

  </div>
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Harga</span>
    </div>
    <input type="number"
                       class="form-control"
                       id="harga"
                       name="harga"
                       required>

  </div>
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Satuan</span>
    </div>
    <select class="form-control"
                        id="satuan"
                        name="satuan"
                        required>

                    <option value="pcs">Pcs</option>
                    <option value="pack12">Pack (12 pcs)</option>
                    <option value="dus6">Dus (isi 6)</option>
                    <option value="dus12">Dus (isi 12)</option>
                    <option value="dus24">Dus (isi 24)</option>
                    <option value="dus48">Dus (isi 48)</option>

                </select>

  </div> 
  <div class="input-group mb-3">
     <div class="input-group-prepend">
       <span class="input-group-text">Stok</span>
    </div>
    <input type="number"
                       class="form-control"
                       id="stok"
                       name="stok"
                       required>

  </div>

            </div>

            <div class="modal-footer">

            <button type="submit"
                        class="btn btn-success">
                    Simpan
                </button>

                <button type="button"
                        class="btn btn-danger"
                        data-dismiss="modal">
                    Tutup
                </button>

            </div>

        </form>

    </div>
</div>

</div>

<script>

//Fungsi Javascript untuk interaksi sederhana
$(document).ready(function(){
//Fungsi Javascript Digunakan untuk mencari data barang secara langsung (live search) saat pengguna mengetik di kotak pencarian.
    $("#myInput").on("keyup", function(){

        var value=$(this).val().toLowerCase();

        $("#myTable tbody tr").filter(function(){

            $(this).toggle(
                $(this).text().toLowerCase().indexOf(value)>-1
            );

        });

    });
//Fungsi Javascript saat tombol Ubah ditekan, data barang yang dipilih langsung muncul di form modal sehingga pengguna tidak perlu mengetik ulang.
    $('.btn-edit').click(function(){

        $('#idbarang').val($(this).data('id'));
        $('#kodebarang').val($(this).data('kode'));
        $('#namabarang').val($(this).data('nama'));
        $('#harga').val($(this).data('harga'));
        $('#satuan').val($(this).data('satuan'));
        $('#stok').val($(this).data('stok'));

    });

});

</script>

</body>
</html>
