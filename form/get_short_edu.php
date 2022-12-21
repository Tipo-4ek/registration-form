<?php

    $link = mysqli_connect("localhost", "tipo4ek_snkform", "QazQaz123", "tipo4ek_snkform");
    $full_edu = isset($_GET['full_edu']) ? $_GET['full_edu'] : null;

    $short_edu_string = "SELECT `short_edu`.`name` as short_name FROM `short_edu` JOIN `full_edu` ON `short_edu`.`full_edu_id` = `full_edu`.`id` WHERE `full_edu`.`name` = '".mysqli_real_escape_string($link, $full_edu)."' LIMIT 1";
    
                $short_edu_result = mysqli_query($link, $short_edu_string);
                if (mysqli_num_rows($short_edu_result) == 0) {
                    $short_edu[] = "";
                } else {
                    while ($row = mysqli_fetch_assoc($short_edu_result)) {
                        $short_edu[] = $row['short_name'];
                    }
                }

    $form_data = array();
    if ($full_edu === null)  {
        $form_data['success'] = false;
        //echo 'errors found';
    } else {
        $form_data['success'] = true;
        $form_data['short_edu'] = $short_edu;
        //echo 'errors not found';
    }
    echo json_encode($form_data);    
?>