<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pos_menus_promos_model extends CI_Model
{

    public $table = 'pos_menus_promos';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,outlet_menu_id,name,description,begin_date,end_date,begin_time,end_time,discount_id,discount_percent,discount_amount,promo_price,is_avail_sunday,is_avail_monday,is_avail_tuesday,is_avail_wednesday,is_avail_thursday,is_avail_friday,is_avail_saturday,created_date,modified_date,created_by,modified_by');
        $this->datatables->from('pos_menus_promos');
        //add this line for join
        //$this->datatables->join('table2', 'pos_menus_promos.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pos_menus_promos/read/$1'),'Read')." | ".anchor(site_url('pos_menus_promos/update/$1'),'Update')." | ".anchor(site_url('pos_menus_promos/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('outlet_menu_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('begin_date', $q);
	$this->db->or_like('end_date', $q);
	$this->db->or_like('begin_time', $q);
	$this->db->or_like('end_time', $q);
	$this->db->or_like('discount_id', $q);
	$this->db->or_like('discount_percent', $q);
	$this->db->or_like('discount_amount', $q);
	$this->db->or_like('promo_price', $q);
	$this->db->or_like('is_avail_sunday', $q);
	$this->db->or_like('is_avail_monday', $q);
	$this->db->or_like('is_avail_tuesday', $q);
	$this->db->or_like('is_avail_wednesday', $q);
	$this->db->or_like('is_avail_thursday', $q);
	$this->db->or_like('is_avail_friday', $q);
	$this->db->or_like('is_avail_saturday', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('modified_date', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('modified_by', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('outlet_menu_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('begin_date', $q);
	$this->db->or_like('end_date', $q);
	$this->db->or_like('begin_time', $q);
	$this->db->or_like('end_time', $q);
	$this->db->or_like('discount_id', $q);
	$this->db->or_like('discount_percent', $q);
	$this->db->or_like('discount_amount', $q);
	$this->db->or_like('promo_price', $q);
	$this->db->or_like('is_avail_sunday', $q);
	$this->db->or_like('is_avail_monday', $q);
	$this->db->or_like('is_avail_tuesday', $q);
	$this->db->or_like('is_avail_wednesday', $q);
	$this->db->or_like('is_avail_thursday', $q);
	$this->db->or_like('is_avail_friday', $q);
	$this->db->or_like('is_avail_saturday', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('modified_date', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('modified_by', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pos_menus_promos_model.php */
/* Location: ./application/models/Pos_menus_promos_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-23 16:10:29 */
/* http://harviacode.com */