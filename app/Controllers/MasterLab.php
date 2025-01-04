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
        $data['title'] = 'Master Tipe Pemeriksaan Laboratorium';
        $data['tipe_periksa'] = $this->masterLabModel->getTipePeriksaLab();
        return view('master_lab/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Tipe Pemeriksaan';

        if ($this->request->getMethod() === 'post') {
            if ($this->validate(['tipeperiksa_lab' => 'required'])) {
                $this->masterLabModel->save([
                    'tipeperiksa_lab' => $this->request->getPost('tipeperiksa_lab')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan berhasil ditambahkan');
                return redirect()->to('/master-lab');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('master_lab/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Tipe Pemeriksaan';
        $data['tipe_periksa'] = $this->masterLabModel->find($id);

        if ($this->request->getMethod() === 'post') {
            if ($this->validate(['tipeperiksa_lab' => 'required'])) {
                $this->masterLabModel->update($id, [
                    'tipeperiksa_lab' => $this->request->getPost('tipeperiksa_lab')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan berhasil diupdate');
                return redirect()->to('/master-lab');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('master_lab/edit', $data);
    }

    public function delete($id)
    {
        if ($this->masterLabModel->delete($id)) {
            session()->setFlashdata('success', 'Tipe pemeriksaan berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Tipe pemeriksaan gagal dihapus');
        }
        return redirect()->to('/master-lab');
    }
}
