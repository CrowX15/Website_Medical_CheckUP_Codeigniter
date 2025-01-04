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
        $data['title'] = 'Data Hasil Laboratorium';
        $data['hasil_lab'] = $this->labModel->getHasilLab();
        return view('laboratorium/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Hasil Laboratorium';
        $data['tipe_periksa'] = $this->masterLabModel->getTipePeriksaLab();
        $data['pasien'] = $this->pasienModel->getPasien();

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

        return view('laboratorium/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Hasil Laboratorium';
        $data['hasil_lab'] = $this->labModel->find($id);
        $data['tipe_periksa'] = $this->masterLabModel->getTipePeriksaLab();
        $data['pasien'] = $this->pasienModel->getPasien();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'hasil_lab' => 'required',
                'biaya' => 'permit_empty|numeric'
            ];

            if ($this->validate($rules)) {
                $this->labModel->update($id, [
                    'hasil_lab' => $this->request->getPost('hasil_lab'),
                    'biaya' => $this->request->getPost('biaya')
                ]);

                session()->setFlashdata('success', 'Hasil laboratorium berhasil diupdate');
                return redirect()->to('/laboratorium');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('laboratorium/edit', $data);
    }

    public function delete($id)
    {
        if ($this->labModel->delete($id)) {
            session()->setFlashdata('success', 'Hasil laboratorium berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Hasil laboratorium gagal dihapus');
        }
        return redirect()->to('/laboratorium');
    }
}
