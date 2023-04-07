<html>
<head>
    <title>Tambah User</title>
</head>

<body>
    <a href="index.php">Kembali ke Beranda</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Mengambil nilai yang sudah di input dari form
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // Memanggil koneksi database
        include_once('../config/config.php');

        // Memasukkan data ke database
        $result = mysqli_query($mysqli, "INSERT INTO datas(name,email,mobile) VALUES('$name','$email','$mobile')");

        // Menampilkan pesan saat berhasil memasukkan data ke database
        echo "User berhasil ditambahkan. <a href='index.php'>Kembali ke Home</a>";
    }
    ?>
</body>
</html>