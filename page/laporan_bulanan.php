<?php
$query = "SELECT b.id_barang,
        b.kode_barang,
        b.nama_barang,
        bm.qty_masuk,
        DATE_FORMAT(bm.created_at,'%d/%m/%Y') as tanggal_masuk,
        bk.qty_keluar,
        DATE_FORMAT(bk.created_at,'%d/%m/%Y') as tanggal_keluar
    FROM tbl_barang as b 
    LEFT JOIN tbl_barang_masuk AS bm ON bm.id_barang = b.id_barang
    LEFT JOIN tbl_barang_keluar AS bk ON bk.id_barang = b.id_barang
    WHERE b.deleted_at IS NULL 
    ORDER BY b.id_barang DESC";

    $data = $koneksi->query($query);
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan Harian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th rowspan="2" class="align-middle">#</th>
                        <th rowspan="2" class="align-middle">Kode Barang</th>
                        <th rowspan="2" class="align-middle">Nama Barang</th>
                        <th colspan="2" class="align-middle">Masuk</th>
                        <th colspan="2" class="align-middle">Keluar</th>
                        <th rowspan="2" class="align-middle">Stok</th>
                    </tr>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        while($value = $data->fetch_array()){
                            ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$value['kode_barang'];?></td>
                                <td><?=$value['nama_barang'];?></td>
                                <td class="text-center"><?= $value['tanggal_masuk'];?></td>
                                <td class="text-center"><?=$value['qty_masuk'];?></td>
                                <td class="text-center"><?=$value['tanggal_keluar'];?></td>
                                <td class="text-center"><?=$value['qty_keluar'];?></td>
                                <?php 
                                    if ($value['qty_keluar'] > $value['qty_masuk']) {
                                        ?> 
                                            <td class="text-danger text-center"><?=$value['qty_masuk'] - $value['qty_keluar'];?></td> 
                                        <?php 
                                    }else{
                                        ?>
                                            <td class="text-center"><?=$value['qty_masuk'] - $value['qty_keluar'];?></td> 
                                        <?php 
                                    }
                                ?>
                                    
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }

                    ?>
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th colspan="2">Masuk</th>
                        <th colspan="2">Keluar</th>
                        <th>Stok</th>
                    </tr>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>