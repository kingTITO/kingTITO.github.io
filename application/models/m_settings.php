<?php

class M_settings extends CI_Model
{

	public function get_slug($slug) {
		$hasil = $this->db->query("SELECT * FROM settings where slug = '$slug'");
        return $hasil->result_object();
	}
    public function tanda_tangan($ttd)
    {
        $this->db->trans_start();
		$query = "UPDATE `settings` SET `value` = '$ttd' WHERE `settings`.`slug` = 'signature';";
		// var_dump($query);
		// die();
        $this->db->query($query);
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }
}
