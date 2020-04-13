<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tenant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tenant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tenant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tenant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tenant/index.html';
            $config['first_url'] = base_url() . 'tenant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tenant_model->total_rows($q);
        $tenant = $this->Tenant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tenant_data' => $tenant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tenant/tenant_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tenant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tenant' => $row->id_tenant,
		'id_grup' => $row->id_grup,
		'nm_tenant' => $row->nm_tenant,
		'lokasi' => $row->lokasi,
	    );
            $this->load->view('tenant/tenant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tenant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tenant/create_action'),
	    'id_tenant' => set_value('id_tenant'),
	    'id_grup' => set_value('id_grup'),
	    'nm_tenant' => set_value('nm_tenant'),
	    'lokasi' => set_value('lokasi'),
	);
        $this->load->view('tenant/tenant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_tenant' => $this->input->post('nm_tenant',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );

            $this->Tenant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tenant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tenant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tenant/update_action'),
		'id_tenant' => set_value('id_tenant', $row->id_tenant),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'nm_tenant' => set_value('nm_tenant', $row->nm_tenant),
		'lokasi' => set_value('lokasi', $row->lokasi),
	    );
            $this->load->view('tenant/tenant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tenant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tenant', TRUE));
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_tenant' => $this->input->post('nm_tenant',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
	    );

            $this->Tenant_model->update($this->input->post('id_tenant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tenant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tenant_model->get_by_id($id);

        if ($row) {
            $this->Tenant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tenant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tenant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_grup', 'id grup', 'trim|required');
	$this->form_validation->set_rules('nm_tenant', 'nm tenant', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');

	$this->form_validation->set_rules('id_tenant', 'id_tenant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tenant.xls";
        $judul = "tenant";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Grup");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Tenant");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");

	foreach ($this->Tenant_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_grup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_tenant);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Tenant.php */
/* Location: ./application/controllers/Tenant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */