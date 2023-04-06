<?php
// tikriname ar vartotojas prisijunges

if(empty($_SESSION['user'])) {
    header('Location: ?page=login');
    exit;
}

// tikriname ar turime grojarascio perdavima, jeigu turime ivyksta peradresavimas

if(empty($_GET['playlist_id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['playlist_id'];

$result = $db->query("SELECT * FROM playlists WHERE id = {$id}");
$playlist = $result->fetch_assoc();

// $result = $db->query("SELECT song_id FROM song_playlists WHERE playlist_id = {$id}");
$result = $db->query(
    "SELECT s.id, s.name, s.author, s.album, s.year, s.link, s.created_at 
    FROM song_playlists AS sp 
    JOIN songs AS s 
    ON sp.song_id = s.id 
    WHERE sp.playlist_id = {$id}"
);

$songs = $result->fetch_all(MYSQLI_ASSOC);

// print_r($songids);

?>

<h1>Songs in playlist "<?= $playlist['name']; ?>"</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Author</th>
            <th>Album</th>
            <th>Year</th>
            <th>Link</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($songs as $song) : ?>
            <tr>
                <td><?= $song['id']; ?> </td>
                <td><?= $song['name']; ?> </td>
                <td><?= $song['author']; ?> </td>
                <td><?= $song['album']; ?> </td>
                <td><?= $song['year']; ?> </td>
                <td><?= $song['link']; ?> </td>
                <td><?= $song['created_at']; ?> </td>
            </tr>
        <?php endforeach; ?>        
    </tbody>
</table>