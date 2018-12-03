<!DOCTYPE html>
<html>
<head>
    <script>
        function showUser(str) {
            if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
        xmlhttp.open("GET","jsontestget.php?q="+str,true);
        xmlhttp.send();
        }
    }
</script>
</head>
<body>

<?php
    //http://localhost/scripts/jsontest.php?preset=presetA

    $q = $_GET["preset"];
    $str = file_get_contents('C:\xampp\htdocs\scripts\jsontest.json');
    $json = json_decode($str,true);

    echo '<select name="deviceid" onchange="showUser(this.value)">';
    echo '<option value="">select..</option>';
    foreach($json['preset'][$q] as $mydata){
            echo '<option value="'.$mydata['deviceid'].'">';
            echo $mydata['namadevice'];
            echo '</option>';
    }
    echo '</select>';
    
?>

<!-- <div id="txtHint"></div> -->

</body>
</html>