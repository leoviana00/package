<?php
// This file is NOT a part of Moodle - http://moodle.org/
//
// This client for Moodle 2 is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
/**
 * REST client for Moodle 2
 * Return JSON or XML format
 *
 * @authorr Jerome Mouneyrac
 */
/// SETUP - NEED TO BE CHANGED
$token = '7214cbc4372f3f492efdaf7f4976e4d5';
$domainname = 'http://cloudtreinamentos.com/aprendizado';
$functionname = 'core_user_create_users';
// REST RETURNED VALUES FORMAT
$restformat = 'xml'; //Also possible in Moodle 2.2 and later: 'json'
                     //Setting it to 'json' will fail all calls on earlier Moodle version
//////// moodle_user_create_users ////////
/// PARAMETERS - NEED TO BE CHANGED IF YOU CALL A DIFFERENT FUNCTION
$user1 = new stdClass();
$user1->username = 'testusername7';
$user1->password = 'Testpassword1@';
$user1->firstname = 'testfirstname7';
$user1->lastname = 'testlastname7';
$user1->email = 'testemail7@moodle.com';
$user1->auth = 'manual';
$user1->idnumber = 'testidnumber4';
$user1->lang = 'pt_br';
$user1->timezone = '99';
$user1->mailformat = 0;
$user1->description = 'Hello World!';
$user1->city = 'testcity1';
$user1->country = 'au';
$preferencename1 = 'preference1';
$preferencename2 = 'preference2';
$user1->preferences = array(
    array('type' => $preferencename1, 'value' => 'preferencevalue1'),
    array('type' => $preferencename2, 'value' => 'preferencevalue2'));
$users = array($user1);
$params = array('users' => $users);
/// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('./curl.php');
$curl = new curl;
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
$resp = $curl->post($serverurl . $restformat, $params);


// Tratando retorno para pegar id usuario
$resp_exploded=explode("<VALUE>",$resp);
$resp_limpo=$resp_exploded[1];
$resp_exploded1=explode("</VALUE>",$resp_limpo);

	echo $resp_exploded1[0];

