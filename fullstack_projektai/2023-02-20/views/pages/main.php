<?php
    // var_dump($_SESSION);
    if(empty($_SESSION['user']) /* OR $_SESSION['user']['role'] === '1'*/ ) {
        header('Location: ?page=login');
        exit;
    }

    if(!empty($_POST)) {
        // print_r($_POST);
        $db->query(
            vsprintf(
                "INSERT INTO playlists (name, user_id) VALUES ('%s', %d)",
                [$_POST['name'], $_SESSION['user']['id']]
            )
        ); 

        $id = $db->insert_id;

        $db->query("UPDATE songs SET playlist_id = {$id} WHERE id = {$_POST['song']}");
        
        header('Location: index.php');
    }

    // $playlists = $db->query("SELECT * FROM playlists");
    $playlists = $db->query("SELECT p.id, p.name, p.user_id, p.created_at, u.first_name, u.last_name FROM playlists AS p INNER JOIN users AS u ON u.id = p.user_id; ");
    $playlists = $playlists->fetch_all(MYSQLI_ASSOC);

    $songs = $db->query("SELECT * FROM songs");
    $songs = $songs->fetch_all(MYSQLI_ASSOC);
?>
<header>
        <h1>Headeris yra svarbu</h1>
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
        <?php foreach($playlists as $playlist) : 
                // $user = $db->query('SELECT first_name, last_name FROM users WHERE id = ' . $playlist['user_id']);
                // $user = $user->fetch_row();
            ?>
            <tr>
                <td><?= $playlist['id']; ?> </td>
                <td><?= $playlist['name']; ?> </td>
                <td><?= $playlist['first_name'] . ' ' . $playlist['last_name']; ?> </td>
                <!-- <td><?= $user[0]. ' '. $user[1];  ?> </td> -->
            </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<form method="POST">
    <h3>Create new playlist</h3>
    <div class="mb-3">
        <label>Playlist Name:</label>
        <input type="text" name="name" class="form-control" />
    </div>
    <div class="mb-3">
        <label>Song:</label>
        <select name="song" class="form-control">
            <?php foreach($songs as $song) : ?>
                <option value="<?= $song['id']; ?>"><?= $song['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
 
    <button class="btn btn-primary">Create Playlist</button>
</form>