<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik' . $slug . 'tidak ditemukan');
        }
        return view('komik/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form tambah data komik'
        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        // $dataKomik = new KomikModel();
        // $data = [
        //     'judul' => $this->request->getVar('judul'),
        //     'slug' => url_title($this->request->getVar('judul', '-', true)),
        //     'penulis' => $this->request->getVar('penulis'),
        //     'penerbit' => $this->request->getVar('penerbit'),
        //     'sampul' => $this->request->getVar('sampul')
        // ];
        // $dataKomik->insert($data);
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/komik');
    }

}