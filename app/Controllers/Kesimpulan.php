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
        $data['title'] = 'Data Kesimpulan Pemeriksaan';
        $data['kesimpulan'] = $this->kesimpulanModel->getKesimpulan();
        return view('kesimpulan/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Kesimpulan Pemeriksaan';
        $data['pasien'] = $this->pasienModel->getPasien();

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
        $data['title'] = 'Edit Kesimpulan Pemeriksaan';
        $data['kesimpulan'] = $this->kesimpulanModel->getKesimpulan($no_rm);
        $data['pasien'] = $this->pasienModel->getPasien($no_rm);

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
            
            $data['validation'] = $this->validator;
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
