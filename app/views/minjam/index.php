<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <nav class="navbar">
  <div class="container-fluid">
    <a href="<?= BASE_URL; ?>/minjam/tambah" class="btn btn-primary">Tambah Peminjaman</a>
    <form class="d-flex" id="searchForm">
    <input id="searchInput" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
      <button id="resetButton" class="btn btn-outline-danger ms-2" type="reset">Reset</button>

    </form>
  </div>
</nav>

    <br>
    <br>
    <table id="example" class="table  table-striped table-bordered ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">No barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        <?php date_default_timezone_set("asia/jakarta"); ?>
        <?php foreach ($data['minjam'] as $row) :?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $row['nama_peminjam']; ?></td>
            <td><?= $row['jenis_barang']; ?></td>
            <td><?= $row['no_barang']; ?></td>
            <td><?= $row['tgl_pinjam']; ?></td>
            <td><?= $row['tgl_kembali']; ?></td>
            <td>
                <?php
                $tglPinjam = $row['tgl_pinjam'];
                $tglKembali = $row['tgl_kembali'];
                $today = date('Y-m-d H:i:s');
               
                if ($tglPinjam >= $tglKembali || $today >= $tglKembali) {
                    echo '<span class="badge bg-success">Sudah Kembali</span>';
                    $showEditButton = false; 
                    } else{
                    echo '<span class="badge bg-danger">Belum Kembali</span>';
                    $showEditButton = true; 
                }
                ?>
            </td>
            <td>
                <?php if ($showEditButton) : ?>
                    <a href="<?= BASE_URL ?>/minjam/edit/<?=$row['id'] ?>" class="btn btn-primary">Edit</a>
                <?php endif; ?>
                <a href="<?= BASE_URL ?>/minjam/hapus/<?=$row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?');">Hapus</a>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
    </tbody>
    </table>
</div>