<?php

namespace App\Controllers;

use App\Models\MasterLabModel;

class MasterLab extends BaseController
{
    protected $masterLabModel;

    public function __construct()
    {
        $this->masterLabModel = new MasterLabModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('masterlab', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }
        
        // Ambil keyword pencarian
        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->masterLabModel->searchTipePeriksaLab($keyword, $perPage, $offset);

        $data = [
            'title' => 'Master Tipe Pemeriksaan Laboratorium',
            'tipe_periksa' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('laboratorium/admin/index', $data);
    }

    public function create()
    {
        // Cek akses
        if (!hasMenuAccess('masterlab', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data = [
            'title' => 'Tambah Tipe Pemeriksaan Laboratorium',
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tipeperiksa_lab' => [
                    'rules' => 'required|is_unique[master_lab.tipeperiksa_lab]',
                    'errors' => [
                        'required' => 'Tipe pemeriksaan harus diisi.',
                        'is_unique' => 'Tipe pemeriksaan sudah ada.'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $this->masterLabModel->save([
                    'tipeperiksa_lab' => $this->request->getPost('tipeperiksa_lab')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan berhasil ditambahkan');
                return redirect()->to('/laboratorium/masterlab');
            }

            $data['validation'] = $this->validator;
        }

        return view('laboratorium/admin/create', $data);
    }

    public function edit($id_tipeperiksa_lab)
    {
        // Cek akses
        if (!hasMenuAccess('masterlab', 'update')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengubah data');
        }

        $data = [
            'title' => 'Edit Tipe Pemeriksaan Laboratorium',
            'tipe_periksa' => $this->masterLabModel->find($id_tipeperiksa_lab),
            'validation' => \Config\Services::validation()
        ];

        if (empty($data['tipe_periksa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tipeperiksa_lab' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tipe pemeriksaan harus diisi.'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $this->masterLabModel->update($id_tipeperiksa_lab, [
                    'tipeperiksa_lab' => $this->request->getPost('tipeperiksa_lab')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan berhasil diupdate');
                return redirect()->to('/laboratorium/masterlab');
            }

            $data['validation'] = $this->validator;
        }

        return view('laboratorium/admin/edit', $data);
    }

    public function delete($id)
    {
        // Cek akses
        if (!hasMenuAccess('masterlab', 'delete')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus data');
        }

        try {
            if ($this->masterLabModel->delete($id)) {
                session()->setFlashdata('success', 'Tipe pemeriksaan berhasil dihapus');
            } else {
                session()->setFlashdata('error', 'Tipe pemeriksaan gagal dihapus');
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Tidak dapat menghapus tipe pemeriksaan yang sudah digunakan');
        }

        return redirect()->to('/laboratorium/masterlab');
    }
}
