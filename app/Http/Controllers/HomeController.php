<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        //get 8 recent activities
        $activities = DB::table('activities')
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
      
     	return view('home', compact( "activities"));
        
    }

    public function manage_stock(){

        

        return view('manage_stock');
    }
  
  public function make_sales(){
    
    return view('pos.make_sales');
  }
  
  public function poscheckout(Request $req){
      $netTotal = $req->netTotal;
      $user_id = Auth::user()->id;
			$method = $req->method;


                // Available alpha caracters
      //     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      //     // generate a pin based on 2 * 7 digits + a random character
          $pin = mt_rand(100, 999)
              . mt_rand(10, 99);

      //     // shuffle the result
          $string = str_shuffle($pin);

          $data = [
            'sales_transaction_id' => $string,
            'store_id' => 1,
            'user_id' => $user_id,
            'payment_method' => $method,
            'total_amount' => $netTotal,
          ];
 
      //   //create sales ID  store_sales
        $store_sales = DB::table('store_sales')
        ->insert($data);


      // //get the cart
      $getCarts = DB::table('user_carts')
				->join('parts', 'parts.id', 'user_carts.product_id')
				->where('user_id',  $user_id)
				->get();

        
        

      foreach($getCarts as $getCart){

        //get balance quantity_balance
        $balance = DB::table('store_stock_transactions')
        ->where('part_id',  $getCart->id)
         ->orderby('store_stock_id', 'DESC')
        ->first();


          //insert into store_stock_transactions
          $data =[
            'type' => 'sales', 
            'store_id' => 1,
            'part_id' => $getCart->id,
            'user_id' => $user_id,
            'price' => $getCart->price,
            'sub_total' => $getCart->price * $getCart->quantity,
            'quantity' => $getCart->quantity,
            'quantity_balance' => $balance->quantity_balance - $getCart->quantity,
            'sales_transaction_id' => $string,
          ];

          $insert = DB::table('store_stock_transactions')
          ->insert($data);
      }

      if($insert){
          $empty = DB::table('user_carts')
          ->where('user_id',  $user_id)
          ->delete();

          echo "Cheackout Successfull";
      }
  }

  public function posaddtocart(Request $req){
      $search_article = $req->search_article;

      if($search_article){
        $parts = DB::table('parts')
				->where('EAN',  $search_article)
        ->orwhere('article_number',  $search_article)
				->first();

        if($parts){
          $part_id = $parts->id;

          //chk if its in stock or not
          $balance = DB::table('store_stock_transactions')
          ->where('part_id',  $part_id)
          // ->orderby('store_stock_id', 'DESC')
          ->first();
  
          if($balance){
            if($balance->quantity_balance > 0){
                //add to cart
                //chk if the product exist in the cart or not
                $chk = DB::table('user_carts')
                ->where('product_id',  $part_id)
                ->first();

                if($chk){
                    echo "Product already in the cart";
                }else{
                   //add
                   $data = [
                      'user_id' => Auth::user()->id,
                      'product_id' => $part_id,
                      'quantity' => 1,
                   ];

                  $add = DB::table('user_carts')
                  ->insert($data);

                   if($add){
                      echo "Added to cart Successfully";
                   }else{
                      echo "Could not add to cart";
                   }
                }

            }else{
              echo 'This product is out of Stock';
            }
          }else{
            echo 'This product is not in Stock';
          }
         

        }else{
          echo "Sorry i can not find this product";
        }
        

      }else{
        echo "Type Article Number";
      }
  }

  public function getCurentSales(Request $req){
    echo '
    <div style="width:100%" class="m-2 btn btn-outline btn-outline-dashed btn-outline-default p-2  mb-1" id="sales_cart">
				 <div id="content" class="col-md-12" style="width:100%">
              <h2 class="title">Shopping Cart</h2>
    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
    <!--begin::Head-->
  <thead class="fs-7 text-gray-400 text-uppercase" style="background-color: navy; color: #fff;">
    <tr>
      <th></th>
      <th>QTY</th>
      <th></th>
      <th>Product</th>
      <th>Price</th>
      <th>Total</th>
      
    </tr>	
  </thead>
    <tbody class="fs-6" >';
   
																$grand =0;
																	
																	$getCart = DB::table('user_carts')
																	->join('parts', 'parts.id', 'user_carts.product_id')
																	->where('user_id', Auth::user()->id)
																	->get();

																$d ='';

																foreach($getCart as $gcat){
                                  $d.='<tr>
																	<td><b><button onclick="minus_quantity()" style="color:#fff background-color:nevy;">-</button></b></td>
																	<td><b><input style="width:50px" type="number" value="'.$gcat->quantity.'"></b></td>
																	<td><b><button onclick="add_quantity()" style="color:#fff background-color:nevy;">+</button></b></td>
																	<td><b>'.$gcat->name.'</b></td>
																	<td><b>N'.number_format($gcat->quantity * $gcat->price,2).'</b></td>
																	<td><b>total</b></td>
																   <input type="hidden" value="id" id=""/>
															   </tr>';
															  

																	$grand = $grand + ($gcat->quantity * $gcat->price);
                                }
															  
					
              echo $d;
    echo'</tbody>
  </table>
  <input type="hidden" value="'.$grand.'" id="netTotal"/>
  </div>

  
  <br/><p><p>Net Total: N'.number_format($grand,2).'</b></p>

  <div class="col-md-12">
     <div class="col-md-6" >
       <select id="method" class="form-control" style="width:460px;margin-top:10px">
         <option>---- Select Payment Method ----</option>
         <option>Cash</option>
         <option>Bank Transfer</option>
         <option>POS</option>
       </select>
       <button  onclick="checkout()" style="width:460px; margin-top:10px" class="btn btn-info">Cheack out</button>
     </div>

   
  </div>


  </div>';
  }

  public function load_sub_categories(Request $req){
    echo $req->catId;
  }

  public function sales_history(){
    return view('pos.sales_history');
  }

  public function view_stock(){
    return view('pos.view_stock');
  }

  public function getTotalSales(){
    return view('pos.viewTotalSales');
  }
  
  public function print(){
    return view('pos.print');
  }
  
  public function sales_output(){
    return view('pos.sales_output');
  }
  
   
}
