<?php

namespace App\Controllers;

use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pasienModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        $data['title'] = 'Data Pasien';
        $data['pasien'] = $this->pasienModel->getPasien();
        return view('pasien/index', $data);
    }

    public function detail($no_rm)
    {
        $data['title'] = 'Detail Pasien';
        $data['pasien'] = $this->pasienModel->getPasien($no_rm);
        
        if (empty($data['pasien'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pasien tidak ditemukan');
        }
        
        return view('pasien/detail', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Pasien';
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'no_rm' => 'required|is_unique[pasien.no_rm]',
                'nama' => 'required',
                'nik' => 'permit_empty|numeric|min_length[16]|max_length[16]'
            ];

            if ($this->validate($rules)) {
                $this->pasienModel->save([
                    'no_rm' => $this->request->getPost('no_rm'),
                    'nama' => $this->request->getPost('nama'),
                    'perusahaan' => $this->request->getPost('perusahaan'),
                    'nik' => $this->request->getPost('nik'),
                    'departemen' => $this->request->getPost('departemen'),
                    'bagian' => $this->request->getPost('bagian'),
                    'usia' => $this->request->getPost('usia'),
                    'tgl_mcu' => $this->request->getPost('tgl_mcu')
                ]);

                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to('/pasien');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('pasien/create', $data);
    }

    public function edit($no_rm)
    {
        $data['title'] = 'Edit Data Pasien';
        $data['pasien'] = $this->pasienModel->getPasien($no_rm);
        
        if (empty($data['pasien'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pasien tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama' => 'required',
                'nik' => 'permit_empty|numeric|min_length[16]|max_length[16]'
            ];

            if ($this->validate($rules)) {
                $this->pasienModel->save([
                    'no_rm' => $no_rm,
                    'nama' => $this->request->getPost('nama'),
                    'perusahaan' => $this->request->getPost('perusahaan'),
                    'nik' => $this->request->getPost('nik'),
                    'departemen' => $this->request->getPost('departemen'),
                    'bagian' => $this->request->getPost('bagian'),
                    'usia' => $this->request->getPost('usia'),
                    'tgl_mcu' => $this->request->getPost('tgl_mcu')
                ]);

                session()->setFlashdata('success', 'Data berhasil diupdate');
                return redirect()->to('/pasien');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('pasien/edit', $data);
    }

    public function delete($no_rm)
    {
        if ($this->pasienModel->delete($no_rm)) {
            session()->setFlashdata('success', 'Data berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus');
        }
        return redirect()->to('/pasien');
    }
}
