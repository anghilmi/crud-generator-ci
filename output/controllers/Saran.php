<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Saran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'saran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'saran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'saran/index.html';
            $config['first_url'] = base_url() . 'saran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Saran_model->total_rows($q);
        $saran = $this->Saran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'saran_data' => $saran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('saran/saran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Saran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_saran' => $row->id_saran,
		'tgl_saran' => $row->tgl_saran,
		'id_user' => $row->id_user,
		'saran' => $row->saran,
		'foto' => $row->foto,
		'status' => $row->status,
		'catatan' => $row->catatan,
	    );
            $this->load->view('saran/saran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('saran/create_action'),
	    'id_saran' => set_value('id_saran'),
	    'tgl_saran' => set_value('tgl_saran'),
	    'id_user' => set_value('id_user'),
	    'saran' => set_value('saran'),
	    'foto' => set_value('foto'),
	    'status' => set_value('status'),
	    'catatan' => set_value('catatan'),
	);
        $this->load->view('saran/saran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_saran' => $this->input->post('tgl_saran',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'saran' => $this->input->post('saran',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Saran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('saran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Saran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('saran/update_action'),
		'id_saran' => set_value('id_saran', $row->id_saran),
		'tgl_saran' => set_value('tgl_saran', $row->tgl_saran),
		'id_user' => set_value('id_user', $row->id_user),
		'saran' => set_value('saran', $row->saran),
		'foto' => set_value('foto', $row->foto),
		'status' => set_value('status', $row->status),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $this->load->view('saran/saran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_saran', TRUE));
        } else {
            $data = array(
		'tgl_saran' => $this->input->post('tgl_saran',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'saran' => $this->input->post('saran',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Saran_model->update($this->input->post('id_saran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('saran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Saran_model->get_by_id($id);

        if ($row) {
            $this->Saran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('saran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_saran', 'tgl saran', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('saran', 'saran', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_saran', 'id_saran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Saran.php */
/* Location: ./application/controllers/Saran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */