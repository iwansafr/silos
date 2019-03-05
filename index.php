<!DOCTYPE html>
<html>
<head>
    <title>DATA LAPORAN SISWA BOLOS SMKN 1 BANGSRI</title>
    <link href="library/css/bootstrap.min.css" rel="stylesheet">
    <?php
    // include database and object files
    include_once 'classes/database.php';
    include_once 'classes/kelas.php';
    include_once 'classes/config.php';
    include_once 'classes/silos.php';
    include_once 'initial.php';

    $kelas = new kelas($db);
    $conf = new config($db);
    $silos = new silos($db);
    $data_kelas = $kelas->getAll(TRUE);
    $config = $conf->get_config('main');
    $data_bolos = $silos->today();
    ?>
    <link rel="shortcut icon" type="image/x-icon" href="http://smkn1bangsri.sch.id/theme/images/logosekolah.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="situs web portal untuk test smkn1 bangsri">
    <meta name="keywords" content="smkn1bangsri, esoftgreat, software development, esoftgreat.com">
    <meta name="developer" content="esoftgreat">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <img src="http://smkn1bangsri.sch.id/theme/images/logosekolah.png" alt="" height="50"> <?php echo @$config['judul'].' '.date('d M Y') ?>
                    </div>
                    <?php if (!empty($data_bolos)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>KELAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data_bolos as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $value['nama_siswa'] ?></td>
                                        <td><?php echo $data_kelas[$value['kelas_id']] ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif ?>
                    <div class="panel panel-body">
                        <a href="" class="btn btn-lg btn-warning" title="">refresh halaman</a>
                    </div>
                    <div class="panel panel-footer">
                        supported by : team RPL
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>