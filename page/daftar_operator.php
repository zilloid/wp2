<?php
$query = "SELECT * FROM tbl_operator where deleted_at is null order by id_operator desc";

$data = $koneksi->query($query);

?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Operator</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Operator</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($value = $data->fetch_array()){
                    ?>  
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$value['nama_operator']?></td>
                        <td><?=$value['username']?></td>
                        <td><?=$value['email']?></td>
                        <td>
                            <a href="index.php?hal=edit_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-primary">
                                <i class="fas fa-edit"></i> edit
                            </a>
                            <a href="index.php?hal=hapus_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-danger">
                                <i class="fas fa-trash-alt"></i> hapus
                            </a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
                <tfooter>
                    <tr>
                        <th>#</th>
                        <th>Nama Operator</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </tfooter>
                </table>
        </div>
    </div>
</div>