<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slider/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slider/index.html';
            $config['first_url'] = base_url() . 'slider/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Slider_model->total_rows($q);
        $slider = $this->Slider_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'slider_data' => $slider,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('slider/slider_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_slider' => $row->id_slider,
		'tgl_slider' => $row->tgl_slider,
		'judul' => $row->judul,
		'artikel' => $row->artikel,
		'foto' => $row->foto,
	    );
            $this->load->view('slider/slider_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('slider/create_action'),
	    'id_slider' => set_value('id_slider'),
	    'tgl_slider' => set_value('tgl_slider'),
	    'judul' => set_value('judul'),
	    'artikel' => set_value('artikel'),
	    'foto' => set_value('foto'),
	);
        $this->load->view('slider/slider_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_slider' => $this->input->post('tgl_slider',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'artikel' => $this->input->post('artikel',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Slider_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('slider/update_action'),
		'id_slider' => set_value('id_slider', $row->id_slider),
		'tgl_slider' => set_value('tgl_slider', $row->tgl_slider),
		'judul' => set_value('judul', $row->judul),
		'artikel' => set_value('artikel', $row->artikel),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('slider/slider_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_slider', TRUE));
        } else {
            $data = array(
		'tgl_slider' => $this->input->post('tgl_slider',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'artikel' => $this->input->post('artikel',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Slider_model->update($this->input->post('id_slider', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slider'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_slider', 'tgl slider', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('artikel', 'artikel', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_slider', 'id_slider', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */