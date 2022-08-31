<?php
class MainModel extends CI_Model
{

    public function getBerita($filter = [])
    {
        $this->db->select('*');
        $this->db->from('postingan');
        if (!empty($filter['berita_id']))
            $this->db->where('berita_id', $filter['berita_id']);
        if (!empty($filter['tipe']))
            $this->db->where('tipe', $filter['tipe']);
        if (!empty($filter['berita_slug']))
            $this->db->where('berita_slug', $filter['berita_slug']);
        if (!empty($filter['limit']))
            $this->db->limit($filter['limit'], 'DESC');
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
    }

    public function getTamu($filter = [])
    {
        $this->db->select('*');
        $this->db->from('daftar_tamu');
        if (!empty($filter['id']))
            $this->db->where('id', $filter['id']);
        if (!empty($filter['date']))
            $this->db->where('date', $filter['date']);
        $res = $this->db->get();
        $res = $res->result_array();
        return $res;
    }

    public function add_tamu($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('alamat', $data['alamat']);
        $this->db->set('contact', $data['contact']);
        $this->db->insert('daftar_tamu');
    }
    public function update($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('alamat', $data['alamat']);
        $this->db->set('contact', $data['contact']);
        $this->db->where('id', $data['id']);
        $this->db->update('daftar_tamu');
    }

    public function edit_survey($id, $respon)
    {
        $this->db->set('show_survey', $respon);
        $this->db->where('id', $id);
        $this->db->update('survey');
    }
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('daftar_tamu');
    }
}
