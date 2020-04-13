<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nota_beli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nota_beli_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nota_beli/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nota_beli/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nota_beli/index.html';
            $config['first_url'] = base_url() . 'nota_beli/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nota_beli_model->total_rows($q);
        $nota_beli = $this->Nota_beli_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nota_beli_data' => $nota_beli,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('nota_beli/nota_beli_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nota_beli_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nota' => $row->id_nota,
		'tgl_beli' => $row->tgl_beli,
		'id_grup' => $row->id_grup,
		'nm_suplier' => $row->nm_suplier,
	    );
            $this->load->view('nota_beli/nota_beli_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_beli'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nota_beli/create_action'),
	    'id_nota' => set_value('id_nota'),
	    'tgl_beli' => set_value('tgl_beli'),
	    'id_grup' => set_value('id_grup'),
	    'nm_suplier' => set_value('nm_suplier'),
	);
        $this->load->view('nota_beli/nota_beli_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_beli' => $this->input->post('tgl_beli',TRUE),
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_suplier' => $this->input->post('nm_suplier',TRUE),
	    );

            $this->Nota_beli_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nota_beli'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nota_beli_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nota_beli/update_action'),
		'id_nota' => set_value('id_nota', $row->id_nota),
		'tgl_beli' => set_value('tgl_beli', $row->tgl_beli),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'nm_suplier' => set_value('nm_suplier', $row->nm_suplier),
	    );
            $this->load->view('nota_beli/nota_beli_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_beli'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nota', TRUE));
        } else {
            $data = array(
		'tgl_beli' => $this->input->post('tgl_beli',TRUE),
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_suplier' => $this->input->post('nm_suplier',TRUE),
	    );

            $this->Nota_beli_model->update($this->input->post('id_nota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nota_beli'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nota_beli_model->get_by_id($id);

        if ($row) {
            $this->Nota_beli_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nota_beli'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_beli'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_beli', 'tgl beli', 'trim|required');
	$this->form_validation->set_rules('id_grup', 'id grup', 'trim|required');
	$this->form_validation->set_rules('nm_suplier', 'nm suplier', 'trim|required');

	$this->form_validation->set_rules('id_nota', 'id_nota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nota_beli.xls";
        $judul = "nota_beli";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Beli");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Grup");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Suplier");

	foreach ($this->Nota_beli_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_beli);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_grup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_suplier);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Nota_beli.php */
/* Location: ./application/controllers/Nota_beli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */