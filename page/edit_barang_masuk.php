<?php
$nama_barang  = 0;
$satuan = 0;
$qty_masuk = 0;
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_GET['id'])){

    $id_barang = $_GET['id'];
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "SELECT * FROM tbl_barang_masuk,tbl_barang where id_barang='$id_barang'";
    
    $data = $koneksi->query($query);
    
    while($value = $data->fetch_array()){
        $nama_barang = $value['nama_barang'];
        $qty_masuk = $value['qty_masuk'];
        $satuan = $value['satuan'];
    }
}
if(isset($_POST['ubah'])){
    $nama_barang = $_POST['nama_barang'];
    $qty_masuk = $_POST['qty_masuk'];
    $satuan = $_POST['satuan'];
    
    // echo $satuan;
    // query insert 
    $tgl = date('Y-m-d H:i:s', time());
    $id = $_GET['id'];
    // query untuk melakukan insert data ke dalam tabel barang
    // $query = "INSERT INTO tbl_barang(kode_barang, nama_barang, harga_barang, satuan, created_at, updated_at) values ('$kode_barang', '$nama_barang', '$harga_barang', '$satuan','$tgl','$tgl')";
    $query = "UPDATE tbl_barang_masuk set nama_barang = '$nama_barang', qty_masuk ='$qty_masuk', satuan='$satuan' where id_barang ='$id'";

    $update = $koneksi->query($query);

    if($update){
        ?>
            <script>
                alert('Berhasil mengubah data');
                window.location="index.php?hal=daftar_barang_masuk";
            </script>
        <?php
    }

}



?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Data Barang</h3>
        </div>


        <form accept="" method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputText">Nama Barang</label>
                    <input type="text" maxlength="10" value="<?=$nama_barang;?>" class="form-control" name="kode_barang" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputText">quantity Barang</label>
                    <input type="text" maxlength="50" class="form-control" value="<?=$qty_masuk;?>" name="qty_barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputText" name="satuan">Satuan</label>
                    <select name="satuan" class="form-control">
                        <option value="Pcs">Pcs</option>
                        <option value="Unit">Unit</option>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-default">Batal</button>
                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah</button>
            </div>
        </form>
    </div>
</div>