<?php
    //Розмір шрифта
    $fontSize = $_POST['fontsize'];
    //Колір шрифта з очисткою пробілів, конвертацією в рядок тегів та переведенням у нижній регістр
    $fontColor = strtolower(trim(htmlentities($_POST['fontcolor'])));
    //Стилі тексту
    $fontStyle = $_POST['fontstyle'] ?? [];
    //Саме шрифт який буде застосовано
    $fontFamily = $_POST['fontpicker'];
    //Текст від користувача, додатково використав функцію "nl2br()" для збереження переносу на новий рядок
    $receivedText = nl2br(trim(htmlentities($_POST['textfield'])));
    //Маисв кольорів для перевірки правильності вводу кольору від користувача
    $colors = ['red','blue','green','black','white','yellow','orange','pink','gray','purple',
                'brown','lightblue','beige','lime','olive','maroon','lavender','pomegranate','lightpink','slategray'];
                
    if(!empty($receivedText)):
        //Змінна $formatedText дозволить додати стилі до тексту за допомогою конкатенації рядків нижче
        $formatedText = "<p style='font-family: {$fontFamily}; font-size: {$fontSize}px; color: ".(in_array($fontColor, $colors) ? $fontColor : 'black')."; ";
        
        if(!empty($fontStyle)):
            foreach($fontStyle as $style):
                if($style === 'bold') $formatedText .= "font-weight: bold; ";
                elseif($style === 'italic') $formatedText .= "font-style: italic; ";
                elseif($style === 'underline') $formatedText .= "text-decoration: underline; ";
            endforeach;
        endif;
        
        $formatedText .= "'>{$receivedText}</p>";
        echo $formatedText;
    endif;