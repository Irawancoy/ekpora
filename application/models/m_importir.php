<?php

class m_importir extends CI_Model
{
	public function produk()
	{	
		return $this->db->get('data_buyers');
	}
}
