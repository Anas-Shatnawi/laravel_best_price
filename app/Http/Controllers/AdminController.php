<?php

namespace App\Http\Controllers;

use App\Products;
use App\Categories;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('role:superadministrator');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // ---------------------------- { Products functions } ----------------- 
    // view all products table
    public function index()
    {
        $products = Products::all();
        $categories = DB::table('categories')
        ->get();
        return view('admin.products', compact('products', 'categories'));
    }
    
    // add product view
    public function getProduct()
    {
        $categories = Categories::all();
        return view('admin.addProduct', compact('categories'));
    }
    
    // add product to database
    public function postProduct(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        // validate input field
        $request->validate([
            'productName' => 'required',
            'price' => 'required',
            'categorey' => 'required',
            'image' => 'required',
        ]);

        $query = DB::table('products')->insert([
            'id' => null,
            'name' => $request->input('productName'),
            'cate_id' => $request->input('categorey'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'rating' => 5,
            'description' => $request->input('description'),
            'sold_quantity' => 0,
            'created_date' => $date,
        ]);
        if ($query) {
            return back()->with('success', 'Data has been inserted');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
    }

    // edit product view
    public function getEditProduct($id)
    {
        // product info
        $row = DB::table('products')->where('id', $id)->first();
        // categories table
        $categories = Categories::all();
        // extract gategorey name
        $category_name = DB::select('select * from categories where category_id = :id', ['id' => $row->cate_id]);
        return view('admin.editProduct', compact('row', 'categories', 'category_name'));
    }
    
    // update product data in the database
    public function postEditProduct(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        $request->validate([
            'productName' => 'required',
            'price' => 'required',
            'categorey' => 'required',
            'image' => 'required',
        ]);
        $updating = DB::table('products')
        ->where('id', $request->input('id'))
        ->update([
            'id' => $request->input('id'),
            'name' => $request->input('productName'),
            'cate_id' => $request->input('categorey'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
            'created_date' => $date,
        ]);
        return redirect('manage/products-table');
    }
    
    // ---------------------------- { End of Products functions } -----------------

   
    // ---------------------------- { Categories functions } ----------------- 
    // view all categories table
    public function getCategory()
    {
        $categories = Categories::all();
        return view(' admin.categoriesTable', compact('categories'));
    }
    
    // view add categorey
    public function getAddCategory()
    {
        return view('admin.addCategory');
    }
    
    // insert categorey to database 
    public function postAddCategory(Request $request)
    {
        $query = DB::table('categories')->insert([
            'category_id' => null,
            'category_name' => $request->input('category_name'),
            'image' => $request->input('image'),
        ]);
        
        return redirect('/manage/categories-table');
    }
    
    // view Edit categorey
    public function getEditCategory($id)
    {
        $row = DB::table('categories')->where('category_id', $id)->first();
        return view('admin.editCategory', compact('row'));
    }
    
    // update data in the datbase
    public function postEditCategory(Request $request)
    {
        $query = DB::table('categories')->where('category_id', $request->input('id'))->update([
            'category_id' => $request->input('id'),
            'category_name' => $request->input('categoryName'),
            'image' => $request->input('image'),
        ]);
        return redirect('/manage/categories-table');
    }
    // ---------------------------- { End of Categories functions } ----------------- 
    
   
    // ---------------------------- {  Coupons functions } ----------------- 
    // view all coupons table
    public function getCoupon()
    {
        $coupons = DB::table('coupons')->get();
        return view('admin.CouponsTable', compact('coupons'));
    }
    
    // view add coupon
    public function getAddCoupon()
    {
        return view('admin.addCoupon');
    }
    
    // insert coupon to database
    public function postAddCoupon(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        $query = DB::table('coupons')->insert([
            'coupon_id' => null,
            'coupon_name' => $request->input('couponName'),
            'coupon_code' => $request->input('coupon_code'),
            'coupon_amount' => $request->input('coupon_amount'),
            'discount_type' => $request->input('discount_type'),
            'expiry_date' => $request->input('expiry_date'),
            'maximum_spend' => $request->input('maximum_spend'),
            'minimum_spend' => $request->input('minimum_spend'),
            'only_for_user' => $request->input('only_for_user'),
            'only_for_product' => $request->input('only_for_product'),
            'usage_limit' => $request->input('usage_limit'),
            'created_date' => $date,
        ]);
        return redirect('/manage/coupons-table');
    }
    
    // view edit coupon
    public function getEditCoupon($id)
    {
        $row = DB::table('coupons')->where('coupon_id', $id)->first();
        return view('admin.editCoupon', compact('row'));
    }

    // update data in the database
    public function postEditCoupon(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        $query = DB::table('coupons')->where('coupon_id', $request->input('id'))->update([
            'coupon_id' => $request->input('id'),
            'coupon_name' => $request->input('couponName'),
            'coupon_code' => $request->input('coupon_code'),
            'coupon_amount' => $request->input('coupon_amount'),
            'discount_type' => $request->input('discount_type'),
            'expiry_date' => $request->input('expiry_date'),
            'maximum_spend' => $request->input('maximum_spend'),
            'minimum_spend' => $request->input('minimum_spend'),
            'only_for_user' => $request->input('only_for_user'),
            'only_for_product' => $request->input('only_for_product'),
            'usage_limit' => $request->input('usage_limit'),
            'created_date' => $date,
        ]);
        return redirect('/manage/coupons-table');
    }
    // ---------------------------- {  End of Coupons functions } ----------------- 
    
    
    // ---------------------------- {  Locations functions } ----------------- 
    // view location table
    public function getLocation()
    {
        $locations = DB::table('locations')->get();
        return view('admin.LocationTable', compact('locations'));
    }

    // add location view
    public function getAddLocation()
    {
        return view('admin.addLocation');
    }

    // insert data to database
    public function postAddLocation(Request $request)
    {
        $date = Carbon::now();
        $date->toDateString();
        $query = DB::table('locations')->insert([
            'id' => null,
            'city' => $request->input('location_city'),
            'street' => $request->input('location_street'),
            'created_date' => $date,
        ]);
        return redirect('/manage/locations-table');
    }
    
    // edit location view
    public function getEditLocation($id)
    {
        $row = DB::table('locations')->where('id', $id)->first();
        return view('admin.editLocation', compact('row'));
    }

    // update data in the database
    public function postEditLocation(Request $request)
    {
        $query = DB::table('locations')->where('id', $request->input('id'))->update([
            'id' => $request->input('id'),
            'city' => $request->input('city'),
            'street' => $request->input('street')
        ]);
        return redirect('/manage/locations-table');
    }
    // --------------{End of Locations functions}-------


    // --------------{Users functions}----------------------
    // view all users table
    public function getUsers()
    {
        $users = User::All();
        $roles = DB::select("SELECT a.role_id ,a.user_id,c.name from role_user a,users b , roles c WHERE a.role_id = c.id and b.id = a.user_id ");
        return view('admin.usersTable',compact('users','roles'));
    }
    
    // edit user
    public function getEditUser($id)
    {
        $row = DB::table('users')->where('id', $id)->first();
        $roles=DB::table('roles')->get();
        // $userRole = DB::select("SELECT a.role_id from role_user a,users b , roles c WHERE a.role_id = c.id and b.id =:id ",['id' => $id]);
        $userRole =DB::table('roles')
            ->join('role_user', 'role_user.role_id', '=', 'roles.id')
            ->select('role_user.role_id','roles.*')
            ->where('role_user.user_id', '=', $id)
            ->get();
        return view('admin.editUser', compact('row','userRole','roles'));
    }

    // update data in the database
    public function postEditUser(Request $request)
    {
        $query = DB::table('users')->where('id', $request->input('id'))->update([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'phoneNumber' => $request->input('phoneNumber'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'email' => $request->input('email'),
        ]);
        $roleQuery=DB::table('role_user')->where('user_id',$request->input('id'))
        ->update([
            'role_id'=>$request->input('roles')
        ]);
        return redirect('/manage/users-table');
    }

    // --------------{End of Users functions}-------
    
    // --------------{ Users Orders functions}-------
    
    public function getUsersOrders(){
       $usersOrders =DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('products.*','products.name as product_name','orders.*','users.name')
        ->get();
        
        return view('admin.ordersUsers',compact('usersOrders'));
    }
    // --------------{ End of Users Orders functions}-------
    
    
    // -------{ DELETE FUNCTIONS }------------
    // delete product
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Product Deleted Successfully'
        ]);
    }
    
    // delete coupon 
    public function deleteCoupon($id)
    {
        $coupon = DB::table('coupons')->where('coupon_id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Coupon Deleted Successfully'
        ]);
    }

    // delete categorey
    public function deleteCategory($id)
    {
        $category = DB::table('categories')->where('category_id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Category Deleted Successfully'
        ]);
    }
        
    // delete location
    public function deleteLocation($id)
    {
        $location = DB::table('locations')->where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Location Deleted Successfully'
        ]);
    }

    // delete user
    public function deleteUser($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Location Deleted Successfully'
        ]);
    }

    // -------{ End of DELETE FUNCTIONS }------------
}
