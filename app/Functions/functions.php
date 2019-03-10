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
                callMenu($data, $value['id'], $text."|--");
            }
        }
    }
}
?>
