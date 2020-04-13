<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang/index.html';
            $config['first_url'] = base_url() . 'barang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Barang_model->total_rows($q);
        $barang = $this->Barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_data' => $barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('barang/barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'id_grup' => $row->id_grup,
		'id_kategori' => $row->id_kategori,
		'id_tenant' => $row->id_tenant,
		'nm_barang' => $row->nm_barang,
		'user_last_edit' => $row->user_last_edit,
		'foto1' => $row->foto1,
		'link_toko_ol' => $row->link_toko_ol,
		'visibilitas' => $row->visibilitas,
	    );
            $this->load->view('barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'id_grup' => set_value('id_grup'),
	    'id_kategori' => set_value('id_kategori'),
	    'id_tenant' => set_value('id_tenant'),
	    'nm_barang' => set_value('nm_barang'),
	    'user_last_edit' => set_value('user_last_edit'),
	    'foto1' => set_value('foto1'),
	    'link_toko_ol' => set_value('link_toko_ol'),
	    'visibilitas' => set_value('visibilitas'),
	);
        $this->load->view('barang/barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'id_tenant' => $this->input->post('id_tenant',TRUE),
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'user_last_edit' => $this->input->post('user_last_edit',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'link_toko_ol' => $this->input->post('link_toko_ol',TRUE),
		'visibilitas' => $this->input->post('visibilitas',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'id_tenant' => set_value('id_tenant', $row->id_tenant),
		'nm_barang' => set_value('nm_barang', $row->nm_barang),
		'user_last_edit' => set_value('user_last_edit', $row->user_last_edit),
		'foto1' => set_value('foto1', $row->foto1),
		'link_toko_ol' => set_value('link_toko_ol', $row->link_toko_ol),
		'visibilitas' => set_value('visibilitas', $row->visibilitas),
	    );
            $this->load->view('barang/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'id_tenant' => $this->input->post('id_tenant',TRUE),
		'nm_barang' => $this->input->post('nm_barang',TRUE),
		'user_last_edit' => $this->input->post('user_last_edit',TRUE),
		'foto1' => $this->input->post('foto1',TRUE),
		'link_toko_ol' => $this->input->post('link_toko_ol',TRUE),
		'visibilitas' => $this->input->post('visibilitas',TRUE),
	    );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_grup', 'id grup', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('id_tenant', 'id tenant', 'trim|required');
	$this->form_validation->set_rules('nm_barang', 'nm barang', 'trim|required');
	$this->form_validation->set_rules('user_last_edit', 'user last edit', 'trim|required');
	$this->form_validation->set_rules('foto1', 'foto1', 'trim|required');
	$this->form_validation->set_rules('link_toko_ol', 'link toko ol', 'trim|required');
	$this->form_validation->set_rules('visibilitas', 'visibilitas', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang.xls";
        $judul = "barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tenant");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "User Last Edit");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto1");
	xlsWriteLabel($tablehead, $kolomhead++, "Link Toko Ol");
	xlsWriteLabel($tablehead, $kolomhead++, "Visibilitas");

	foreach ($this->Barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_grup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tenant);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->user_last_edit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link_toko_ol);
	    xlsWriteLabel($tablebody, $kolombody++, $data->visibilitas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */