<?php 
    if(!empty($_POST)) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $user = $db->query("SELECT id, role FROM users WHERE email = '{$email}'
                    AND password = '{$password}' " );
        $params = [
            'page' => 'login',
            'message' => 'Tokio vartotojo čia nėra! Baisiai liūdna jums tai sakyti. Greičiausiai prisispaudėt kažką.',
            'status' => 'warning'
        ];

        if($user->num_rows === 0) {
            header('Location: ?' . http_build_query($params));
            exit;
        }

        $user = $user->fetch_row();
        // print_r($user);

        $_SESSION['user']['id'] = $user[0];
        $_SESSION['user']['role'] = $user[1];

        // print_r($user->num_rows);
        // exit;
    }

?>

<header>
        <h1>Headeris yra svarbu</h1>
</header>

<h1>Login</h1>

<form method="POST">
    <div class="mb-3">
        <label>Email address</label>
        <input type="email" name="email" placeholder="test@gmail.com" class="form-control-sm" required />
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required />
    </div>

    <button class="btn btn-primary">Login</button>
</form>