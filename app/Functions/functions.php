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
                  <label>
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
                  <label>
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
?>
