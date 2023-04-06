<?php
// var_dump($_SESSION);
if (empty($_SESSION['user']) /* OR $_SESSION['user']['role'] === '1'*/) {
    header('Location: ?page=login');
    exit;
}

if (!empty($_POST)) {
    // print_r($_POST);
    $db->query(
        vsprintf(
            "INSERT INTO playlists (name, user_id) VALUES ('%s', %d)",
            [$_POST['name'], $_SESSION['user']['id']]
        )
    );

    $id = $db->insert_id;

    foreach($_POST['song'] as $song_id) {
        $db->query("INSERT INTO song_playlists (song_id, playlist_id) VALUES ({$song_id}, {$id})");
    }
    // $db->query("UPDATE songs SET playlist_id = {$id} WHERE id = {$_POST['song']}");

    header('Location: index.php');
}

// $playlists = $db->query("SELECT * FROM playlists");
$playlists = $db->query("SELECT p.id, p.name, p.user_id, p.created_at, u.first_name, u.last_name FROM playlists AS p INNER JOIN users AS u ON u.id = p.user_id; ");
$playlists = $playlists->fetch_all(MYSQLI_ASSOC);

$songs = $db->query("SELECT * FROM songs");
$songs = $songs->fetch_all(MYSQLI_ASSOC);
?>

<div class="b-example-divider"></div>

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Playlists</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control-sm form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>



<h1>Discover songs</h1>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($playlists as $playlist) :
            // $user = $db->query('SELECT first_name, last_name FROM users WHERE id = ' . $playlist['user_id']);
            // $user = $user->fetch_row();
        ?>
            <tr>
                <td><?= $playlist['id']; ?> </td>
                <td>
                    <a href="?page=playlist&playlist_id=<?= $playlist['id']; ?>">
                        <?= $playlist['name']; ?>
                    </a>
                </td>
                <td><?= $playlist['first_name'] . ' ' . $playlist['last_name']; ?> </td>
                <!-- <td><?= $user[0] . ' ' . $user[1];  ?> </td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form method="POST">
    <h3>Create new playlist</h3>
    <div class="mb-3">
        <label>Playlist Name:</label>
        <input type="text" name="name" class="form-control-sm" />
    </div>
    <div class="mb-3">
        <label>Song:</label>
        <?php foreach ($songs as $song) : ?>
            <div class="form-check">
                <label>
                    <input type="checkbox" name="song[]" class="form-check-input" value="<?= $song['id']; ?>">
                    <?= $song['name']; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

    <button class="btn btn-primary">Create Playlist</button>
</form>

<div class="b-example-divider"></div>

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </footer>
</div>