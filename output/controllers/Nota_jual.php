<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nota_jual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nota_jual_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'nota_jual/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'nota_jual/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'nota_jual/index.html';
            $config['first_url'] = base_url() . 'nota_jual/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Nota_jual_model->total_rows($q);
        $nota_jual = $this->Nota_jual_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'nota_jual_data' => $nota_jual,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('nota_jual/nota_jual_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Nota_jual_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nota' => $row->id_nota,
		'tgl_jual' => $row->tgl_jual,
		'diskon_total' => $row->diskon_total,
		'id_grup' => $row->id_grup,
		'ongkir' => $row->ongkir,
		'status_bayar' => $row->status_bayar,
		'rek_bank' => $row->rek_bank,
		'nm_konsumen' => $row->nm_konsumen,
	    );
            $this->load->view('nota_jual/nota_jual_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_jual'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('nota_jual/create_action'),
	    'id_nota' => set_value('id_nota'),
	    'tgl_jual' => set_value('tgl_jual'),
	    'diskon_total' => set_value('diskon_total'),
	    'id_grup' => set_value('id_grup'),
	    'ongkir' => set_value('ongkir'),
	    'status_bayar' => set_value('status_bayar'),
	    'rek_bank' => set_value('rek_bank'),
	    'nm_konsumen' => set_value('nm_konsumen'),
	);
        $this->load->view('nota_jual/nota_jual_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_jual' => $this->input->post('tgl_jual',TRUE),
		'diskon_total' => $this->input->post('diskon_total',TRUE),
		'id_grup' => $this->input->post('id_grup',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'status_bayar' => $this->input->post('status_bayar',TRUE),
		'rek_bank' => $this->input->post('rek_bank',TRUE),
		'nm_konsumen' => $this->input->post('nm_konsumen',TRUE),
	    );

            $this->Nota_jual_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('nota_jual'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Nota_jual_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('nota_jual/update_action'),
		'id_nota' => set_value('id_nota', $row->id_nota),
		'tgl_jual' => set_value('tgl_jual', $row->tgl_jual),
		'diskon_total' => set_value('diskon_total', $row->diskon_total),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'ongkir' => set_value('ongkir', $row->ongkir),
		'status_bayar' => set_value('status_bayar', $row->status_bayar),
		'rek_bank' => set_value('rek_bank', $row->rek_bank),
		'nm_konsumen' => set_value('nm_konsumen', $row->nm_konsumen),
	    );
            $this->load->view('nota_jual/nota_jual_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_jual'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nota', TRUE));
        } else {
            $data = array(
		'tgl_jual' => $this->input->post('tgl_jual',TRUE),
		'diskon_total' => $this->input->post('diskon_total',TRUE),
		'id_grup' => $this->input->post('id_grup',TRUE),
		'ongkir' => $this->input->post('ongkir',TRUE),
		'status_bayar' => $this->input->post('status_bayar',TRUE),
		'rek_bank' => $this->input->post('rek_bank',TRUE),
		'nm_konsumen' => $this->input->post('nm_konsumen',TRUE),
	    );

            $this->Nota_jual_model->update($this->input->post('id_nota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('nota_jual'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Nota_jual_model->get_by_id($id);

        if ($row) {
            $this->Nota_jual_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('nota_jual'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('nota_jual'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_jual', 'tgl jual', 'trim|required');
	$this->form_validation->set_rules('diskon_total', 'diskon total', 'trim|required');
	$this->form_validation->set_rules('id_grup', 'id grup', 'trim|required');
	$this->form_validation->set_rules('ongkir', 'ongkir', 'trim|required');
	$this->form_validation->set_rules('status_bayar', 'status bayar', 'trim|required');
	$this->form_validation->set_rules('rek_bank', 'rek bank', 'trim|required');
	$this->form_validation->set_rules('nm_konsumen', 'nm konsumen', 'trim|required');

	$this->form_validation->set_rules('id_nota', 'id_nota', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "nota_jual.xls";
        $judul = "nota_jual";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Jual");
	xlsWriteLabel($tablehead, $kolomhead++, "Diskon Total");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Grup");
	xlsWriteLabel($tablehead, $kolomhead++, "Ongkir");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Bayar");
	xlsWriteLabel($tablehead, $kolomhead++, "Rek Bank");
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Konsumen");

	foreach ($this->Nota_jual_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_jual);
	    xlsWriteLabel($tablebody, $kolombody++, $data->diskon_total);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_grup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ongkir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_bayar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rek_bank);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_konsumen);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Nota_jual.php */
/* Location: ./application/controllers/Nota_jual.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-01 07:02:28 */
/* http://harviacode.com */