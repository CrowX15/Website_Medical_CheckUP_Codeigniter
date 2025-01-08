<?php

namespace App\Controllers;

use App\Models\PeriksaModel;
use App\Models\PasienModel;

class Periksa extends BaseController
{
    protected $periksaModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->periksaModel = new PeriksaModel();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('pemeriksaan', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->periksaModel->searchHasilPeriksa($keyword, $perPage, $offset);

        $data = [
            'title' => 'Data Pemeriksaan Fisik',
            'periksa' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('periksa/index', $data);
    }

    public function create()
    {
        // Cek akses
        if (!hasMenuAccess('pemeriksaan', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data = [
            'title' => 'Tambah Pemeriksaan Fisik',
            'validation' => \Config\Services::validation(),
            'pasien' => $this->pasienModel->getPasien() // Mendapatkan semua pasien
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'no_rm' => 'required',
                'tinggi_badan' => 'required|numeric',
                'berat_badan' => 'required|numeric',
                'tekanan_darah' => 'required',
                'nadi' => 'required|numeric'
            ];

            if ($this->validate($rules)) {
                $this->periksaModel->save([
                    'no_rm' => $this->request->getPost('no_rm'),
                    'batuk_darah' => $this->request->getPost('batuk_darah') ?? 'Tidak',
                    'kencing_batu' => $this->request->getPost('kencing_batu') ?? 'Tidak',
                    'hepatitis' => $this->request->getPost('hepatitis') ?? 'Tidak',
                    'hernia' => $this->request->getPost('hernia') ?? 'Tidak',
                    'hipertensi' => $this->request->getPost('hipertensi') ?? 'Tidak',
                    'hemoroid' => $this->request->getPost('hemoroid') ?? 'Tidak',
                    'diabetes' => $this->request->getPost('diabetes') ?? 'Tidak',
                    'tinggi_badan' => $this->request->getPost('tinggi_badan'),
                    'berat_badan' => $this->request->getPost('berat_badan'),
                    'nadi' => $this->request->getPost('nadi'),
                    'tekanan_darah' => $this->request->getPost('tekanan_darah'),
                    'visus' => $this->request->getPost('visus'),
                    'buta_warna' => $this->request->getPost('buta_warna')
                ]);

                session()->setFlashdata('success', 'Data pemeriksaan fisik berhasil ditambahkan');
                return redirect()->to('/periksa');
            }

            $data['validation'] = $this->validator;
        }

        return view('periksa/create', $data);
    }

    public function edit($no_rm)
    {
        // Cek akses
        if (!hasMenuAccess('pemeriksaan', 'edit')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data');
        }

        $data['title'] = 'Edit Pemeriksaan Fisik';
        $data['periksa'] = $this->periksaModel->getHasilPeriksa($no_rm);
        $data['pasien'] = $this->pasienModel->getPasien(); // Mendapatkan semua pasien

        if (empty($data['periksa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data pemeriksaan tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'tinggi_badan' => 'required|numeric',
                'berat_badan' => 'required|numeric',
                'tekanan_darah' => 'required',
                'nadi' => 'required|numeric'
            ];

            if ($this->validate($rules)) {
                $this->periksaModel->save([
                    'no_rm' => $no_rm,
                    'batuk_darah' => $this->request->getPost('batuk_darah') ?? 'Tidak',
                    'kencing_batu' => $this->request->getPost('kencing_batu') ?? 'Tidak',
                    'hepatitis' => $this->request->getPost('hepatitis') ?? 'Tidak',
                    'hernia' => $this->request->getPost('hernia') ?? 'Tidak',
                    'hipertensi' => $this->request->getPost('hipertensi') ?? 'Tidak',
                    'hemoroid' => $this->request->getPost('hemoroid') ?? 'Tidak',
                    'diabetes' => $this->request->getPost('diabetes') ?? 'Tidak',
                    'tinggi_badan' => $this->request->getPost('tinggi_badan'),
                    'berat_badan' => $this->request->getPost('berat_badan'),
                    'nadi' => $this->request->getPost('nadi'),
                    'tekanan_darah' => $this->request->getPost('tekanan_darah'),
                    'visus' => $this->request->getPost('visus'),
                    'buta_warna' => $this->request->getPost('buta_warna')
                ]);

                session()->setFlashdata('success', 'Data pemeriksaan fisik berhasil diupdate');
                return redirect()->to('/periksa');
            }

            $data['validation'] = $this->validator; // Kirim objek validasi ke view
        }

        return view('periksa/edit', $data);
    }

    public function delete($no_rm)
    {
        if ($this->periksaModel->delete($no_rm)) {
            session()->setFlashdata('success', 'Data pemeriksaan fisik berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Data pemeriksaan fisik gagal dihapus');
        }
        return redirect()->to('/periksa');
    }
}
