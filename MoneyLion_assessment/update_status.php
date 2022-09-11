<?php
header("Content-Type: application/json;");
$json_raw = file_get_contents('php://input');
$params = json_decode($json_raw, true);

if (empty($params['email']) || empty($params['featureName']) || !is_bool($params['enable'])) {
    http_response_code(400);
    exit();
}

require_once("MoneyLion/inc/db.inc");
require_once("MoneyLion/inc/func_utilities.inc");

$user = get_user($params['email']);
if (!empty($user['userId'])) {
    $feature = get_feature($params['featureName']);
    
    if (!empty($feature['featureId'])) {
        $sql = "/* MoneyLion_assessment/check_status.php [" . __LINE__ . "] */ "
                . " INSERT INTO user_feature (userId, featureId, enable) "
                . " VALUE (".$user['userId'].", ".$feature['featureId'].", ".(($params['enable']==true)?1:0).") "
                . " ON DUPLICATE KEY UPDATE "
                . " enable = ".(($params['enable']==true)?1:0)." ";  
        $query = data($sql);
    }
} 

if ($query>0) {
    http_response_code(200);
} else {
    http_response_code(304);
}
exit();