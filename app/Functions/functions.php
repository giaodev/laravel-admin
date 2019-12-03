<?php
function callMenu($data, $parent = 0, $text="|--", $select = 0){
    if($data){
        foreach($data as $key => $value){
            if($value['cate_parent'] == $parent){
                if ($select != 0 && $value['id'] == $select) {
                    ?>
                    <option value="<?php echo $value['id'] ?>" selected><?php echo $text.$value['cate_name'] ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $text.$value['cate_name'] ?></option>
                    <?php
                }
                unset($data[$key]);
                callMenu($data, $value['id'], $text."|--",$select);
            }
        }
    }
}
function callCategories($data, $parent = 0, $text="|--", $select = 0){
    if($data){
        foreach($data as $key => $value){
            if($value['cate_parent'] == $parent){
                if ($select != 0 && $value['id'] == $select) {
                    ?>
                    <option value="<?php echo $value['id'] ?>" selected><?php echo $text.$value['cate_name'] ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $text.$value['cate_name'] ?></option>
                    <?php
                }
                unset($data[$key]);
                callCategories($data, $value['id'], $text."|--",$select);
            }
        }
    }
}
function listCategory($data,$pc="", $parent = 0){
    if($data){
        foreach($data as $key => $value){
            if($value['cate_parent'] == $parent){
                echo '<ul>';
                echo '<li>';
                ?>
                <div class="checkbox">
                  <label class="container_cb">
                    <input type="checkbox" name="cate[]" value="<?php echo $value['id'] ?>"
                    <?php
                    if (is_array($pc) || is_object($pc))
                    {
                        foreach($pc as $val){
                            if($val->category_id == $value['id']){
                                echo "checked";
                            }
                        }
                    }
                    ?>
                    />
                    <span class="checkmark"></span>
                    <?php echo $value['cate_name'] ?>
                </label>
            </div>
            <?php
            unset($data[$key]);
            listCategory($data,$pc, $value['id']);
            echo '<li>';
            echo '</ul>';
        }
    }
}
}

/*Attributes*/
function callAttr($data, $parent = 0, $text="|--", $select = 0){
    if($data){
        foreach($data as $key => $value){
            if($value['attr_parent'] == $parent){
                if ($select != 0 && $value['id'] == $select) {
                    ?>
                    <option value="<?php echo $value['id'] ?>" selected><?php echo $text.$value['attr_name'] ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $text.$value['attr_name'] ?></option>
                    <?php
                }
                unset($data[$key]);
                callAttr($data, $value['id'], $text."|--");
            }
        }
    }
}

function listAttr($data,$attr="", $parent = 0){
    if($data){
        foreach($data as $key => $value){
            if($value['attr_parent'] == $parent){
                echo '<ul>';
                echo '<li>';
                ?>
                <div class="checkbox">
                  <label class="container_cb">
                    <input type="checkbox" name="attr[]" value="<?php echo $value['attr_slug'] ?>"
                    <?php
                    if($attr != ""){
                        foreach(json_decode($attr) as $attr_id){
                            if($attr_id == $value['attr_slug']){
                                echo "checked";
                            }
                        }
                    }
                    ?>
                    />
                    <span class="checkmark"></span>
                    <?php echo $value['attr_name'] ?>
                </label>
            </div>
            <?php
            unset($data[$key]);
            listAttr($data,$attr, $value['id']);
            echo '<li>';
            echo '</ul>';
        }
    }
}
}


function convert_number_to_words( $number )
{
    $hyphen = ' ';
    $conjunction = '  ';
    $separator = ' ';
    $negative = 'âm ';
    $decimal = ' phẩy ';
    $dictionary = array(
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
        13 => '13',
        14 => '14',
        15 => '15',
        16 => '16',
        17 => '17',
        18 => '18',
        19 => '19',
        20 => '20',
        30 => '30',
        40 => '40',
        50 => '50',
        60 => '60',
        70 => '70',
        80 => '80',
        90 => '90',
        100 => 'trăm',
        1000 => 'ngàn',
        1000000 => 'triệu',
        1000000000 => 'tỷ',
        1000000000000 => 'nghìn tỷ',
        1000000000000000 => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if( !is_numeric( $number ) )
    {
        return false;
    }

    if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
    {
        // overflow
        trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
        return false;
    }

    if( $number < 0 )
    {
        return $negative . convert_number_to_words( abs( $number ) );
    }

    $string = $fraction = null;

    if( strpos( $number, '.' ) !== false )
    {
        list( $number, $fraction ) = explode( '.', $number );
    }

    switch (true)
    {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int)($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if( $units )
            {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if( $remainder )
            {
                $string .= $conjunction . convert_number_to_words( $remainder );
            }
            break;
        default:
            $baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
            $numBaseUnits = (int)($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
            if( $remainder )
            {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words( $remainder );
            }
            break;
    }

    if( null !== $fraction && is_numeric( $fraction ) )
    {
        $string .= $decimal;
        $words = array( );
        foreach( str_split((string) $fraction) as $number )
        {
            $words[] = $dictionary[$number];
        }
        $string .= implode( ' ', $words );
    }

    return $string;
}


?>
