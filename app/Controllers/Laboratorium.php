<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\MasterLabModel;
use App\Models\PasienModel;

class Laboratorium extends BaseController
{
    protected $labModel;
    protected $masterLabModel;
    protected $pasienModel;

    public function __construct()
    {
        $this->labModel = new LaboratoriumModel();
        $this->masterLabModel = new MasterLabModel();
        $this->pasienModel = new PasienModel();
    }

    public function index()
    {
        // Cek akses
        if (!hasMenuAccess('laboratorium', 'view')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke menu ini');
        }

        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $result = $this->labModel->searchHasilLab($keyword, $perPage, $offset);

        $data = [
            'title' => 'Data Hasil Laboratorium',
            'hasil_lab' => $result['results'],
            'keyword' => $keyword,
            'total' => $result['total'],
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => ceil($result['total'] / $perPage)
        ];

        return view('laboratorium/user/index', $data);
    }

    public function create()
    {
        if (!hasMenuAccess('laboratorium', 'create')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menambah data');
        }

        $data = [
            'title' => 'Tambah Hasil Laboratorium',
            'tipe_periksa' => $this->masterLabModel->getTipePeriksaLab(),
            'pasien' => $this->pasienModel->getPasien(),
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'no_rm' => 'required',
                'id_tipeperiksa_lab' => 'required',
                'hasil_lab' => 'required',
                'biaya' => 'permit_empty|numeric'
            ];

            if ($this->validate($rules)) {
                $this->labModel->save([
                    'no_rm' => $this->request->getPost('no_rm'),
                    'id_tipeperiksa_lab' => $this->request->getPost('id_tipeperiksa_lab'),
                    'hasil_lab' => $this->request->getPost('hasil_lab'),
                    'biaya' => $this->request->getPost('biaya')
                ]);

                session()->setFlashdata('success', 'Hasil laboratorium berhasil ditambahkan');
                return redirect()->to('/laboratorium');
            }

            $data['validation'] = $this->validator;
        }

        return view('laboratorium/user/create', $data);
    }

    public function edit($no_rm)
    {
        if (!hasMenuAccess('laboratorium', 'edit')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit data');
        }

        $data['hasil_lab'] = $this->labModel->getHasilLab($no_rm);

        if (empty($data['hasil_lab'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data laboratorium tidak ditemukan');
        }

        $data['title'] = 'Edit Hasil Laboratorium';
        $data['tipe_periksa'] = $this->masterLabModel->getTipePeriksaLab();
        $data['pasien'] = $this->pasienModel->getPasien();
        $data['validation'] = \Config\Services::validation();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'hasil_lab' => 'required',
                'biaya' => 'permit_empty|numeric'
            ];

            if ($this->validate($rules)) {
                $this->labModel->update($no_rm, [
                    'hasil_lab' => $this->request->getPost('hasil_lab'),
                    'biaya' => $this->request->getPost('biaya')
                ]);

                session()->setFlashdata('success', 'Hasil laboratorium berhasil diupdate');
                return redirect()->to('/laboratorium');
            }

            $data['validation'] = $this->validator; // Kirim objek validasi ke view
        }

        return view('laboratorium/user/edit', $data);
    }

    public function delete($no_rm)
    {
        if ($this->labModel->delete($no_rm)) {
            session()->setFlashdata('success', 'Hasil laboratorium berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Hasil laboratorium gagal dihapus');
        }
        return redirect()->to('/laboratorium');
    }
}
