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
        $data['title'] = 'Data Hasil Radiologi';
        $data['hasil_rad'] = $this->radiologiModel->getHasilRad();
        return view('radiologi/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Hasil Radiologi';
        $data['tipe_periksa'] = $this->masterRadModel->getTipePeriksaRad();
        $data['pasien'] = $this->pasienModel->getPasien();

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

        return view('radiologi/create', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Hasil Radiologi';
        $data['hasil_rad'] = $this->radiologiModel->find($id);
        $data['tipe_periksa'] = $this->masterRadModel->getTipePeriksaRad();
        $data['pasien'] = $this->pasienModel->getPasien();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'hasil_rad' => 'required'
            ];

            if ($this->validate($rules)) {
                $this->radiologiModel->update($id, [
                    'hasil_rad' => $this->request->getPost('hasil_rad'),
                    'kesimpulan' => $this->request->getPost('kesimpulan')
                ]);

                session()->setFlashdata('success', 'Hasil radiologi berhasil diupdate');
                return redirect()->to('/radiologi');
            }
            
            $data['validation'] = $this->validator;
        }

        return view('radiologi/edit', $data);
    }

    public function delete($id)
    {
        if ($this->radiologiModel->delete($id)) {
            session()->setFlashdata('success', 'Hasil radiologi berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Hasil radiologi gagal dihapus');
        }
        return redirect()->to('/radiologi');
    }
}
