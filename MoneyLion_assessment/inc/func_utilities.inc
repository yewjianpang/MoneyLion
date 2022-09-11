<?
function get_user($value) {
    $sql = "/* MoneyLion_assessment/inc/func_utilities.inc [" . __LINE__ . "] */ "
        . "SELECT userId "
        . "FROM user "
        . "WHERE userEmail = '".mysql_escape_string($value)."' ";
    $query = data($sql);
    $result = mysql_fetch_assoc($query);

    return $result;
}

function get_feature($value) {
    $sql = "/* MoneyLion_assessment/inc/func_utilities.inc [" . __LINE__ . "] */ "
        . "SELECT featureId "
        . "FROM feature "
        . "WHERE featureName = '".mysql_escape_string($value)."' ";
    $query = data($sql);
    $result = mysql_fetch_assoc($query);

    return $result;
}

function get_user_feature($userId, $featureId) {
    $sql = "/* MoneyLion_assessment/inc/func_utilities.inc [" . __LINE__ . "] */ "
        . "SELECT userId, featureId, enable "
        . "FROM user_feature "
        . "WHERE userId = '".$userId."' AND featureId = '".$featureId."' ";
    $query = data($sql);
    $result = mysql_fetch_assoc($query);

    return $result;
}
?>
