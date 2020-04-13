<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anggota_tenant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_tenant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'anggota_tenant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'anggota_tenant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'anggota_tenant/index.html';
            $config['first_url'] = base_url() . 'anggota_tenant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Anggota_tenant_model->total_rows($q);
        $anggota_tenant = $this->Anggota_tenant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'anggota_tenant_data' => $anggota_tenant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('anggota_tenant/anggota_tenant_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Anggota_tenant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tenant' => $row->id_tenant,
		'id_pengguna' => $row->id_pengguna,
	    );
            $this->load->view('anggota_tenant/anggota_tenant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota_tenant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('anggota_tenant/create_action'),
	    'id_tenant' => set_value('id_tenant'),
	    'id_pengguna' => set_value('id_pengguna'),
	);
        $this->load->view('anggota_tenant/anggota_tenant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
	    );

            $this->Anggota_tenant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota_tenant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Anggota_tenant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('anggota_tenant/update_action'),
		'id_tenant' => set_value('id_tenant', $row->id_tenant),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
	    );
            $this->load->view('anggota_tenant/anggota_tenant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota_tenant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tenant', TRUE));
        } else {
            $data = array(
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
	    );

            $this->Anggota_tenant_model->update($this->input->post('id_tenant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota_tenant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_tenant_model->get_by_id($id);

        if ($row) {
            $this->Anggota_tenant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota_tenant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota_tenant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pengguna', 'id pengguna', 'trim|required');

	$this->form_validation->set_rules('id_tenant', 'id_tenant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "anggota_tenant.xls";
        $judul = "anggota_tenant";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pengguna");

	foreach ($this->Anggota_tenant_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_pengguna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Anggota_tenant.php */
/* Location: ./application/controllers/Anggota_tenant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */