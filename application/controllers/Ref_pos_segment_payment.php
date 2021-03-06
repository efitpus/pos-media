<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ref_pos_segment_payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ref_pos_segment_payment_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('ref_pos_segment_payment/ref_pos_segment_payment_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ref_pos_segment_payment_model->json();
    }

    public function read($id) 
    {
        $row = $this->Ref_pos_segment_payment_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'segment_id' => $row->segment_id,
		'payment_id' => $row->payment_id,
		'created_date' => $row->created_date,
		'modified_date' => $row->modified_date,
		'created_by' => $row->created_by,
		'modified_by' => $row->modified_by,
	    );
            $this->load->view('ref_pos_segment_payment/ref_pos_segment_payment_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_pos_segment_payment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ref_pos_segment_payment/create_action'),
	    'id' => set_value('id'),
	    'segment_id' => set_value('segment_id'),
	    'payment_id' => set_value('payment_id'),
	    'created_date' => set_value('created_date'),
	    'modified_date' => set_value('modified_date'),
	    'created_by' => set_value('created_by'),
	    'modified_by' => set_value('modified_by'),
	);
        $this->load->view('ref_pos_segment_payment/ref_pos_segment_payment_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'segment_id' => $this->input->post('segment_id',TRUE),
		'payment_id' => $this->input->post('payment_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => $this->input->post('modified_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'modified_by' => $this->input->post('modified_by',TRUE),
	    );

            $this->Ref_pos_segment_payment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ref_pos_segment_payment'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ref_pos_segment_payment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ref_pos_segment_payment/update_action'),
		'id' => set_value('id', $row->id),
		'segment_id' => set_value('segment_id', $row->segment_id),
		'payment_id' => set_value('payment_id', $row->payment_id),
		'created_date' => set_value('created_date', $row->created_date),
		'modified_date' => set_value('modified_date', $row->modified_date),
		'created_by' => set_value('created_by', $row->created_by),
		'modified_by' => set_value('modified_by', $row->modified_by),
	    );
            $this->load->view('ref_pos_segment_payment/ref_pos_segment_payment_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_pos_segment_payment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'segment_id' => $this->input->post('segment_id',TRUE),
		'payment_id' => $this->input->post('payment_id',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'modified_date' => $this->input->post('modified_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'modified_by' => $this->input->post('modified_by',TRUE),
	    );

            $this->Ref_pos_segment_payment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ref_pos_segment_payment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ref_pos_segment_payment_model->get_by_id($id);

        if ($row) {
            $this->Ref_pos_segment_payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ref_pos_segment_payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ref_pos_segment_payment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('segment_id', 'segment id', 'trim|required');
	$this->form_validation->set_rules('payment_id', 'payment id', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('modified_date', 'modified date', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('modified_by', 'modified by', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ref_pos_segment_payment.php */
/* Location: ./application/controllers/Ref_pos_segment_payment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-21 10:35:45 */
/* http://harviacode.com */