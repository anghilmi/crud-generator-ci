<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'tgl_daftar' => $row->tgl_daftar,
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'email' => $row->email,
		'no_hp' => $row->no_hp,
		'level' => $row->level,
		'aktivasi_admin' => $row->aktivasi_admin,
		'foto1' => $row->foto1,
		'flag' => $row->flag,
		'token' => $row->token,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'tgl_daftar' => set_value('tgl_daftar'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'no_hp' => set_value('no_hp'),
	    'level' => set_value('level'),
	    'aktivasi_admin' => set_value('aktivasi_admin'),
	    'foto1' => set_value('foto1'),
	    'flag' => set_value('flag'),
	    'token' => set_value('token'),
	);
        $this->load->view('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'level' => $this->input->post('level',TRUE),
		'aktivasi_admin' => $this->input->post('aktivasi_admin',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'flag' => $this->input->post('flag',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'level' => set_value('level', $row->level),
		'aktivasi_admin' => set_value('aktivasi_admin', $row->aktivasi_admin),
		'foto1' => set_value('foto1', $row->foto1),
		'flag' => set_value('flag', $row->flag),
		'token' => set_value('token', $row->token),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'level' => $this->input->post('level',TRUE),
		'aktivasi_admin' => $this->input->post('aktivasi_admin',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'flag' => $this->input->post('flag',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('aktivasi_admin', 'aktivasi admin', 'trim|required');
	$this->form_validation->set_rules('foto1', 'foto1', 'trim|required');
	$this->form_validation->set_rules('flag', 'flag', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */