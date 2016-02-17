<?php
include('template/header.php');
include('template/sidebar.php');
?>
        <div class="main">
            <div class="info">
                <div class="block-header hooge-font">
                    <div>redirection</div>
                    <img src="<?=$url;?>img/block_arrow.png" alt="">
                </div>
                    <div class="var">
                        <div><b>$_SERVER:</b></div>
                    <?php
                    foreach($_SERVER as $key => $val){
                        echo '<div class="var-row"><div>'.$key.': </div><div>'.$val.'</div></div>';
                    }
                    if(count($_POST) > 0) {
                        echo '<div><b>$_POST:</b></div>';
                    }
                    foreach($_POST as $key => $val){
                        echo '<div class="var-row"><div>'.$key.': </div><div>'.$val.'</div></div>';
                    }
                    if(count($_GET) > 0) {
                        echo '<div><b>$_GET:</b></div>';
                    }
                    foreach($_GET as $key => $val){
                        echo '<div class="var-row"><div>'.$key.': </div><div>'.$val.'</div></div>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
<?php
include('template/footer.php');
?>
