<html>
<style>
    *{
        margin: 0px;
        padding: 0px;
        color: white;
        font-family: 'Times New Roman', Times, serif;
    }
    h1,h3{
        display: flex;
        justify-content: center;
        background-color: #331D2C;
        padding: 1rem;
    }
    .container{
        border: 1px solid black;
        width:fit-content;
        display: flex;
        flex-direction: column;
        padding: 20px;
        border-radius: 10px;
    }
    input{
        padding: 4px;
        border-radius: 10px;
        color: black;
        font-weight: normal;
        font-family: 'Times New Roman', Times, serif;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 30px;
        padding-bottom: 30px;
    }
    .root{
        background-color: #3F2E3E;
    }
    #file{
        color: white;
    }
    #sub{
        background-color: #4F4557;
        color: white;
    }
    .space{
        background-color: #6D5D6E;
    }
    #datas{
        display: flex;
        text-align: center;
        padding: 10px;
    }
</style>

<div class="root">
<h1>User Data Entry</h1>
    <form action="<?$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <div class="container">
            Name : <input type="text" id="username" name="username">
            <br>
            User ID : <input type="text" id="userid" name="userid">
            <br>
            Profession : <input type="text" id="profession" name="profession">
            <br>
            File : <input type="file" id="file" name="file">
            <br>
            <input type="submit" id="sub" name="submit">
        </div>
    </form>
    <div class="space" style="color: black; background-color:#6D5D6E">
        <h3>User Entered Data</h3>
            <?
            if(isset($_POST['submit'])){
                $filename = $_FILES['file']['name'];
                $filetype = $_FILES['file']['type'];
                $filetmp = $_FILES['file']['tmp_name'];
                if(file_exists('C:/xampp/htdocs/php/datafolder/'.$_FILES['file']['name'])){
                    echo "File Already Exists";
                }else{
                    move_uploaded_file($filetmp,'C:/xampp/htdocs/php/datafolder/'.$_FILES['file']['name']);
                    ?>
                    <center>
                    <div class="container" id="datas">
                        <center>x
                            <?
                            echo "<br>";
                            echo "User Name : ".$_REQUEST['username'];
                            echo "<br>";
                            echo "<br>";
                            echo "User ID : ".$_REQUEST['userid'];
                            echo "<br>";
                            echo "<br>";
                            echo "Profession : ".$_REQUEST['profession'];
                            echo "<br>";
                            echo "<br>";
                            echo "File Name : ".$filename;
                            echo "<br>";
                            echo "<br>";
                            echo "File Type : ".$filetype;?>
                            echo "<br>";
                        </center>
                    </div>
                    </center>
                    <?
                }
            }
            ?>
        </div>
</div>
</html>