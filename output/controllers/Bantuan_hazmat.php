<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bantuan_hazmat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bantuan_hazmat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bantuan_hazmat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bantuan_hazmat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bantuan_hazmat/index.html';
            $config['first_url'] = base_url() . 'bantuan_hazmat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bantuan_hazmat_model->total_rows($q);
        $bantuan_hazmat = $this->Bantuan_hazmat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bantuan_hazmat_data' => $bantuan_hazmat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('bantuan_hazmat/bantuan_hazmat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bantuan_hazmat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_report' => $row->id_report,
		'id_user' => $row->id_user,
		'nm_rs' => $row->nm_rs,
		'telp_kantor' => $row->telp_kantor,
		'jml_pesanan' => $row->jml_pesanan,
		'nm_pj' => $row->nm_pj,
		'jabatan' => $row->jabatan,
		'no_hp' => $row->no_hp,
		'alamat_rs' => $row->alamat_rs,
		'status' => $row->status,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('bantuan_hazmat/bantuan_hazmat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_hazmat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bantuan_hazmat/create_action'),
	    'id_report' => set_value('id_report'),
	    'id_user' => set_value('id_user'),
	    'nm_rs' => set_value('nm_rs'),
	    'telp_kantor' => set_value('telp_kantor'),
	    'jml_pesanan' => set_value('jml_pesanan'),
	    'nm_pj' => set_value('nm_pj'),
	    'jabatan' => set_value('jabatan'),
	    'no_hp' => set_value('no_hp'),
	    'alamat_rs' => set_value('alamat_rs'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('bantuan_hazmat/bantuan_hazmat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nm_rs' => $this->input->post('nm_rs',TRUE),
		'telp_kantor' => $this->input->post('telp_kantor',TRUE),
		'jml_pesanan' => $this->input->post('jml_pesanan',TRUE),
		'nm_pj' => $this->input->post('nm_pj',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat_rs' => $this->input->post('alamat_rs',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_hazmat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bantuan_hazmat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bantuan_hazmat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bantuan_hazmat/update_action'),
		'id_report' => set_value('id_report', $row->id_report),
		'id_user' => set_value('id_user', $row->id_user),
		'nm_rs' => set_value('nm_rs', $row->nm_rs),
		'telp_kantor' => set_value('telp_kantor', $row->telp_kantor),
		'jml_pesanan' => set_value('jml_pesanan', $row->jml_pesanan),
		'nm_pj' => set_value('nm_pj', $row->nm_pj),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'alamat_rs' => set_value('alamat_rs', $row->alamat_rs),
		'status' => set_value('status', $row->status),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('bantuan_hazmat/bantuan_hazmat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_hazmat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_report', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nm_rs' => $this->input->post('nm_rs',TRUE),
		'telp_kantor' => $this->input->post('telp_kantor',TRUE),
		'jml_pesanan' => $this->input->post('jml_pesanan',TRUE),
		'nm_pj' => $this->input->post('nm_pj',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat_rs' => $this->input->post('alamat_rs',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_hazmat_model->update($this->input->post('id_report', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bantuan_hazmat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bantuan_hazmat_model->get_by_id($id);

        if ($row) {
            $this->Bantuan_hazmat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bantuan_hazmat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_hazmat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('nm_rs', 'nm rs', 'trim|required');
	$this->form_validation->set_rules('telp_kantor', 'telp kantor', 'trim|required');
	$this->form_validation->set_rules('jml_pesanan', 'jml pesanan', 'trim|required');
	$this->form_validation->set_rules('nm_pj', 'nm pj', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('alamat_rs', 'alamat rs', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_report', 'id_report', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bantuan_hazmat.php */
/* Location: ./application/controllers/Bantuan_hazmat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */