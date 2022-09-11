<?php
header("Content-Type: application/json;");
$json_raw = file_get_contents('php://input');
$params = json_decode($json_raw, true);

if (empty($params['email']) || empty($params['featureName']) || !is_bool($params['enable'])) {
    http_response_code(400);
    exit();
}

require_once($FIXPATH . "API/inc/db.inc");

$user = get_user($params['email']);
if (!empty($user['userId'])) {
    $feature = get_feature($params['featureName']);
    
    if (!empty($feature['featureId'])) {
        $user_feature = get_user_feature($user['userId'], $feature['featureId']);
        
        if (empty($user_feature['userId'])) {
            $sql = "/* MoneyLion_assessment/check_status.php [" . __LINE__ . "] */ "
                    . " INSERT INTO user_feature (userId, featureId, enable) "
                    . " VALUE (".$user['userId'].", ".$feature['featureId'].", ".(($params['enable']==true)?1:0).") "
                    . " ON DUPLICATE KEY UPDATE "
                    . " enable = ".(($params['enable']==true)?1:0)." ";  
            $query = data($sql);
        }
    }
} 

if ($query>0) {
    http_response_code(200);
} else {
    http_response_code(304);  
}
exit();