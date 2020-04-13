<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wa_konsumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Wa_konsumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'wa_konsumen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wa_konsumen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'wa_konsumen/index.html';
            $config['first_url'] = base_url() . 'wa_konsumen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Wa_konsumen_model->total_rows($q);
        $wa_konsumen = $this->Wa_konsumen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'wa_konsumen_data' => $wa_konsumen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('wa_konsumen/wa_konsumen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Wa_konsumen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_grup' => $row->id_grup,
		'nm_konsumen' => $row->nm_konsumen,
		'no_wa' => $row->no_wa,
		'visibility' => $row->visibility,
	    );
            $this->load->view('wa_konsumen/wa_konsumen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wa_konsumen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('wa_konsumen/create_action'),
	    'id' => set_value('id'),
	    'id_grup' => set_value('id_grup'),
	    'nm_konsumen' => set_value('nm_konsumen'),
	    'no_wa' => set_value('no_wa'),
	    'visibility' => set_value('visibility'),
	);
        $this->load->view('wa_konsumen/wa_konsumen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_konsumen' => $this->input->post('nm_konsumen',TRUE),
		'no_wa' => $this->input->post('no_wa',TRUE),
		'visibility' => $this->input->post('visibility',TRUE),
	    );

            $this->Wa_konsumen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('wa_konsumen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Wa_konsumen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('wa_konsumen/update_action'),
		'id' => set_value('id', $row->id),
		'id_grup' => set_value('id_grup', $row->id_grup),
		'nm_konsumen' => set_value('nm_konsumen', $row->nm_konsumen),
		'no_wa' => set_value('no_wa', $row->no_wa),
		'visibility' => set_value('visibility', $row->visibility),
	    );
            $this->load->view('wa_konsumen/wa_konsumen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wa_konsumen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_grup' => $this->input->post('id_grup',TRUE),
		'nm_konsumen' => $this->input->post('nm_konsumen',TRUE),
		'no_wa' => $this->input->post('no_wa',TRUE),
		'visibility' => $this->input->post('visibility',TRUE),
	    );

            $this->Wa_konsumen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wa_konsumen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Wa_konsumen_model->get_by_id($id);

        if ($row) {
            $this->Wa_konsumen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wa_konsumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wa_konsumen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_grup', 'id grup', 'trim|required');
	$this->form_validation->set_rules('nm_konsumen', 'nm konsumen', 'trim|required');
	$this->form_validation->set_rules('no_wa', 'no wa', 'trim|required');
	$this->form_validation->set_rules('visibility', 'visibility', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "wa_konsumen.xls";
        $judul = "wa_konsumen";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nm Konsumen");
	xlsWriteLabel($tablehead, $kolomhead++, "No Wa");
	xlsWriteLabel($tablehead, $kolomhead++, "Visibility");

	foreach ($this->Wa_konsumen_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_grup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nm_konsumen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_wa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->visibility);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Wa_konsumen.php */
/* Location: ./application/controllers/Wa_konsumen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-06-26 11:38:06 */
/* http://harviacode.com */