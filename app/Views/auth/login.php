<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Medical Check Up</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Login Medical Check Up</h1>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <form class="user" action="<?= base_url('auth/login') ?>" method="POST">
                                                <?= csrf_field() ?>

                                                <?php if(session()->getFlashdata('error')) : ?>
                                                    <div class="alert alert-danger">
                                                        <?= session()->getFlashdata('error') ?>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                <div class="form-group">
                                                    <input type="text" 
                                                           class="form-control form-control-user" 
                                                           name="username" 
                                                           placeholder="Username dong..."
                                                           value="<?= old('username') ?>"
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" 
                                                           class="form-control form-control-user" 
                                                           name="password" 
                                                           placeholder="Password..."
                                                           required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Masuk Yuk!
                                                    </button>
                                                </div>
                                            </form>
                                            <div class="text-center mt-3">
                                                <a class="small" href="<?= base_url('auth/register') ?>">Need an Account?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Scripts -->
    <script src="<?= base_url('tamplate/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('tamplate/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>
