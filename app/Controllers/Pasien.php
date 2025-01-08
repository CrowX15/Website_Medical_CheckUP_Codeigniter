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
        // Cek akses
        if (!hasMenuAccess('pasien', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->pasienModel->searchPasien($keyword, $perPage, $offset);

        $data = [
            'title' => 'Data Pasien',
            'pasien' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('pasien/index', $data);
    }


    public function create()
    {
        if (!hasMenuAccess('pasien', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }
        $data = [
            'title' => 'Tambah Data Pasien',
            'validation' => \Config\Services::validation()
        ];
        
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
        $data['validation'] = \Config\Services::validation();
    
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
    
            $data['validation'] = $this->validator; // Kirim objek validasi ke view
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
