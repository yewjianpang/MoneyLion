<?php
header("Content-Type: application/json;");
$response = array();

if (empty($_GET['email']) || empty($_GET['featureName'])) {
    http_response_code(400);
    exit();
}

require_once("MoneyLion/inc/db.inc");
require_once("MoneyLion/inc/func_utilities.inc");

$user = get_user($_GET['email']);
if (!empty($user['userId'])) {
    $feature = get_feature($_GET['featureName']);

    if (!empty($feature['featureId'])) {
        $user_feature = get_user_feature($user['userId'], $feature['featureId']);
    }
}

$response['canAccess'] = (($user_feature['enable']==1)?TRUE:FALSE);

echo json_encode($response);
exit();