<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionMethod;
use App\Models\ChartOfAccount;
use App\Models\ExpenseType;
use App\Models\Expense;
use Illuminate\support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $data = Expense::orderby('id','DESC')->get();
        $types = ExpenseType::orderby('id','DESC')->get();
        $methods = TransactionMethod::orderby('id','DESC')->get();
        $coa = ChartOfAccount::orderby('id','DESC')->get();
        return view('admin.expense.index', compact('data','methods','types','coa'));
    }

    public function store(Request $request)
    {
        if(empty($request->expense_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Expense name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->expense_amount)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Expense amount \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        $data = new Expense;
        $data->expense_name = $request->expense_name;
        $data->expense_amount = $request->expense_amount;
        $data->expense_type_id = $request->expense_type_id;
        $data->transaction_method_id = $request->transaction_method_id;
        $data->expense_date = $request->expense_date;
        $data->expense_description = $request->expense_description;
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Create Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Expense::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {
        if(empty($request->expense_name)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Expense name \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }

        if(empty($request->expense_amount)){
            $message ="<div class='alert alert-warning'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill \"Expense amount \" field..!</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
            exit();
        }
        
        $data = Expense::find($request->codeid);
        $data->expense_name = $request->expense_name;
        $data->expense_amount = $request->expense_amount;
        $data->expense_type_id = $request->expense_type_id;
        $data->transaction_method_id = $request->transaction_method_id;
        $data->expense_date = $request->expense_date;
        $data->expense_description = $request->expense_description;
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {

        if(Expense::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Data deleted successfully']);
        }else{
            return response()->json(['success'=>false,'message'=>'Delete Failed']);
        }
    }
}
