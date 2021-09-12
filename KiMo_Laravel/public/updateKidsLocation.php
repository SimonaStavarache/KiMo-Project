<?php


include("connect.php");
include('checkDistances.php');

$userID=$_POST['userID'];

$query = "select lat , lng  from users WHERE id=". $userID;
$result = mysqli_query($connect, $query);
$row=mysqli_fetch_array($result,MYSQLI_NUM);

$user_lat=$row[0];
$user_lng=$row[1];
$maxLat=$user_lat+0.003;
$maxLng=$user_lng+0.003;
$minLat=$user_lat-0.003;
$minLng=$user_lng-0.003;


$ran=mt_rand(1,4);
$nr=0;


if($ran==1)
{

        $query1 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0002 , k.lng=k.lng+0.0002 where k.followed=1  and uk.id_kid=30 
             and k.lat+0.0003< ".$maxLat." and k.lng+0.0003<".$maxLng."   and uk.id_user=" . $userID;


        $query2 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0001 where k.followed=1
                and k.lat-0.0002> ".$minLat." and k.lng+0.0002<".$maxLng."  and uk.id_kid=28 and uk.id_user=" . $userID;

        $query3=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0001 where k.followed=1 
                 and k.lat-0.0002> ".$minLat." and k.lng-0.0002>".$minLng."  and uk.id_kid=32 and uk.id_user=".$userID;

        $query4=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0001 where k.followed=1 
                 and k.lat+0.0003< ".$maxLat." and k.lng-0.0003>".$minLng."  and uk.id_kid=33 and uk.id_user=".$userID;

        $query5=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0001 where k.followed=1
                 and k.lat+0.0002< ".$maxLat." and k.lng+0.0002<".$maxLng."   and uk.id_kid>33 and uk.id_user=".$userID;


}
if($ran==2)
{
        $query1 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0002 , k.lng=k.lng-0.0002 where k.followed=1
                and k.lat+0.0003< ".$maxLat." and k.lng-0.0003>".$minLng." and uk.id_kid=30 and uk.id_user=" . $userID;

        $query2 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0001 where k.followed=1  
                and k.lat+0.0002< ".$maxLat." and k.lng-0.0002>".$minLng." and uk.id_kid=28 and uk.id_user=" . $userID;

        $query3=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0001 where k.followed=1  
                 and k.lat+0.0002< ".$maxLat." and k.lng+0.0002<".$maxLng." and uk.id_kid=32 and uk.id_user=".$userID;

        $query4=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0001 where k.followed=1  
                 and k.lat-0.0003> ".$minLat." and k.lng-0.0003>".$minLng." and uk.id_kid=33 and uk.id_user=".$userID;

        $query5=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                  set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0001 where k.followed=1
                  and k.lat+0.0002< ".$maxLat." and k.lng-0.0002>".$minLng." and uk.id_kid>33 and uk.id_user=".$userID;


}
if($ran==3)
{
        $query1 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0002 , k.lng=k.lng+0.0002 where k.followed=1 
                and k.lat-0.0003> ".$minLat." and k.lng+0.0003<".$maxLng." and uk.id_kid=30 and uk.id_user=" . $userID;

        $query2 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0001 where k.followed=1
                    and k.lat-0.0002> ".$minLat." and k.lng-0.0002>".$minLng."and uk.id_kid=28 and uk.id_user=" . $userID;

        $query3=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0001 where k.followed=1 
                 and k.lat-0.0002> ".$minLat." and k.lng+0.0002<".$maxLng." and uk.id_kid=32 and uk.id_user=".$userID;

        $query4=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0001 where k.followed=1 
                 and k.lat-0.0003> ".$minLat." and k.lng+0.0003<".$maxLng." and uk.id_kid=33 and uk.id_user=".$userID;

        $query5="update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0001 where k.followed=1  
                 and k.lat-0.0002> ".$minLat." and k.lng+0.0002<".$maxLng." and uk.id_kid>33 and uk.id_user=".$userID;



}
if($ran==4)
{
        $query1 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0002 , k.lng=k.lng-0.0002 where k.followed=1 
                and k.lat-0.0003> ".$minLat." and k.lng-0.0003>".$minLng." and uk.id_kid=30 and uk.id_user=" . $userID;

        $query2 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0001 where k.followed=1  
                  and k.lat+0.0002< ".$maxLat." and k.lng+0.0002<".$maxLng."and uk.id_kid=28 and uk.id_user=" . $userID;

        $query3="update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0001 where k.followed=1  
                 and k.lat+0.0002< ".$maxLat." and k.lng-0.0002>".$minLng." and uk.id_kid=32 and uk.id_user=".$userID;

        $query4="update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0001 where k.followed=1
                 and k.lat+0.0003<".$maxLat." and k.lng+0.0003<".$maxLng."  and uk.id_kid=33 and uk.id_user=".$userID;

        $query5=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0001 where k.followed=1 
                 and k.lat-0.0002>".$minLat." and k.lng-0.0002>".$minLng." and uk.id_kid>33 and uk.id_user=".$userID;


}



$result1 = mysqli_query($connect, $query1);

$result2 = mysqli_query($connect, $query2);

$result3 = mysqli_query($connect, $query3);

$result4 = mysqli_query($connect, $query4);

$result5 = mysqli_query($connect, $query4);

distanceKidObject($userID,$connect);
distanceUserKid($userID,$connect);
distanceKidFriends($userID,$connect);


//include('checkDistances.php');





?>
