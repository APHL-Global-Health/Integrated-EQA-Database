<?PHP

$CWD = getcwd();
$path = explode("/", $CWD);
$dirname = $path[count($path)-1];

$options = getopt("d:");

if ($handle = opendir($CWD)) {
    if(strcmp($dirname,'database') == 0){

        /* This is the correct way to loop over the directory. */
	while (false !== ($entry = readdir($handle))) {
	    if(strcmp(substr($entry,0,2),"20") == 0){
	        echo "$entry\n";
	        $cmd = "echo \"select * from migrations WHERE migration = '$entry';\" | sudo mysql ". $options['d'];
	        echo "$cmd\n";
		$result = shell_exec($cmd);
		echo "\n-----$result------\n";
		if(strpos($result,$entry) === false){
		    $cmd = "sudo mysql ".$options['d']." < ./$entry";
		    shell_exec($cmd);
		    $cmd = "echo \"INSERT INTO migrations (migration) VALUES ('$entry');\" | sudo mysql ". $options['d'];
		    shell_exec($cmd);
		}
	    }
        }

    }else{
	echo "\nUsage:\n";
	echo "cd database\n";
	echo "php update.php\n\n";
    }

    closedir($handle);
}

?>
