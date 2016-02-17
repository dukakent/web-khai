<?php

    include('template/header.php');
    include('template/sidebar.php');

    $error = '';
    $reldir = urldecode($_GET['dir']);
    $reldir = str_replace('../', '', $reldir);
    $get_url = ($reldir == '') ? 'fm.php' : 'fm.php?dir='.urlencode($reldir);
    $curdir = __DIR__.$reldir;
    $root = opendir($curdir);

    function human_filesize($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

function my_sort(&$array, $key) {

    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }

    $array = $ret;
}

    if(post('act') == 'upload') {

        if(isset($_FILES['uploaded_file'])){
            move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $curdir.'/'.$_FILES['uploaded_file'][name]);
        }
    }


    if($root){
        for($i = 0; ($file = readdir($root)) !== false; $i++) {
            if(($file !== '.') && ($file !== '..')) {
                $filelist[$i]['type'] = (filetype($curdir . '/' . $file) == "dir") ? "dir" : "file";
                if ($filelist[$i]['type'] == 'dir') {
                    $name = '<a href="fm.php?dir=' . urlencode($reldir . '/' . $file) . '">' . $file . '</a>';
                } else {
                    $name = $file;
                }
                $filelist[$i]['name'] = $name;
                $filelist[$i]['size'] = human_filesize(filesize($curdir . '/' . $file), 0);
                $filelist[$i]['date'] = date("H:i:s d.m.Y", filemtime($curdir . '/' . $file));
            }
        }
    }
    else {
        $error = 'Папка не найдена';
    }
    
    //sort($filelist);
    my_sort($filelist, "name");
    closedir($root);



?>

<div class="main">
    <div class="info">
        <div class="block-header hooge-font">
            <div>file manager</div>
            <img src="<?=$url;?>img/block_arrow.png" alt="">
        </div>
        <div class="database">
            <?php
            if(($reldir !== '') && ($reldir !== '/')){
                        echo '<div class="var">'.$reldir.'</div>';
                        $dir = (dirname($reldir) == '/') ? '' : '?dir='.urlencode(dirname($reldir));
                        echo '<div class="fm-back">
                            <a href="fm.php'.$dir.'"><- Назад</a>
                        </div><br>';
                    }
                if($error == ''){

            ?>
            <div class="fm-row">
                <div class="fm-item"><b>Название</b></div>
                <div class="fm-item"><b>Тип</b></div>
                <div class="fm-item"><b>Размер</b></div>
                <div class="fm-item"><b>Изменен</b></div>
            </div>
            <?php
                    foreach($filelist as $file) {
                        ?>
                        <div class="fm-row">
                            <div class="fm-item"><?php echo $file['name'] ?></div>
                            <div class="fm-item"><?php echo $file['type'] ?></div>
                            <div class="fm-item"><?php echo $file['size'] ?></div>
                            <div class="fm-item"><?php echo $file['date'] ?></div>
                        </div>
                        <?php
                    }

                    ?>

                    <form class="fm-upload" action="<?=$get_url;?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="act" value="upload">
                        <input type="file" name="uploaded_file">
                        <input name="submit" type="submit" value="Отправить">
                    </form>

                    <?php
                }
                else {
                    echo '<h3></h3>';
                }
            ?>

        </div>
    </div>
</div>





<?php
    include('template/footer.php');
?>
