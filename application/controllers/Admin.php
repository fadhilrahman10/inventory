<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('function_helper');
        $this->load->model('inventory_model');
        $this->load->library('Ciqrcode');
        $this->load->library('Zend');
        date_default_timezone_set('Asia/Jakarta');

        // block akses dari url
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['totalBarang'] = $this->inventory_model->getallBarang();
        $data['totalSupplier'] = $this->inventory_model->getallSupplier();
        $data['totalStok'] = $this->inventory_model->totalStokBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profil Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editProfile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->inventory_model->edit_admin();
        }
    }

    public function supplier()
    {
        $data['title'] = 'Data Supplier';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $this->form_validation->set_rules('name', 'Name of Supplier', 'required');
        $this->form_validation->set_rules('noHp', 'Phone Number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        $data['id'] = $this->inventory_model->supplier_id();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/supplier', $data);
            $this->load->view('templates/footer');
        } else {
            $this->inventory_model->add_supplier();
        }
    }

    public function supplierDelete($id_supplier)
    {
        $this->inventory_model->delete_supplier($id_supplier);
        redirect('admin/supplier');
    }

    public function barang()
    {
        $data['title'] = 'Data Barang';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $distinctMerek = $this->inventory_model->distinctMerek();
        $data['distinctMerek'] = $distinctMerek;

        $distinctKategori = $this->inventory_model->distinctKategori();
        $data['distinctKategori'] = $distinctKategori;

        $distinctSatuan = $this->inventory_model->distinctSatuan();
        $data['distinctSatuan'] = $distinctSatuan;

        $data['id'] = $this->inventory_model->barang_id();

        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/barang', $data);
            $this->load->view('templates/footer');
        } else {
            $this->inventory_model->add_barang();
        }
    }

    public function barangDelete($id_barang)
    {
        $this->inventory_model->delete_barang($id_barang);
        redirect('admin/barang');
    }

    public function barangMasukAll()
    {
        $data['title'] = 'Barang Masuk';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangMasukAll'] = $this->inventory_model->barangMasukAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/barangMasukAll', $data);
        $this->load->view('templates/footer');
    }

    public function barangMasuk()
    {
        $data['title'] = 'Barang Masuk';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $data['id'] = $this->inventory_model->barangMasuk_id();

        $this->form_validation->set_rules('qty', 'Qty', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/barangMasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_barang');
            $this->inventory_model->update_barangMasuk($this->input->post('id_barang'), (int)$this->input->post('qty'));
            // $this->inventory_model->update_barang('barang', 'stok', (int)$this->input->post('qty'), 'id_barang', $id);
            $this->inventory_model->add_barangMasuk();
        }
    }

    public function barangMasukDelete($id_stok)
    {
        $this->inventory_model->delete_barangMasuk($id_stok);
        redirect('admin/barangMasukAll');
    }

    public function printBarangMasuk()
    {
        $data['title'] = 'Barang Masuk';
        $data['stok'] = $this->db->get_where('stok', ['type' => 'in'])->result_array();
        $this->load->view('admin/printBarangMasuk', $data);
    }

    public function printBarang()
    {
        $data['title'] = 'Barang';
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->view('admin/printBarang', $data);
    }

    public function printSupplier()
    {
        $data['title'] = 'Supplier';
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $this->load->view('admin/printSupplier', $data);
    }

    public function qrcode($id)
    {
        // render qr code dengan format gambar PNG
        QRcode::png(
            $id,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 5,
            $margin = 2
        );
    }

    public function barcode($id)
    {
        $data['barang'] = $this->db->get('barang')->result();
        $this->zend->load('Zend/Barcode', $data);

        Zend_Barcode::render('code128', 'image', array('text' => $id));
    }

    public function barangKeluarAll()
    {
        $data['title'] = 'Barang Keluar';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangKeluarAll'] = $this->inventory_model->barangKeluarAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/barangKeluarAll', $data);
        $this->load->view('templates/footer');
    }

    public function barangKeluar()
    {
        $data['title'] = 'Barang Keluar';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $data['id'] = $this->inventory_model->barangKeluar_id();

        $this->form_validation->set_rules('qty', 'Qty', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/barangKeluar', $data);
            $this->load->view('templates/footer');
        } else {

            $this->inventory_model->update_barangKeluar($this->input->post('id_barang'), (int)$this->input->post('qty'));
            $this->inventory_model->add_barangKeluar();
        }
    }

    public function printBarangKeluar()
    {
        $data['title'] = 'Barang Keluar';
        $data['stok'] = $this->db->get_where('stok', ['type' => 'out'])->result_array();
        $this->load->view('admin/printBarangKeluar', $data);
    }

    public function barangKeluarDelete($id_stok)
    {
        $this->inventory_model->delete_barangKeluar($id_stok);
        redirect('admin/barangKeluarAll');
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['invoice'] = $this->inventory_model->invoice();
        $data['barang'] = $this->db->get('barang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function tambahCart()
    {
        $id_barang = $this->input->post('id_barang');
        // $isi = $this->inventory_model->getData('barang', ['id_barang' => $id]);
        $id_transaksi = $this->inventory_model->id_transaksi();
        $invoice = $this->inventory_model->invoice();

        $val = [
            'id_transaksi' => $id_transaksi,
            'id_barang' => $id_barang,
            'invoice' => $invoice,
            'qty' => 1
        ];

        $this->inventory_model->add('transaksi', $val);

        print json_encode('success');
    }

    public function getAllCart()
    {
        $data = $this->inventory_model->getCart();
        $harga = 0;

        for ($i = 0; $i < count($data); $i++) {
            $harga = (int)$data[$i]['harga_jual'] * (int)$data[$i]['qty'];
            $data[$i]['harga'] = $harga;
        }

        print json_encode($data);
    }

    public function hapusCart()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $this->inventory_model->hapus('transaksi', ['id_transaksi' => $id_transaksi]);
        print json_encode('berhasil');
    }

    public function addQty()
    {
        $id = $this->input->post('id_transaksi');
        $this->inventory_model->update_qty($id, 1);
        print json_encode('success');
    }

    public function minQty()
    {
        $id = $this->input->post('id_transaksi');
        $this->inventory_model->update_qty($id, 1, 'minus');
        print json_encode('success');
    }

    public function payment()
    {

        $data_barang = $this->inventory_model->getCart();

        foreach ($data_barang as $data) {
            $this->inventory_model->update_barangKeluar($data['id_barang'], $data['qty']);
        }

        $this->inventory_model->update_trasaksi();

        print json_encode('success');
    }
}
