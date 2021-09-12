<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SessionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest',['except'=>['destroy','index','profile','addkid','addgroup','updateProfile','maps',
                                            'editKid','deleteKid','editGroup','deleteGroup','deleteNotification','notifications','start']]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if(auth()->attempt(request(['email','password'])))
        {

            return redirect('/main');
        }
        else {

            return back()->withErrors([
                'message' => 'Wrong email or password.'
            ]);
        }

    }

    public function addkid(Request $req)
    {
        $name=$req->input('name');
        $age=$req->input('age');

        //$kid=DB::table('kids')->where('name', 'Dragos')->first();
        $userID=Auth::user()->id;
        echo $userID;
        //echo $kid->id_kid;


            $data=array('name'=>$name,'age'=>$age,'followed'=>0,'lat'=>47.17400,'lng'=>27.57515);
            DB::table('kids')->insert($data);



        $kidID = DB::table('kids')->where('name',$name)->where('age',$age)->value('id_kid');
        $data=array('id_user'=>$userID,'id_kid'=>$kidID,'status'=>0);
        DB::table('user_kid')->insert($data);


        $object= DB::table('objects')->select('id_object')->get();
        foreach ($object as $obb)
        {
            $data=array('id_kid'=>$kidID,'id_object'=>$obb->id_object,'status'=>0);
            DB::table('kid_object')->insert($data);

        }
        $friends= DB::table('kids')
            ->join('user_kid','user_kid.id_kid','=','kids.id_kid')
            ->where('kids.id_kid','<>',$kidID)
            ->where('user_kid.id_user','=',$userID)
            ->select('kids.id_kid')
            ->get();
        foreach ($friends as $friend)
        {
            $data=array('id_kid'=>$kidID,'id_friend'=>$friend->id_kid,'status'=>0);
            DB::table('kid_friend')->insert($data);

            $data=array('id_kid'=>$friend->id_kid,'id_friend'=>$kidID,'status'=>0);
            DB::table('kid_friend')->insert($data);

        }

        return redirect("/main");

    }

    public function addgroup()
    {
        $idUser=Auth::user()->id;
        $numeGrup= Input::get('name');
        if(DB::table('groups')->groupBy('name')->having('name','=',$numeGrup)->count()!=0)
        {
            return back()->with('error_code', 5)->withErrors([
                'message' => 'There is already a group with this name.'
            ]);
        }
        //echo $numeGrup;
        $kidNumber=Input::get('kidNumber');
        $checkedKidNumber=0;
            for($i=1;$i<=$kidNumber;$i++)
            {
                $kid="kid$i";
                if (Input::get($kid,'0')) {
                    $checkedKidNumber++;
                }
            }
        if($checkedKidNumber==0)
        {

            return back()->with('error_code', 5)->withErrors([
                'message' => 'No kid selected.'
            ]);
        }
        else
        {

            $data=array('name'=>$numeGrup);
            DB::table('groups')->insert($data);
            $idGrup=DB::table('groups')->where('name',$numeGrup)->value('id_group');

            $data=array('id_user'=>$idUser,'id_group'=>$idGrup);
            DB::table('user_group')->insert($data);
            for($i=1;$i<=$kidNumber;$i++)
            {
                $kid="kid$i";
                if ($kidID=Input::get($kid,'0')) {
                    $data=array('id_group'=>$idGrup,'id_kid'=>$kidID);
                    DB::table('group_kid')->insert($data);
                    $checkedKidNumber++;
                }
            }
            return redirect("/main");
        }

    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }

    public function index()
    {
        $kids=DB::table('kids')
            ->join('user_kid','kids.id_kid','=','user_kid.id_kid')
            ->where('user_kid.id_user',Auth::user()->id)
            ->select('kids.name','kids.age','kids.id_kid')
            ->get();

        $groups=DB::table('groups')
            ->join('user_group','groups.id_group','=','user_group.id_group')
            ->where('user_group.id_user',Auth::user()->id)
            ->select('groups.id_group','groups.name')
            ->get();


        return view('sessions.main')->with('kids',$kids)->with('groups',$groups);
    }


    public function profile()
    {
        $user=DB::table('users')
            ->where('users.id',Auth::user()->id)
            ->select('users.name','users.email','users.address','users.age')
            ->get();
        $kids=DB::table('kids')
            ->join('user_kid','kids.id_kid','=','user_kid.id_kid')
            ->where('user_kid.id_user',Auth::user()->id)
            ->select('kids.name','kids.age','kids.id_kid')
            ->get();
        $groups=DB::table('groups')
            ->join('user_group','groups.id_group','=','user_group.id_group')
            ->where('user_group.id_user',Auth::user()->id)
            ->select('groups.name','groups.id_group')
            ->get();
        $notifications=DB::table('notifications')
            ->join('kid_notification','kid_notification.id_notification','=','notifications.id_notification')
            ->join('kids','kid_notification.id_kid','=','kids.id_kid')
            ->join('user_kid','user_kid.id_kid','=','kids.id_kid')
            ->where('user_kid.id_user',Auth::user()->id)
            ->select('notifications.message','notifications.id_notification','notifications.generate_time','kids.name')
            ->orderBy('notifications.generate_time', 'desc')
            ->get();
        $group_kid=DB::table('group_kid')
            ->join('user_group','group_kid.id_group','=','user_group.id_group')
            ->where('user_group.id_user',Auth::user()->id)
            ->select('group_kid.id_group','group_kid.id_kid')
            ->get();
        return view('sessions.profile')->with('user',$user)->with('kids',$kids)->with('groups',$groups)
            ->with('group_kid',$group_kid)->with('notifications',$notifications);
    }

    public function updateProfile()
    {

        $userID=Auth::user()->id;
        $userName=Input::get('userName');
        $userEmail=Input::get('userEmail');
        $userNewPassword=Input::get('userNewPassword');
        $userNewPasswordConfirm=Input::get('userNewPasswordConfirm');
        $userAddress=Input::get('userAddress');
        $userAge=Input::get('userAge');



        if($userNewPassword!=$userNewPasswordConfirm)
        {
            return back()->withErrors([
                'message' => 'NewPasswordConfirm does not match NewPassword.'
            ]);
        }
        else{
            if($userNewPassword!=null)
            {
                $password=bcrypt($userNewPassword);
                DB::table('users')
                    ->where('id',$userID )
                    ->update(['name'=>$userName,'email'=>$userEmail,'address'=>$userAddress,'age'=>$userAge,'password'=>$password]);
                return $this->profile();
            }
            else{
                DB::table('users')
                    ->where('id',$userID )
                    ->update(['name'=>$userName,'email'=>$userEmail,'address'=>$userAddress,'age'=>$userAge]);
                return $this->profile();
            }


        }
    }

    public function editKid()
    {
        $kidID=Input::get('kidID');
        $kidName=Input::get('kidName');
        $kidAge=Input::get('kidAge');
        DB::table('kids')
            ->where('id_kid',$kidID )
            ->update(['name'=>$kidName,'age'=>$kidAge]);

        return back();

    }

    public function deleteKid()
    {
        $kidID=Input::get('kidID');
        DB::table('kids')->where('id_kid', '=', $kidID)->delete();
        return back();
    }

    public function editGroup()
    {
        $groupID=Input::get('groupID');
        $groupName=Input::get('groupName');

        DB::table('groups')
            ->where('id_group',$groupID )
            ->update(['name'=>$groupName]);
        return back();
    }

    public function deleteGroup()
    {
        $groupID=Input::get('groupID');
        DB::table('groups')->where('id_group', '=', $groupID)->delete();
        return back();
    }

    public function deleteNotification()
    {
        $notificationID=Input::get('notificationID');
        DB::table('notifications')->where('id_notification', '=', $notificationID)->delete();
        return back();
    }

    public function maps()
    {
        return view('sessions.maps');
    }
    public function notifications()
    {
        return view('sessions.index');
    }

    public function start()
    {
        $userID=Auth::user()->id;
        $kid_groupID=Input::get('selected');
        $id=substr($kid_groupID, 1);

        DB::table('kids')
            ->join ('user_kid','user_kid.id_kid','=','kids.id_kid')
            ->where('user_kid.id_user',$userID )
            ->update(['kids.followed'=>0]);

        if(strcmp($kid_groupID,'h')<0)
        {
            DB::table('kids')
                ->join ('group_kid','kids.id_kid','=','group_kid.id_kid')
                ->join ('user_kid','user_kid.id_kid','=','kids.id_kid')
                ->where('group_kid.id_group',$id )
                ->where('user_kid.id_user',$userID)
                ->update(['kids.followed'=>1]);
        }
        else{
            DB::table('kids')
                ->where('id_kid',$id)
                ->update(['followed'=>1]);
        }
        return view('sessions.frontmap');

    }




}
