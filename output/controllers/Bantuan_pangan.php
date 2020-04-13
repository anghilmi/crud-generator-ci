<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bantuan_pangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bantuan_pangan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bantuan_pangan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bantuan_pangan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bantuan_pangan/index.html';
            $config['first_url'] = base_url() . 'bantuan_pangan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bantuan_pangan_model->total_rows($q);
        $bantuan_pangan = $this->Bantuan_pangan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bantuan_pangan_data' => $bantuan_pangan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('bantuan_pangan/bantuan_pangan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bantuan_pangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_report' => $row->id_report,
		'id_user' => $row->id_user,
		'alamat_penerima' => $row->alamat_penerima,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kab_kota' => $row->kab_kota,
		'status' => $row->status,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('bantuan_pangan/bantuan_pangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bantuan_pangan/create_action'),
	    'id_report' => set_value('id_report'),
	    'id_user' => set_value('id_user'),
	    'alamat_penerima' => set_value('alamat_penerima'),
	    'kelurahan' => set_value('kelurahan'),
	    'kecamatan' => set_value('kecamatan'),
	    'kab_kota' => set_value('kab_kota'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('bantuan_pangan/bantuan_pangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kab_kota' => $this->input->post('kab_kota',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_pangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bantuan_pangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bantuan_pangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bantuan_pangan/update_action'),
		'id_report' => set_value('id_report', $row->id_report),
		'id_user' => set_value('id_user', $row->id_user),
		'alamat_penerima' => set_value('alamat_penerima', $row->alamat_penerima),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kab_kota' => set_value('kab_kota', $row->kab_kota),
		'status' => set_value('status', $row->status),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('bantuan_pangan/bantuan_pangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pangan'));
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
		'alamat_penerima' => $this->input->post('alamat_penerima',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kab_kota' => $this->input->post('kab_kota',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_pangan_model->update($this->input->post('id_report', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bantuan_pangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bantuan_pangan_model->get_by_id($id);

        if ($row) {
            $this->Bantuan_pangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bantuan_pangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('alamat_penerima', 'alamat penerima', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kab_kota', 'kab kota', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_report', 'id_report', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bantuan_pangan.php */
/* Location: ./application/controllers/Bantuan_pangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */