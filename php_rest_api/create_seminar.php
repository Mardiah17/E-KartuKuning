<?php
  include 'db_connect.php';
    $postdata = file_get_contents("php://input");
    $nama = "";
    $nrp ="";
    $jadwal = "";
    $jam = "";
    $b_ilmu = "";
    $judul = "";
    $fakultas = "";
    $departemen = "";
    $ruangan = "";
    $moderator = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $nrp = $request->nrp;
        $jadwal = $request->jadwal;
        $jam = $request->jam;
        $b_ilmu = $request->b_ilmu;
        $judul = $request->judul;
        $fakultas = $request->fakultas;
        $departemen = $request->departemen;
        $ruangan = $request->ruangan;
        $moderator = $request->moderator;
      
        //ini buat cek apakah JSON ada isisnya atau tidak
        if($request){
            $query_register = mysqli_query($connect,"INSERT INTO tb_seminar (nama, nrp, jadwal, jam, b_ilmu, judul, fakultas, departemen, ruangan, moderator) VALUES ('$nama', '$nrp', '$jadwal', '$jam', '$b_ilmu', '$judul', '$fakultas', '$departemen', '$ruangan', '$moderator') ");
            if($query_register){
         
                 $data =array(
                     'message' => "Register Success!",
                     'status' => "200"
                 );
             }
             else {
                 $data =array(
                     'message' => "Register Failed!",
                     'status' => "404"
                 ); 
             }
        }
        else{
            $data =array(
                'message' => "No Data!",
                'status' => "503"
            ); 
        }
        echo json_encode($data);
    }
?>