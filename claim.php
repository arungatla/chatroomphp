<?php

$room=$_POST['room'];


if(strlen($room)>20 or strlen($room)<2)
{
    $message="please length should between 2 to 20 letters";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo'</script>';
}
else if(!ctype_alnum($room))
{
    $message="correct your name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom";';
    echo'</script>';
}
else
{
    include 'db_connect.php';
}

$sql="SELECT * FROM rooms WHERE roomname='$room';";
$result=mysqli_query($conn,$sql);

if($result)
{
    if(mysqli_num_rows($result)>0)
    {
        $message="room already claimed";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom";';
        echo'</script>';
    }
    else
    {
        $sql="INSERT INTO rooms (roomname,stime) VALUES ('$room', CURRENT_TIMESTAMP)";
        if(mysqli_query($conn,$sql))
        {
            $message="your room is ready!";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' .$room.'";';
            echo'</script>';
        }
    }
}
else
{
    echo "error:". mysqli_error($conn);
}


?>