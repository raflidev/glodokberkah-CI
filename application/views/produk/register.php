
<body class='bg-dark'>

    <main role="main" class="px-4 text-center">
        <div class="card mx-auto " style="width: 24rem;">
                <div class="card-body">
                    <h1 class="h2"><?= $heading ?></h1>
                    <form action='<?= site_url('register/check') ?>' method='post'>
                    <label for="inputEmail" class="sr-only">kode</label>
                    <input type="text" name='kode' class="form-control" value="<?= $id ?>"placeholder="Username" required readonly>
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="text" name='username' class="form-control" placeholder="Username" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name='password' class="form-control" placeholder="Password" required>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name='password2' class="form-control" placeholder="Konfirmasi Password" required>
                    
                    <input type="submit" class='btn btn-primary form-control mt-2' name='submit' value="Login">
                </form>
    </main>
