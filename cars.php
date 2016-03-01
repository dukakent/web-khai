<?php

include('template/header.php');
include('template/sidebar.php');



function print_main_content() {
    $xml = simplexml_load_file('cars.xml');
    $res = "";

    //echo "<pre>";
    //print_r($xml);
    //echo "</pre>";
    foreach ($xml->product as $prod) {
        if ($prod["available"] == "true") {
            $res .= "<div class=\"car-product\">";
            $res .= "<img class=\"car-img left\" alt=\"Car\" src=\"".$prod->imgurl."\">";
            $res .= "<div class=\"right\">";
            $res .= "<div><b>ID: </b>".$prod["id"]."</div>";
            $res .= "<div><b>Brand: </b>".$prod->brand."</div>";
            $res .= "<div><b>Model: </b>".$prod->model."</div>";
            $res .= "<div><b>Year: </b>".$prod->year."</div>";
            if ($prod->price["cur"] == "dollar") {
                $cur = "&dollar;";
            }
            else if ($prod->price["cur"] == "euro") {
                $cur = "&euro;";
            }
            else if ($prod->price["cur"] == "uah") {
                $cur = "UAH";
            }
            $res .= "<div><b>Price: </b>".$cur.$prod->price."</div>";
            $res .= "<div><b>Serial: </b>".$prod->serial."</div>";
            $res .= "</div><div class=\"clear\"></div></div>";
        }
    }
    return $res;           
}

if (get("act") != "addinfo") {
    ?>
    <div class="main">
        <div class="info">
            <div class="block-header hooge-font">
                <div>AUTOMOBILES</div>
                <img src="<?=$url;?>img/block_arrow.png" alt="">
            </div>
                <?php
                    echo print_main_content();
                ?>
            </div>
        </div>
    </div>
    <?php
}

else {

}














/*
function start_element ($parser, $name, $attrs) {
    if($name == "product") {
        echo "<div class=\"car-product\">
            <div class=\"right\"><b>ID: </b>".$attrs["id"];
    }
    if($name == "brand") {
        echo "<div><b>Бренд:</b> ";
    }
    if($name == "model") {
        echo "</div><div><b>Модель:</b> ";
    }
    if($name == "year") {
        echo "</div><div><b> Год выпуска:</b> ";
    }
    if($name == "price") {
        echo "</div><div><b>Стоимость:</b> ";
        if ($attrs["cur"] == "dollar") {
            echo "&dollar; ";
        }
        if ($attrs["cur"] == "euro") {
            echo "&euro; ";
        }
        if ($attrs["cur"] == "uah") {
            echo "UAH ";
        }
    }
    if($name == "serial") {
        echo "</div><div><b>Серийный номер:</b> ";
    }
    if($name == "imgurl") {
        echo "</div></div><img class=\"car-img\" alt=\"Car\" src=\"";
    }
}

function end_element ($parser, $name) {
    if($name == "imgurl") {
        echo "\"></div>";
    }
}

function content_char ($parser, $char) {
    echo $char;
}

$parser = xml_parser_create();

xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 0);
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);

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
*/
include('template/footer.php');
?>
