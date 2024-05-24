<?

include __DIR__ . '/index.php';

class Database
{
    public static $conn;
    public static function dbconnection()
    {
        if (Database::$conn == null) {
            if (isset($_POST['username']) && isset($_POST['userid']) && isset($_POST['profession'])) {
                $servername = "127.0.0.1";
                $usernames = "root";
                $password = "";
                $databasename = "userdata";

                $connection = new mysqli($servername, $usernames, $password, $databasename);

                $pattern = "/[()']/i";
                $uname = preg_replace($pattern, "", strip_tags($_POST['username']));
                $uid = preg_replace($pattern, "", strip_tags($_POST['userid']));
                $prof = preg_replace($pattern, "", strip_tags($_POST['profession']));

                if ($connection->connect_error) {
                    echo "Error Occured " . $connection->connect_error;
                } else {
                    $sql = "INSERT INTO userentry(UserName,UserID,Profession)VALUES('$uname','$uid','$prof')";
                    if ($connection->query($sql) == true) {
                        echo "Data uploaded Successfuly";
                        Database::$conn=$connection;
                        return Database::$conn;
                    } else {
                        echo "Problem Occured " . $connection->error;
                    }
                }
            }
        }else {
            echo "Using Existing Connection";
            return Database::$conn;
        }
    }
}

Database::dbconnection();
