<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <a href="<?= base_url('admin/printBarangMasuk'); ?>" class="btn btn-success mb-3 ml-5" target="_blank"><i class="fa fa-print"></i> Print</a> -->

    <!-- Jika Error -->
    <div class="col-md-8">
        <?= form_error('qty', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    </div>

    <!-- Jika Berhasil -->

    <div class="col-md-8">
        <?= $this->session->flashdata('message'); ?>
    </div>

    <form action="<?= base_url('admin/barangKeluar'); ?>" method="POST">
        <div class="body col-md-8">
            <div class="form-group ">
                <label for="namaSupplier">Tanggal</label>
                <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?= date('Y-m-d'); ?>" readonly>
            </div>
            <div>
                <label for="id_barang">Kode Barang</label>
            </div>
            <div class="form-group input-group">
                <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?= $id ?>" readonly>
                <input type="text" class="form-control form-control-user" name="id_barang" id="id_barang" required autofocus readonly>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>

            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" readonly>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="stok">Inital Stok</label>
                        <input type="text" value="-" class="form-control" id="stok" name="stok" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="satuan">Satuan</label>
                        <input type="text" value="-" class="form-control" id="satuan" name="satuan" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="kategori">Kategori</label>
                        <input type="text" value="-" class="form-control" id="kategori" name="kategori" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="hargaBeli">Harga Beli</label>
                        <input type="text" value="-" class="form-control" id="hargaBeli" name="hargaBeli" readonly>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>

            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty">
            </div>

            <div class="form-group float-right">
                <button type="reset" class="btn btn-success">Reset</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            <div class="form-group float-left">
                <a href="<?= base_url('admin/barangKeluarAll/'); ?>" class="btn btn-secondary mb-3 float-right">Kembali</a>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-barang ">Pilih Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- DataTales Example -->
            <div class="card-body">
                <div class="table-responsive table-hover">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th scope="col">#</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- <?php $i = 1; ?> -->
                            <?php foreach ($barang as $b) : ?>
                                <tr>
                                    <th scope="col"> <?= $i; ?></th>
                                    <td><?= $b['id_barang']; ?></td>
                                    <td><?= $b['merek']; ?></td>
                                    <td><?= $b['satuan']; ?></td>
                                    <td><?= $b['kategori']; ?></td>
                                    <td><?= indo_currency($b['harga_beli']); ?></td>
                                    <td class="text-right"><?= $b['stok']; ?></td>
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $b['id_barang']; ?>" data-nama="<?= $b['merek']; ?>" data-satuan="<?= $b['satuan']; ?>" data-kategori="<?= $b['kategori']; ?>" data-hargabeli="<?= $b['harga_beli']; ?>" data-stok="<?= $b['stok']; ?>">
                                            <i class="fa fa-check "> Select</i>
                                        </button>
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
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_barang = $(this).data('id');
            var merek = $(this).data('nama');
            var satuan = $(this).data('satuan');
            var kategori = $(this).data('kategori');
            var harga_beli = $(this).data('hargabeli');
            var stok = $(this).data('stok');
            $('#id_barang').val(id_barang);
            $('#nama').val(merek);
            $('#satuan').val(satuan);
            $('#kategori').val(kategori);
            $('#hargaBeli').val(harga_beli);
            $('#stok').val(stok);

            $('#modal-barang').modal('hide');
        })
    })
</script>