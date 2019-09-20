
<body class='bg-dark'>
    
    <main role="main" class="px-4 text-center">
        <div class="card mx-auto " style="width: 24rem;">
                <div class="card-body">
                    <h1 class="h2"><?= $heading ?></h1>
                    <h1 class="h2"><?= $cek ?></h1>
                    <form action='<?= site_url('login/check') ?>' method='post'>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" name='username' class="form-control" placeholder="Username" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name='password' class="form-control" placeholder="Password" required>
                    
                    <input type="submit" class='btn btn-primary form-control mt-2' name='submit' value="Login">
                </form>
    </main>
