
<body class='bg-dark'>
    
    <main role="main" class="px-4 text-center">
        <div class="card mx-auto " style="width: 24rem;">
                <div class="card-body">
                    <h1 class="h2 mb-3"><?= $heading ?></h1>
                    <?php
                    if($pesan = $this->input->get('m', TRUE)){
                        if($pesan = "false"){?>
                            <div class="alert alert-danger p-2" role="alert">
                            Gagal login, username atau password mungkin salah!
                            </div>
                        <?php }
                    }
                    if($this->session->flashdata('login_dulu')){?>
                        <div class="alert alert-danger " role="alert">
                            <?= $this->session->flashdata('login_dulu') ?>
                        </div>
                    <?php }
                    ?>
                    <form action='<?= site_url('login/check') ?>' method='post'>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" name='username' class="form-control mb-3" placeholder="Username" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name='password' class="form-control mb-3" placeholder="Password" required>
                    
                    <input type="submit" class='btn btn-primary form-control mt-2' name='submit' value="Login">
                </form>
    </main>
