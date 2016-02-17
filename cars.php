<?php
include('template/header.php');
include('template/sidebar.php');

$parser = xml_parser_create();

xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 0);
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "URF-8");

function start_element ($parser, $name, $attrs) {
    if($name == "product") {
        echo "<div class=\"car-product\">";
    }
    if($name == "brand") {
        echo "<div class=\"right\"><div><b>Бренд:</b> ";
    }
    if($name == "model") {
        echo "<div><b>Модель:</b> ";
    }
    if($name == "year") {
        echo "<div><b> Год выпуска:</b> ";
    }
    if($name == "price") {
        echo "<div><b>Стоимость:</b> ";
    }
    if($name == "serial") {
        echo "<div><b>Серийный номер:</b> ";
    }
    if($name == "imgurl") {
        echo "<img class=\"car-img\" alt=\"Car\" src=\"";
    }
}

function end_element ($parser, $name) {
    if($name == "imgurl") {
        echo "\">";
    }
    else  if($name == "serial") {
        echo "</div></div>";
    }
    else {
        echo "</div>";
    }
}

function content_char ($parser, $char) {
    echo $char;
}

xml_set_element_handler($parser, "start_element", "end_element");
xml_set_character_data_handler($parser, "content_char");
$file=fopen("cars.xml","r");
?>
        <div class="main">
            <div class="info">
                <div class="block-header hooge-font">
                    <div>AUTOMOBILES</div>
                    <img src="<?=$url;?>img/block_arrow.png" alt="">
                </div>
                    <?php

                    while ($data=fread($file, 4096))
                    {
                        xml_parse($parser,$data) or die("ERROR: ".xml_error_string(xml_get_error_code($parser))." at line ".xml_get_current_line_number($parser)."\n");
                    }

                    ?>
                </div>
            </div>
        </div>
<?php

xml_parser_free($parser);

include('template/footer.php');
?>
