<?
    $section = $_POST['section'];
    $title = $_POST['title'];
    $blockquote = $_POST['blockquote'];
    $block1 = $_POST['block1'];
    $block2 = $_POST['block2'];
    
    if($_POST['section']){
        
        if($_POST['title']){
            $open = fopen("text_files/".$section."/title.txt","w+"); 
            $text = $_POST['title']; 
            fwrite($open, $text); 
            fclose($open);
        }
        if($_POST['blockquote']){
            $open = fopen("text_files/".$section."/blockquote.txt","w+"); 
            $text = $_POST['blockquote']; 
            fwrite($open, $text); 
            fclose($open);
        }
        if($_POST['block1']){
            $open = fopen("text_files/".$section."/block1.txt","w+"); 
            $text = $_POST['block1']; 
            fwrite($open, $text); 
            fclose($open);
        }
        if($_POST['block2']){
            $open = fopen("text_files/".$section."/block2.txt","w+"); 
            $text = $_POST['block2']; 
            fwrite($open, $text); 
            fclose($open);
        }
        echo 'Ændringerne er gemt';
    }else{
        echo 'Der er sket en fejl';
    }
    
    /*
    header(sprintf('Location: %s', 'http://localhost:8888/orgelbygger/'));
    printf('<a href="%s">Moved</a>.', 'http://localhost:8888/orgelbygger/');
    exit();*/
?>