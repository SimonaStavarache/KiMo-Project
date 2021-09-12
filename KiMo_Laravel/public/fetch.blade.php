

<?php

//fetch.php;
$userID=$_POST['userID'];
if(isset($_POST["view"]))
{
    include("connect.php");
    if($_POST["view"] != '')
    {
        $update_query = "UPDATE notifications n
                join kid_notification kn on n.id_notification=kn.id_notification
                join kids k on k.id_kid=kn.id_kid
                join user_kid uk on uk.id_kid=k.id_kid
                SET n.status=1 WHERE n.status=0 and uk.id_user=".$userID;
        mysqli_query($connect, $update_query);
    }




    $query= "select n.message as MESSAGE,k.name as NUME,n.id_notification as ID_NOTIFICATION ,n.generate_time as GENERATE_TIME from notifications n
             join kid_notification kn on n.id_notification=kn.id_notification
             join kids k on kn.id_kid=k.id_kid
             join user_kid uk on uk.id_kid=k.id_kid
             where uk.id_user=".$userID." and k.followed=1 order by n.generate_time desc limit 5";
    $result = mysqli_query($connect, $query);
    $output = '';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
   <li>
    <a href="#">
     <strong>'.$row['NUME'].' ('.$row['GENERATE_TIME'].')'.'</strong><br />
     <small><em>'.$row['MESSAGE'].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
        }
    }
    else
    {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }

    $query_1 = "SELECT * FROM notifications n
                join kid_notification kn on n.id_notification=kn.id_notification
                join kids k on k.id_kid=kn.id_kid
                join user_kid uk on uk.id_kid=k.id_kid
                WHERE n.status=0 and uk.id_user=".$userID;
    $result_1 = mysqli_query($connect, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
        'notification'   => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>


