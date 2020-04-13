<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spek_membership extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Spek_membership_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'spek_membership/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'spek_membership/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'spek_membership/index.html';
            $config['first_url'] = base_url() . 'spek_membership/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Spek_membership_model->total_rows($q);
        $spek_membership = $this->Spek_membership_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'spek_membership_data' => $spek_membership,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('spek_membership/spek_membership_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Spek_membership_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengguna' => $row->id_pengguna,
		'setting_jml_anggota' => $row->setting_jml_anggota,
		'setting_jml_kategori' => $row->setting_jml_kategori,
		'setting_jml_gudang' => $row->setting_jml_gudang,
		'setting_jml_barang' => $row->setting_jml_barang,
		'setting_jml_foto_brg' => $row->setting_jml_foto_brg,
		'flag' => $row->flag,
	    );
            $this->load->view('spek_membership/spek_membership_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spek_membership'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('spek_membership/create_action'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'setting_jml_anggota' => set_value('setting_jml_anggota'),
	    'setting_jml_kategori' => set_value('setting_jml_kategori'),
	    'setting_jml_gudang' => set_value('setting_jml_gudang'),
	    'setting_jml_barang' => set_value('setting_jml_barang'),
	    'setting_jml_foto_brg' => set_value('setting_jml_foto_brg'),
	    'flag' => set_value('flag'),
	);
        $this->load->view('spek_membership/spek_membership_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'setting_jml_anggota' => $this->input->post('setting_jml_anggota',TRUE),
		'setting_jml_kategori' => $this->input->post('setting_jml_kategori',TRUE),
		'setting_jml_gudang' => $this->input->post('setting_jml_gudang',TRUE),
		'setting_jml_barang' => $this->input->post('setting_jml_barang',TRUE),
		'setting_jml_foto_brg' => $this->input->post('setting_jml_foto_brg',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Spek_membership_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('spek_membership'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Spek_membership_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('spek_membership/update_action'),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'setting_jml_anggota' => set_value('setting_jml_anggota', $row->setting_jml_anggota),
		'setting_jml_kategori' => set_value('setting_jml_kategori', $row->setting_jml_kategori),
		'setting_jml_gudang' => set_value('setting_jml_gudang', $row->setting_jml_gudang),
		'setting_jml_barang' => set_value('setting_jml_barang', $row->setting_jml_barang),
		'setting_jml_foto_brg' => set_value('setting_jml_foto_brg', $row->setting_jml_foto_brg),
		'flag' => set_value('flag', $row->flag),
	    );
            $this->load->view('spek_membership/spek_membership_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spek_membership'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengguna', TRUE));
        } else {
            $data = array(
		'setting_jml_anggota' => $this->input->post('setting_jml_anggota',TRUE),
		'setting_jml_kategori' => $this->input->post('setting_jml_kategori',TRUE),
		'setting_jml_gudang' => $this->input->post('setting_jml_gudang',TRUE),
		'setting_jml_barang' => $this->input->post('setting_jml_barang',TRUE),
		'setting_jml_foto_brg' => $this->input->post('setting_jml_foto_brg',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Spek_membership_model->update($this->input->post('id_pengguna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spek_membership'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Spek_membership_model->get_by_id($id);

        if ($row) {
            $this->Spek_membership_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('spek_membership'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spek_membership'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('setting_jml_anggota', 'setting jml anggota', 'trim|required');
	$this->form_validation->set_rules('setting_jml_kategori', 'setting jml kategori', 'trim|required');
	$this->form_validation->set_rules('setting_jml_gudang', 'setting jml gudang', 'trim|required');
	$this->form_validation->set_rules('setting_jml_barang', 'setting jml barang', 'trim|required');
	$this->form_validation->set_rules('setting_jml_foto_brg', 'setting jml foto brg', 'trim|required');
	$this->form_validation->set_rules('flag', 'flag', 'trim|required');

	$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "spek_membership.xls";
        $judul = "spek_membership";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Setting Jml Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Setting Jml Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Setting Jml Gudang");
	xlsWriteLabel($tablehead, $kolomhead++, "Setting Jml Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Setting Jml Foto Brg");
	xlsWriteLabel($tablehead, $kolomhead++, "Flag");

	foreach ($this->Spek_membership_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->setting_jml_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->setting_jml_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->setting_jml_gudang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->setting_jml_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->setting_jml_foto_brg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->flag);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Spek_membership.php */
/* Location: ./application/controllers/Spek_membership.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */