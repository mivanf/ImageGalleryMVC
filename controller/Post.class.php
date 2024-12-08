<?php
class Post extends Controller
{
    public function index()
    {
        $postModel = $this->loadModel('PostModel');
        $home = $postModel->getAll();
        $this->loadView('home', ['home' => $home]);
    }

    public function addNew_form()
    {
        $this->loadView('add');
    }

    public function addNew_process()
    {
        $postModel = $this->loadModel('PostModel');
        $judul = addslashes($_POST['judul']);
        $deskripsi = addslashes($_POST['deskripsi']);
        $nama_uploader = addslashes($_POST['nama_uploader']);
        $email_uploader = addslashes($_POST['email_uploader']);
        $tanggal_upload = addslashes($_POST['tanggal_upload']);

        // Handle file upload
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];

        if (!empty($gambar)) {
            // Menentukan lokasi upload
            $upload_dir = 'uploads/';
            $upload_path = $upload_dir . basename($gambar);

            // Memindahkan file ke folder uploads
            if (move_uploaded_file($gambar_tmp, $upload_path)) {
                // Jika berhasil, simpan data ke database
                $postModel->insert($judul, $deskripsi, $nama_uploader, $email_uploader, $tanggal_upload, $gambar);
            } else {
                echo "Gagal mengunggah file.";
                return;
            }
        } else {
            echo "File gambar tidak ditemukan.";
            return;
        }

        header('Location: ?c=Post');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'];
        if (!$id) header('Location: index/php?c=Post');

        $postModel = $this->loadModel('PostModel');
        $post = $postModel->getById($id);

        if (!$post->num_rows) header('Location: index.php?c=Post');
        $this->loadView('edit', ['post' => $post->fetch_object()]);
    }

    public function update()
    {
        $postModel = $this->loadModel('PostModel');

        $id = $_POST['id'];
        $judul = addslashes($_POST['judul']);
        $deskripsi = addslashes($_POST['deskripsi']);
        $nama_uploader = addslashes($_POST['nama_uploader']);
        $email_uploader = addslashes($_POST['email_uploader']);
        $tanggal_upload = addslashes($_POST['tanggal_upload']);

        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];

        if (!empty($gambar)) {
            // Menentukan lokasi upload
            $upload_dir = 'uploads/';
            $upload_path = $upload_dir . basename($gambar);

            // Memindahkan file ke folder uploads
            if (move_uploaded_file($gambar_tmp, $upload_path)) {
                // Jika berhasil, simpan data ke database
                $postModel->update($id, $judul, $deskripsi, $nama_uploader, $email_uploader, $tanggal_upload, $gambar);
            } else {
                echo "Gagal mengunggah file.";
                return;
            }
        } else {
            // Jika gambar tidak diunggah, gunakan gambar lama
            $post = $postModel->getById($id)->fetch_object();
            $postModel->update($id, $judul, $deskripsi, $nama_uploader, $email_uploader, $tanggal_upload, $post->gambar);
        }

        header('Location: ?c=Post');
    }

    public function detail()
    {
        $id = $_GET['id'];
        if (!$id) header('Location: ?c=Post');

        $postModel = $this->loadModel('PostModel');
        $post = $postModel->getById($id);

        if (!$post->num_rows) header('Location: ?c=Post');
        $this->loadView('detail', ['post' => $post->fetch_object()]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        $postModel = $this->loadModel('PostModel');
        $postModel->delete($id);

        header('Location: ?c=Post');
        exit();
    }
}