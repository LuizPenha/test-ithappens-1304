<?php

namespace App\Http\Controllers;

use App\Order;
use App\Branch;
use App\Employee;
use Illuminate\Http\Request;
use App\Stock;
use App\User;
use \Faker\Generator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with('branch')->with('client')->with('employee')->get();
        return view('ith.order_index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        $type = $request['type'];
        $branch_list = Branch::all();
        return view('ith.order_create', compact('branch_list','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {   $data = $request;
       // return $data;
        //return dd($request);  
        $faker = \Faker\Factory::create();
        if($data['order-check'] == '2'){
            $employee = Employee::where('id',$request->get('employee'))->first();
            $type = $data['order-check'];
            $observation = $data['observation'];
            $branch = Branch::where('id',$data['branch'])->first();
            //return $branch;
            
            //return $employee;
            $users = User::where('type_id', 3)->get();
            //return $users;
            if(strpos($data['client'], '-' ) > 0)
            $data['client'] = substr(strstr($data['client'], '-'),1);
            $clientName = trim($data['client']);
            $flag=false;
            //return $clientName;
            foreach($users as $user){
                if(strstr($user->name, $clientName)){
                    $flag = true;
                    $client = User::where('name', trim($user->name))->first();
                }
            }
        //return $client;
          //  return dd($flag);
            if($flag==false)
                $client = User::create([
                                'type_id'=> 3,
                                'name'=> trim($clientName),
                                'email'=>$faker->unique()->safeEmail,
                            ]);
            //return $client;
            // //return $clientName;
            // $new = collect($users)->filter(function ($user) use ($clientName) {
            //     // replace stristr with your choice of matching function
            //     return false !== stristr($user->name, $clientName);
            // });

            // return $new;
            // if(strpos($data['client'], '-' ) > 0)
            //     $data['client'] = substr(strstr($data['client'], '-'),1);
            //    // return $data['client'];
            //     $name = $data['client'];
            // $exist = User::where('name', 'LIKE', "%".$data['client']."%")->where('type_id', 3 )->exists();
            // return dd($exist);
            // $client = $exist == true ? User::where('name', 'LIKE','%'.$data['client'].'%')->where('type_id', 3 )->get() : 
            //             User::create([
            //                 'type_id'=> 3,
            //                 'name'=> $data['client'],
            //                 'email'=>$faker->unique()->safeEmail,
            //                 ]);
            //return $employee->id;
            $order = Order::create([

                'type_id'=> $type,
                'observation'=> $observation,
                'branch_id'=> $branch->id,
                'employee_id'=> $employee->id,
                'client_id'=> $client->id,
            ]);
            //return $order;
            if($order){
                unset($data);
                //info($order);   
                //return App\View::make('ith.choice_products')->with('order', $order);
                return redirect()->route('choice.products', [$order]);
                return route('choice.products',['order'=>$order]);
                return view('ith.choice_products', compact('order'));
            }
        }
        if($request['order-check'] == '1'){
            return $request;

        }
        // $branch = Branch::where('id', $request['branch'])
        // $validator = Validator::make(
        //     ['branch' => 'Dayle'],
        //     ['Employee' => 'required|min:5'],
        //     ['Employee' => 'required|min:5'],
        //     ['Employee' => 'required|min:5'],

        // );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        if($request['select'] == "branch"){

            $employees = Employee::where('branch_id', $request['value'])->get();
            $dependent = 'Usuário';
            $output = '<option value="">Selecione o '.ucfirst($dependent).'</option>';
            foreach($employees as $employee)
            {
                $output.= '<option value="'.$employee->id.'"> 00'.$employee->id. ' - '.$employee->user->name.'</option>';
            }
        }

        if($request['select'] == "employee"){   

            $employees = Employee::where('branch_id', $request['value'])->get();
            $stock= Stock::where('branch_id', Branch::where('id', ));
            $dependent = 'Produto';
            $output = '<option value="">Selecione o '.ucfirst($dependent).'</option>';
            foreach($employees as $employee)
            {
                $output.= '<option value="'.$employee->id.'">'.$employee->user->name.'</option>';
            }
        }

        echo $output;
    }

    public function choiceProducts($orderNumber){
            //return $orderNumber;
            $order = Order::where('id', $orderNumber)->first();
        return view('ith.choice_products',compact('order',$order));
    }
}

