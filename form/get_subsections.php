<?php

    $link = mysqli_connect("localhost", "tipo4ek_snkform", "QazQaz123", "tipo4ek_snkform");
    $section = isset($_GET['section']) ? $_GET['section'] : null;

    $subsection_string = "SELECT `subsection`.`name` as subsec_name FROM `subsection` JOIN `section` ON `subsection`.`section_id` = `section`.`id` WHERE `section`.`name` = '".mysqli_real_escape_string($link, $section)."'";
                $subsections_result = mysqli_query($link, $subsection_string);
                if (mysqli_num_rows($subsections_result) == 0) {
                    $subsections[] = "";
                } else {
                    while ($row = mysqli_fetch_assoc($subsections_result)) {
                        $subsections[] = $row['subsec_name'];
                    }
                }

    $form_data = array();
    if ($section === null)  {
        $form_data['success'] = false;
        //echo 'errors found';
    } else {
        $form_data['success'] = true;
        $form_data['subsections'] = $subsections;
        //echo 'errors not found';
    }
    echo json_encode($form_data);    
?>