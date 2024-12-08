<?php
class PostModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT * FROM `data`";
        return $this->mysqli->query($sql);
    }

    public function insert($judul, $deskripsi, $nama_uploader, $email_uploader, $tanggal_upload, $gambar)
    {
        $sql = "INSERT INTO `data` (judul, deskripsi, nama_uploader, email_uploader, tanggal_upload, gambar)
                VALUES ('$judul', '$deskripsi', '$nama_uploader', '$email_uploader', '$tanggal_upload', '$gambar')";
        $this->mysqli->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM `data` WHERE id = $id";
        return $this->mysqli->query($sql);
    }

    public function update($id, $judul, $deskripsi, $nama_uploader, $email_uploader, $tanggal_upload, $gambar)
    {
        $sql = "UPDATE `data` SET 
            judul = '$judul',
            deskripsi = '$deskripsi',
            nama_uploader = '$nama_uploader',
            email_uploader = '$email_uploader',
            tanggal_upload = '$tanggal_upload',
            gambar = '$gambar'
            WHERE id = $id";
        $this->mysqli->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `data` WHERE id = $id";
        $this->mysqli->query($sql);
    }
}