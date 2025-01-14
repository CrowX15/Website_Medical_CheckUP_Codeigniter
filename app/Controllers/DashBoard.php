<?php

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\PeriksaModel;
use App\Models\KesimpulanModel;
use App\Models\MasterLabModel;
use App\Models\LaboratoriumModel;
use App\Models\MasterRadModel;
use App\Models\RadiologiModel;


class Dashboard extends BaseController
{
    protected $pasienModel;
    protected $periksaModel;
    protected $kesimpulanModel;
    protected $masterLabModel;
    protected $laboratoriumModel;
    protected $masterRadModel;
    protected $radiologiModel;
   

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->periksaModel = new PeriksaModel(); 
        $this->kesimpulanModel = new KesimpulanModel();
        $this->masterLabModel = new MasterLabModel();
        $this->laboratoriumModel = new LaboratoriumModel();
        $this->masterRadModel = new MasterRadModel();
        $this->radiologiModel = new RadiologiModel();
 
    }

    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $role_id = session()->get('role_id');
        $nama_lengkap = session()->get('nama_lengkap');
        $username = session()->get('username');

        $data = [
            'title' => 'Dashboard',
            'role_id' => $role_id,
            'nama_lengkap' => $nama_lengkap,
            'username' => $username
        ];
        // Ambil Data sesuai Role
        switch ($role_id) {
            case 1: // Admin SIRS
                $data['total_pasien'] = $this->pasienModel->countAll();
                break;

            case 2: // Loket
                $data['pendaftaran_hari_ini'] = $this->pasienModel->countAll();
                break;
            case 3: // Dokter
                $data['total_pasien'] = $this->pasienModel->countAll();
                $data['jumlah_periksa'] = $this->periksaModel->countAll(); 
                $data['jumlah_kesimpulan'] = $this->kesimpulanModel->countAll();
                break;
            case 4: // User Laboratorium
                $data['jumlah_lab'] = $this->laboratoriumModel->countAll();
                $data['jumlah_tipe_lab'] = $this->masterLabModel->countAll(); 
                break;
            case 5: // Admin Laboratorium
                $data['jumlah_lab'] = $this->laboratoriumModel->countAll();
                $data['jumlah_tipe_lab'] = $this->masterLabModel->countAll(); 
                break;
            case 6: // User Radiologi
                $data['jumlah_radiologi'] = $this->radiologiModel->countAll();
                $data['jumlah_tipe_radiologi'] = $this->masterRadModel->countAll();
                break;
            case 7: // Admin Radiologi
                $data['jumlah_radiologi'] = $this->radiologiModel->countAll();
                $data['jumlah_tipe_radiologi'] = $this->masterRadModel->countAll();
                break;
        }

        return view('admin/dashboard', $data);
    }
}