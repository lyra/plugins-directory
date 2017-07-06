<?php
/**
 * Created by PhpStorm.
 * User: LYRA NETWORK
 * Date: 05/07/2017
 * Time: 18:15
 */
$string = file_get_contents("payzen_fr.json");
$json_a = json_decode($string,true);

/**
 * @param $json_a
 */
function write_indiv_json($json_a){
    //iterate through each one to reformat
    foreach ($json_a as $plugin){
        $myfile = fopen("test/".$plugin['slug'].".json", "w") or die("Unable to open file!");
        $txt = '';
        unset($plugin['title']);
        unset($plugin['slug']);
        unset($plugin['logo']);
        unset($plugin['category']);
        if(isset($plugin['current_cms_version'])){
            $plugin['current'][0]['cms_version'] = $plugin['current_cms_version'];
        }
        unset($plugin['current_cms_version']);
        $txt = json_encode($plugin);
        fwrite($myfile, $txt);
        fclose($myfile);
    }
}

/**
 * @param $json_a
 * @param $file_name
 */
function write_full_json($json_a,$file_name){
    $myfile = fopen("test/".$file_name.".json", "w") or die("Unable to open file!");
    $txt = '[';
    foreach ($json_a as $plugin){
        unset($plugin['current']);
        unset($plugin['archives']);
        unset($plugin['current_cms_version']);
        $txt .= json_encode($plugin,JSON_FORCE_OBJECT);
        $txt .= ',';

    }

    //$txt = json_encode($txt,JSON_FORCE_OBJECT);
    $txt .= ']';
    fwrite($myfile, $txt);
    fclose($myfile);
}
write_indiv_json($json_a);
//write_full_json($json_a,'payzen--fr');