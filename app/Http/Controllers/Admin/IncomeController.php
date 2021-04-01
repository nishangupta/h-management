<?php

namespace App\Http\Controllers\Admin;

use App\Models\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function index(){
        $incomes = Billing::with(array('reservation' => function($query) {
            $query->select('id','fname','confirmation_number');
        }))->latest()->get();
        return view('admin.income.index',compact('incomes'));
    }

    // public function create(){
    //     return view('admin.income.create');
    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'title'=>'required|min:3',
    //         'description'=>'nullable',
    //         'price'=>'required',
    //     ]);

    //     $income = Income::create([
    //         'title'=>$request->title,
    //         'description'=>$request->description,
    //         'price'=>$request->price,
    //     ]);

    //     return redirect()->route('income.index')->with('success','Income created!');
    // }
    
    // public function show(Income $income){
    //     return view('admin.income.show',compact('income'));
    // }

    // public function edit(Income $income){
    //     return view('admin.income.edit',compact('income'));
    // }

    // public function update(Request $request,Income $income){
    //     $request->validate([
    //         'title'=>'required|min:3',
    //         'description'=>'nullable',
    //         'price'=>'required',
    //     ]);

    //     $income->update([
    //         'title'=>$request->title,
    //         'description'=>$request->description,
    //         'price'=>$request->price,
    //     ]);
        
    //     return redirect(route('income.index'))->with('success','income updated!');
    // }
    
    // public function destroy(Income $income){
    //     $income->delete();
    //     return redirect()->route('income.index')->with('success','income deleted');
    // }

    public function filter(Request $request){
        if($request->datepicker){
            $data = explode('-',$request->datepicker);
            $start = Carbon::parse($data[0]);
            $end = Carbon::parse($data[1]);
            
            $incomes = Billing::whereBetween('created_at',[$start,$end])->with(array('reservation' => function($query) {
                $query->select('id','fname','confirmation_number');
            }))->get();
        }else{
            $incomes = Billing::whereDay('created_at',Carbon::today())->with(array('reservation' => function($query) {
                $query->select('id','fname','confirmation_number');
            }))->get();
        }
        
        return view('admin.income.index',compact('incomes'));
    }
}
