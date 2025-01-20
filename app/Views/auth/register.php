<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Medical Check Up</title>

    <!-- Custom fonts -->
    <link href="<?= base_url('tamplate/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?= base_url('tamplate/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS untuk centering -->
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

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .card {
                margin: 10px !important;
            }
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
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <?php if(session()->getFlashdata('success')): ?>
                                                <div class="alert alert-success" role="alert">
                                                     <?= session()->getFlashdata('success') ?>
                                                 </div>
                                             <?php endif; ?>
                                            <?php if (session()->getFlashdata('error')): ?>
                                                <div class="alert alert-danger" role="alert">
                                                     <?= session()->getFlashdata('error') ?>
                                                 </div>
                                            <?php endif; ?>


                                            <?= form_open('auth/register', ['class' => 'user']) ?>
                                                <?= csrf_field() ?>
                                                <div class="form-group">
                                                    <input type="text" 
                                                           class="form-control form-control-user <?= isset($errors['nama_lengkap']) ? 'is-invalid' : '' ?>" 
                                                           name="nama_lengkap" 
                                                           placeholder="Nama Lengkap"
                                                           value="<?= old('nama_lengkap') ?>"
                                                           required>
                                                      <?php if (isset($errors['nama_lengkap'])): ?>
                                                          <div class="invalid-feedback"><?= $errors['nama_lengkap'] ?></div>
                                                      <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" 
                                                           class="form-control form-control-user <?= isset($errors['username']) ? 'is-invalid' : '' ?>" 
                                                           name="username" 
                                                           placeholder="Username"
                                                           value="<?= old('username') ?>"
                                                           required>
                                                          <?php if (isset($errors['username'])): ?>
                                                          <div class="invalid-feedback"><?= $errors['username'] ?></div>
                                                      <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" 
                                                           class="form-control form-control-user <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                                                           name="password" 
                                                           placeholder="Password"
                                                           required>
                                                          <?php if (isset($errors['password'])): ?>
                                                          <div class="invalid-feedback"><?= $errors['password'] ?></div>
                                                      <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" 
                                                           class="form-control form-control-user <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>" 
                                                           name="confirm_password" 
                                                           placeholder="Konfirmasi Password"
                                                           required>
                                                           <?php if (isset($errors['confirm_password'])): ?>
                                                          <div class="invalid-feedback"><?= $errors['confirm_password'] ?></div>
                                                      <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" 
                                                           class="form-control form-control-user <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                                                           name="email" 
                                                           placeholder="Email"
                                                           value="<?= old('email') ?>"
                                                           required>
                                                            <?php if (isset($errors['email'])): ?>
                                                          <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                                      <?php endif; ?>
                                                </div>

                                                <div class="form-group">
                                                    <select class="form-control <?= isset($errors['role_id']) ? 'is-invalid' : '' ?>" name="role_id" required style="
                                                        appearance: none;
                                                        -webkit-appearance: none;
                                                        -moz-appearance: none;
                                                        padding: 10px 15px; /* Padding yang disesuaikan */
                                                        border: 1px solid #d1d3e2;
                                                        font-size: 1.2rem; /* Ukuran font yang lebih besar */
                                                        font-weight: 400;
                                                        color: #6e707e;
                                                        background-color: #fff;
                                                        border-radius: 10px; /* Border radius yang lebih bulat */
                                                        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                                        ">
                                                        <option value="">Pilih Role</option>
                                                        <?php foreach ($roles as $role): ?>
                                                            <option value="<?= $role['id'] ?>" <?= old('role_id') == $role['id'] ? 'selected' : '' ?>>
                                                                <?= $role['name'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?php if (isset($errors['role_id'])): ?>
                                                        <div class="invalid-feedback"><?= $errors['role_id'] ?></div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Register
                                                    </button>
                                                </div>
                                            <?= form_close() ?>
                                            <div class="text-center mt-3">
                                                <a class="small" href="<?= base_url('login') ?>">Already have an account? Login!</a>
                                            </div>
                                        </div>
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
    <script src="<?= base_url('tamplate/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>