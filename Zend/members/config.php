// connect to db
$link = mysql_connect('localhost', 'root', 'obfuscated');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('foo') ) {
    die ('Can\'t use foo : ' . mysql_error());
}
