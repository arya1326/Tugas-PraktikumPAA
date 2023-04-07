<?php
// memanggil koneksi
include_once('../config/config.php');

// mengambil semua data dari database
$result = mysqli_query($mysqli, "SELECT * FROM datas ORDER BY id DESC");
?>

<html>
<head>    
    <title>Homepage</title>
</head>

<body>
<a href="add.php">Tambah User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Name</th> <th>Mobile</th> <th>Email</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['mobile']."</td>";
        echo "<td>".$user_data['email']."</td>";    
        echo "<td><a href='edit.php?id=".$user_data['id']."'>Edit</a> | <a href='delete.php?id=".$user_data['id']."'>Hapus</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>