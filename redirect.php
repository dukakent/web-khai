<?php
include('misc/common.php');
include('template/header.php');
include('template/sidebar.php');
?>
        <div class="main">
            <div class="info">
                <div class="block-header hooge-font">
                    <div>redirection</div>
                    <img src="<?=$url;?>img/block_arrow.png" alt="">
                </div>
                <div class="redirect">You will be redirected just in 3 seconds ...</div>
            </div>
        </div>
        <script>
            //window.onload = function() {
                
                setTimeout(function(){
                    window.location = 'index.php';
                }, 3000);
                
            //}
        </script>
<?php
include('template/footer.php');
?>
