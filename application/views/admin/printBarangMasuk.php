<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/sb-admin-2.css">

    <title> <?= $title; ?> </title>
</head>

<body>
    <h2 class="mb-auto align-center"><b>INVENTORY</b></h2>
    <h3>Data Barang Masuk</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Stok</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Supplier</th>
                <th scope="col">Kategori</th>
                <th scope="col">Qty</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($stok as $s) :  ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $s['id_stok']; ?></td>
                    <td><?= $s['id_barang']; ?></td>
                    <td><?= date('d M Y', strtotime($s['tanggal'])); ?></td>
                    <td><?= $s['nama_supplier']; ?></td>
                    <td><?= $s['kategori']; ?></td>
                    <td><?= $s['qty']; ?></td>
                    <td><?= $s['satuan']; ?></td>
                    <td><?= indo_currency($s['harga_beli']); ?></td>
                    <td><?= $s['keterangan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>




<br><br><br><br><br><br>
<?= date("d M Y"); ?>
<br><br><br><br><br><br>
Mengetahui <br>


<script type="text/javascript">
    window.print();
</script>