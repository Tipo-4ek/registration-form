<?php
    $link = mysqli_connect("localhost", "tipo4ek_snkform", "QazQaz123", "tipo4ek_snkform");

    $l_name = isset($_POST['l_name']) && $_POST['l_name'] != "" ? $_POST['l_name'] : null;
    $f_name = isset($_POST['f_name']) && $_POST['f_name'] != "" ? $_POST['f_name'] : null;
    $m_name = isset($_POST['m_name']) && $_POST['m_name'] != "" ? $_POST['m_name'] : null;
    $student_email = isset($_POST['student_email']) && $_POST['student_email'] != "" ? $_POST['student_email'] : null;
    $full_edu_name = isset($_POST['full_edu_name']) && $_POST['full_edu_name'] != "" ? $_POST['full_edu_name'] : null;
    $short_edu_name = isset($_POST['short_edu_name']) && $_POST['short_edu_name'] != "" ? $_POST['short_edu_name'] : null;
    $full_edu_other = isset($_POST['full_edu_other']) && $_POST['full_edu_other'] != "" ? $_POST['full_edu_other'] : null;
    $short_edu_other = isset($_POST['short_edu_other']) && $_POST['short_edu_other'] != "" ? $_POST['short_edu_other'] : null;
    $user_status = isset($_POST['user_status']) && $_POST['user_status'] != "" ? $_POST['user_status'] : null;
    $year = isset($_POST['year']) && $_POST['year'] != "" ? $_POST['year'] : null;
    $section = isset($_POST['section']) && $_POST['section'] != "" ? $_POST['section'] : null;
    $subsection = isset($_POST['subsection']) && $_POST['subsection'] != "" ? $_POST['subsection'] : null;
    $work_name = isset($_POST['work_name']) && $_POST['work_name'] != "" ? $_POST['work_name'] : null;
    $head_l_name = isset($_POST['head_l_name']) && $_POST['head_l_name'] != "" ? $_POST['head_l_name'] : null;
    $head_f_name = isset($_POST['head_f_name']) && $_POST['head_f_name'] != "" ? $_POST['head_f_name'] : null;
    $head_m_name = isset($_POST['head_m_name']) && $_POST['head_m_name'] != "" ? $_POST['head_m_name'] : null;
    $head_phone = isset($_POST['head_phone']) && $_POST['head_phone'] != "" ? $_POST['head_phone'] : null;
    $head_email = isset($_POST['head_email']) && $_POST['head_email'] != "" ? $_POST['head_email'] : null;
    $head_position = isset($_POST['head_position']) && $_POST['head_position'] != "" ? $_POST['head_position'] : null;
    $head_degree = isset($_POST['head_degree']) && $_POST['head_degree'] != "" ? $_POST['head_degree'] : null;
    $_2head_l_name = (isset($_POST['2head_l_name']) && $_POST['2head_l_name'] != "") ? $_POST['2head_l_name'] : null;
    $_2head_f_name = isset($_POST['2head_f_name']) && $_POST['2head_f_name'] != "" ? $_POST['2head_f_name'] : null;
    $_2head_m_name = isset($_POST['2head_m_name']) && $_POST['2head_m_name'] != "" ? $_POST['2head_m_name'] : null;
    $_2head_phone = isset($_POST['2head_phone']) && $_POST['2head_phone'] != "" ? $_POST['2head_phone'] : null;
    $_2head_email = isset($_POST['2head_email']) && $_POST['2head_email'] != "" ? $_POST['2head_email'] : null;
    $_2head_position = isset($_POST['2head_position']) && $_POST['2head_position'] != "" ? $_POST['2head_position'] : null;
    $_2head_degree = isset($_POST['2head_degree']) && $_POST['2head_degree'] != "" ? $_POST['2head_degree'] : null;
    $_personalAgree = isset($_POST['personalAgree']) && $_POST['personalAgree'] != "" ? $_POST['personalAgree'] : null;
    $_2student_l_name = isset($_POST['2student_l_name']) && $_POST['2student_l_name'] != "" ? $_POST['2student_l_name'] : null;
    $_2student_f_name = isset($_POST['2student_f_name']) && $_POST['2student_f_name'] != "" ? $_POST['2student_f_name'] : null;
    $_2student_m_name = isset($_POST['2student_m_name']) && $_POST['2student_m_name'] != "" ? $_POST['2student_m_name'] : null;
    $_2student_email = isset($_POST['2student_email']) && $_POST['2student_email'] != "" ? $_POST['2student_email'] : null;
    $_3student_l_name = isset($_POST['3student_l_name']) && $_POST['3student_l_name'] != "" ? $_POST['3student_l_name'] : null;
    $_3student_f_name = isset($_POST['3student_f_name']) && $_POST['3student_f_name'] != "" ? $_POST['3student_f_name'] : null;
    $_3student_m_name = isset($_POST['3student_m_name']) && $_POST['3student_m_name'] != "" ? $_POST['3student_m_name'] : null;
    $_3student_email = isset($_POST['3student_email']) && $_POST['3student_email'] != "" ? $_POST['3student_email'] : null;

    //checkboxes
    $isHave2Head = isset($_POST['isHave2Head']) ? $_POST['isHave2Head'] : null;
    $isHave2student = isset($_POST['isHave2student']) ? $_POST['isHave2student'] : null;
    $isHave3student = isset($_POST['isHave3student']) ? $_POST['isHave3student'] : null;
    // #define params
    $errors = [];
    $form_data = array();
    // ----
function mb_strtoupper_first($str, $encoding = 'UTF8') {
    return mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) . mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
}

if ($l_name === null) {
    $errors[] = "Фамилия участника не может быть пустой(-ым)";
} else { $l_name = mb_strtoupper_first($l_name);}

if ($f_name === null) {
    $errors[] = "Имя участника не может быть пустой(-ым)";
} else { $f_name = mb_strtoupper_first($f_name);}

if ($m_name === null) {
    $errors[] = "Отчество участника не может быть пустой(-ым)";
} else { $m_name = mb_strtoupper_first($m_name);}

if ($student_email === null) {
    $errors[] = "Почтовый адрес участника не может быть пустой(-ым)";
} else { $student_email = mb_strtoupper_first($student_email);}

if ($full_edu_name === null) {
    // have full_edu_other && short_edu_other
    if ($full_edu_other === null) {
        $errors[] = "Полное название учебного учреждения не может быть пустой(-ым)";
    } else {
        //add new edu name to db
        $full_edu_name = mb_strtoupper_first($full_edu_other);
        $full_edu_other = "УШЛО в full_edu_name";
    }
    if ($short_edu_other === null) {
        $errors[] = "Аббревиатура учебного учреждения не может быть пустой(-ым)";
    } else {
        //add new edu name to db
        $short_edu_name = mb_strtoupper_first($full_edu_other);
        $short_edu_other = "УШЛО В short_edu_name";
    }
} else {
    //// have full_edu_name && short_edu_name
    //Выбрали название универа из списка. Проверяем на валидность (существует ли такое?)
    //--full
    $full_edu_arr = [];
    $full_edu = "SELECT `id`, `name` FROM `full_edu`";
                                    $full_edu_query = mysqli_query($link, $full_edu);
                                    while ($row = mysqli_fetch_assoc($full_edu_query)) {
                                        $full_edu_arr[] = $row['name'];
                                    }
    if (in_array($full_edu_name, $full_edu_arr)) {
        $full_edu_name = mb_strtoupper_first($full_edu_name);
    } else {
        $errors[] = "Полное название учебного учреждения нужно выбрать из списка";
    }
    //full--
    //--short
    $short_edu_arr = [];
    $short_edu = "SELECT `id`, `name` FROM `short_edu`";
                                    $short_edu_query = mysqli_query($link, $short_edu);
                                    while ($row = mysqli_fetch_assoc($short_edu_query)) {
                                        $short_edu_arr[] = $row['name'];
                                    }
    if (in_array($short_edu_name, $short_edu_arr)) {
        $short_edu_name = mb_strtoupper_first($short_edu_name);
    } else {
        
        $errors[] = "Аббревиатуру учебного учреждения нужно выбрать из списка";
    }
    //short--
}

if ($user_status === null) {
    $errors[] = "Статус учащегося не может быть пустой(-ым)";
} else { $user_status = mb_strtoupper_first($user_status);}

if ($year === null) {
    $errors[] = "Курс/класс не может быть пустой(-ым)";
} else { $year = mb_strtoupper_first($year);}

if ($section === null) {
    $errors[] = "Секция не может быть пустой(-ым)";
} else {
    $sections_arr = [];
    $sections_string = "SELECT `id`, `name` FROM `section`";
                                    $sections_query = mysqli_query($link, $sections_string);
                                    while ($row = mysqli_fetch_assoc($sections_query)) {
                                        $sections_arr[] = $row['name'];
                                    }
    if (in_array($section, $sections_arr)) {
        $section = mb_strtoupper_first($section);
    } else {
        $errors[] = "Секцию нужно выбрать из списка";
    }
}

if ($subsection === null) {
    $errors[] = "Подсекция не может быть пустой(-ым)";
} else {
    $subsections_arr = [];
    $subsections_string = "SELECT `id`, `name` FROM `subsection`";
                                    $subsections_query = mysqli_query($link, $subsections_string);
                                    while ($row = mysqli_fetch_assoc($subsections_query)) {
                                        $subsections_arr[] = $row['name'];
                                    }
    if (in_array($subsection, $subsections_arr)) {
        $subsection = mb_strtoupper_first($subsection);
    } else {
        $errors[] = "Подсекцию нужно выбрать из списка";
    }
}

if ($work_name === null) {
    $errors[] = "Название научной работы не может быть пустой(-ым)";
} else { $work_name = mb_strtoupper_first($work_name);}

if ($head_l_name === null) {
    $errors[] = "Фамилия руководителя не может быть пустой(-ым)";
} else { $head_l_name = mb_strtoupper_first($head_l_name);}

if ($head_f_name === null) {
    $errors[] = "Имя руководителя не может быть пустой(-ым)";
} else { $head_f_name = mb_strtoupper_first($head_f_name);}

if ($head_m_name === null) {
    $errors[] = "Отчество руководителя не может быть пустой(-ым)";
} else { $head_m_name = mb_strtoupper_first($head_m_name);}

if ($head_phone === null) {
    $errors[] = "Телефон руководителя не может быть пустой(-ым)";
} else { $head_phone = mb_strtoupper_first($head_phone);}

if ($head_email === null) {
    $errors[] = "Почтовый адрес руководителя не может быть пустой(-ым)";
} else { $head_email = mb_strtoupper_first($head_email);}

if ($head_position === null) {
    $errors[] = "Должность руководителя не может быть пустой(-ым)";
} else { $head_position = mb_strtoupper_first($head_position);}

if ($head_degree === null) {
    $errors[] = "Ученая степень руководителя не может быть пустой(-ым)";
} else { $head_degree = mb_strtoupper_first($head_degree);}

if ($isHave2Head != null) {
    if ($_2head_l_name === null) {
        $errors[] = "Фамилия второго руководителя не может быть пустой(-ым)";
    } else { $_2head_l_name = mb_strtoupper_first($_2head_l_name);}
    if ($_2head_f_name === null) {
        $errors[] = "Имя второго руководителя не может быть пустой(-ым)";
    } else { $_2head_f_name = mb_strtoupper_first($_2head_f_name);}
    if ($_2head_m_name === null) {
        $errors[] = "Отчество второго руководителя не может быть пустой(-ым)";
    } else { $_2head_m_name = mb_strtoupper_first($_2head_m_name);}
    if ($_2head_phone === null) {
        $errors[] = "Телефон второго руководителя не может быть пустой(-ым)";
    } else { $_2head_phone = mb_strtoupper_first($_2head_phone);}
    if ($_2head_email === null) {
        $errors[] = "Почтовый адрес второго руководителя не может быть пустой(-ым)";
    } else { $_2head_email = mb_strtoupper_first($_2head_email);}
    if ($_2head_position === null) {
        $errors[] = "Должность второго руководителя не может быть пустой(-ым)";
    } else { $_2head_position = mb_strtoupper_first($_2head_position);}
    if ($_2head_degree === null) {
        $errors[] = "Ученая степень второго руководителя не может быть пустой(-ым)";
    } else { $_2head_degree = mb_strtoupper_first($_2head_degree);}
}

if ($isHave2student != null) {
    if ($_2student_l_name === null) {
        $errors[] = "Фамилия второго студента не может быть пустой(-ым)";
    } else { $_2student_l_name = mb_strtoupper_first($_2student_l_name);}
    if ($_2student_f_name === null) {
        $errors[] = "Имя второго студента не может быть пустой(-ым)";
    } else { $_2student_f_name = mb_strtoupper_first($_2student_f_name);}
    if ($_2student_l_name === null) {
        $errors[] = "Отчество второго студента не может быть пустой(-ым)";
    } else { $_2student_m_name = mb_strtoupper_first($_2student_m_name);}
    if ($_2student_email === null) {
        $errors[] = "Почтовый адрес второго студента не может быть пустой(-ым)";
    } else { $_2student_email = mb_strtoupper_first($_2student_email);}
}
if ($isHave3student != null) {
    if ($_3student_l_name === null) {
        $errors[] = "Фамилия третьего студента не может быть пустой(-ым)";
    } else { $_3student_l_name = mb_strtoupper_first($_3student_l_name);}
    if ($_3student_f_name === null) {
        $errors[] = "Имя второго третьего не может быть пустой(-ым)";
    } else { $_3student_f_name = mb_strtoupper_first($_3student_f_name);}
    if ($_3student_l_name === null) {
        $errors[] = "Отчество третьего студента не может быть пустой(-ым)";
    } else { $_3student_m_name = mb_strtoupper_first($_3student_m_name);}
    if ($_3student_email === null) {
        $errors[] = "Почтовый адрес третьего студента не может быть пустой(-ым)";
    } else { $_3student_email = mb_strtoupper_first($_3student_email);}
}



// ------

if (!empty($errors)) {
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
} else {
    $form_data['success'] = true;
    //to find all ids
    // $("#add-work").each(function(){
    //     $(this).find(':input') //<-- Should return all input elements in that specific form.
    // });


    //export to csv file
    $fp = fopen('/form/out.csv', 'a');
    //fix excel utf-8
    fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
    $list = array (
        array('l_name','f_name','m_name','student_email','full_edu_name','full_edu_isOther','short_edu_name','full_edu_other','short_edu_other','user_status','year','section','subsection','work_name','head_l_name','head_f_name','head_m_name','head_phone','head_email','head_position','head_degree','2student_l_name','2student_f_name','2student_m_name','2student_email','3student_l_name','3student_f_name','3student_m_name','3student_email','2head_l_name','2head_f_name','2head_m_name','2head_phone','2head_email','2head_position','2head_degree','isHave2student','isHave3student','isHave2Head'),
        array($l_name,$f_name,$m_name,$student_email,$full_edu_name,$full_edu_isOther,$short_edu_name,$full_edu_other,$short_edu_other,$user_status,$year,$section,$subsection,$work_name,$head_l_name,$head_f_name,$head_m_name,$head_phone,$head_email,$head_position,$head_degree,$_2student_l_name,$_2student_f_name,$_2student_m_name,$_2student_email,$_3student_l_name,$_3student_f_name,$_3student_m_name,$_3student_email,$_2head_l_name,$_2head_f_name,$_2head_m_name,$_2head_phone,$_2head_email,$_2head_position,$_2head_degree,$isHave2student,$isHave3student,$isHave2Head)
    );
    foreach ($list as $fields) {
        fputcsv($fp, $fields, ";");
    }

    
    fclose($fp);
}

echo json_encode($form_data);
