<?php

namespace App\Controllers;

use App\Models\KesimpulanModel;
use App\Models\PasienModel;

class Kesimpulan extends BaseController
{
    protected $kesimpulanModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->kesimpulanModel = new KesimpulanModel();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('kesimpulan', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->kesimpulanModel->searchKesimpulan($keyword, $perPage, $offset);

        $data = [
            'title' => 'Data Kesimpulan Pemeriksaan',
            'kesimpulan' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('kesimpulan/index', $data);
    }

    public function create()
    {
        // Cek akses
        if (!hasMenuAccess('kesimpulan', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data = [
            'title' => 'Tambah Kesimpulan Pemeriksaan',
            'validation' => \Config\Services::validation(),
            'pasien' => $this->pasienModel->getPasien() // Mendapatkan semua pasien
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'no_rm' => 'required',
                'pemeriksaan_fisik' => 'required',
                'thorax' => 'required',
                'laboratorium' => 'required'
            ];

            if ($this->validate($rules)) {
                $this->kesimpulanModel->save([
                    'no_rm' => $this->request->getPost('no_rm'),
                    'pemeriksaan_fisik' => $this->request->getPost('pemeriksaan_fisik'),
                    'thorax' => $this->request->getPost('thorax'),
                    'laboratorium' => $this->request->getPost('laboratorium'),
                    'saran' => $this->request->getPost('saran'),
                    'imt' => $this->request->getPost('imt'),
                    'tatalaksana' => $this->request->getPost('tatalaksana')
                ]);

                session()->setFlashdata('success', 'Data kesimpulan berhasil ditambahkan');
                return redirect()->to('/kesimpulan');
            }

            $data['validation'] = $this->validator;
        }

        return view('kesimpulan/create', $data);
    }

    public function edit($no_rm)
    {
        // Cek akses
        if (!hasMenuAccess('kesimpulan', 'edit')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data');
        }

        $data['title'] = 'Edit Kesimpulan Pemeriksaan';
        $data['kesimpulan'] = $this->kesimpulanModel->getKesimpulan($no_rm);
        $data['pasien'] = $this->pasienModel->getPasien(); // Mendapatkan semua pasien

        if (empty($data['kesimpulan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data kesimpulan tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'pemeriksaan_fisik' => 'required',
                'thorax' => 'required',
                'laboratorium' => 'required'
            ];

            if ($this->validate($rules)) {
                $this->kesimpulanModel->save([
                    'no_rm' => $no_rm,
                    'pemeriksaan_fisik' => $this->request->getPost('pemeriksaan_fisik'),
                    'thorax' => $this->request->getPost('thorax'),
                    'laboratorium' => $this->request->getPost('laboratorium'),
                    'saran' => $this->request->getPost('saran'),
                    'imt' => $this->request->getPost('imt'),
                    'tatalaksana' => $this->request->getPost('tatalaksana')
                ]);

                session()->setFlashdata('success', 'Data kesimpulan berhasil diupdate');
                return redirect()->to('/kesimpulan');
            }

            $data['validation'] = $this->validator; // Kirim objek validasi ke view
        }

        return view('kesimpulan/edit', $data);
    }

    public function delete($no_rm)
    {
        if ($this->kesimpulanModel->delete($no_rm)) {
            session()->setFlashdata('success', 'Data kesimpulan berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data kesimpulan gagal dihapus');
        }
        return redirect()->to('/kesimpulan');
    }
}
