<?php

    $dbLogin = "";
    $dbPassword = "";
    $dbName = "";
    $link = mysqli_connect("localhost", $dbLogin, $dbPassword, $dbName);
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script
  src="https://code.jquery.com/jquery-3.6.2.js"
  integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<title>Форма</title>
</head>
<body class="bg-white">
   
<div class="container">
    
    <form id="add-work" class="needs-validation" novalidate>
        
    <span class="badge text-bg-info">Даные о студенте</span>
    <div class="row g-3">
        
        <div class="col-md-3">
            <label for="l_name"><?php $field_name = "Фамилия"; echo $field_name;?></label>
                <input type="text" id="l_name" class="form-control" placeholder="<?=$field_name?>" name="l_name" required="required">
        </div>
        <div class="col-md-3">
             <label for="f_name"><?php $field_name = "Имя"; echo $field_name;?></label>
                <input type="text" id="f_name" class="form-control" placeholder="<?=$field_name?>" name="f_name" required="required">
        </div>
        <div class="col-md-3">
            <label for="m_name"><?php $field_name = "Отчество"; echo $field_name;?></label>
                <input type="text" id="m_name" class="form-control" placeholder="<?=$field_name?>" name="m_name" required="required">
        </div>
        <div class="col-md-3">
            <label for="student_email"><?php $field_name = "Email"; echo $field_name;?></label>
                <input type="email" id="student_email" class="form-control" placeholder="example@mail.ru" name="student_email" required="required">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="full_edu_name">Полное название учебного учреждения</label>
                        <input class="form-control" list="full_edu_name_list" id="full_edu_name" placeholder=" Введите для поиска..." autocomplete="off" name="full_edu_name" required="required">
                            <datalist id="full_edu_name_list">
                                <?php 
                                    $full_edu_string = "SELECT `id`,`name` FROM `full_edu`";
                                    $full_edu = mysqli_query($link, $full_edu_string);
                                    while ($row = mysqli_fetch_assoc($full_edu)) {
                                        echo ' <option value="'.$row['name'].'">';
                                    }
                                ?> 
                            </datalist>
            <input class="form-check-input" type="checkbox" value="" id="full_edu_isOther">
            <label class="form-check-label" for="full_edu_isOther">
                Моего учреждения нет в списке
            </label>
            
        </div>
       
        <div class="col-md-6">
            <label for="short_edu_name">Аббревиатура учебного учреждения</label>
                <input class="form-control" list="short_edu_name_list" id="short_edu_name" placeholder="Выберите полное название" autocomplete="off" name="short_edu_name" required="required" disabled="disabled">
        </div>
        <div class="col-md-6" id="full_edu_other" style="display: none;" >
            <input type="text" class="form-control" placeholder="Введите значение не из списка" id="full_edu_other" name="full_edu_other">
        </div>
        <div class="col-md-6" id="short_edu_other" style="display: none;">
            <input type="text" class="form-control" placeholder="Введите значение не из списка" id="short_edu_other" name="short_edu_other">
        </div>
    
        <div class="col-md-6">
            <label for="user_status">Статус участвующего</label>
                    <input class="form-control" list="user_status_list" id="user_status" placeholder=" Введите для поиска..." name="user_status" required="required">
                            <datalist id="user_status_list">
                                <option value="Студент(Бакалавриат)">
                                <option value="Студент(Магистратура)">
                                <option value="Преподаватель">
                                <option value="Ученик">
                            </datalist>
        </div>
        <div class="col-md-6">
            <label for="year">Курс/класс</label>
                        <input class="form-control" list="year_list" id="year" placeholder=" Введите для поиска..." name="year" required="required">
                            <datalist id="year_list">
                                <?php
                                    for ($i = 1; $i<12; $i++) {
                                        echo '<option value="'.$i.'">';
                                    }
                                ?>
                            </datalist>
        </div>
   
        <div class="col-md-6">
            <label for="section">Секция</label>
                <input class="form-control" list="section_list" id="section" placeholder=" Введите для поиска..." name="section" autocomplete="off" required="required">
                            <datalist id="section_list">
                                <?php 
                                    $section_string = "SELECT `id`, `name` FROM `section`";
                                    $sections = mysqli_query($link, $section_string);
                                    while ($row = mysqli_fetch_assoc($sections)) {
                                        echo ' <option value="'.$row['name'].'">';
                                    }
                                ?> 
                            </datalist>
        </div>
        <div class="col-md-6">
            <label for="subsection">Подсекция</label>
                <input class="form-control" list="subsection_list" id="subsection" placeholder=" Введите для поиска..." name="subsection" autocomplete="off" required="required" disabled="disabled">
                            <datalist id="subsection_list">
                                
                            </datalist>
        </div>
    </div>

    <br>
        <span class="badge text-bg-info">Данные о руководителе</span>
    <br>
    <div class="row g-3">
        <div class="col-md-12">
            <label for="work_name"><?php $field_name = "Название научной работы"; echo $field_name;?></label>
                <input type="text" class="form-control" id="work_name" placeholder="<?=$field_name?>" name="work_name" required="required">
        </div>
        
        <div class="col-md-4">
            <label for="head_l_name"><?php $field_name = "Фамилия руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="head_l_name" placeholder="<?=$field_name?>" name="head_l_name" required="required">
        </div>
        <div class="col-md-4">
            <label for="head_f_name"><?php $field_name = "Имя руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="head_f_name" placeholder="<?=$field_name?>" name="head_f_name" required="required">
        </div>
        <div class="col-md-4">
            <label for="head_m_name"><?php $field_name = "Отчество руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="head_m_name" placeholder="<?=$field_name?>" name="head_m_name" required="required">
        </div>
        <div class="col-md-6">
            <label for="head_phone"><?php $field_name = "Номер телефона руководителя"; echo $field_name;?></label>
                <input type="text" id="head_phone" class="mask-phone form-control" placeholder="+7 (999) 99 99 999" name="head_phone" required="required">
        </div>
        <div class="col-md-6">
            <label for="head_email"><?php $field_name = "Email руководителя"; echo $field_name;?></label>
                <input type="email" id="head_email" class="form-control" placeholder="<?=$field_name?>" name="head_email" required="required">
        </div>
        <div class="col-md-6">
            <label for="head_position"><?php $field_name = "Должность руководителя"; echo $field_name;?></label>
                <input type="text" id="head_position" class="form-control" placeholder="<?=$field_name?>" name="head_position" required="required">
        </div>
        <div class="col-md-6">
            <label for="head_degree"><?php $field_name = "Ученая степень руководителя"; echo $field_name;?></label>
                <input type="text" id="head_degree" class="form-control" placeholder="<?=$field_name?>" name="head_degree" required="required">
        </div>
    </div>
    <br>
        <span class="badge text-bg-info 2student_span" style="display:none;">Данные о 2 участнике</span>
    <br>
    <div class="row g-3 2student_div" style="display:none;">
        <div class="col-md-3">
            <label for="2student_l_name"><?php $field_name = "Фамилия"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2student_l_name" placeholder="<?=$field_name?>" name="2student_l_name">
        </div>
        <div class="col-md-3">
             <label for="2student_f_name"><?php $field_name = "Имя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2student_f_name" placeholder="<?=$field_name?>" name="2student_f_name">
        </div>
        <div class="col-md-3">
            <label for="2student_m_name"><?php $field_name = "Отчество"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2student_m_name" placeholder="<?=$field_name?>" name="2student_m_name">
        </div>
        <div class="col-md-3">
            <label for="2student_email"><?php $field_name = "Email"; echo $field_name;?></label>
                <input type="email" class="form-control" id="2student_email" placeholder="example@mail.ru" name="2student_email">
        </div>
    </div>
    <br>
        <span class="badge text-bg-info 3student_span" style="display:none;">Данные о 3 участнике</span>
    <br>
    <div class="row g-3 3student_div" style="display:none;">
        <div class="col-md-3">
            <label for="3student_l_name"><?php $field_name = "Фамилия"; echo $field_name;?></label>
                <input type="text" class="form-control" id="3student_l_name" placeholder="<?=$field_name?>" name="3student_l_name">
        </div>
        <div class="col-md-3">
             <label for="3student_f_name"><?php $field_name = "Имя"; echo $field_name;?></label>
                <input type="text" id="3student_f_name" class="form-control" placeholder="<?=$field_name?>" name="3student_f_name">
        </div>
        <div class="col-md-3">
            <label for="3student_m_name"><?php $field_name = "Отчество"; echo $field_name;?></label>
                <input type="text" id="3student_m_name" class="form-control" placeholder="<?=$field_name?>" name="3student_m_name">
        </div>
        <div class="col-md-3">
            <label for="3student_email"><?php $field_name = "Email"; echo $field_name;?></label>
                <input type="email" id="3student_email" class="form-control" placeholder="example@mail.ru" name="3student_email">
        </div>
    </div>
    <br>
        <span class="badge text-bg-info 2head_span" style="display:none;">Данные о 2 руководителе</span>
    <br>
    <div class="row g-3 2head_div" style="display:none;">
        <div class="col-md-4">
            <label for="2head_l_name"><?php $field_name = "Фамилия 2 руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2head_l_name" placeholder="<?=$field_name?>" name="2head_l_name">
        </div>
        <div class="col-md-4">
            <label for="2head_f_name"><?php $field_name = "Имя 2 руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2head_f_name" placeholder="<?=$field_name?>" name="2head_f_name">
        </div>
        <div class="col-md-4">
            <label for="2head_m_name"><?php $field_name = "Отчество 2 руководителя"; echo $field_name;?></label>
                <input type="text" class="form-control" id="2head_m_name" placeholder="<?=$field_name?>" name="2head_m_name">
        </div>
        <div class="col-md-6">
            <label for="2head_phone"><?php $field_name = "Номер телефона 2 руководителя"; echo $field_name;?></label>
                <input type="text" id="2head_phone" class="mask-phone form-control" placeholder="+7 (999) 99 99 999" name="2head_phone">
        </div>
        <div class="col-md-6">
            <label for="2head_email"><?php $field_name = "Email 2 руководителя"; echo $field_name;?></label>
                <input type="email" id="2head_email" class="form-control" placeholder="<?=$field_name?>" name="2head_email">
        </div>
        <div class="col-md-6">
            <label for="2head_position"><?php $field_name = "Должность 2 руководителя"; echo $field_name;?></label>
                <input type="text" id="2head_position" class="form-control" placeholder="<?=$field_name?>" name="2head_position">
        </div>
        <div class="col-md-6">
            <label for="2head_degree"><?php $field_name = "Ученая степень 2 руководителя"; echo $field_name;?></label>
                <input type="text" id="2head_degree" class="form-control" placeholder="<?=$field_name?>" name="2head_degree">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-12">
            <input class="form-check-input" type="checkbox" value="yes" name="isHave2student" id="isHave2student">
                <label class="form-check-label" for="isHave2student">
                    Есть соучастник
                </label>
        </div>
        <div class="col-md-12 isHave3student" style="display:none;">
            <input class="form-check-input" type="checkbox" value="yes" name="isHave3student" id="isHave3student">
                <label class="form-check-label" for="isHave3student">
                    Есть еще соучастник
                </label>
        </div>
        <div class="col-md-12">
            <input class="form-check-input" type="checkbox" value="yes" name="isHave2Head" id="isHave2Head">
                <label class="form-check-label" for="isHave2Head">
                    Есть второй руководитель
                </label>
        </div>
        <div class="col-md-12">
            <input class="form-check-input" type="checkbox" value="yes" id="personalAgree" name="personalAgree" required="required">
            <label class="form-check-label" for="personalAgree">
                Согласен на предоставление персональных данных и их дальнейшую обработку, согласно <a href="#">разделу о Персональных данных</a>
            </label>
        </div>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-success" type="submit" value="Создать форму">Go!</button>
    </div>
    </form>

    
</div>

<div aria-live="polite" aria-atomic="true" class="position-relative">
        <!-- - `.toast-container` для промежутка между тостами -->
        <!-- - `top-0` и `end-0` чтобы тосты располагались в правом верхнем углу -->
        <!-- - `.p-3` чтобы тосты не прилипали к краю контейнера  -->
        <div class="toast-container bottom-0 end-0 p-3">

            <!-- Затем положите тосты внутрь -->
            <div class="toast text-bg-success" id="SuccessToast" role="status" aria-live="polite" aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header">
                    <strong class="me-auto">Успешно</strong>
                    <small class="text-muted">
                        <script>
                            var date = new Date();
                            document.write(date.getHours() + ":" + date.getMinutes());
                        </script>
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
                </div>
                <div class="toast-body success-text">
                    Форма отправлена успешно
                </div>
            </div>

            <div class="toast text-bg-danger" id="FailureToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
                <div class="toast-header">
                    <strong class="me-auto">Ошибка</strong>
                    <small class="text-muted">
                        <script>
                            var date = new Date();
                            document.write(date.getHours() + ":" + date.getMinutes());
                        </script>
                    </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
                </div>
                    <div class="toast-body failure-text" >
                    </div>
            </div>
            </div>
    </div>
<script>
    $.mask.definitions['h'] = "[0|1|3|4|5|6|7|9]"
    $(".mask-phone").mask("+7 (h99) 999-99-99");
</script>

<script>
    //Ткнули галку о втором рукле
    $('input#isHave2Head').change(function () {
    if ($('input#isHave2Head').is(':checked')) {
        $(".2head_div").removeAttr("style");
        $(".2head_span").removeAttr("style");
        //required
        $("#2head_l_name").attr("required", '');
        $("#2head_f_name").attr("required", '');
        $("#2head_m_name").attr("required", '');
        $("#2head_phone").attr("required", '');
        $("#2head_email").attr("required", '');
        $("#2head_position").attr("required", '');
        $("#2head_degree").attr("required", '');

    }
    else {
        // Не ткнули галку о втором рукле
        $(".2head_div").removeAttr("style");
        $(".2head_span").removeAttr("style");
        $(".2head_div").attr("style", 'display:none;');
        $(".2head_span").attr("style", 'display:none;');
        //required
        $("#2head_l_name").removeAttr("required");
        $("#2head_f_name").removeAttr("required");
        $("#2head_m_name").removeAttr("required");
        $("#2head_phone").removeAttr("required");
        $("#2head_email").removeAttr("required");
        $("#2head_position").removeAttr("required");
        $("#2head_degree").removeAttr("required");
    }
});

</script>

<script>
    //Ткнули галку о 2 участнике
    $('input#isHave2student').change(function () {
    if ($('input#isHave2student').is(':checked')) {
        $(".2student_span").removeAttr("style");
        $(".2student_div").removeAttr("style");
        $(".isHave3student").removeAttr("style");
        //required
        $("#2student_l_name").attr("required", '');
        $("#2student_f_name").attr("required", '');
        $("#2student_m_name").attr("required", '');
        $("#2student_email").attr("required", '');

        
    }
    else {
        // Не ткнули галку о втором участнике
        $(".2student_span").removeAttr("style");
        $(".2student_div").removeAttr("style");
        $(".2student_span").attr("style", 'display:none;');
        $(".2student_div").attr("style", 'display:none;');
        $(".isHave3student").attr("style", 'display:none;');
        //required
        $("#2student_l_name").removeAttr("required");
        $("#2student_f_name").removeAttr("required");
        $("#2student_m_name").removeAttr("required");
        $("#2student_email").removeAttr("required");
        // Не ткнули галку о 3 участнике
        $(".3student_span").removeAttr("style");
        $(".3student_div").removeAttr("style");
        $(".3student_span").attr("style", 'display:none;');
        $(".3student_div").attr("style", 'display:none;');
        //required
        $("#3student_l_name").removeAttr("required");
        $("#3student_f_name").removeAttr("required");
        $("#3student_m_name").removeAttr("required");
        $("#2student_email").removeAttr("required");
    }
});

</script>
<script>
    //Ткнули галку о 3 участнике
    $('input#isHave3student').change(function () {
    if ($('input#isHave3student').is(':checked')) {
        $(".3student_span").removeAttr("style");
        $(".3student_div").removeAttr("style");
        //required
        $("#3student_l_name").attr("required", '');
        $("#3student_f_name").attr("required", '');
        $("#3student_m_name").attr("required", '');
        $("#3student_email").attr("required", '');

        
    }
    else {
        // Не ткнули галку о 3 участнике
        $(".3student_span").removeAttr("style");
        $(".3student_div").removeAttr("style");
        $(".3student_span").attr("style", 'display:none;');
        $(".3student_div").attr("style", 'display:none;');
        //required
        $("#3student_l_name").removeAttr("required");
        $("#3student_f_name").removeAttr("required");
        $("#3student_m_name").removeAttr("required");
        $("#3student_email").removeAttr("required");
    }
});

</script>
<script>
    //Ткнули галку о недостающем названии Учебного заведения
    $('input#full_edu_isOther').change(function () {
    if ($('input#full_edu_isOther').is(':checked')) {
        $("#full_edu_other").removeAttr("style");
        $("#short_edu_other").removeAttr("style");
        $("#full_edu_name").attr("disabled","");
        $("#short_edu_name").attr("disabled","");
        $('#full_edu_name').val('');
        $('#short_edu_name').val('');
        //required
        $("#full_edu_name").removeAttr("required");
        $("#short_edu_name").removeAttr("required");
        $("input#full_edu_other").attr("required", '');
        $("input#short_edu_other").attr("required", '');

    }
    else {
        //Не ткнули галку о недостающем названии Учебного заведения
        $("#full_edu_other").removeAttr("style");
        $("#short_edu_other").removeAttr("style");
        $("#full_edu_other").attr("style", 'display:none;');
        $("#short_edu_other").attr("style", 'display:none;');
        $("#full_edu_name").removeAttr("disabled");
        //required
        $("#full_edu_name").attr("required", '');
        $("#short_edu_name").attr("required", '');
        $("input#full_edu_other").removeAttr("required");
        $("input#short_edu_other").removeAttr("required");
        
    }
});

</script>

<script>
    //Отслеживаем ввод секции, чтобы показать subsections
    $('#section').on('input', function() {
        var curr_section = $(this).val(); // get the current value of the input field.
        var data = { 'section': curr_section };
        var request = $.ajax({
                    url: "/form/get_subsections.php",
                    type: "get",
                    data: data
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    //console.log(response);
                    const obj = JSON.parse(response);
                    if (obj.success == false) {
                        var textMessage = "Произошла ошибка при получении подсекций";
                        $(".failure-text").text(textMessage);
                        toast_failure.show();
                    } else {
                        //console.log(obj.success);
                        var subsections = obj.subsections;
                        var optionString = "";
                        for (var i = 0; i < subsections.length; i++) {
                            if (subsections[i] != "") {
                                optionString += "<option value='" + subsections[i] + "'>";
                            }
                        }
                        if (optionString != "") {
                            //console.log(optionString);
                            $("#subsection").prop("disabled", false);
                            $('#subsection_list').empty()
                            $('#subsection_list').append(optionString);
                            
                        } else {
                            $("#subsection").prop("disabled", true);
                            $('#subsection').val('');
                        }
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    // console.error(
                    //     "Errors: "+
                    //     textStatus, errorThrown
                    // );
                    var textMessage = "Произошла внутренняя ошибка";
                    $(".failure-text").text(textMessage);
                    toast_failure.show();
                });
    });
</script>
<script>
    //Отслеживаем ввод полного названия учреждения, чтобы показать аббревиатуру
    $('#full_edu_name').on('input', function() {
        var full_edu = $(this).val(); // get the current value of the input field.
        var data = { 'full_edu': full_edu };
        var request = $.ajax({
                    url: "/form/get_short_edu.php",
                    type: "get",
                    data: data
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    //console.log(response);
                    const obj = JSON.parse(response);
                    if (obj.success == false) {
                        var textMessage = "Произошла ошибка при получении аббревиатур";
                        $(".failure-text").text(textMessage);
                        toast_failure.show();
                    } else {
                        //console.log(obj.success);
                        var short_edu = obj.short_edu;
                        var optionString = "";
                        for (var i = 0; i < short_edu.length; i++) {
                            if (short_edu[i] != "") {
                                optionString += short_edu[i];
                            }
                        }
                        if (optionString != "") {
                            //console.log(optionString);
                            $("#short_edu_name").prop("disabled", true);
                            $('#short_edu_name').val('');
                            $('#short_edu_name').val(optionString);
                        } else {
                            $("#short_edu_name").prop("disabled", true);
                            $('#short_edu_name').val('');
                        }
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    // console.error(
                    //     "Errors: "+
                    //     textStatus, errorThrown
                    // );
                    var textMessage = "Произошла внутренняя ошибка";
                    $(".failure-text").text(textMessage);
                    toast_failure.show();
                });
    });
</script>
<script>
    //form submit
    //Консты тостов
    const toast_failure = new bootstrap.Toast(document.getElementById('FailureToast'));
    const toast_success = new bootstrap.Toast(document.getElementById('SuccessToast'));
    (function () {
    'use strict'

    
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()

                
                var textMessage = "Заполните все красные поля формы";
                $(".failure-text").text(textMessage);
                toast_failure.show();
            }
            else {
                event.preventDefault()


                if (request) {
                    request.abort();
                }

                var $form = $(this);
                var $inputs = $form.find("input, select, button, textarea");
                // DO NOT REMOVE. Если не включить поле - значение не будет передано (Поле по дефолту всегда выключено. Значение мы туда записываем скриптом)
                $("#short_edu_name").prop("disabled", false);
                var serializedData = $form.serialize();


                $inputs.prop("disabled", true);

            
                var request = $.ajax({
                    url: "/form/main_handler.php",
                    type: "post",
                    data: serializedData
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    //console.log(response);
                    const obj = JSON.parse(response);
                    if (obj.success == false) {
                        var textMessage = obj.errors;
                        $(".failure-text").text(textMessage);
                        toast_failure.show();
                    } else {
                        toast_success.show();
                        //console.log(obj.success);
                        //console.log(response);
                    }
                    
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown){
                    // Log the error to the console
                    // console.error(
                    //     "Errors: "+
                    //     textStatus, errorThrown
                    // );
                    var textMessage = "Произошла внутренняя ошибка";
                    $(".failure-text").text(textMessage);
                    toast_failure.show();
                });

                // Callback handler that will be called regardless
                // if the request failed or succeeded
                request.always(function () {
                    // Reenable the inputs
                    $inputs.prop("disabled", false);
                    $("#short_edu_name").prop("disabled", true);
                });

                /////
                
            }

            form.classList.add('was-validated');
                
        }, false)
        })
    })()
</script>
<style>
        input[required]{
        background-image: radial-gradient(#F00 15%, transparent 16%), radial-gradient(#F00 15%, transparent 16%);
        background-size: 1em 1em;
        background-position: right top;
        background-repeat: no-repeat;
    }
    br ~ br {
    display: none;
    }
    
</style>

</body>
</html>
