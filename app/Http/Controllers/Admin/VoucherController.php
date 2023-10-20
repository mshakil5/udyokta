<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\TransactionMethod;
use App\Models\ChartOfAccount;
use Illuminate\support\Facades\Auth;

class VoucherController extends Controller
{
    public function debitVoucher()
    {
        $methods = TransactionMethod::orderby('id','DESC')->get();
        $data = Voucher::orderby('id','DESC')->get();
        $coa = ChartOfAccount::select('id','account_name')->orderby('id','DESC')->get();
        return view('admin.voucher.debit', compact('data','methods','coa'));
    }

    public function debitVoucherstore(Request $request)
    {
        if(empty($request->account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Head\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->sub_account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Sub Account Head \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->account_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }


        $data = new Voucher;
        $data->account_head = $request->account_head;
        $data->sub_account_head = $request->sub_account_head;
        $data->account_name = $request->account_name;
        $data->description = $request->description;
        $data->date = now();
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Create Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function debitVoucheredit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Voucher::where($where)->get()->first();
        return response()->json($info);
    }

    public function debitVoucherupdate(Request $request)
    {
        if(empty($request->account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Head\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->sub_account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Sub Account Head \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->account_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        $data = Voucher::find($request->codeid);
        $data->account_head = $request->account_head;
        $data->sub_account_head = $request->sub_account_head;
        $data->account_name = $request->account_name;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function debitVoucherdelete($id)
    {

        if(Voucher::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Data deleted successfully']);
        }else{
            return response()->json(['success'=>false,'message'=>'Delete Failed']);
        }
    }


    public function creditVoucher()
    {
        $methods = TransactionMethod::orderby('id','DESC')->get();
        $data = Voucher::orderby('id','DESC')->get();
        $coa = ChartOfAccount::select('id','account_name')->orderby('id','DESC')->get();
        return view('admin.voucher.credit', compact('data','methods','coa'));
    }

    public function creditVoucherstore(Request $request)
    {
        if(empty($request->account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Head\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->sub_account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Sub Account Head \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->account_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }


        $data = new Voucher;
        $data->account_head = $request->account_head;
        $data->sub_account_head = $request->sub_account_head;
        $data->account_name = $request->account_name;
        $data->description = $request->description;
        $data->date = now();
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Create Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function creditVoucheredit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Voucher::where($where)->get()->first();
        return response()->json($info);
    }

    public function creditVoucherupdate(Request $request)
    {
        if(empty($request->account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Head\" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->sub_account_head)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Sub Account Head \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->account_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Account Name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        $data = Voucher::find($request->codeid);
        $data->account_head = $request->account_head;
        $data->sub_account_head = $request->sub_account_head;
        $data->account_name = $request->account_name;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function creditVoucherdelete($id)
    {

        if(Voucher::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Data deleted successfully']);
        }else{
            return response()->json(['success'=>false,'message'=>'Delete Failed']);
        }
    }
}
