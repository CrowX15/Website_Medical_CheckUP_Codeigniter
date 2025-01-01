<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role_id = session()->get('role_id');
        
        // Cek role yang diizinkan
        if (!in_array($role_id, $arguments)) {
            return redirect()->back()->with('error', 'Akses ditolak! 🚫');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong aja gpp
    }
}
