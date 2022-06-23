<?php
$nama_operator  = 0;
$username = 0;
$email = 0;
$pwd = 0;
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_GET['id'])){

    $id_operator = $_GET['id'];
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "SELECT * FROM tbl_operator where id_operator='$id_operator'";
    
    $data = $koneksi->query($query);
    
    while($value = $data->fetch_array()){
        $nama_operator  = $value['nama_operator'];
        $username = $value['username'];
        $email = $value['email'];
        $pwd = $value['pwd'];
    }
}
if(isset($_POST['ubah'])){
        $nama_operator  = $_POST['nama_operator'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
    
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    $id = $_GET['id'];
    // query untuk melakukan insert data ke dalam tabel barang
    // $query = "INSERT INTO tbl_barang(kode_barang, nama_barang, harga_barang, satuan, created_at, updated_at) values ('$kode_barang', '$nama_barang', '$harga_barang', '$satuan','$tgl','$tgl')";
    $query = "UPDATE tbl_operator set nama_operator = '$nama_operator', username ='$username', email='$email', pwd = '$pwd' where id_operator ='$id'";

    $update = $koneksi->query($query);

    if($update){
        ?>
            <script>
                alert('Berhasil mengubah data');
                window.location="index.php?hal=daftar_operator";
            </script>
        <?php
    }

}



?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Operator</h3>
        </div>


        <form accept="" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Operator</label>
                    <input type="text" maxlength="50" value="<?=$nama_operator;?>" class="form-control" name="nama_operator">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">Username</label>
                    <input type="text" maxlength="50" class="form-control" value="<?=$username;?>" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">email</label>
                    <input type="email" class="form-control" min="0" value="<?=$email;?>" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputText">pwd</label>
                    <input type="password" class="form-control" min="0" value="<?=$pwd;?>" name="pwd">
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-default">Batal</button>
                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
    </div>
</div>