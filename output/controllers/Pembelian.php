<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembelian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembelian/index.html';
            $config['first_url'] = base_url() . 'pembelian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembelian_model->total_rows($q);
        $pembelian = $this->Pembelian_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembelian_data' => $pembelian,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pembelian/pembelian_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nota' => $row->id_nota,
		'id_barang' => $row->id_barang,
		'harga_dasar' => $row->harga_dasar,
		'jmlh_barang' => $row->jmlh_barang,
	    );
            $this->load->view('pembelian/pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembelian/create_action'),
	    'id_nota' => set_value('id_nota'),
	    'id_barang' => set_value('id_barang'),
	    'harga_dasar' => set_value('harga_dasar'),
	    'jmlh_barang' => set_value('jmlh_barang'),
	);
        $this->load->view('pembelian/pembelian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'harga_dasar' => $this->input->post('harga_dasar',TRUE),
		'jmlh_barang' => $this->input->post('jmlh_barang',TRUE),
	    );

            $this->Pembelian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembelian/update_action'),
		'id_nota' => set_value('id_nota', $row->id_nota),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'harga_dasar' => set_value('harga_dasar', $row->harga_dasar),
		'jmlh_barang' => set_value('jmlh_barang', $row->jmlh_barang),
	    );
            $this->load->view('pembelian/pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nota', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'harga_dasar' => $this->input->post('harga_dasar',TRUE),
		'jmlh_barang' => $this->input->post('jmlh_barang',TRUE),
	    );

            $this->Pembelian_model->update($this->input->post('id_nota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembelian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembelian_model->get_by_id($id);

        if ($row) {
            $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembelian'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('harga_dasar', 'harga dasar', 'trim|required');
	$this->form_validation->set_rules('jmlh_barang', 'jmlh barang', 'trim|required');

	$this->form_validation->set_rules('id_nota', 'id_nota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembelian.xls";
        $judul = "pembelian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Dasar");
	xlsWriteLabel($tablehead, $kolomhead++, "Jmlh Barang");

	foreach ($this->Pembelian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_dasar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jmlh_barang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pembelian.php */
/* Location: ./application/controllers/Pembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */