<?php



    include("connect.php");
    include('checkDistances.php');

    $userID=$_POST['userID'];

    $ran=rand(1,4);
    $nr=0;
    if($ran==1)
    {  $nr=0 ;
        while( $nr<6 ) {
            $query1 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0005 , k.lng=k.lng+0.0005 where k.followed=1  and uk.id_kid=30 and uk.id_user=" . $userID;
            $query2 = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0006 where k.followed=1  and uk.id_kid=28 and uk.id_user=" . $userID;
            $query3=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat-0.0004 , k.lng=k.lng-0.0004 where k.followed=1  and uk.id_kid=32 and uk.id_user=".$userID;
            $query4=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0007 , k.lng=k.lng-0.0005 where k.followed=1  and uk.id_kid=33 and uk.id_user=".$userID;

            $nr++;
        }
    }
    if($ran==2)
    {    $nr=0 ;
        while( $nr<6 ) {
            $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0005 where k.followed=1  and uk.id_kid=30 and uk.id_user=".$userID;

            $nr++;
        }
    }
    if($ran==3)
    {    $nr=0 ;
        while( $nr<6 ) {
            $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0005 where k.followed=1  and uk.id_kid=30  and uk.id_user=".$userID;
            $nr++;
        }
    }
    if($ran==4)
    {      $nr=0 ;
        while( $nr<6 ) {
            $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0005 where k.followed=1  and uk.id_kid=29 and uk.id_user=".$userID;
            $nr++;
        }
    }



$result = mysqli_query($connect, $query);

/*
$ran=1;
$nr=0;
if($ran==1)
{  $nr=0 ;

    while( $nr<6 ) {
        $query = " update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat+0.0001 , k.lng=k.lng+0.0001 where k.followed=1 and uk.id_user=" . $userID;
        $nr++;
    }
    $ran=2;
}
if($ran==2)
{    $nr=0 ;
    while( $nr<6 ) {
        $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                 set k.lat=k.lat+0.0001 , k.lng=k.lng-0.0001 where k.followed=1 and uk.id_user=".$userID;
        $nr++;
    }
    $ran=3;
}
if($ran==3)
{    $nr=0 ;
    while( $nr<6 ) {
        $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng+0.0001 where k.followed=1 and uk.id_user=".$userID;
        $nr++;
    }
    $ran=4;
}
if($ran==4)
{      $nr=0 ;
    while( $nr<6 ) {
        $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=k.lat-0.0001 , k.lng=k.lng-0.0001 where k.followed=1 and uk.id_user=".$userID;
        $nr++;
    }
    $ran=0;
}

if($ran==5)
{
        $query=" update kids k join user_kid uk on k.id_kid=uk.id_kid
                set k.lat=47.175315 , k.lng=27.574092 where k.followed=1 and uk.id_user=".$userID;
        $nr++;


}


$result = mysqli_query($connect, $query);


*/
    distanceKidObject($userID,$connect);
    distanceUserKid($userID,$connect)


    //include('checkDistances.php');





?>

