<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengguna/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengguna/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengguna/index.html';
            $config['first_url'] = base_url() . 'pengguna/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pengguna_model->total_rows($q);
        $pengguna = $this->Pengguna_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengguna_data' => $pengguna,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pengguna/pengguna_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengguna' => $row->id_pengguna,
		'tgl_daftar' => $row->tgl_daftar,
		'username' => $row->username,
		'sandi' => $row->sandi,
		'nama' => $row->nama,
		'email' => $row->email,
		'no_hp' => $row->no_hp,
		'level' => $row->level,
		'aktivasi_admin' => $row->aktivasi_admin,
		'foto1' => $row->foto1,
		'flag' => $row->flag,
	    );
            $this->load->view('pengguna/pengguna_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengguna/create_action'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'tgl_daftar' => set_value('tgl_daftar'),
	    'username' => set_value('username'),
	    'sandi' => set_value('sandi'),
	    'nama' => set_value('nama'),
	    'email' => set_value('email'),
	    'no_hp' => set_value('no_hp'),
	    'level' => set_value('level'),
	    'aktivasi_admin' => set_value('aktivasi_admin'),
	    'foto1' => set_value('foto1'),
	    'flag' => set_value('flag'),
	);
        $this->load->view('pengguna/pengguna_form', $data);
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
		'sandi' => $this->input->post('sandi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'level' => $this->input->post('level',TRUE),
		'aktivasi_admin' => $this->input->post('aktivasi_admin',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Pengguna_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengguna/update_action'),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'tgl_daftar' => set_value('tgl_daftar', $row->tgl_daftar),
		'username' => set_value('username', $row->username),
		'sandi' => set_value('sandi', $row->sandi),
		'nama' => set_value('nama', $row->nama),
		'email' => set_value('email', $row->email),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'level' => set_value('level', $row->level),
		'aktivasi_admin' => set_value('aktivasi_admin', $row->aktivasi_admin),
		'foto1' => set_value('foto1', $row->foto1),
		'flag' => set_value('flag', $row->flag),
	    );
            $this->load->view('pengguna/pengguna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengguna', TRUE));
        } else {
            $data = array(
		'tgl_daftar' => $this->input->post('tgl_daftar',TRUE),
		'username' => $this->input->post('username',TRUE),
		'sandi' => $this->input->post('sandi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'level' => $this->input->post('level',TRUE),
		'aktivasi_admin' => $this->input->post('aktivasi_admin',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $this->Pengguna_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_daftar', 'tgl daftar', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('sandi', 'sandi', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('aktivasi_admin', 'aktivasi admin', 'trim|required');
	$this->form_validation->set_rules('foto1', 'foto1', 'trim|required');
	$this->form_validation->set_rules('flag', 'flag', 'trim|required');

	$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengguna.xls";
        $judul = "pengguna";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Daftar");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Sandi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Aktivasi Admin");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto1");
	xlsWriteLabel($tablehead, $kolomhead++, "Flag");

	foreach ($this->Pengguna_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sandi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->aktivasi_admin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->flag);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */