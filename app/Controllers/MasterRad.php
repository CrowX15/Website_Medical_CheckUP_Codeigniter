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
        $data['title'] = 'Master Tipe Pemeriksaan Radiologi';
        $data['tipe_periksa'] = $this->masterRadModel->getTipePeriksaRad();
        return view('master_rad/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Tipe Pemeriksaan Radiologi';

        if ($this->request->getMethod() === 'post') {
            if ($this->validate(['tipeperiksa_rad' => 'required'])) {
                $this->masterRadModel->save([
                    'tipeperiksa_rad' => $this->request->getPost('tipeperiksa_rad')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil ditambahkan');
                return redirect()->to('/master-rad');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('master_rad/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Tipe Pemeriksaan Radiologi';
        $data['tipe_periksa'] = $this->masterRadModel->find($id);

        if ($this->request->getMethod() === 'post') {
            if ($this->validate(['tipeperiksa_rad' => 'required'])) {
                $this->masterRadModel->update($id, [
                    'tipeperiksa_rad' => $this->request->getPost('tipeperiksa_rad')
                ]);

                session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil diupdate');
                return redirect()->to('/master-rad');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('master_rad/edit', $data);
    }

    public function delete($id)
    {
        if ($this->masterRadModel->delete($id)) {
            session()->setFlashdata('success', 'Tipe pemeriksaan radiologi berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Tipe pemeriksaan radiologi gagal dihapus');
        }
        return redirect()->to('/master-rad');
    }
}
