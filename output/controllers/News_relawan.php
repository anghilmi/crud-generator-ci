<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News_relawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_relawan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'news_relawan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'news_relawan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'news_relawan/index.html';
            $config['first_url'] = base_url() . 'news_relawan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->News_relawan_model->total_rows($q);
        $news_relawan = $this->News_relawan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'news_relawan_data' => $news_relawan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('news_relawan/news_relawan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->News_relawan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_news' => $row->id_news,
		'tgl_news' => $row->tgl_news,
		'judul' => $row->judul,
		'artikel' => $row->artikel,
		'foto' => $row->foto,
		'status' => $row->status,
		'catatan' => $row->catatan,
	    );
            $this->load->view('news_relawan/news_relawan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news_relawan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('news_relawan/create_action'),
	    'id_news' => set_value('id_news'),
	    'tgl_news' => set_value('tgl_news'),
	    'judul' => set_value('judul'),
	    'artikel' => set_value('artikel'),
	    'foto' => set_value('foto'),
	    'status' => set_value('status'),
	    'catatan' => set_value('catatan'),
	);
        $this->load->view('news_relawan/news_relawan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tgl_news' => $this->input->post('tgl_news',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'artikel' => $this->input->post('artikel',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->News_relawan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('news_relawan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->News_relawan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('news_relawan/update_action'),
		'id_news' => set_value('id_news', $row->id_news),
		'tgl_news' => set_value('tgl_news', $row->tgl_news),
		'judul' => set_value('judul', $row->judul),
		'artikel' => set_value('artikel', $row->artikel),
		'foto' => set_value('foto', $row->foto),
		'status' => set_value('status', $row->status),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $this->load->view('news_relawan/news_relawan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news_relawan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_news', TRUE));
        } else {
            $data = array(
		'tgl_news' => $this->input->post('tgl_news',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'artikel' => $this->input->post('artikel',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->News_relawan_model->update($this->input->post('id_news', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('news_relawan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->News_relawan_model->get_by_id($id);

        if ($row) {
            $this->News_relawan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('news_relawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('news_relawan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl_news', 'tgl news', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('artikel', 'artikel', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_news', 'id_news', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file News_relawan.php */
/* Location: ./application/controllers/News_relawan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 10:53:21 */
/* http://harviacode.com */