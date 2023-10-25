<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\TransactionMethod;
use App\Models\ChartOfAccount;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class InvoiceController extends Controller
{
    public function store(Request $request){
        
        
        // new code
        $order = new Invoice();
        $order->date = $request->date;
        $order->description = $request->description;
        $order->transaction_method_id = $request->transaction_method_id;
        if ($request->invoice_type == "Income") {
            $order->income_type_id = $request->tran_cat_id;
        } else {
            $order->expense_type_id = $request->tran_cat_id;
        }
        
        $order->net_amount = $request->net_amount;
        $order->total_amount = $request->total_amount;
        $order->discount = $request->discount;
        $order->vat = $request->vat;
        $order->voucher_type = $request->voucher_type;
        $order->invoice_type = $request->invoice_type;
        $order->created_by = Auth::user()->id;
        if($order->save()){
            foreach($request->input('chart_of_account_id') as $key => $value)
            {
                $orderDtl = new InvoiceDetail();
                $orderDtl->invoice_id = $order->id;
                $orderDtl->chart_of_account_id = $request->get('chart_of_account_id')[$key];
                $orderDtl->comment = $request->get('comment')[$key];
                $orderDtl->ref = $request->get('ref')[$key];
                $orderDtl->amount = $request->get('amount')[$key];
                $orderDtl->created_by = Auth::user()->id;
                $orderDtl->save();

                $data = new Transaction();
                $data->invoice_id = $order->id;
                
                if ($request->invoice_type == "Income") {
                    $data->tran_type = "Income";
                } else {
                    $data->tran_type =  "Expense";
                }
                
                $data->transaction_method_id = $request->transaction_method_id;
                $data->chart_of_account_id = $request->get('chart_of_account_id')[$key];
                $data->comment = $request->get('comment')[$key];
                $data->ref = $request->get('ref')[$key];
                $data->amount = $request->get('amount')[$key];
                $data->created_by = Auth::user()->id;
                $data->save();
                
            }
            
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Invoice create successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }

    }

    public function showInvoice($id)
    {
        $data = Invoice::with('invoicedetail')->where('id', $id)->first();
        return view('admin.invoice.index', compact('data'));
    }
}
