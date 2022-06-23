<?php 
include("conn.php");
$query = "SELECT * FROM tbl_barang_keluar  
INNER JOIN tbl_barang ON tbl_barang_keluar.id_barang=tbl_barang.id_barang 
INNER JOIN tbl_operator  ON tbl_barang_keluar.id_operator=tbl_operator.id_operator AND tbl_barang_keluar.deleted_at 
IS null ORDER BY tbl_barang_keluar.id_barang_keluar desc";
$data = $koneksi->query($query);

// print_r($data);
?>
<div class="col-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang keluar</h3>
    </div>

    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tgl. keluar</th>
                    <th>Barang</th>
                    <th>Satuan</th>
                    <th>QTY</th>
                    <th>Operator</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while($value = $data->fetch_array()){
                        ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$value['created_at'];?></td>
                                <td><?=$value['kode_barang'];?>-<?=$value['nama_barang'];?></td>
                                <td><?=$value['satuan'];?></td>
                                <td><?=$value['qty_keluar'];?></td>
                                <td><?=$value['nama_operator'];?></td>
                                <td>
                                    <a href="index.php?hal=hapus_barang_keluar&id=<?=$value['id_barang_keluar'];?>" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        $no++;
                    }

                ?>
                
                
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Tgl. Masuk</th>
                    <th>Barang</th>
                    <th>Satuan</th>
                    <th>QTY</th>
                    <th>Operator</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</div>