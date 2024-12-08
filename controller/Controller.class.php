<?php
class Controller
{
    public function loadModel($modelName)
    {
        include_once "model/Model.class.php"; // Berisi koneksi ke database
        include_once "model/$modelName.class.php"; // Berisi class model yang sesuai
        return new $modelName;
    }

    public function loadView($viewName, $data = [])
    {
        // Mengubah semua elemen array menjadi variabel sesuai dengan valuenya
        foreach ($data as $var => $value) {
            $$var = $value;
        }
        include_once "view/$viewName.php"; // Berisi view yang sesuai
    }
}