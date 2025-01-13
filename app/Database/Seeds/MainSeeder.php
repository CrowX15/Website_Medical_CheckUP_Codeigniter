<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('RoleSeeder');
        $this->call('UserSeeder');
        $this->call('PasienSeeder');
        $this->call('MasterLabSeeder');
        $this->call('LaboratoriumSeeder');
        $this->call('MasterRadSeeder');
        $this->call('RadiologiSeeder');
        $this->call('PeriksaSeeder');
        $this->call('KesimpulanSeeder');
        
    }
}
