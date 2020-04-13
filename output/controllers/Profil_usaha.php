<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_usaha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_usaha_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profil_usaha/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profil_usaha/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profil_usaha/index.html';
            $config['first_url'] = base_url() . 'profil_usaha/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profil_usaha_model->total_rows($q);
        $profil_usaha = $this->Profil_usaha_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profil_usaha_data' => $profil_usaha,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('profil_usaha/profil_usaha_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Profil_usaha_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_grup' => $row->id_grup,
		'nm_usaha' => $row->nm_usaha,
		'logo_usaha' => $row->logo_usaha,
		'alamat_usaha' => $row->alamat_usaha,
		'kec' => $row->kec,
		'kota' => $row->kota,
		'prov' => $row->prov,
		'telp_usaha' => $row->telp_usaha,
		'link_toko_ol' => $row->link_toko_ol,
		'flag' => $row->flag,
	    );
            $this->load->view('profil_usaha/profil_usaha_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_usaha'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profil_usaha/create_action'),
	    'id_grup' => set_value('id_grup'),
	    'nm_usaha' => set_value('nm_usaha'),
	    'logo_usaha' => set_value('logo_usaha'),
	    'alamat_usaha' => set_value('alamat_usaha'),
	    'kec' => set_value('kec'),
	    'kota' => set_value('kota'),
	    'prov' => set_value('prov'),
	    'telp_usaha' => set_value('telp_usaha'),
	    'link_toko_ol' => set_value('link_toko_ol'),
	    'flag' => set_value('flag'),
	);
        $this->load->view('profil_usaha/profil_usaha_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_usaha' => $this->input->post('nm_usaha',TRUE),
		'logo_usaha' => $this->input->post('logo_usaha',TRUE),
		'alamat_usaha' => $this->input->post('alamat_usaha',TRUE),
		'kec' => $this->input->post('kec',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'prov' => $this->input->post('prov',TRUE),
		'telp_usaha' => $this->input->post('telp_usaha',TRUE),
		'link_toko_ol' => $this->input->post('link_toko_ol',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Profil_usaha_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profil_usaha'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profil_usaha_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profil_usaha/update_action'),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'nm_usaha' => set_value('nm_usaha', $row->nm_usaha),
		'logo_usaha' => set_value('logo_usaha', $row->logo_usaha),
		'alamat_usaha' => set_value('alamat_usaha', $row->alamat_usaha),
		'kec' => set_value('kec', $row->kec),
		'kota' => set_value('kota', $row->kota),
		'prov' => set_value('prov', $row->prov),
		'telp_usaha' => set_value('telp_usaha', $row->telp_usaha),
		'link_toko_ol' => set_value('link_toko_ol', $row->link_toko_ol),
		'flag' => set_value('flag', $row->flag),
	    );
            $this->load->view('profil_usaha/profil_usaha_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_usaha'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_grup', TRUE));
        } else {
            $data = array(
		'nm_usaha' => $this->input->post('nm_usaha',TRUE),
		'logo_usaha' => $this->input->post('logo_usaha',TRUE),
		'alamat_usaha' => $this->input->post('alamat_usaha',TRUE),
		'kec' => $this->input->post('kec',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'prov' => $this->input->post('prov',TRUE),
		'telp_usaha' => $this->input->post('telp_usaha',TRUE),
		'link_toko_ol' => $this->input->post('link_toko_ol',TRUE),
		'flag' => $this->input->post('flag',TRUE),
	    );

            $this->Profil_usaha_model->update($this->input->post('id_grup', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profil_usaha'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profil_usaha_model->get_by_id($id);

        if ($row) {
            $this->Profil_usaha_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profil_usaha'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_usaha'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_usaha', 'nm usaha', 'trim|required');
	$this->form_validation->set_rules('logo_usaha', 'logo usaha', 'trim|required');
	$this->form_validation->set_rules('alamat_usaha', 'alamat usaha', 'trim|required');
	$this->form_validation->set_rules('kec', 'kec', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('prov', 'prov', 'trim|required');
	$this->form_validation->set_rules('telp_usaha', 'telp usaha', 'trim|required');
	$this->form_validation->set_rules('link_toko_ol', 'link toko ol', 'trim|required');
	$this->form_validation->set_rules('flag', 'flag', 'trim|required');

	$this->form_validation->set_rules('id_grup', 'id_grup', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "profil_usaha.xls";
        $judul = "profil_usaha";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Usaha");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo Usaha");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Usaha");
	xlsWriteLabel($tablehead, $kolomhead++, "Kec");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Prov");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Usaha");
	xlsWriteLabel($tablehead, $kolomhead++, "Link Toko Ol");
	xlsWriteLabel($tablehead, $kolomhead++, "Flag");

	foreach ($this->Profil_usaha_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_usaha);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logo_usaha);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_usaha);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kec);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prov);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_usaha);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link_toko_ol);
	    xlsWriteLabel($tablebody, $kolombody++, $data->flag);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Profil_usaha.php */
/* Location: ./application/controllers/Profil_usaha.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */