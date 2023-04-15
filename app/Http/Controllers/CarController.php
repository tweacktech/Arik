<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class CarController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  // cars
  public function getcars(Request $req)
  {
    
    return view('manage_cars');
  }

  public function addcar(Request $req)
  {
    $id = DB::table('cars')->get()->count() + 1;
    $file = $req->file('car_image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/cars'), $file_name);

    $data = [
      'id' => md5($id),
      'name' => $req->name,
      'img_url' => $file_name,
      'brand_id' => $req->brand_id,
      'createdAt' => Carbon::now(),
      'updatedAt' => Carbon::now(),
    ];

    $addcar = DB::table('cars')->insert($data);
    if ($addcar) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car was added by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);
      return redirect()->route('getcars');
    }
    return redirect()->route('getcars');
  }




  public function unhidecar(Request $req, $id)
  {
    $update = DB::table('cars')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->route('getcars');
    }
    return redirect()->route('getcars');
  }

  public function hidecar(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cars')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->route('getcars');
    }
    return redirect()->route('getcars');
  }

  public function deletecar(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cars')->where('id', $id)->update(['status' => '2']);
    if ($update) {
      return redirect()->route('getcars');
    }
    // return redirect()->route('getcars');
  }

  public function editcarpage($id)
  {
    $car = DB::table('cars')
      ->leftjoin('brands', 'brands.id', '=', 'cars.brand_id')
      ->where('cars.id', $id)
      ->select('brands.name as brand_name', 'brands.id as brandid', 'cars.name as car_name', 'cars.img_url as img_url', 'cars.createdAt', 'cars.img_url', 'cars.status', 'cars.id')
      ->orderBy('createdAt', 'desc')
      ->first();


    return view('editcarpage', compact('car'));
  }

  public function EditSubModelPage($id)
  {
    $model = DB::table('models')
      ->where('id', $id)
      ->first();


    return view('editSubModelPage', compact('model'));
  }

  public function editcar(Request $req, $id)
  {

    $file = $req->file('car_image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/cars'), $file_name);

    $data = [
      'id' => $id,
      'name' => $req->name,
      'img_url' => $file_name,
      'brand_id' => $req->brand_id,
      'createdAt' => Carbon::now(),
      'updatedAt' => Carbon::now(),
    ];

    $addcar = DB::table('cars')
      ->where('id', $id)
      ->update($data);
    if ($addcar) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car was edited by by' . Auth::user()->name,
          'activity_type' => 'Edit'
        ]);
      return redirect()->route('getcars');
    }
    return redirect()->route('getcars');
  }

  public function editmodel(Request $req, $id)
  {

    $file = $req->file('model_image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/models'), $file_name);

    $data = [
      'id' => $id,
      'name' => $req->name,
      'img_url' => $file_name,
      'year' => $req->year,
      'year_2' => $req->year_2,
      'car_id' => $req->car_id,
      'createdAt' => Carbon::now(),
      'updatedAt' => Carbon::now(),
    ];

    $addcar = DB::table('models')
      ->where('id', $id)
      ->update($data);
    if ($addcar) {
      DB::table('activities')
        ->insert([
          'activity' => ' a model was edited by' . Auth::user()->name,
          'activity_type' => 'Edit'
        ]);
      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }



  // brand
  public function getbrands(Request $req)
  {
        return view('manage_brands');
  }

  public function addbrand(Request $req)
  {
    $id = DB::table('brands')->get()->count() + 1;
    $file = $req->file('brand_image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/brands'), $file_name);

    $data = [
      'id' => md5($id),
      'name' => $req->name,
      'img_url' => $file_name,
      'slug' => $req->slug,
      'createdAt' => Carbon::now(),
      'updatedAt' => Carbon::now(),
    ];

    $addcar = DB::table('brands')->insert($data);
    if ($addcar) {

      DB::table('activities')
        ->insert([
          'activity' => ' a brand was edited by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->route('getbrands');
    }
    return redirect()->route('getbrands');
  }

  public function unhidebrand(Request $req, $id)
  {
    $update = DB::table('brands')->where('id', $id)->update(['status' => '1']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'a car was added by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->route('getbrands');
    }
    return redirect()->route('getbrands');
  }

  public function hidebrand(Request $req, $id)
  {

    $update = DB::table('brands')->where('id', $id)->update(['status' => '0']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'a brand was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);

      return redirect()->route('getbrands');
    }
    return redirect()->route('getbrands');
  }

  public function deletebrand(Request $req, $id)
  {
    $update = DB::table('brands')->where('id', $id)->update(['status' => '2']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'a brand was deleted by' . Auth::user()->name,
          'activity_type' => 'delete'
        ]);

      return redirect()->route('getbrands');
    }
    return redirect()->route('getbrands');
  }

  public function editbrandpage($id)
  {
    $brand = DB::table('brands')
      ->where('id', $id)
      ->first();
    return view('editbrand', compact('brand'));
  }

  public function editbrand(Request $req, $id)
  {

    $file = $req->file('img_url');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/brands'), $file_name);

    $data = [
      'id' => $id,
      'name' => $req->name,
      'img_url' => $file_name,
      'slug' => $req->slug,
      'createdAt' => Carbon::now(),
      'updatedAt' => Carbon::now(),
    ];

    $addcar = DB::table('brands')->where('id', $id)->update($data);
    if ($addcar) {

      DB::table('activities')
        ->insert([
          'activity' => 'a brand was edited by' . Auth::user()->name,
          'activity_type' => 'Edit'
        ]);

      return redirect()->route('getbrands');
    }
    return redirect()->route('editbrandpage');
  }


  // car model
  public function getcarmodels(Request $req)
  {
    $models = DB::table('models')
      ->leftjoin('cars', 'cars.id', '=', 'models.car_id')
      ->leftjoin('brands', 'brands.id', '=', 'cars.brand_id')
      ->where('models.status', '<>', '2')
      ->orderBy('brands.name')
      ->select('models.id', 'models.img_url', 'models.year', 'models.year_2', 'models.status', 'brands.name as brandname', 'models.name', 'models.createdAt')

      ->get();
    return view('manage_carmodel', compact('models'));
  }

  public function addcarmodel(Request $req)
  {

    $file = $req->file('img_url');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/models'), $file_name);

    $data = [

      'name' => $req->name,
      'img_url' => $req->file_name,
      'slug' => $req->slug,
      'year' => $req->year,
      'year_2' => $req->year_2,
      'car_id' => $req->car_id,

    ];

    $addcar = DB::table('models')->insert($data);
    if ($addcar) {

      DB::table('activities')
        ->insert([
          'activity' => 'a model was added by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }

  public function unhidecarmodel(Request $req, $id)
  {
    $update = DB::table('models')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a model was unhidden by by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);
      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }

  public function hidecarmodel(Request $req, $id)
  {

    $update = DB::table('models')->where('id', $id)->update(['status' => '0']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'hide a model',
          'activity_type' => 'hide'
        ]);

      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }

  public function deletecarmodel(Request $req, $id)
  {
    $update = DB::table('models')->where('id', $id)->update(['status' => '2']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a model was deleted by' . Auth::user()->name,
          'activity_type' => 'delete'
        ]);

      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }

  public function addSubModel(Request $req, $id)
  {
    $submodels = DB::table('sub_model')
      ->where('status', '<>', '2')
      ->where('model_id', $id)
      ->orderBy('createdAt', 'desc')
      ->get();

    $modelID = $id;


    return view('addSubModel', compact('submodels', 'modelID'));
  }

  public function createSubModel(Request $req)
  {

    $data = [
      'sub_model_title' => $req->name,
      'model_id' => $req->modelID,

    ];

    $add = DB::table('sub_model')->insert($data);
    if ($add) {

      DB::table('activities')
        ->insert([
          'activity' => 'a sub-model was created by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);
      return redirect()->route('getcarmodels');
    }
    return redirect()->route('getcarmodels');
  }



  // car getmanufacturers
  public function getmanufacturers(Request $req)
  {
    $makers = DB::table('salers')
      ->where('status', '<>', '2')
      ->orderBy('createdAt', 'desc')
      ->get();
    return view('manage_manufacturers', compact('makers'));
  }

  public function addmanufacturer(Request $req)
  {

    $file = $req->file('img_url');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/salers'), $file_name);

    $data = [

      'name' => $req->name,
      'image' => $file_name,

    ];

    $addcar = DB::table('salers')->insert($data);
    if ($addcar) {

      DB::table('activities')
        ->insert([
          'activity' => 'a car manufacturer was added by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->route('getmanufacturers');
    }
    return redirect()->route('getmanufacturers');
  }

  public function unhidemanufacturer(Request $req, $id)
  {
    $update = DB::table('salers')->where('id', $id)->update(['status' => '1']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'a car manufacturer was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->route('getmanufacturers');
    }
    return redirect()->route('getmanufacturers');
  }

  public function hidemanufacturer(Request $req, $id)
  {

    $update = DB::table('salers')->where('id', $id)->update(['status' => '0']);
    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'a car manufacturer hidden by by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);

      return redirect()->route('getmanufacturers');
    }
    return redirect()->route('getmanufacturers');
  }

  public function deletemanufacturer(Request $req, $id)
  {
    $update = DB::table('salers')->where('id', $id)->update(['status' => '2']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car manufacturer was deleted by' . Auth::user()->name,
          'activity_type' => 'delete'
        ]);

      return redirect()->route('getmanufacturers');
    }
    return redirect()->route('getmanufacturers');
  }

  public function editmanufacturerpage($id)
  {
    $manufacturer = DB::table('salers')->where('id', $id)->first();
    return view('edit_manufacturer', compact('manufacturer'));
  }

  public function editmanufacturer(Request $req, $id)
  {

    $file = $req->file('img_url');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/salers'), $file_name);

    $data = [

      'name' => $req->name,
      'image' => $file_name,

    ];

    $addcar = DB::table('salers')
      ->where('id', $id)
      ->update($data);
    if ($addcar) {
      DB::table('activities')
        ->insert([
          'activity' => 'a car manufacturer was edited by' . Auth::user()->name,
          'activity_type' => 'add'
        ]);

      return redirect()->route('getmanufacturers');
    }
    //return redirect()->route('getmanufacturers');
  }
  public function getcarsubmodels(Request $req)
  {
    $models = DB::table('models')
      ->leftjoin('cars', 'cars.id', '=', 'models.car_id')
      ->leftjoin('brands', 'brands.id', '=', 'cars.brand_id')
      ->where('models.status', '<>', '2')
      ->orderBy('createdAt', 'desc')
      ->select('models.id', 'models.img_url', 'models.year', 'models.status', 'brands.name as brandname', 'models.name', 'models.createdAt',)
      ->get();
    return view('manage_carmodel', compact('models'));
  }
}
