<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Http\Resources\GeneralResources as GeneralResources;
class ApiController extends Controller
{
    public function getusers()
    {
        $dataModel=[];
        $users = User::with('post')->get();
 		$dataModel['data'] = $users;
        $dataModel['message'] = "Fetch Successful";
        $dataModel['error'] = false;
        return new GeneralResources($dataModel);
    }
    public function adduser(Request $request)
    {
    	$user = new User();
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result=$user->save();
        if($result){
        	$dataModel['data'] = $result;
        	$dataModel['message'] = "Insert Successful";
        	$dataModel['error'] = false;
        }else{
        	$dataModel['data'] = 0;
        	$dataModel['message'] = "Insert Unsuccessful";
        	$dataModel['error'] = true;
        }
        return new GeneralResources($dataModel);
    }
    public function updateuser(Request $request, $id)
    {
    	$dataModel=[];
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result=$user->save();
        if($result){
        	$dataModel['data'] = $result;
        	$dataModel['message'] = "Update Successful";
        	$dataModel['error'] = false;
        }else{
        	$dataModel['data'] = 0;
        	$dataModel['message'] = "Update Unsuccessful";
        	$dataModel['error'] = true;
        }
        return new GeneralResources($dataModel);
    }
    public function getuser($id)
    {
    	$dataModel=[];
    	$user=User::where('user_id',$id)->with('post')->get();
        if($user){
        	$dataModel['data'] = $user;
        	$dataModel['message'] = "Fetch Successful";
        	$dataModel['error'] = false;
        }else{
        	$dataModel['data'] = 0;
        	$dataModel['message'] = "Fetch Unsuccessful";
        	$dataModel['error'] = true;
        }
        return new GeneralResources($dataModel);
    }
    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
        $result=$user->delete();
        if($result){
        	$dataModel['data'] = $result;
        	$dataModel['message'] = "Delete Successful";
        	$dataModel['error'] = false;
        }else{
        	$dataModel['data'] = 0;
        	$dataModel['message'] = "Delete Unsuccessful";
        	$dataModel['error'] = true;
        }
        return new GeneralResources($dataModel);
    }

    public function sendmail(){
    	$to_name = 'Ujala Jha';
		$to_email = '2016.ujala.jha@ves.ac.in';
		$data = array('title'=>"Hello There", "body" => "Ujala Here, You are best");
		    
		Mail::send('email',$data, function($message) use ($to_name, $to_email) {
		    $message->to($to_email,$to_name)
		            ->subject('Artisans Web Testing Mail')
		            ->from('jhaujala3@gmail.com','Ujala J.');
		   
		});

        return response()->json(['message' => 'Request completed']);
    }
}
