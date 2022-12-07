<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alluser;
use App\Models\manager;
use App\Models\leave_application;
use App\Models\branch;
use App\Models\transfer_application;
use App\Models\service;
use App\Models\allservice;
use App\Models\order;
use App\Models\handover;

class managerController extends Controller
{
    public function registration()
    {
        return view('Manager.registration');
    }
    public function registrationSubmit(Request $r)
    {
        $r->validate(
            [
                'username'=>'required|min:4|max:10|unique:allusers|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/',
                'email'=>'required',
                'password'=>'required|min:6|max:11',
                'cpassword'=>'required|same:password',
                'mobile'=>'required|min:11|max:11|regex:/^01[3,5,6,7,8,9]{1}[0-9]{8}$/',
                'gender'=>'required',
                'date'=>'required',
                'picture'=>'mimes:png,jpg,jpeg|required|max:10000',
                
            ],
            
    );

    $pic=$r->file('picture')->store('storage/Profile Picture');
    $st =new alluser();
    $st->username=$r->username;
    $st->password=md5($r->password);
    $st->email=$r->email;
    $st->phone=$r->mobile;
    $st->dob=$r->date;
    $st->gender=$r->gender;
    $st->usertype="manager";
    $st->image=$pic;
    $st->save();
    $r->session()->flash('registration','User Registered');
    return redirect()->route('login');

    }

    public function Home()
    {
        return view('Manager.home');
    }
    public function Profile()
    {
        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        return view('Manager.profile')->with('manager',$manager);
    }
    public function Setting()
    {
        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        return view('Manager.setting')->with('manager',$manager);
    }
    public function SettingSubmit(Request $r)
    {  
        $r->validate(
            [
                'cupassword'=>'required',
                'password'=>'required|min:6|max:11',
                'cpassword'=>'required|same:password',
                
                
            ],
        );

        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        if(md5($r->cupassword)!=$manager->password)
        {
            $r->session()->flash('registration','Current password is not match');
            return back();
        }
        if($r->cupassword==$r->password)
        {
            $r->session()->flash('registration','Your current password match with your new password');
            return back();
        }
        
        else
        {
            $manager->password=md5($r->password);
            $manager->save();
            $user=alluser::where('username',$name)->first();
            $user->password=md5($r->password);
            $user->save();
            $r->session()->flash('registration','Password successfully changed');
            return back();

        }
       // return view('Manager.setting')->with('manager',$manager);
    }


    public function update()
    {
        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        return view('Manager.update')->with('manager',$manager);
    }
    public function updatesubmit(Request $r)
    {  
        $r->validate(
            [
                
                'username'=>'required|min:4|max:10|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/',
                'email'=>'required',
                'phone'=>'required|min:11|max:11|regex:/^01[3,5,6,7,8,9]{1}[0-9]{8}$/',
                
            ],
        );

        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        $user=alluser::where('username',$name)->first();
        $u=$manager->username;
        $e=$manager->email;
        $p=$manager->phone;
        $bool1=false;
        $bool2=false;
        $bool3=false;
        if($u!=$r->username)
        {
            $keoase=alluser::where('username',$r->username)->first();
            if($keoase==null)
            {
                $bool1=true;
               // session()->flush();
                $r->session()->put('username',$r->username);
            }
            else
            {
                $r->session()->flash('registration','Enter a unique username');
                 return back();
            }
        }

        if($e!=$r->email)
        {
            $bool2=true;
        }
        if($p!=$r->phone)
        {
            $bool3=true;
        }



        if($bool1 && $bool2 && $bool3)
        {
            $r->session()->flash('registration','Username, Email and phone number update successfully');
            $manager->username=$r->username;
            $manager->email=$r->email;
            $manager->phone=$r->phone;
            $manager->save();
            $user->username=$r->username;
            $user->email=$r->email;
            $user->phone=$r->phone;
            $user->save();
            return back();
        }
        else if($bool1 && $bool2)
        {
            $r->session()->flash('registration','Username and Email update successfully');
            $manager->username=$r->username;
            $manager->email=$r->email;
            $manager->save();

            $user->username=$r->username;
            $user->email=$r->email;
            $user->save();
            return back();
        }
        else if($bool1 && $bool3)
        {
            $r->session()->flash('registration','Username and Phone Number successfully');
            $manager->username=$r->username;
            $manager->phone=$r->phone;
            $manager->save();
            $user->username=$r->username;
            $user->phone=$r->phone;
            $user->save();
            return back();
        }
        else if($bool3 && $bool2)
        {
            $r->session()->flash('registration','Phone Number and Email update successfully');
            $manager->email=$r->email;
            $manager->phone=$r->phone;
            $manager->save();
            $user->email=$r->email;
            $user->phone=$r->phone;
            $user->save();
            return back();
        }
        else if($bool1)
        {
            $r->session()->flash('registration','Username update successfully');
            $manager->username=$r->username;
            $manager->save();
            $user->username=$r->username;
            $user->save();
            return back();
        }
        else if($bool2)
        {
            $r->session()->flash('registration','Email update successfully');
      
            $manager->email=$r->email;
            $manager->save();
   
            $user->email=$r->email;
  
            $user->save();
            return back();
        }
        else if($bool3)
        {
            $r->session()->flash('registration','Phone Number update successfully');
        
            $manager->phone=$r->phone;
            $manager->save();
            $user->phone=$r->phone;
            $user->save();
            return back();
        }
        else
        {
            $r->session()->flash('registration','You dont apply any update, thank you');
            return back();
        }
   
        
       // return view('Manager.setting')->with('manager',$manager);
    }


    public function leave()
    {
        $name=Session()->get('username');
        $manager=leave_application::where('username',$name)->first();
        if($manager!=null)
        {
            session()->flash('registration','You already apply for leave application');
            return redirect()->route('manager.home');
        }
        else
        {
            $st =new leave_application();
            $st->username=$name;
            $st->save();
            session()->flash('registration','Successfully apply for leave application');
            return redirect()->route('manager.home');
        }
        
    }

    public function transfer()
    {
        $name=Session()->get('username');
        $manager=manager::where('username',$name)->first();
        return view('Manager.transfer')->with('manager',$manager);
    }
    public function transferSubmit(Request $r)
    {
        $r->validate(
            [
                
                'branch'=>'required',
                'branch1'=>'required',
                
            ],
        );

        $branch1=branch::where('name',$r->branch)->first();
        if($branch1==null)
        {
            session()->flash('registration','No branch available for this current branch name');
           return back();
        }
        $name=Session()->get('username');
        $manager=branch::where('branch_manager',$name)->first();
        if($manager==null || $manager->name!=$r->branch)
        {
           session()->flash('registration','You are not the manager of this branch');
           return back();
        }
        $branch=branch::where('name',$r->branch1)->first();
        if($branch==null)
        {
            session()->flash('registration','No branch available for this desire branch name');
           return back();
        }
        if($branch->branch_manager!=null)
        {
            session()->flash('registration','Already there is a manager in this branch');
            return back();
        }
        $transfer=transfer_application::where('username',$name)->first();
        if($transfer!=null)
        {
            session()->flash('registration','You already apply for transfer application please be patient');
            return back();
        }
        else
        {
            $st=new transfer_application();
            $st->username=$name;
            $st->curr=$r->branch;
            $st->desire=$r->branch1;
            $st->save();
            session()->flash('registration','Transfer application successfully send');
            return back();

        }
    }

    public function servicename()
    {
        $services=service::all();
        return view('Manager.servicename')->with('services',$services);
    }

    public function servicenamesubmit(Request $r)
    {
        $r->validate(
            [
                'name'=>'required|min:6|max:100|string',
            ],
        );
        $service=service::where('name',$r->name)->first();
        if($service!=null)
        {
            session()->flash('registration','There are already a service available for this name');
            return back();
        }
        $st=new service();
        $st->name=$r->name;
        $st->save();
        session()->flash('registration','Service successfully added');
        return back();
        //return redirect()->back();
       // return redirect()->route('manager.addservicename');
       
        
    }

    public function service()
    {
        $services=allservice::all();
        $service=service::all();
        return view('Manager.allservice')->with('services',$services)->with('service',$service);
    }

    public function servicesubmit(Request $r)
    {
        $r->validate(
            [
                'sname'=>'required|min:6|max:100|string',
                'sprice'=>'required',
                'multi'=>'required',
            ],
        );
        $service=allservice::where('s_name',$r->sname)->first();
        if($service!=null)
        {
            session()->flash('registration','There are already a service available for this name');
            return back();
        }
        if($r->sprice<500 || $r->sprice>10000)
        {
            session()->flash('registration','Price should be between 500 to 10000 taka');
            return back();
        }
        $id=service::where('name',$r->multi)->first();
        $st=new allservice();
        $st->s_name=$r->sname;
        $st->price=$r->sprice;
        $st->services_id=$id->id;
        $st->save();
        session()->flash('registration','Service successfully added');
        return back();
       //return redirect()->back();
       // return redirect()->route('manager.addservicename');
       
        
    }

    public function processOrder()
    {
        $orders=order::all();
        return view('Manager.order')->with('orders',$orders);
    }


    public function processOrderSubmit(Request $r)
    {
        if(empty($r->myid))
        {
            session()->flash('registration','No order selected, Select at least one order');
            return back();
        }
         $s="";
         $count=0;
        foreach($r->myid as $id)
        {
            
            $order=order::where('id',$id)->first();

            if($order->status=="placed")
            {
                 //nothing will be happened
            }
            else
            {

                $count=$count+1;
                //find out every order list
                $list=$order->list;
                $branch=$order->branch;
                $address=$order->address;
                //$price=$order->price;
                //length of list
                $n=strlen($list);
                //empty string 
                $str="";
                for ($i = 0; $i < $n; $i++)
                {
                    if($list[$i]==',')
                    {
                        $number=(int)$str;
                        $str="";
                        $service=allservice::where('id',$number)->first();
                        $price=$service->price;
                        $area=$service->s_name;
                        $findstaff=handover::where('branch',$branch)->where('area',$area)->get();
                        $initialprice=0;
                        $initialaddress="";
                        foreach($findstaff as $staff)
                        {
                            $initialprice=$staff->amount + $price;
                            $initialaddress=$staff->address."|".$address;
                            $staff->amount=$initialprice;
                            $staff->address=$initialaddress;
                            $staff->status="active";
                            $staff->save(); 
                        
                        }
                    }
                    else
                    {
                        $str=$str.$list[$i];
                    }
                }

           $order->status="placed";
           $order->save();
        }
    }
    if($count==0)
    {
        session()->flash('registration','Order are already placed try to placed, ulplaced order');
    }
    else
    {
        session()->flash('registration','Order successfully placed');
    }
    
        return back();
    }

    public function totalEarn()
    {
        $total=handover::all();
        $services=allservice::all();

         $chartData="";
        foreach($services as $s)
        {
           $servicename=$s->s_name;
           $totalincome=0;
           $my=handover::where('area',$servicename)->where('status',"success")->get();
           foreach($my as $m)
           {
            $totalincome=$totalincome+$m->amount;
           }
           $chartData.="['".$servicename."',".$totalincome."],";
        
        }
        //$arr['chartData']=rtrim($chartData,",");
        $arr=$chartData;
        return view('Manager.earn')->with('total',$total)->with('services',$services)->with('arr',$arr);
    }




}
