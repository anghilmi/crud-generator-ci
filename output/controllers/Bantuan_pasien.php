<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bantuan_pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bantuan_pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bantuan_pasien/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bantuan_pasien/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bantuan_pasien/index.html';
            $config['first_url'] = base_url() . 'bantuan_pasien/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bantuan_pasien_model->total_rows($q);
        $bantuan_pasien = $this->Bantuan_pasien_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bantuan_pasien_data' => $bantuan_pasien,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('bantuan_pasien/bantuan_pasien_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bantuan_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_report' => $row->id_report,
		'id_user' => $row->id_user,
		'nama_pasien' => $row->nama_pasien,
		'alamat_pasien' => $row->alamat_pasien,
		'foto_ktp_pasien' => $row->foto_ktp_pasien,
		'foto_kk_pasien' => $row->foto_kk_pasien,
		'deskripsi' => $row->deskripsi,
		'ft_srt_dokter' => $row->ft_srt_dokter,
		'status' => $row->status,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('bantuan_pasien/bantuan_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pasien'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bantuan_pasien/create_action'),
	    'id_report' => set_value('id_report'),
	    'id_user' => set_value('id_user'),
	    'nama_pasien' => set_value('nama_pasien'),
	    'alamat_pasien' => set_value('alamat_pasien'),
	    'foto_ktp_pasien' => set_value('foto_ktp_pasien'),
	    'foto_kk_pasien' => set_value('foto_kk_pasien'),
	    'deskripsi' => set_value('deskripsi'),
	    'ft_srt_dokter' => set_value('ft_srt_dokter'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('bantuan_pasien/bantuan_pasien_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'alamat_pasien' => $this->input->post('alamat_pasien',TRUE),
		'foto_ktp_pasien' => $this->input->post('foto_ktp_pasien',TRUE),
		'foto_kk_pasien' => $this->input->post('foto_kk_pasien',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'ft_srt_dokter' => $this->input->post('ft_srt_dokter',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bantuan_pasien'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bantuan_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bantuan_pasien/update_action'),
		'id_report' => set_value('id_report', $row->id_report),
		'id_user' => set_value('id_user', $row->id_user),
		'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
		'alamat_pasien' => set_value('alamat_pasien', $row->alamat_pasien),
		'foto_ktp_pasien' => set_value('foto_ktp_pasien', $row->foto_ktp_pasien),
		'foto_kk_pasien' => set_value('foto_kk_pasien', $row->foto_kk_pasien),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'ft_srt_dokter' => set_value('ft_srt_dokter', $row->ft_srt_dokter),
		'status' => set_value('status', $row->status),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('bantuan_pasien/bantuan_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pasien'));
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
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'alamat_pasien' => $this->input->post('alamat_pasien',TRUE),
		'foto_ktp_pasien' => $this->input->post('foto_ktp_pasien',TRUE),
		'foto_kk_pasien' => $this->input->post('foto_kk_pasien',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'ft_srt_dokter' => $this->input->post('ft_srt_dokter',TRUE),
		'status' => $this->input->post('status',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Bantuan_pasien_model->update($this->input->post('id_report', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bantuan_pasien'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bantuan_pasien_model->get_by_id($id);

        if ($row) {
            $this->Bantuan_pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bantuan_pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bantuan_pasien'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
	$this->form_validation->set_rules('alamat_pasien', 'alamat pasien', 'trim|required');
	$this->form_validation->set_rules('foto_ktp_pasien', 'foto ktp pasien', 'trim|required');
	$this->form_validation->set_rules('foto_kk_pasien', 'foto kk pasien', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('ft_srt_dokter', 'ft srt dokter', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_report', 'id_report', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bantuan_pasien.php */
/* Location: ./application/controllers/Bantuan_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */