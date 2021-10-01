<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Jika Berhasil -->

    <div class="col-md-12">
        <?= $this->session->flashdata('message'); ?>
    </div>


    <a href="<?= base_url('admin/barangMasuk'); ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Barang Masuk</a>

    <a href="<?= base_url('admin/printBarangMasuk'); ?>" class="btn btn-success mb-3 ml-5" target="_blank"><i class="fa fa-print"></i> Print</a>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-hover">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">ID Stok </th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Supplier</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- <?php $i = 1; ?> -->
                        <?php foreach ($barangMasukAll as $b) : ?>
                            <tr>
                                <th scope="col"> <?= $i; ?></th>
                                <td><?= $b['id_stok']; ?></td>
                                <td><?= $b['id_barang']; ?></td>
                                <td><?= date('d M Y', strtotime($b['tanggal'])); ?></td>
                                <td><?= $b['nama_supplier']; ?></td>
                                <td><?= $b['kategori']; ?></td>
                                <td><?= $b['qty']; ?></td>
                                <td><?= $b['satuan']; ?></td>
                                <td><?= indo_currency($b['harga_beli']); ?></td>
                                <td><?= $b['keterangan']; ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/barangMasukDelete/') . $b['id_stok']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Are you sure want to delete this supplier?');">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <!-- <?= $i++; ?> -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->