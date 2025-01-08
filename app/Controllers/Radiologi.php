<?php

namespace App\Controllers;

use App\Models\RadiologiModel;
use App\Models\MasterRadModel;
use App\Models\PasienModel;

class Radiologi extends BaseController
{
    protected $radiologiModel;
    protected $masterRadModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->radiologiModel = new RadiologiModel();
        $this->masterRadModel = new MasterRadModel();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('radiologi', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->radiologiModel->searchHasilRad($keyword, $perPage, $offset);

        $data = [
            'title' => 'Data Hasil Radiologi',
            'hasil_rad' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('radiologi/user/index', $data);
    }

    public function create()
    {
        // Cek akses
        if (!hasMenuAccess('radiologi', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data['title'] = 'Tambah Hasil Radiologi';
        $data['tipe_periksa'] = $this->masterRadModel->getTipePeriksaRad();
        $data['pasien'] = $this->pasienModel->getPasien();
        $data['validation'] = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'no_rm' => 'required',
                'id_tipeperiksa_rad' => 'required',
                'hasil_rad' => 'required'
            ];

            if ($this->validate($rules)) {
                $this->radiologiModel->save([
                    'no_rm' => $this->request->getPost('no_rm'),
                    'id_tipeperiksa_rad' => $this->request->getPost('id_tipeperiksa_rad'),
                    'hasil_rad' => $this->request->getPost('hasil_rad'),
                    'kesimpulan' => $this->request->getPost('kesimpulan')
                ]);

                session()->setFlashdata('success', 'Hasil radiologi berhasil ditambahkan');
                return redirect()->to('/radiologi');
            }

            $data['validation'] = $this->validator;
        }

        return view('radiologi/user/create', $data);
    }

    public function edit($no_rm)
    {
        // Cek akses
        if (!hasMenuAccess('radiologi', 'update')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengubah data');
        }

        $data['title'] = 'Edit Hasil Radiologi';
        $data['hasil_rad'] = $this->radiologiModel->find($no_rm);
        $data['tipe_periksa'] = $this->masterRadModel->getTipePeriksaRad();
        $data['pasien'] = $this->pasienModel->getPasien();
        $data['validation'] = \Config\Services::validation();

        if (empty($data['hasil_rad'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'hasil_rad' => 'required'
            ];

            if ($this->validate($rules)) {
                $this->radiologiModel->update($no_rm, [
                    'hasil_rad' => $this->request->getPost('hasil_rad'),
                    'kesimpulan' => $this->request->getPost('kesimpulan')
                ]);

                session()->setFlashdata('success', 'Hasil radiologi berhasil diupdate');
                return redirect()->to('/radiologi');
            }

            $data['validation'] = $this->validator;
        }

        return view('radiologi/user/edit', $data);
    }

    public function delete($no_rm)
    {
        // Cek akses
        if (!hasMenuAccess('radiologi', 'delete')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus data');
        }

        if ($this->radiologiModel->delete($no_rm)) {
            session()->setFlashdata('success', 'Hasil radiologi berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Hasil radiologi gagal dihapus');
        }

        return redirect()->to('/radiologi');
    }
}
