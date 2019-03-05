<?php

class Silos
{
    // table name definition and database connection
    private $db_conn;
    private $table_name = "bolos";


    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function today()
    {
        $date = date('Y-m-d');
        $sql = "SELECT * FROM " . $this->table_name . " WHERE waktu LIKE '{$date}%'";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();
        $data = array();
        while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        
        return $data;
    }
    function save()
    {
        $status = array('status'=>FALSE,'msg'=>'title empty');
        if(!empty($_POST))
        {
            $data = $_POST;
            if(!empty($data))
            {
                $status = array('status'=>FALSE,'msg'=>'data empty');
                $q = 'INSERT INTO '.$this->table_name.' SET nama_siswa = :nama_siswa, kelas_id = :kelas_id, pelapor = :pelapor';
                $prep = $this->db_conn->prepare($q);
                $prep->bindParam(':nama_siswa',$data['nama_siswa']);
                $prep->bindParam(':kelas_id',$data['kelas_id']);
                $prep->bindParam(':pelapor',$data['pelapor']);
                if($prep->execute())
                {
                    $status = array('status'=>TRUE,'msg'=>'Successfull saved data ');
                }else{
                    $status = array('status'=>FALSE,'msg'=>'saved data failed');
                }
            }
        }
        return $status;
    }
}

