<?
$RDSDB['host'] = '';
$RDSDB['username'] = '';
$RDSDB['password'] = '';

if( !isset( $sys['db'] ) )
{
    $sys['db'] = mysql_connect( $RDSDB['host'], $RDSDB['username'], $RDSDB['password'])  or die ("Could not connect :".mysql_error());
    mysql_select_db( $RDSDB['database'], $sys['db'] ) or die ("Could not connect to database");
}

 function data( $sql )
 {
     global $sys;

     mysql_set_charset('utf8', $sys['db']);
     $r = mysql_query( $sql , $sys['db'] );

     $error = mysql_error();
     if( $error != '' )
     {
        echo $error."<br>$sql<br>";
     }
     return $r;
 }

?>