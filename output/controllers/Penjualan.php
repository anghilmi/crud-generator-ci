<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penjualan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penjualan/index.html';
            $config['first_url'] = base_url() . 'penjualan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penjualan_model->total_rows($q);
        $penjualan = $this->Penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penjualan_data' => $penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('penjualan/penjualan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nota' => $row->id_nota,
		'id_barang' => $row->id_barang,
		'harga_jual' => $row->harga_jual,
		'jmlh_barang' => $row->jmlh_barang,
		'diskon_item' => $row->diskon_item,
	    );
            $this->load->view('penjualan/penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penjualan/create_action'),
	    'id_nota' => set_value('id_nota'),
	    'id_barang' => set_value('id_barang'),
	    'harga_jual' => set_value('harga_jual'),
	    'jmlh_barang' => set_value('jmlh_barang'),
	    'diskon_item' => set_value('diskon_item'),
	);
        $this->load->view('penjualan/penjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'jmlh_barang' => $this->input->post('jmlh_barang',TRUE),
		'diskon_item' => $this->input->post('diskon_item',TRUE),
	    );

            $this->Penjualan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penjualan/update_action'),
		'id_nota' => set_value('id_nota', $row->id_nota),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
		'jmlh_barang' => set_value('jmlh_barang', $row->jmlh_barang),
		'diskon_item' => set_value('diskon_item', $row->diskon_item),
	    );
            $this->load->view('penjualan/penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
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
		'harga_jual' => $this->input->post('harga_jual',TRUE),
		'jmlh_barang' => $this->input->post('jmlh_barang',TRUE),
		'diskon_item' => $this->input->post('diskon_item',TRUE),
	    );

            $this->Penjualan_model->update($this->input->post('id_nota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_model->get_by_id($id);

        if ($row) {
            $this->Penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penjualan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required');
	$this->form_validation->set_rules('jmlh_barang', 'jmlh barang', 'trim|required');
	$this->form_validation->set_rules('diskon_item', 'diskon item', 'trim|required');

	$this->form_validation->set_rules('id_nota', 'id_nota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penjualan.xls";
        $judul = "penjualan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Jmlh Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Diskon Item");

	foreach ($this->Penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_jual);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jmlh_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->diskon_item);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */