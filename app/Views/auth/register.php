<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register </title>

    <!-- Custom fonts -->
    <link href="<?php echo base_url('tamplate/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?php echo base_url('tamplate/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }
        
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 1000px;
            width: 100%;
            padding: 20px;
        }

        .card {
            margin: 0 !important;
        }



        .form-group select.form-control {
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
        }

    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                                    </div>

                                    <?php if(session()->has('error')): ?>
                                        <div class="alert alert-danger">
                                            <?php 
                                            $errors = session('error');
                                            if(is_array($errors)) {
                                                foreach($errors as $error) {
                                                    echo $error . "<br>";
                                                }
                                            } else {
                                                echo $errors;
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                        

                                    <form action="<?= base_url('auth/register') ?>" method="POST">
                                        <?= csrf_field() ?>
                                                                            
                                        <div class="form-group">
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                                        </div>
                                                                            
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username') ?>">
                                        </div>
                                                                            
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
                                        </div>
                                                                            
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                                                            
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password">
                                        </div>
                                                                            
                                        <div class="form-group">
                                            <select name="role_id" class="form-control">
                                                <option value="">Pilih Role</option>
                                                <?php foreach($roles as $role): ?>
                                                    <option value="<?= $role['id'] ?>" <?= old('role_id') == $role['id'] ? 'selected' : '' ?>>
                                                        <?= $role['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                                
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </form>
                                                                                
                                                
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/login') ?>">Sudah punya akun? Login!</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url('tamplate/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('tamplate/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('tamplate/js/sb-admin-2.min.js'); ?>"></script>
</body>
</html>
