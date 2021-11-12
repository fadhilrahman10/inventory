<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <section class="content">
        <!-- Earnings (Monthly) Card Example -->
        <div class="row mb-3">

            <!-- Tanggal Transaksi -->
            <div class="col-lg-3">
                <div class="card border-left-primary">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="tanggal" class="col-sm-4 col-form-label"><b>Tanggal</b></label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="kasir" class="col-sm-4 col-form-label"> <b>Kasir</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kasir" name="kasir" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label for="kasir" class="col-sm-4 col-form-label"><b>Kustomer</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kostumer" name="kostumer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barcode dan Qty -->
            <div class="col-lg-4">
                <div class="card border-left-primary">
                    <div class="card-body">
                        <div class="row mb-5">
                            <label for="id_barang" class="col-sm-4 col-form-label"><b>Barcode</b></label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control form-control-user" id="id" name="id" readonly>
                                <input type="text" class="form-control form-control-user" name="id_barang" id="id_barang" required autofocus>
                            </div>
                            <div class="col-sm-2">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type=" button" id="keranjang" class="btn btn-primary col-sm-12 float-right">
                                    <i class="fa fa-fw fa-cart-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice -->
            <div class="col-lg-5">
                <div class="card border-left-secondary">
                    <div class="card-body">
                        <div align="right">
                            <h5>Invoice <b><Span id="invoice" name="invoice"><?= $invoice; ?></Span></b></h5>
                            <h1><b><span id="grandTotal" style="font-size:50pt"></span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card border">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Barcode</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="barang">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sub Total -->
            <div class="col-lg-7">
                <div class="card border-left-primary">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="subTotal" class="col-sm-4 col-form-label"><b>Sub Total</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="subTotal" name="subTotal" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="bayar" class="col-sm-4 col-form-label"><b>Bayar</b></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bayar" name="bayar">
                            </div>
                        </div>
                        <div class="row">
                            <label for="kembalian" class="col-sm-4 col-form-label"><b>Kembalian</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-left-primary">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="catatan" class="col-sm-3 col-form-label"><b>Catatan</b></label>
                            <div class="col-sm-9">
                                <textarea name="catatan" id="catatan" cols="40" rows="3" placeholder="Opsional..."></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-sm-12" id="paid" data-toggle="modal" data-target="#payment">Proses Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-barang">Pilih Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- DataTables Example -->
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
                                <th scope="col">Harga harga_jual</th>
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
                                    <td><?= indo_currency($b['harga_jual']); ?></td>
                                    <td class="text-right"><?= $b['stok']; ?></td>
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" onclick="tambahCart('<?= $b['id_barang']; ?>')" data-id="<?= $b['id_barang']; ?>" data-nama="<?= $b['merek']; ?>" data-satuan="<?= $b['satuan']; ?>" data-kategori="<?= $b['kategori']; ?>" data-hargajual="<?= $b['harga_jual']; ?>" data-stok="<?= $b['stok']; ?>">
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

<div class="modal fade" id="payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-payment">Payment Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- DataTables Example -->
            <div class="card-body">
                <h4 class="text-center text-success" id="status"></h4>
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
            var harga_jual = $(this).data('hargajual');
            var stok = $(this).data('stok');

            $('#id_barang').val(id_barang);
            $('#nama').val(merek);
            $('#satuan').val(satuan);
            $('#kategori').val(kategori);
            $('#hargaJual').val(harga_jual);
            $('#stok').val(stok);

            $('#modal-barang').modal('hide');
        })
    })
</script>
<script>
    function tambahCart(id) {
        $.ajax({
            url: '<?= base_url('admin/tambahCart'); ?>',
            data: {
                'id_barang': id,
            },
            type: 'post',
            dataType: 'json',
            success: function(isi) {
                getAllCart();
                $('#modal-barang').modal('hide');
            }
        })
    }

    $(document).ready(function() {
        getAllCart();
    });

    function getAllCart() {
        $.ajax({
            url: '<?= base_url('admin/getAllCart'); ?>',
            type: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                tabel(data);
            }

        })
    }

    function tabel(isi) {
        var tabel = '';
        var sub_total = 0;
        for (var i = 0; i < isi.length; i++) {
            // var total = isi[i].sub_total * 1;
            tabel += "<tr>" +
                "<td>" + isi[i].id_transaksi + "</td>" +
                "<td>" + isi[i].id_barang + "</td>" +
                "<td>" + isi[i].merek + "</td>" +
                "<td>" + isi[i].harga_jual + "</td>" +
                "<td width='200'> <button type='button' onclick='minQty(" + '"' + isi[i].id_transaksi + '"' + ")' class='btn badge badge-dark d-inline'>-</button> " + '<input type="number" class="form-control form-control-sm col-4 d-inline" value="' + isi[i].qty + '" readonly name="sub_total" id="' + isi[i].id_transaksi + '" />' + "<button type='button' onclick='getQty(" + '"' + isi[i].id_transaksi + '"' + ")' class='btn badge badge-primary ml-1'>+</button></td>" +
                "<td id='total" + isi[i].id_transaksi + "'>" + isi[i].sub_total + "</td>" +
                "<td>" + '<button  class="btn badge badge-danger" onclick="hapusCart(' + "'" + isi[i].id_transaksi + "'" + ')">X</button>' + "</td>" +
                "</tr>";
            sub_total += parseInt(isi[i].sub_total);
        }
        $('#barang').html(tabel);
        $('#subTotal').val(sub_total);
        $('#grandTotal').val(sub_total);
    }

    function getQty(id) {

        var qty = $('#' + id).val();
        console.log(qty);

        $.ajax({
            url: '<?= base_url('admin/addQty') ?>',
            data: 'id_transaksi=' + id,
            dataType: 'json',
            type: 'post',
            success: function(data) {
                console.log(data);
                getAllCart();
            }
        })
    }

    function minQty(id) {

        var qty = $('#' + id).val();
        console.log(qty);

        $.ajax({
            url: '<?= base_url('admin/minQty') ?>',
            data: 'id_transaksi=' + id,
            dataType: 'json',
            type: 'post',
            success: function(data) {
                console.log(data);
                getAllCart();

            }
        })
    }

    // $(document).ready(function() {
    //     var total = $('.subtotal').html();
    //     console.log(total);
    // });

    $('#bayar').keyup(function() {
        var subTotal = $('#subTotal').val();
        var bayar = $('#bayar').val();

        var result = parseInt(bayar) - parseInt(subTotal);

        if (isNaN(result)) {
            $('#kembalian').val(0);
        } else {
            $('#kembalian').val(result);
        }

    });

    $('#paid').click(function() {
        var kembalian = $('#kembalian').val();

        if (kembalian < 0 || isNaN(kembalian) || kembalian == '') {
            $('#status').removeClass('text-success');
            $('#status').text('Payment Failed');
            $('#status').addClass('text-danger');
        } else {
            paymentStatus();
            $('#status').addClass('text-success');
            $('#status').text('Payment Success');
            $('#status').removeClass('text-danger');
        }

        reset();
    });

    function paymentStatus() {
        $.ajax({
            url: '<?= base_url('admin/payment'); ?>',
            type: 'post',
            dataType: 'json',
            success: function(data) {
                getAllCart();
            }
        })
    }

    function reset() {
        $('#subTotal').val('');
        $('#kembalian').val('');
        $('#bayar').val('');
        $('#grandTotal').val('');

    }

    function hapusCart(id) {
        $.ajax({
            url: '<?= base_url('admin/hapusCart'); ?>',
            data: 'id_transaksi=' + id,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                getAllCart();
            }
        })
    }
</script>