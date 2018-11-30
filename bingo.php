<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


require_once  'Gift.class.php';

if (isset($_POST['value2'])){
    //echo '<h2>'.$_POST['value2'].'</h2>';
    $gift = new Gift('bonus');
    $gift->name = 'Bonus from money X'.$gift->k;
    $gift->value = $_POST['value2'];
    $gift->image = 'img/bonus.jpg';
    echo $gift->draw();
    exit();

}
$types = ['thing', 'money', 'bonus'];



$type = rand(0, sizeof($types)-1);



try {
    $gift = new Gift($types[$type]);

    if($type == 'thing'){
        $things = explode("\n", file_get_contents('things.list'));
        $rnd = rand(0, sizeof($things)-1);
        $things_line = explode(',', $things[$rnd]);
        $gift->name = $things_line[0];
        $gift->image = 'img/'.$things_line[1];
    }else if($types[$type] == 'money') {
        $gift->name = 'Money prize!';
        $gift->value = rand(10, 1000);
        $gift->image = 'img/money.jpg';
    }else{
        $gift->name = 'Bonus prize!';
        $gift->value = rand(100, 10000);
        $gift->image = 'img/bonus.jpg';
    }

    echo $gift->draw();
}catch (Exception $e){
    echo 'Error: '. $e->getMessage();
}

