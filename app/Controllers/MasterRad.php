<?php

namespace App\Controllers;

use App\Models\MasterRadModel;

class MasterRad extends BaseController
{
    protected $masterRadModel;

    public function __construct()
    {
        $this->masterRadModel = new MasterRadModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('masterrad', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->masterRadModel->searchTipePeriksaRad($keyword, $perPage, $offset);

        $data = [
            'title' => 'Master Tipe Pemeriksaan Radiologi',
            'tipe_periksa' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('radiologi/admin/index', $data);
    }

    public function create()
    {
        // Cek akses
        if (!hasMenuAccess('masterrad', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data = [
            'title' => 'Tambah Tipe Pemeriksaan Radiologi',
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tipeperiksa_rad' => [
                    'rules' => 'required|is_unique[master_rad.tipeperiksa_rad]',
                    'errors' => [
                        'required' => 'Tipe pemeriksaan harus diisi.',
                        'is_unique' => 'Tipe pemeriksaan sudah ada.'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $this->masterRadModel->save([
                    'tipeperiksa_rad' => $this->request->getPost('tipeperiksa_rad')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil ditambahkan');
                return redirect()->to('/radiologi/admin');
            }

            $data['validation'] = $this->validator;
        }

        return view('radiologi/admin/create', $data);
    }

    public function edit($id)
    {
        // Cek akses
        if (!hasMenuAccess('masterrad', 'update')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengubah data');
        }

        $data = [
            'title' => 'Edit Tipe Pemeriksaan Radiologi',
            'tipe_periksa' => $this->masterRadModel->find($id),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['tipe_periksa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tipeperiksa_rad' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tipe pemeriksaan harus diisi.'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $this->masterRadModel->update($id, [
                    'tipeperiksa_rad' => $this->request->getPost('tipeperiksa_rad')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil diupdate');
                return redirect()->to('/radiologi/admin');
            }

            $data['validation'] = $this->validator;
        }

        return view('radiologi/admin/edit', $data);
    }

    public function delete($id)
    {
        // Cek akses
        if (!hasMenuAccess('masterrad', 'delete')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus data');
        }

        if ($this->masterRadModel->delete($id)) {
            session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Tipe pemeriksaan radiologi gagal dihapus');
        }

        return redirect()->to('/radiologi/admin');
    }
}
