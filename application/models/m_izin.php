<?php

class M_izin extends CI_Model
{

    public function get_all_izin()
    {
        $hasil = $this->db->query('SELECT * FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail ORDER BY user_detail.nama_lengkap ASC');
        return $hasil;
    }

    public function get_all_izin_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE izin.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_izin_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE izin.id_user='$id_user' AND izin.id_status_izin='2' ORDER BY izin.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_izin_by_id_izin($id_izin)
    {
        $hasil = $this->db->query("SELECT * FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE izin.id_izin='$id_izin'");
        return $hasil;
    }

    public function insert_data_izin($id_izin, $id_user, $alasan, $mulai, $berakhir, $id_status_izin, $perihal_izin)
    {
        $this->db->trans_start();
        $this->db->query("INSERT INTO izin(id_izin,id_user, alasan, tgl_diajukan, mulai, berakhir, id_status_izin, perihal_izin) VALUES ('$id_izin','$id_user','$alasan',NOW(),'$mulai', '$berakhir', '$id_status_izin', '$perihal_izin')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_izin($id_izin)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM izin WHERE id_izin='$id_izin'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_izin($alasan, $perihal_izin, $tgl_diajukan, $mulai, $berakhir, $id_izin)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE izin SET alasan='$alasan', perihal_izin='$perihal_izin', tgl_diajukan='$tgl_diajukan', mulai='$mulai', berakhir='$berakhir' WHERE id_izin='$id_izin'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE izin SET id_status_izin='$id_status_izin', alasan_verifikasi='$alasan_verifikasi' WHERE id_izin='$id_izin'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

   
    public function count_all_izin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail');
        return $hasil;
    }

    public function count_all_izin_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE izin.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_izin_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=2');
        return $hasil;
    }

    public function count_all_izin_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=2 AND izin.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_izin_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=1');
        return $hasil;
    }

    public function count_all_izin_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=1 AND izin.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_izin_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=3');
        return $hasil;
    }

    public function count_all_izin_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_izin) as total_izin FROM izin JOIN user ON izin.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_izin=3 AND izin.id_user='$id_user'");
        return $hasil;
    }


}