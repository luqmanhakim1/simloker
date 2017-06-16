<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Lowongan</h3>
    </div>
</div>

<div class="btn-group" role="group" aria-label="...">
    <a class="btn btn-default" title="New Data" href="?p=lowongan.add"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=lowongan.view" type="button" title="Refresh" class="btn btn-default"><i class="fa fa-refresh"></i> Refresh</a>
</div>

<div class="row">
<div class="panel-body">
    <div class="dataTable_wrapper">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>                  
                        <th style="width:7%;">No</th>
                        <th style="width:15%;">Perusahaan</th>
                        <th>Kategori Kerja</th>
                        <th style="width:15%;">Posisi</th> 
                        <th style="text-align:center;">Pendidikan</th>
                        <th style="text-align:center;">Tanggal Post/Akhir</th>
                        <th style="text-align:center;">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT *FROM tb_lowongan 
                        INNER JOIN tb_kategori_pekerjaan ON 
                        (tb_lowongan.id_kategori_pekerjaan=tb_kategori_pekerjaan.id_kategori_kerja)
                        INNER JOIN tb_kategori_pendidikan ON 
                        (tb_lowongan.id_pendidikan=tb_kategori_pendidikan.id_pendidikan)
                        INNER JOIN tb_user ON 
                        (tb_lowongan.id_perusahaan=tb_user.id) ORDER BY tb_lowongan.id_lowongan DESC";

                        $res = $conn->query($sql);
                        $no  = 0;
                        foreach ($res as $row => $data) {

                        $no++;
                    ?>
                    <tr class="odd gradeX">
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td ><?php echo $data['uname']; ?></td>
                        <td ><?php echo $data['nama_kategori_kerja']; ?></td>
                        <td style="text-align:center;"><?php echo $data['posisi'];?></td>
                        <td style="text-align:center;"><?php echo $data['nama_pendidikan'];?></td>
                        <td style="text-align:center;"><?php echo $data['tgl_posting']. ' - ' .$data['tgl_akhir'];?></td>
                        <td style="text-align:center;">

                        <div class="btn-group" role="group" aria-label="...">
                            <a class="btn btn-default btn-sm" title="Detail Pendaftar" data-toggle="modal" data-target="#detail<?php echo $data['no_reg']; ?>"><span class="fa fa-search fa-fw" aria-hidden="true"></span></a>
                            <a class="btn btn-default btn-sm" title="Edit Data" href="?p=lowongan.edit&id=<?php echo $data['id_lowongan']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=lowongan.delete&id=<?php echo $data['id_lowongan']; ?>" onclick="return confirm('Apakah anda yakin menghapus data lowongan?')" class="btn btn-default btn-sm" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
                        </div>

                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
</div>
</div>