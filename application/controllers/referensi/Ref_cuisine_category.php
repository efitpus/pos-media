<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_cuisine_category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ref_cuisine_category_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
        is_logged_in();
    }

    public function index()
    {
        $data['title']="Cuisine Category";
        datatables('referensi/ref_cuisine_category/ref_cuisine_category_list',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ref_cuisine_category_model->json();
    }

    public function read($id) 
    {
        $row = $this->Ref_cuisine_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'code' => $row->code,
		'name' => $row->name,
		'description' => $row->description,
		'status' => $row->status,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
		'created_by' => $row->created_by,
		'modified_by' => $row->modified_by,
	    );
            $this->load->view('referensi/ref_cuisine_category/ref_cuisine_category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('ref_cuisine_category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
             'title'=>'',
            'action' => base_url('referensi/ref_cuisine_category/create_action'),
	    'id' => set_value('id'),
	    'code' => set_value('code'),
	    'name' => set_value('name'),
	    'description' => set_value('description'),
	    'status' => set_value('status'),
	);
        form('referensi/ref_cuisine_category/ref_cuisine_category_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'code' => $this->input->post('code',TRUE),
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Ref_cuisine_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url('referensi/ref_cuisine_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ref_cuisine_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title'=>'',
                'action' => base_url('referensi/ref_cuisine_category/update_action'),
		'id' => set_value('id', $row->id),
		'code' => set_value('code', $row->code),
		'name' => set_value('name', $row->name),
		'description' => set_value('description', $row->description),
		'status' => set_value('status', $row->status),
	    );
            form('referensi/ref_cuisine_category/ref_cuisine_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('referensi/ref_cuisine_category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'code' => $this->input->post('code',TRUE),
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Ref_cuisine_category_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('referensi/ref_cuisine_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ref_cuisine_category_model->get_by_id($id);

        if ($row) {
            $this->Ref_cuisine_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('referensi/ref_cuisine_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('referensi/ref_cuisine_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('code', 'code', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	//$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ref_cuisine_category.php */
/* Location: ./application/controllers/Ref_cuisine_category.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-20 06:14:30 */
/* http://harviacode.com */