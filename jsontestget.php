<!DOCTYPE html>
<html>
<head>
</head>
<body>
<label for="Values">Values:</label><br/>
<div class="boxes">
    <div class="row">
<?php
    $q = $_REQUEST["q"];
    $command = escapeshellcmd('python telemetryController.py --mode getKeyList --entity_type DEVICE --entity_id '.$q.' --isTelemetry 1');
    $output = shell_exec($command);

    $arr = explode(",",substr($output, 1, -2));
    $i = 1;
    foreach($arr as $item){
        $items = str_replace("'",'', $item);
        if(($i-1)%5==0){
            echo '<div class="span2">';
        }

            echo '<label class="checkbox" id="cb">';
            echo '<input type="checkbox" name="telemetry[]" value="'.$item.'">';
            echo $items;
            echo '</label>';

        if(($i-1)%5==0){
            echo '</div>';
        }
        $i++;
    }

    #echo '<select name="telemetry[ ]" multiple>';
    #foreach($arr as $item){
    #    #replace $items with #item if the system linux
    #    $items = str_replace("'",'', $item);
    #    echo '<option value="'.$item.'">';
    #    echo $items;
    #    echo '</option>';
    #}
?>
    </div>
</div>


</body>
</html>