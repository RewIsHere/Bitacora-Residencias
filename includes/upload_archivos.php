<?php

include "../services/ConexionBD.php";

session_start();
if (
    isset($_FILES['Solicitus_resi']['name']) and !empty($_FILES['Solicitus_resi']['name']) &&
    isset($_FILES['Carta_acep']['name']) and !empty($_FILES['Carta_acep']['name']) &&
    isset($_FILES['Reporte_pre']['name']) and !empty($_FILES['Reporte_pre']['name']) &&
    isset($_FILES['Reporte_final']['name']) and !empty($_FILES['Reporte_final']['name']) &&
    isset($_FILES['Cumpl_resi_doce']['name']) and !empty($_FILES['Cumpl_resi_doce']['name']) &&
    isset($_FILES['Eva_segui']['name']) and !empty($_FILES['Eva_segui']['name']) &&
    isset($_FILES['Eva_repor']['name']) and !empty($_FILES['Eva_repor']['name']) &&
    isset($_FILES['Car_termin_resi']['name']) and !empty($_FILES['Car_termin_resi']['name']) &&
    isset($_FILES['Liberacion_repor']['name']) and !empty($_FILES['Liberacion_repor']['name'])
) {


    $img_name1 = $_FILES['Solicitus_resi']['name'];
    $tmp_name1 = $_FILES['Solicitus_resi']['tmp_name'];
    $error1 = $_FILES['Solicitus_resi']['error'];

    $img_name2 = $_FILES['Carta_acep']['name'];
    $tmp_name2 = $_FILES['Carta_acep']['tmp_name'];
    $error2 = $_FILES['Carta_acep']['error'];

    $img_name3 = $_FILES['Reporte_pre']['name'];
    $tmp_name3 = $_FILES['Reporte_pre']['tmp_name'];
    $error3 = $_FILES['Reporte_pre']['error'];

    $img_name4 = $_FILES['Reporte_final']['name'];
    $tmp_name4 = $_FILES['Reporte_final']['tmp_name'];
    $error4 = $_FILES['Reporte_final']['error'];

    $img_name5 = $_FILES['Cumpl_resi_doce']['name'];
    $tmp_name5 = $_FILES['Cumpl_resi_doce']['tmp_name'];
    $error5 = $_FILES['Cumpl_resi_doce']['error'];

    $img_name6 = $_FILES['Eva_segui']['name'];
    $tmp_name6 = $_FILES['Eva_segui']['tmp_name'];
    $error6 = $_FILES['Eva_segui']['error'];

    $img_name7 = $_FILES['Eva_repor']['name'];
    $tmp_name7 = $_FILES['Eva_repor']['tmp_name'];
    $error7 = $_FILES['Eva_repor']['error'];

    $img_name8 = $_FILES['Car_termin_resi']['name'];
    $tmp_name8 = $_FILES['Car_termin_resi']['tmp_name'];
    $error8 = $_FILES['Car_termin_resi']['error'];

    $img_name9 = $_FILES['Liberacion_repor']['name'];
    $tmp_name9 = $_FILES['Liberacion_repor']['tmp_name'];
    $error9 = $_FILES['Liberacion_repor']['error'];

    if ($error1 === 0 && $error2 === 0  && $error3 === 0  && $error4 === 0  && $error5 === 0  && $error6 === 0  && $error7 === 0  && $error8 === 0  && $error9 === 0) {
        $img_ex1 = pathinfo($img_name1, PATHINFO_EXTENSION);
        $img_ex_to_lc1 = strtolower($img_ex1);

        $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
        $img_ex_to_lc2 = strtolower($img_ex2);

        $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
        $img_ex_to_lc3 = strtolower($img_ex3);

        $img_ex4 = pathinfo($img_name4, PATHINFO_EXTENSION);
        $img_ex_to_lc4 = strtolower($img_ex4);

        $img_ex5 = pathinfo($img_name5, PATHINFO_EXTENSION);
        $img_ex_to_lc5 = strtolower($img_ex5);

        $img_ex6 = pathinfo($img_name6, PATHINFO_EXTENSION);
        $img_ex_to_lc6 = strtolower($img_ex6);

        $img_ex7 = pathinfo($img_name7, PATHINFO_EXTENSION);
        $img_ex_to_lc7 = strtolower($img_ex7);

        $img_ex8 = pathinfo($img_name8, PATHINFO_EXTENSION);
        $img_ex_to_lc8 = strtolower($img_ex8);

        $img_ex9 = pathinfo($img_name9, PATHINFO_EXTENSION);
        $img_ex_to_lc9 = strtolower($img_ex9);

        $allowed_exs = array('pdf');
        if (
            in_array($img_ex_to_lc1, $allowed_exs) && in_array($img_ex_to_lc2, $allowed_exs) && in_array($img_ex_to_lc3, $allowed_exs) && in_array($img_ex_to_lc4, $allowed_exs) &&
            in_array($img_ex_to_lc5, $allowed_exs) && in_array($img_ex_to_lc6, $allowed_exs) && in_array($img_ex_to_lc7, $allowed_exs) && in_array($img_ex_to_lc8, $allowed_exs) && in_array($img_ex_to_lc9, $allowed_exs)
        ) {
            $uname = $_SESSION['no_control'];
            $new_img_name1 = uniqid($uname, true) . '.' . $img_ex_to_lc1;
            $img_upload_path1 = '../archivos/' . $new_img_name1;
            $new_img_name2 = uniqid($uname, true) . '.' . $img_ex_to_lc2;
            $img_upload_path2 = '../archivos/' . $new_img_name2;
            $new_img_name3 = uniqid($uname, true) . '.' . $img_ex_to_lc3;
            $img_upload_path3 = '../archivos/' . $new_img_name3;
            $new_img_name4 = uniqid($uname, true) . '.' . $img_ex_to_lc4;
            $img_upload_path4 = '../archivos/' . $new_img_name4;
            $new_img_name5 = uniqid($uname, true) . '.' . $img_ex_to_lc5;
            $img_upload_path5 = '../archivos/' . $new_img_name5;
            $new_img_name6 = uniqid($uname, true) . '.' . $img_ex_to_lc6;
            $img_upload_path6 = '../archivos/' . $new_img_name6;
            $new_img_name7 = uniqid($uname, true) . '.' . $img_ex_to_lc7;
            $img_upload_path7 = '../archivos/' . $new_img_name7;
            $new_img_name8 = uniqid($uname, true) . '.' . $img_ex_to_lc8;
            $img_upload_path8 = '../archivos/' . $new_img_name8;
            $new_img_name9 = uniqid($uname, true) . '.' . $img_ex_to_lc9;
            $img_upload_path9 = '../archivos/' . $new_img_name9;
            move_uploaded_file($tmp_name1, $img_upload_path1);
            move_uploaded_file($tmp_name2, $img_upload_path2);
            move_uploaded_file($tmp_name3, $img_upload_path3);
            move_uploaded_file($tmp_name4, $img_upload_path4);
            move_uploaded_file($tmp_name5, $img_upload_path5);
            move_uploaded_file($tmp_name6, $img_upload_path6);
            move_uploaded_file($tmp_name7, $img_upload_path7);
            move_uploaded_file($tmp_name8, $img_upload_path8);
            move_uploaded_file($tmp_name9, $img_upload_path9);

            // Insert into Database
            $sql = "INSERT INTO docs_alumno(Solicitus_resi, Carta_acep, Reporte_pre, Reporte_final, Cumpl_resi_doce, Eva_segui, Eva_repor, Car_termin_resi, Liberacion_repor, Id_alumno) 
                 VALUES(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->execute([$new_img_name1, $new_img_name2, $new_img_name3, $new_img_name4, $new_img_name5, $new_img_name6, $new_img_name7, $new_img_name8, $new_img_name9, $uname]);

            echo "HAS SUBIDO TUS ARCHIVOS CORRECTAMENTE";
        } else {

            echo "NO PUEDES SUBIR ARCHIVOS CON OTRAS EXTENSIONES";
        }
    } else {
        echo "ERROR DESCONOCIDO ";
    }
} else {
    echo "TE HA FALTADO UNO O VARIOS ARCHIVOS POR SUBIR";
}
