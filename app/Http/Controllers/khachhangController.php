<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\khachhang;
use App\Admin;
use Auth;
use Validator;
use Session;
use Mail;

class khachhangController extends Controller
{
    public function getinfo(){
        $khachhangs = khachhang::all();
        dd($khachhangs);
    }

    public function getRegister()
    {
    return view('news.pages.khachhang.register');
    }
    public function register(Request $request)
    {
    $rules= [
            'mast'=>'required|max:10',
            'tendv' =>'required|max:180',
            'dcdkkd'=> 'required|max:300',
            'nguoilienhe'=> 'required|max:180',
            'email'=> 'required|email',
            'dtdd'=> 'required',
            ];
    $msg = [
            'mast.required'=>'Không được bỏ trống mã số thuế gồm 10 số.',
            'tendv.required'=>'Không được bỏ trống tên đơn vị.',
            'dcdkkd.required'=>'Không được bỏ trống địa chỉ đăng ký kinh doanh.',
            'nguoilienhe.required'=>'Không được bỏ trống người liên hệ.',
            'email.required'=>'phải nhập đầy đủ đúng cú phap vd :example@gmail.com',
            'dtdd.required'=>'Đề nghị nhập số điện thoại.',
            ];
    $validator = Validator::make($request->all(), $rules , $msg);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    } else {
        $khachhang = new khachhang();
        $khachhang->mast = $request->input('mast');
        $khachhang->tendv = $request->input('tendv');
        $khachhang->dcdkkd = $request->input('dcdkkd');
        $khachhang->nguoilienhe = $request->input('nguoilienhe');
        $khachhang->email = $request->input('email');
        $khachhang->dtdd = $request->input('dtdd');
        $khachhang->dtb = $request->input('dtb');
        $khachhang->trangthai = 0;
        //Upload file
        if($request->hasFile('tailieu')){
            $file = $request->file('tailieu');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/khachhangs/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name;
            }
            $file->move('upload/khachhangs',$random_file_name);
            $khachhang->tailieu = 'upload/khachhangs/'.$random_file_name;
        } ;
        $khachhang->save();
        $data = array(
            'email' => $request->email,
            'tendv' => $request->tendv,
            'mast' => $request->mast,
            'dcdkkd' => $request->dcdkkd,
            'dtdd' => $request->dtdd,
            'dtb' => $request->dtb,
            'tennglh'=> $request->nguoilienhe,
        );
        Mail::send('emails.remail', $data, function($msg) use ($data) {
            $msg->from($data['email']);
            $msg->to('vinhnq@visnam.com');
            $msg->subject('Đăng ký Hóa đơn điện tử');
        });
    }
    Session::flash('flash_success','Thành công.');
    return redirect()->route('thanks');
    }
    
    public function getList()
    {   if(Auth::user()->role=='admin'){
        $dealerships =Admin::where('role','=','dealership')->get();
        $khachhangs = khachhang::all();
    }
        if(Auth::user()->role=='dealership'){
            $khachhangs = khachhang::where('user_id',Auth::user()->id)->get();
        } 
            return view('admin.khachhang.list',['khachhangs'=>$khachhangs,'dealerships'=>$dealerships]);
    }
   //updateTrangthai
   public function updateTrangthai(Request $request )
   {
    if($request->ajax()){
        $kh = khachhang::find($request->input('id'));
        if( $kh ){
            if( Auth::user()->role == 'admin' || Auth::user()->role == 'dealership'){
                    $kh->trangthai =$request->input('status');
                    $kh->save();
                    return 'ok';
            } else { return 'Bạn không đủ quyền'; }
        } else { return 'Khách hàng không tồn tại.'; }
    }
   }
    //updateTrangthai
    public function updateDealership(Request $request )
    {
     if($request->ajax()){
         $kh = khachhang::find($request->input('id'));
         if( $kh ){
             if( Auth::user()->role == 'admin'){
                     $kh->user_id =$request->input('dearship');
                     $kh->save();
                     return 'ok';
             } else { return 'Bạn không đủ quyền'; }
         } else { return 'Khách hàng không tồn tại.'; }
     }
    }
    //add .
    public function getAdd()
    {
        $user = Auth::user()->role;
        
        if($user =='admin' || $user=='dealership'){
                return view('admin.khachhang.add');
        }
        else {
            Session::flash('flash_err','không có quyền truy cập .');
            return redirect()->route('dashbroad');
        }
        
    }

    public function Add(Request $request)
    {
            $user = Auth::user()->role;
            if($user =='admin' || $user=='dealership')
        {
            $rules= [
                    'mast'=>'required|max:10',
                    'tendv' =>'required|max:180',
                    'dcdkkd'=> 'required|max:300',
                    'nguoilienhe'=> 'required|max:180',
                    'email'=> 'required|email',
                    'dtdd'=> 'required',
                    ];
            $msg = [
                    'mast.required'=>'Không được bỏ trống mã số thuế gồm 10 số.',
                    'tendv.required'=>'Không được bỏ trống tên đơn vị.',
                    'dcdkkd.required'=>'Không được bỏ trống địa chỉ đăng ký kinh doanh.',
                    'nguoilienhe.required'=>'Không được bỏ trống người liên hệ.',
                    'email.required'=>'phải nhập đầy đủ đúng cú phap vd :example@gmail.com',
                    'dtdd.required'=>'Đề nghị nhập số điện thoại.',
                    ];
            $validator = Validator::make($request->all(), $rules , $msg);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            } else {
                $khachhang = new khachhang();
                $khachhang->mast = $request->input('mast');
                $khachhang->tendv = $request->input('tendv');
                $khachhang->dcdkkd = $request->input('dcdkkd');
                $khachhang->nguoilienhe = $request->input('nguoilienhe');
                $khachhang->email = $request->input('email');
                $khachhang->dtdd = $request->input('dtdd');
                $khachhang->dtb = $request->input('dtb');
                $khachhang->trangthai =$request->input('trangthai');
                $khachhang->user_id = Auth::user()->id;
                //Upload file
                if($request->hasFile('tailieu')){
                    $file = $request->file('tailieu');
                    $file_name = $file->getClientOriginalName();
                    $random_file_name = str_random(4).'_'.$file_name;
                    while(file_exists('upload/khachhangs/'.$random_file_name)){
                        $random_file_name = str_random(4).'_'.$file_name;
                    }
                    $file->move('upload/khachhangs',$random_file_name);
                    $khachhang->tailieu = 'upload/khachhangs/'.$random_file_name;
                } ;
                $khachhang->save();
            }
            return redirect()->route('list-khachhang');
        }
        else {
            Session::flash('flash_err','không có quyền truy cập .');
            // return redirect()->route('list-khachhang');
        }
    }

    //edit.
    public function getUpdate($id)
    {
        $kh = khachhang::find($id);
        if($kh){
                return view('admin.khachhang.edit',['kh'=>$kh]);
        }
        else {
            Session::flash('flash_err','Sai Thông tin Bài Viết.');
            return redirect()->route('list-khachhang');
        }
        
    }
    
    public function khachhangUpdate(Request $request,$id)
    {
            $khachhang = khachhang::find($id);
            $rules= [
                'mast'=>'required|max:10',
                'tendv' =>'required|max:180',
                'dcdkkd'=> 'required|max:300',
                'nguoilienhe'=> 'required|max:180',
                'email'=> 'required|email',
                'dtdd'=> 'required',
                ];
        $msg = [
                'mast.required'=>'Không được bỏ trống mã số thuế gồm 10 số.',
                'tendv.required'=>'Không được bỏ trống tên đơn vị.',
                'dcdkkd.required'=>'Không được bỏ trống địa chỉ đăng ký kinh doanh.',
                'nguoilienhe.required'=>'Không được bỏ trống người liên hệ.',
                'email.required'=>'phải nhập đầy đủ đúng cú phap vd :example@gmail.com',
                'dtdd.required'=>'Đề nghị nhập số điện thoại.',
                ];
        $validator = Validator::make($request->all(), $rules , $msg);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $khachhang->mast = $request->input('mast');
            $khachhang->tendv = $request->input('tendv');
            $khachhang->dcdkkd = $request->input('dcdkkd');
            $khachhang->nguoilienhe = $request->input('nguoilienhe');
            $khachhang->email = $request->input('email');
            $khachhang->dtdd = $request->input('dtdd');
            $khachhang->dtb = $request->input('dtb');
            $khachhang->trangthai = $request->input('trangthai');
            $khachhang->user_id = $request->input('user_id');
            //Upload file
            if($request->hasFile('tailieu')){
                $file = $request->file('tailieu');
                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4).'_'.$file_name;
                while(file_exists('upload/khachhangs/'.$random_file_name)){
                    $random_file_name = str_random(4).'_'.$file_name;
                }
                $file->move('upload/khachhangs',$random_file_name);
                $khachhang->tailieu = 'upload/khachhangs/'.$random_file_name;
            } ;
            $khachhang->save();
        }
        return redirect()->route('list-khachhang');
    }
            
        public function getDelete($id)
        {
            $khachhang = khachhang::find($id);
                if( $khachhang ){
                    if( Auth::user()->role == 'admin' ){
                        $khachhang->delete();
                        Session::flash('flash_success','Xóa thành công.');
                        return redirect()->route('list-khachhang');
        
                } else {
                    Session::flash('flash_err','Bài viết không tồn tại.');
                }
                return redirect()->route('list-khachhang');
        }
    }
}
