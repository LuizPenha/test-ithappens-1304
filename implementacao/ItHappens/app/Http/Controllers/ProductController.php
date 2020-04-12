<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function productSearch(Request $request)
    {
       // return $request['branch'];
        //$description = \App\User::all();


        /*
        $bars_code = \DB::table('products')
            ->where('bars_code', 'LIKE', '%'.$request['value'].'%');

        $search = \DB::table('products')
            ->where('id', 'LIKE', '%'.$request['value'].'%')
            ->union($description)
            ->union($bars_code)
            ->get();*/
       // if($description){
        

           $ids = \App\Stock::where('branch_id', $request->get('branch'))->pluck('product_id')->toArray();
           $Products = \App\Product::whereIn('id', $ids)->get();
           //return dd($Products);
           $prod = array();
           $i=0;
            foreach($Products as $product){
                if(strstr($product->description, $request['name'])|| strstr($product->id, $request['name'])||strstr($product->bars_code, $request['name'])){
                    $flag = true;
                    $prod[$i] = \App\Product::where('description', trim($product->description))->first();
                    $qtd = \App\Stock::where('branch_id', $request->get('branch'))->where('product_id', $product->id )->first();
                    //return ($qtd);
                    $prod[$i]['qtd'] = $qtd['qtd'];
                    
                   $i++;
                }
            }

            /*$output = '<ul class="dropdown-menu order-dropdown" style="display:block; position:relative;overflow-x:auto;overflow-y:auto">';
            foreach($prod as $product){

                $output.= '<li><a href="#">'.$product->id.' - '.$product->bars_code.' - '.$product->description.' </a></li>';
            }
       // }
        $output .= '</ul>';
        echo $output; */

        if($prod)
        //info(dd($prod));
            return $prod;


        /*
        if(Product::where(''))
        if($request['select'] == "branch"){

            $employees = Employee::where('branch_id', $request['value'])->get();
            $dependent = 'Usuário';
            $output = '<option value="">Selecione o '.ucfirst($dependent).'</option>';
            foreach($employees as $employee)
            {
                $output.= '<option value="'.$employee->user_id.'"> 00'.$employee->user_id. ' - '.$employee->user->name.'</option>';
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
        */
        
    }
}
