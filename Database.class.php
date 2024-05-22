<?

include __DIR__.'/index.php';

class Database{
    public static $conn;
    public static function dbconnection(){
        if($_POST['username'] && $_POST['userid'] && $_POST['profession']){
            $servername = "127.0.0.1";
            $usernames = "root";
            $password = "";
            $databasename = "userdata";

            $conn = new mysqli($servername,$usernames,$password,$databasename);

            $uname = strip_tags($_POST['username']);
            $uid = strip_tags($_POST['userid']);
            $pattern = "/[()']/i";
            $prof = preg_replace($pattern,"",strip_tags($_POST['profession']));
            

            if($conn->connect_error){
                echo "Error Occured ".$conn->connect_error;
            }else{
                $sql = "INSERT INTO userentry(UserName,UserID,Profession)VALUES('$uname','$uid','$prof')";
                if($conn->query($sql)==true){
                    echo "Data uploaded Successfuly";
                    
                }else{
                    echo "Problem Occured ".$conn->error;
                }
            }
        }else{
            return Database::dbconnection();
        }
    }
}

Database::dbconnection();

?>