<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Hash;
use App\Models\Customer;
use App\Models\Centers;
use App\Models\NucAmin;
use App\Models\Centersusers;


use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class APIAuthController extends Controller
{
  
  
   public function banks(Request $req){
    $banks = DB::table('banks')
      
          ->get();
          
          return response()->json(['banks' => $banks], 200);
  }
  
  public function AddBank(Request $req){
      $chk = DB::table('banks')
       ->where('bank_name', $req->name)
      ->orwhere('state_code', $req->code)
      ->count();
      

      
      if($chk == 0){
        $data = [
        
     	'bank_name' => $req->name,
        'state_code' => $req->code,
       
       ];
      
      $addCenter = DB::table('banks')
       ->insert($data);
      
      if($addCenter){
        return response()->json(['result' => 'Bank Added Successfully'], 200);
      }else{
        return response()->json(['result' => 'Something went wrong, Please try Again'], 201);
      }
      
      
		
      }else{
        return response()->json(['result' => 'Already Exist'], 203);
      }
     
       
    }
  
  
  
  
  
  
  
  
    public function register(Request $req){
      
      	$name = $req->name;
      	$address = $req->address;
      	$phone = $req->phone;
      	$password = $req->password;
      	$email = $req->email;
        
        $data = [
          'name' => $name,
          'address' => $address,
          'phone' => $req->phone,
          'password' => Hash::make($password),
          'email' => $email,
          
        ];
      
      	$chk = DB::table('customers')
          ->where('email', $email)
          ->count();
      
      	if($chk > 0){
           return response()->json(['message' => 'Email already used, Please use another email'], 201);
        }
      
      
      	$chk = DB::table('customers')
          ->where('phone', $phone)
          ->count();
      
      
      	if($chk > 0){
           return response()->json(['message' => 'Phone Number already used, Please use another email'], 201);
        }
      
      
      	$register = DB::table('customers')
         ->insert($data);
        
      
        if($register){
            return response()->json(['message' => 'Registered Successfully','status' => 'account is pending please verify your account'], 200);
        }
      
        return response()->json(['message' => 'Registered Unsuccessfully'], 201);

       
    }
  
  

    public function login(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Customer::where('email', $fields['email_phone'])->first();
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Customer::where('phone', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
      if($user->email_verified_at == null || $user->email_verified_at == ""){
        return response(['message' => $user, 'barear_token' => $token, 'status', 'Verify Your Account'], 200);
      }
      return response(['message' => $user, 'barear_token' => $token], 200);
    }
  

    public function verify_account(Request $req){
       
        //$user = auth('sanctum')->user();

       // if($user->token == $req->token ){
          
           // DB::table('customers')->where('id', $user->id)
           // ->update(['email_verified_at' => '1']);
           // return response()->json(['message' => 'Account Verified Successfully'],200);
      //  }
        
      
      $chk = DB::table('customers')
        ->where('email', $req->email)
       ->where('token', $req->otp)
        ->count();
      
      if($chk > 0){
        DB::table('customers')
          ->where('email', $req->email)
         ->update(['email_verified_at' => '1']);
        return response()->json(['message' => 'Account Verivied Successfully'],200);
      }else{
        return response()->json(['message' => 'Code does not match'],201);
      }
        
        
    }

    public function reset_password(Request $req){
      $user = DB::table('customers')
      ->where(['email' => $req->email, 'otp' => $req->otp])
      ->first();

      if($user){
          $update_password = DB::table('customers')
          ->where(['email' => $req->email, 'otp' => $req->otp])
          ->update(['password' => Hash::make($req->password)]);

          if($update_password){
            return response()->json(['message' => 'Password Updated Successfully'], 200);
          }
             return response()->json(['message' => 'Failed To Update Password'], 201);
      }
    }

    public function forget_password(Request $req){
      $user = DB::table('customers')
      ->where('email', $req->email)
      ->first();

      if(!$user){
        return response()->json(['message' => 'email does not exist'], 201);
      }

      $otp = rand(111111,999999);

      $generate_otp = DB::table('customers')
      ->where('id', $user->id)
      ->update(['otp' => $otp]);

      if($generate_otp){
        return response()->json(['otp' => $otp], 200);
      }
      return response()->json(['message' => 'couldnt generate otp'], 201);
    }
  
  
  
  
  
  //NUC
   public function centerlogin(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Centers::where('email', $fields['email_phone'])->first();
     
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Centers::where('phone_number', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
     
     
     $user = DB::table('centers')
       ->where('email', $req->email)
       ->first();
     
     //$data = [
     //  'center_otp':'12345',
     //];
     
     //$user = Centers::where('email', $fields['email_phone'])->update($data);
      
     return response(['message' => $user, 'barear_token' => $token], 200);
      
    }
  
  
  
   public function centerUserlogin(Request $req){
      $fields = [
        'email_phone' => $req->email,
        'password' => $req->password,
      ];

      $user = Centersusers::where('email', $fields['email_phone'])->first();
     
      if(!$user || !Hash::check($fields['password'], $user->password)){
        $user = Centersusers::where('phone_number', $fields['email_phone'])->first();
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json(['message'=> 'incorrect credentials'], 201);
        }
      }
      $token = $user->createToken('token')->plainTextToken;
     
     
     $user = DB::table('center_users')
       ->where('email', $req->email)
       ->first();
     
     //$data = [
     //  'center_otp':'12345',
     //];
     
     //$user = Centers::where('email', $fields['email_phone'])->update($data);
      
     return response(['message' => $user, 'barear_token' => $token], 200);
      
    }
  
  
  
  
    public function AddNewCenter(Request $req){
      $chk = DB::table('centers')
       ->where('email', $req->email)
      ->where('phone_number', $req->phone_number)
      ->count();
      // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

      
      if($chk == 0){
        $data = [
        'id' => $string,
     	'center_name' => $req->center_name,
        'center_code' => $req->center_code,
        'email' => $req->email,
        'phone_number' => $req->phone_number,
        'password' => Hash::make($req->password),
        'center_otp' => '12345',
        'type' => $req->type,
        'address' => $req->address,
        'zone' => $req->zone,
       
       ];
      
      $addCenter = DB::table('centers')
       ->insert($data);
      
      if($addCenter){
        return response()->json(['result' => 'Center Added Successfully'], 200);
      }else{
        return response()->json(['result' => 'Something went wrong, Please try Again'], 201);
      }
      
      
		
      }else{
        return response()->json(['result' => 'Please Cheack Email or Phone Number, Already Exist'], 203);
      }
     
       
    }
  
  
  
  public function EditCenter(Request $req, $id){
      $chk = DB::table('centers')
       ->where('email', $req->email)
      ->where('phone_number', $req->phone_number)
      ->count();
      // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

      
      if($chk == 0){
        $data = [
        'id' => $string,
     	'center_name' => $req->center_name,
        'center_code' => $req->center_code,
        'email' => $req->email,
        'phone_number' => $req->phone_number,
        'type' => $req->type,
        'address' => $req->address,
       	
       
       ];
      
      $addCenter = DB::table('centers')
       ->where('id', $id)
       ->update($data);
      
      if($addCenter){
        return response()->json(['result' => 'Center Edited Successfully'], 200);
      }else{
        return response()->json(['result' => 'Something went wrong, Please try Again'], 201);
      }
      
      
		
      }else{
        return response()->json(['result' => 'Please Cheack Email or Phone Number, Already Exist'], 203);
      }
     
       
    }
  
  
    
    public function AddNewStudent(Request $req){
      
      $chk = DB::table('students')
        ->where('email',$req->email)
        ->orWhere('phone',$req->phone)
        ->count();
       
      if($chk== 0){
        $register = DB::table('students')->insert([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
           'address' => $req->address,
           'faculty_id' => $req->faculty_id,
           'department_id' => $req->department_id,
           'programme_id' => $req->programme_id,
           'heighest_qualification' => $req->heighest_qualification,
           'center_id' => $req->center_id,
           'sex' => $req->sex,
           'nationality_id' => $req->Nationality,
           'state_id' => $req->state,
           'lga_id' => $req->lga,
           'heighest_qualification_year'=> $req->heighest_qualification_year, 
           'employee' => $req->employee,
           'employee_type' => $req->employee_type,
           'heighest_qualification_year' => $req->heighest_qualification_year,
           'age' => $req->age,
           'employment_status' => $req->employment_status,
           'level' => $req->level,
           
            
        ]);
       

        if($register){
          
          $students = DB::table('students')
              
               ->where('students.email', $req->email)
        
            
          ->first();
          
            return response()->json(['message' => 'Record Added Successfully', 'student'=>$students], 200);
        }else{
          return response()->json(['message' => 'Record went wrong'], 201);
        }
      }else{
        return response()->json(['message' => 'Phone number or email Already Exist'], 202);
      }
		 
       
    }
  
  
  
   public function HideStudent(Request $req, $id){
      $register = DB::table('students')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
     public function DeleteCenter(Request $req, $id){
      $register = DB::table('centers')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
  
  
  public function addStudentQualification(Request $req){
    $chk = DB::table('student_qualification')
        ->where('qualification_id',$req->qualification_id)
      	->where('student_id', $req->student_id)
        ->count();
       
      if($chk== 0){
        $register = DB::table('student_qualification')->insert([
           'qualification_id' => $req->qualification_id,
           'student_id' => $req->student_id,
           'year' => $req->year,
           'institution_id' => $req->institution_id,
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Record went wrong'], 201);
        }
      }else{
        return response()->json(['message' => 'Record Already Exist'], 202);
      }
  }
  
  
  	public function editStudent(Request $req, $id){
      
       //$user = auth('sanctum')->user();
      
      try{
        
         $register = DB::table('students')
         ->where('id', $id)
         ->update([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
           'address' => $req->address,
           'faculty_id' => $req->faculty_id,
           'department_id' => $req->department_id,
           'programme_id' => $req->programme_id,
           'heighest_qualification' => $req->heighest_qualification,
           'sex' => $req->sex,
           'nationality_id' => $req->Nationality,
           'state_id' => $req->state,
           'lga_id' => $req->lga,
           'heighest_qualification_year'=> $req->heighest_qualification_year, 
           'employee' => $req->employee,
           'employee_type' => $req->employee_type,
           'heighest_qualification_year' => $req->heighest_qualification_year,
           'age' => $req->age,
           'employment_status' => $req->employment_status,
           'level' => $req->level,
        ]);
       

        if($register){
            return response()->json(['message' => 'Student Edited Successfully'], 200);
        }else{
          return response()->json(['message' => "Something went wrong, Please try Again"], 201);
        }
        
      }catch (\Exception $ex) {
             return response()->json(['message' => $ex], 400);
        }
      
      
      
    }
  
        public function getRecentRegisteredStudents(){
			 $students = DB::table('students')
               ->join('programmes','programmes.id', 'students.programme_id')
                ->join('faculties','faculties.id', 'students.faculty_id')
                ->join('departments','departments.id', 'students.department_id')
               ->join('state','state.id', 'students.state_id')
                ->join('lga','lga.id', 'students.lga_id')
               
               ->where('students.status', '1')
          ->orderBy('students.id')
               
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title', 'state.title as state_title', 'lga')
         
          ->limit(5)
               
          ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  		public function getAllStudents(){
			 $students = DB::table('students')
               ->leftjoin('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  
  
    public function getLecturerByCenterId(Request $req, $id){
    $result = DB::table('lecturers')
      
       
                ->leftjoin('faculties','faculties.id', 'lecturers.faculty_id')
                ->leftjoin('departments','departments.id', 'lecturers.department_id')
                ->leftjoin('state','state.id', 'lecturers.state_id')
                ->leftjoin('lga','lga.id', 'lecturers.lga_id')
      
      ->where('lecturers.status', '1')
      ->where('lecturers.center_id', $id)
      ->select('faculties.*', 'departments.*', 'state.id', 'lga.*', 'lecturers.id as lecturer_id', 'lecturers.*')
      
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  
  
  
  		public function GetStudentByProgrammeId($id){
			 $students = DB::table('students')
                    ->join('programmes','programmes.id', 'students.programme_id')
                ->join('faculties','faculties.id', 'students.faculty_id')
                ->join('departments','departments.id', 'students.department_id')
                ->join('state','state.id', 'students.state_id')
                ->join('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
          ->orderBy('students.id')
                 ->where('students.programme_id', $id)
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
          ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  
  
  
  
  	public function GetStudentByCenterId($id){
			 $students = DB::table('students')
                    ->leftjoin('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
          ->orderBy('students.id')
                 ->where('students.center_id', $id)
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
          ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  
  
  
  
  
  public function ViewStudent($id){
			 $students = DB::table('students')
              ->leftjoin('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
                ->where('students.id', $id)
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         ->first();
         
    
    	 $qualifications = DB::table('student_qualification')
           ->leftjoin('qualifications','qualifications.id', 'student_qualification.qualification_id')
           ->leftjoin('institutions', 'institutions.id','student_qualification.institution_id')
               ->where('student_id', $id)
                
          ->first();
          
          return response()->json(['students' => $students, 'qualifications'=>$qualifications], 200);
        } 
  
  
  
  public function getTotalMaleStudents(){
			 $students = DB::table('students')
               ->where('status', '1')
                ->where('sex', 'Male')
          ->count();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  
   public function getTotalFemaleStudents($id){
			 $students = DB::table('students')
               ->where('status', '1')
           ->where('center_id', $id)
          
          ->count();
          
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  public function getAllCourses(){
			 $result = DB::table('courses')
               ->where('status', '1')
          ->orderBy('id')
         
          ->get();
          
          return response()->json(['result' => $result], 200);
        }
  
   public function getCourseById($id){
			 $result = DB::table('courses')
               ->where('status', '1')
               ->where('id', $id)
         
          ->first();
          
          return response()->json(['result' => $result], 200);
        }
   public function getAllProgrammes(){
			 $result = DB::table('programmes')
               ->where('status', '1')
          ->orderBy('id', 'DESC')
         
          ->get();
          
          return response()->json(['result' => $result], 200);
        }
  
  
  
     public function getProgrammesById($id){
			 $result = DB::table('programmes')
               ->where('status', '1')
          ->where('id', $id)
         
          ->first();
          
          return response()->json(['result' => $result], 200);
        }
  
  
  
  
    public function getTotalCourses($id){
			 $result = DB::table('courses')
               ->where('status', '1')->where('center_id', $id)
         
          ->count();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
  ////faculties
   
    public function getAllFaculties(){
			 $result = DB::table('faculties')
               ->where('status', '1')
          ->orderBy('id')
         
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  public function AddFaculty(Request $req){
     
		 $register = DB::table('faculties')->insert([
           'title' => $req->title,
           'code' => $req->code,
           'center_id' => $req->center_id,
            
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
    public function EditFaculty(Request $req, $id){
     
		 $register = DB::table('faculties')
          ->where('id', $id) 
          ->update([
           'title' => $req->title,
           'code' => $req->code,
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Updated Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
   public function getTotalFaculty($id){
			 $result = DB::table('faculties')
               ->where('status', '1')
               ->where('center_id', $id)
          		->count();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
   public function GetFacultyByCenterId($id){
			 $result = DB::table('faculties')
               ->where('status', '1')
         	->where('center_id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
  public function HideFaculty(Request $req, $id){
      $register = DB::table('faculties')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
     public function getTotalUsers($id){
			 $result = DB::table('center_users')
               ->where('status', '1')->where('center_id', $id)
         
          ->count();
          
          return response()->json(['result' => $result], 200);
        } 
   
   
  
   public function getAllStates(){
			 $result = DB::table('state')
               ->where('status', '1')
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
   public function getLGA(Request $req, $id){
			 $result = DB::table('lga')
               ->where('status', '1')
                ->where('state_id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  public function GetAllQualifications(Request $req){
			 $result = DB::table('qualifications')
               ->where('status', '1')
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
  
  public function GetAllinstitutions(){
     $result = DB::table('institutions')
               ->where('status', '1')
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  ////admin
  
   
  public function adminLogin(Request $req){
      
     $email= $req->email;
     $pass =$req->password;

   
      $user = NucAmin::where('email', $email)->first();
     
      if(!$user || !Hash::check($pass, $user->password)){
        $user = NucAmin::where('phone', $email)->first();
        
        if(!$user || !Hash::check($pass, $user->password)){
            return response()->json(['message'=> 'Invalid Email or Password'], 201);
        }
        
      }
      $token = $user->createToken('token')->plainTextToken;
      
     return response(['message' => $user, 'barear_token' => $token], 200);
      
      
    }
  
  
   public function getUsers(Request $req){
      
     $result = DB::table('NucAmin')
               ->where('status', '1')
          ->orderBy('id')
        
          ->get();
          
          return response()->json(['result' => $result], 200);
      
      
    }
  
  
   public function getUsersById(Request $req, $id){
      
     $result = DB::table('NucAmin')
       ->where('status', '1')
        ->where('id', $id)
          ->first();
     if($result){
       return response()->json(['result' => $result], 200);
     }else{
       return response(['message' => 'Something went wrong'], 400);
     }     
          
      
      
    }
  
  
  
public function AddAdminUser(Request $req){
    
     $chk = DB::table('NucAmin')
     ->where('status', '1')
     ->where('email', $req->email)
     ->orwhere('phone', $req->phone)
     ->first();
       
    
    if($chk == 0){
      	$register = DB::table('NucAmin')->insert([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
           'password' => Hash::make($req->password),
        ]);
       

        if($register){
            return response()->json(['message' => 'User Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 201);
        }
    }else{
      return response()->json(['message' => 'Email or Password already Exist'], 202);
      
    }
		        
}
  
  
  
public function DeleteUser(Request $req, $id){
      $register = DB::table('NucAmin')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
  
public function EditUser(Request $req, $id){
    
   $register = DB::table('NucAmin')
     ->where('id', $id)
     ->update([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
        ]);
      	
        if($register){
            return response()->json(['message' => 'User Updated Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 201);
        }	        
}
   
  
   public function TopCenter(Request $req){
			 $result = DB::table('centers')
               ->where('status', '1')
          ->orderBy('id')
         ->limit(4)
          ->get();
          
          return response()->json(['result' => $result], 200);
        }
  
  public function getPartners(Request $req){
		$result = DB::table('partners')
               ->where('status', '1')
          ->orderBy('id')
         
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  public function otp(Request $req){
    $user = auth('sanctum')->user();
    if($user){
      if($user->otp == $req->otp){
        return response()->json(['result' => 'OTP Verified Successfully'], 200);
      }else{
        return response()->json(['result' => 'Invalid OTP'], 201);
      }
    }else{
      return response()->json(['result' => 'Unauthorized'], 202);
    }
    
  }
  
  
   public function centerOtp(Request $req){
   
     $user = auth('sanctum')->user();
    if($user){
      if($user->center_otp == $req->otp){
        return response()->json(['result' => 'OTP Verified Successfully'], 200);
      }else{
        return response()->json(['result' => 'Invalid OTP'], 201);
      }
    }else{
      return response()->json(['result' => 'Unauthorized'], 202);
    }
  }
  
  public function getAllPartners(Request $req){
     $result = DB::table('NUCPartners')
      ->where('status', '1')
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  public function getSummary(Request $req){
     $TotalCenters = DB::table('centers')
      ->where('status', '1')
          ->count();
    
    $Totalpartners = DB::table('NUCPartners')
      ->where('status', '1')
          ->count();
    
     $TotalProgramme = DB::table('programmes')
               ->where('status', '1')
          
          ->count();
    
    
    $TotalProgrammeLunched = DB::table('programmes')
      ->join('programme_lunched', 'programme_lunched.programme_id', 'programmes.id')
       ->where('programme_lunched.status', '1')
          
          ->count();
    
          
          return response()->json(['TotalCenters' => $TotalCenters, 'Totalpartners'=>$Totalpartners, 'TotalProgramme' => $TotalProgramme, 'TotalProgrammeLunched'=> $TotalProgrammeLunched], 200);
  }
  
  
  
  
  public function AddLecturer(Request $req){
       
		 $register = DB::table('lecturers')->insert([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
           'address' => $req->address,
           'faculty_id' => $req->faculty_id,
           'department_id' => $req->department_id,
           'occupation' => $req->occupation,
           'heighest_qualification' => $req->heighest_qualification,
           'center_id' => $req->center_id,
            
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
       
    }
  
  
  	public function EditLecturer(Request $req, $id){
      
       //$user = auth('sanctum')->user();
      
      try{
        
         $register = DB::table('lecturers')
         ->where('id', $id)
         ->update([
           'name' => $req->name,
           'email' => $req->email,
           'phone' => $req->phone,
           'address' => $req->address,
           'faculty_id' => $req->faculty_id,
           'department_id' => $req->department_id,
           'occupation' => $req->occupation,
           'heighest_qualification' => $req->heighest_qualification,
        ]);
       

        if($register){
            return response()->json(['message' => 'Lecturer Information edited Successfully'], 200);
        }else{
          return response()->json(['message' => "Something went wrong, Please try Again"], 201);
        }
        
      }catch (\Exception $ex) {
             return response()->json(['message' => $ex], 400);
        }
      
      
      
    }
  

  
    public function getLecturerById(Request $req, $id){
    $result = DB::table('lecturers')
      
                ->join('faculties','faculties.id', 'lecturers.faculty_id')
                ->join('departments','departments.id', 'lecturers.department_id')
               ->join('state','state.id', 'lecturers.state_id')
                ->join('lga','lga.id', 'lecturers.lga_id')
      ->where('lecturers.status', '1')
      ->where('lecturers.id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  
  public function AddDepartment(Request $req){
     
		 $register = DB::table('departments')->insert([
           'title' => $req->title,
           'code' => $req->code,
           'center_id' => $req->center_id,
           'faculty_id' => $req->faculty_id,
            
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
    public function EditDepartment(Request $req, $id){
     
		 $register = DB::table('departments')
          ->where('id', $id) 
          ->update([
           'title' => $req->title,
           'code' => $req->code,
           'faculty_id' => $req->faculty_id,
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Updated Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
  
   public function GetDepartmentByCenterId($id){
			 $result = DB::table('departments')
               ->where('status', '1')
         	->where('center_id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
  public function AddCourse(Request $req){
     
		 $register = DB::table('courses')->insert([
           'title' => $req->title,
           'code' => $req->code,
           'unit' => $req->unit,
           'center_id' => $req->center_id,
           'department_id' => $req->department_id,
           'node_id' => $req->node_id,
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
    public function EditCourse(Request $req, $id){
     
		 $register = DB::table('courses')
          ->where('id', $id) 
          ->update([
           'title' => $req->title,
           'code' => $req->code,
           'unit' => $req->unit,
           'department_id' => $req->department_id,
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Updated Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
   public function HideCourse(Request $req, $id){
      $register = DB::table('courses')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
  
    public function GetCourseByNodeId($id){
			 $result = DB::table('courses')
               ->where('status', '1')
         	->where('node_id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
  
  
   public function GetCourseByCenterId($id){
			 $result = DB::table('courses')
               ->where('status', '1')
         	->where('center_id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
   public function AddProgramme(Request $req){
     
      $register = DB::table('programmes')->insert([
           'title' => $req->title,
           'code' => $req->code,
           'type' => $req->type,
            
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
		
  }
  
  
    public function EditProgramme(Request $req, $id){
     
		 $register = DB::table('programmes')
          ->where('id', $id) 
          ->update([
           'title' => $req->title,
           'code' => $req->code,
           'type' => $req->type,
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Data Updated Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
   public function DeleteProgramme(Request $req, $id){
     
		 $register = DB::table('programmes')
          ->where('id', $id) 
          ->update([
           'status' => '0',
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Programme Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  }
  
  
  
   public function GetAllProgramme(){
			 $result = DB::table('programmes')
               ->where('status', '1')
         	->ORDER ('id', 'DESC')
          ->get();
          
          return response()->json(['result' => $result], 200);
        } 
  
  
    
	
  
   
   public function LunchProgramme(Request $req){
      $register = DB::table('programme_lunched')
          ->insert([
           'center_id' => $req->center_id,
           'programme_id' => $req->programme_id,
           'start_date' => $req->start_date,
           'end_date' => $req->end_date,
           'announcement_date' => $req->announcement_date,
           'announcement_link' => $req->announcement_link,
           'other_media_link' => $req->other_media_link,
           'session_id' => $req->session_id,
           
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Programme Lunched Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   public function EditLunchedProgramme(Request $req, $id){
      $register = DB::table('programme_lunched')
        ->where('id', $id)
          ->update([
           'start_date' => $req->start_date,
           'end_date' => $req->end_date,
           'announcement_date' => $req->announcement_date,
           'announcement_link' => $req->announcement_link,
           'other_media_link' => $req->other_media_link,
           'session_id' => $req->session_id,
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Edited Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
     public function HideLunchedProgramme(Request $req, $id){
      $register = DB::table('programme_lunched')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   
  
  
  
  public function GetRecentAddedCenters(){
     $students = DB::table('centers')
               ->where('status', '1')
          ->orderBy('id')
          ->limit(5)
               
          ->get();
          
          return response()->json(['centers' => $students], 200);
  }
  
  public function getRecentProgrammeLunched(){
     $result = DB::table('programme_lunched')
       ->join('programmes', 'programmes.id', 'programme_lunched.programme_id')
           ->where('programme_lunched.status', '1')
          ->orderBy('programme_lunched.id')
          ->limit(4)
               
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  public function GetAllCenters(){
    $result = DB::table('centers')
           ->where('centers.status', '1')
          ->orderBy('center_name')
            
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  
   public function filterByZone(Request $req){
    $result = DB::table('centers')
           ->where('centers.status', '1')
      	  ->where('zone',  $req->zone)
     
          ->orderBy('centers.id', 'DESC')
            
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  public function GetCenterById($id){
     $result = DB::table('centers')
           ->where('status', '1')
        ->where('id', $id)  
          ->first();
          
    
    //summary
    //get total number of student
     $no_of_students = DB::table('students')
      ->where('status', '1')
      ->where('center_id', $id)  
      ->count();
    
    
    //get total number of student
     $no_of_lecturers  = DB::table('lecturers')
      ->where('status', '1')
      ->where('center_id', $id)  
      ->count();
    
    
     //get total number of courses lunched
     $courseLunched  = DB::table('programme_lunched')
      ->where('status', '1')
      ->where('center_id', $id)  
      ->count();
    
    
      //get total number of faculties
     $faculties  = DB::table('faculties')
      ->where('status', '1')
      ->where('center_id', $id)  
      ->count();
    
    
     $students = DB::table('students')
               ->join('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
         ->where('students.center_id', $id)
          ->orderBy('students.name')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
          
    
  return response()->json(['result' => $result, 'no_of_students' => $no_of_students, 'no_of_lecturers'=>$no_of_lecturers, 'courseLunched'=>$courseLunched, 'faculties'=>$faculties, 'students'=>$students], 200);
  
}
  
  
  public function GetDLISummary($id){
     $centerDetails = DB::table('centers')
           ->where('status', '1')
        ->where('id', $id)  
          ->first();
          
          return response()->json(['centerDetails' => $centerDetails], 200);
  }
  
    public function GetAllLunchedProgrammeByCenterId($id){
    $result = DB::table('programme_lunched')
     ->leftjoin('programmes', 'programmes.id', 'programme_lunched.programme_id')
     ->leftjoin('session', 'session.id', 'programme_lunched.session_id')
           ->where('programme_lunched.status', '1')
      		->where('programme_lunched.center_id', $id)
          ->orderBy('programme_lunched.id', 'DESC')
           ->select('programme_lunched.*', 'programmes.*','session.*','programme_lunched.id as programme_lunched_id')
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
    public function GetDepartmentByFacultyId($id){
    $result = DB::table('departments')
           ->where('status', '1')
      		->where('faculty_id', $id)
          ->orderBy('id', 'DESC')
            
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  
  
  

  
  public function getDepartmentById(Request $req, $id){
    $result = DB::table('departments')
      ->where('status', '1')
      ->where('id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  public function getfacultyById(Request $req, $id){
    $result = DB::table('faculties')
      ->where('status', '1')
      ->where('id', $id)
          ->get();
          
          return response()->json(['result' => $result], 200);
  }
  
  public function getDLIA(Request $req, $id){
    
    $programmes = DB::table('programme_lunched')
      ->join('programmes', 'programmes.id', 'programme_lunched.programme_id')
           ->where('programme_lunched.status', '1')
      	->where('programme_lunched.center_id', $id)
          ->orderBy('programme_lunched.id', 'DESC')
           ->select('programme_lunched.*', 'programmes.title')
          ->get();
    
     return response()->json(['programmes' => $programmes], 200);
  }
  
  
  
  public function getProgrammeModules(Request $req, $id){
    
    $session_id = $req->session_id;
    
    $nodes= DB::table('nodes')
           ->where('node_id', $id)
          ->first();
    
    $centerId = $nodes->center_id;
    $programme_id = $nodes->programme_id;
    
    
    //get all the module for the programme
    
    $modules = DB::table('programme_courses')
     ->join('courses', 'courses.id', 'programme_courses.course_id')
     ->join('start_course', 'start_course.course_id', 'programme_courses.course_id')
      
     ->leftjoin('lecturer_course', 'lecturer_course.course_id', 'start_course.course_id')
     ->leftjoin('lecturers', 'lecturers.id', 'lecturer_course.lecturer_id')
       
     ->where('programme_courses.node_id', $id)
     ->where('programme_courses.center_id', $centerId)
      // ->where('start_course.session_id', $session_id)
     ->where('programme_courses.status', '1') 
     ->get();
    
     return response()->json(['modules' => $modules], 200);
    
  }
  
  
   public function AddSession(Request $req){
      $register = DB::table('session')
          ->insert([
           'center_id' => $req->center_id,
           'session' => $req->session,
           'session_start' => $req->session_start,
           'session_end' => $req->session_end,
        ]);
       

        if($register){
            return response()->json(['message' => 'Session Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   public function EditSession(Request $req, $id){
      $register = DB::table('session')
        ->where('id', $id)
          ->update([
           'session' => $req->session,
           'session_start' => $req->session_start,
           'session_end' => $req->session_end,
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Edited Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
     public function HideSession(Request $req, $id){
      $register = DB::table('session')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
    public function SetSessionCurrent(Request $req, $id){
      
      $register = DB::table('session')
          ->update([
           'current' => '0',
          
        ]);
      
      $register = DB::table('session')
        ->where('id', $id)
          ->update([
           'current' => '1',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Session has been Set to Current Session'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
    public function getAllSession(Request $req, $id){
      $session = DB::table('session')
        ->where('center_id', $id)
        ->get();
      
         return response()->json(['session' => $session], 200);
   }
  
  
   public function getSingleSession(Request $req, $id){
      $session = DB::table('session')
        ->where('id', $id)
        ->get();
      
         return response()->json(['session' => $session], 200);
   }
  
  
  
  
  
  
  
  public function AddNode(Request $req){
      $register = DB::table('nodes')
          ->insert([
           'node' => $req->node,
           'programme_id' => $req->programme_id,
           'center_id' => $req->center_id,
           'date_announced' => $req->date_announced,
        ]);
       

        if($register){
            return response()->json(['message' => 'Node Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   public function EditNode(Request $req, $id){
      $register = DB::table('nodes')
        ->where('node_id', $id)
          ->update([
           'node' => $req->node,
           'programme_id' => $req->programme_id,
           'date_announced' => $req->date_announced,
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Edited Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
     public function HideNode(Request $req, $id){
      $register = DB::table('nodes')
        ->where('node_id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   public function getNodes(Request $req, $id){
      $getNodes = DB::table('nodes')
        ->where('programme_id', $id)
        ->get();
      
         return response()->json(['Nodes' => $getNodes], 200);
   }
  
  
  public function start_course(Request $req){
    
     $get = DB::table('start_course')
        ->where('session_id', $req->session_id)
       ->where('course_id', $req->course_id)
        ->count();
    
    if($get==0){
      
      
      $register = DB::table('start_course')
          ->insert([
           'session_id' => $req->session_id,
           'course_id' => $req->course_id,
           'offering_per_year' => $req->offering_per_year,
          'first_delivery_date' => $req->first_delivery_date,
           
           
        ]);
       

        if($register){
            return response()->json(['message' => 'Started Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 201);
        }
   
      
      
      
    }else{
      return response()->json(['message' => 'Already Started'], 400);
    }
      
  }
  
  
  
  
     public function HideLecturer(Request $req, $id){
      $register = DB::table('lecturers')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
   public function AddAttendees(Request $req){
      $register = DB::table('course_attendees')
          ->insert([
           'session_id' => $req->session_id,
           'course_id' => $req->course_id,
           'student_id' => $req->student_id,
           'center_id' => $req->center_id,
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
   }
  
  
  
  
   public function ViewAttendees(Request $req){
     
      $attendees = DB::table('course_attendees')
        ->join('students', 'students.id', 'course_attendees.student_id')
        ->where('course_attendees.session_id', $req->session_id)
        ->where('course_attendees.course_id', $req->course_id)
        ->get();
     
         return response()->json(['attendees' => $attendees], 200);
   }
  
  
  
   public function AddInstitution(Request $req){
     $add = DB::table('institutions')
          ->insert([
           'center_id' => $req->center_id,
           'name' => $req->name,
        ]);
       

        if($add){
            return response()->json(['message' => 'Institution Added Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  	}
  
  
   public function getInstitutionByCenterId(Request $req, $id){
     
      $institutions = DB::table('institutions')
        ->where('center_id', $id)
        ->where('status', '1')
        ->get();
     
         return response()->json(['institutions' => $institutions], 200);
   }
  
  
     public function getQualificationByStudentId(Request $req, $id){
     
      $qualification = DB::table('student_qualification')
        ->where('student_id', $id)
        
        ->get();
     
         return response()->json(['qualification' => $qualification], 200);
   }
  
  
  
  
   public function HideInstitution(Request $req, $id){
      $register = DB::table('institutions')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
    public function HideDepartment(Request $req, $id){
      $register = DB::table('departments')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
  
      public function GetMenu(Request $req, $id){
     
      $GetMenu = DB::table('nuc_menu')
       //	->leftjoin('admin_user_menu', 'admin_user_menu.menu_id', 'nuc_menu.id')
        ->where('nuc_menu.status', '1')
        
        ->get();
     
         return response()->json(['GetMenu' => $GetMenu], 200);
   }
  
  
  
  
  public function GetAllStudentsByProgrammeId(Request $req, $id){
			 $students = DB::table('students')
               ->join('programmes','programmes.id', 'students.programme_id')
                ->join('faculties','faculties.id', 'students.faculty_id')
                ->join('departments','departments.id', 'students.department_id')
                ->join('state','state.id', 'students.state_id')
                ->join('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
               ->where('students.programme_id', $id)
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
  
   public function GetAllStudentsByFacultyId($id){
			 $students = DB::table('students')
               ->join('programmes','programmes.id', 'students.programme_id')
                ->join('faculties','faculties.id', 'students.faculty_id')
                ->join('departments','departments.id', 'students.department_id')
                ->join('state','state.id', 'students.state_id')
                ->join('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
               ->where('students.faculty_id', $id)
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
   public function GetAllStudentsByDepartmentId($id){
			 $students = DB::table('students')
               ->join('programmes','programmes.id', 'students.programme_id')
                ->join('faculties','faculties.id', 'students.faculty_id')
                ->join('departments','departments.id', 'students.department_id')
                ->join('state','state.id', 'students.state_id')
                ->join('lga','lga.id', 'students.lga_id')
               ->where('students.status', '1')
               ->where('students.department_id', $id)
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
          
          return response()->json(['students' => $students], 200);
        } 
  
  
   public function CreateGraduatingList(Request $req){
     $add = DB::table('graduating_list')
          ->insert([
           'title' => $req->title,
           'session_id' => $req->session_id,
           'center_id' => $req->center_id,
           'certificate' => $req->certificate,
        ]);
       

        if($add){
            return response()->json(['message' => 'List Created Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  	}
  
  
   public function EditGraduatingList(Request $req, $id){
     $add = DB::table('graduating_list')
       	->where('id', $id)
          ->update([
           'title' => $req->title,
           'session_id' => $req->session_id,
           'certificate' => $req->certificate,
        ]);
       

        if($add){
            return response()->json(['message' => 'Edited Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something went wrong'], 400);
        }
  	}
  
   public function DeleteCreateGraduatingList(Request $req, $id){
      $register = DB::table('graduating_list')
        ->where('id', $id)
          ->update([
           'status' => '0',
          
        ]);
       

        if($register){
            return response()->json(['message' => 'Record Deleted Successfully'], 200);
        }else{
          return response()->json(['message' => 'Something Went Wrong, Please Try Again'], 400);
        }
   }
  
  
  
     public function GetCreateGraduatingListByCenter(Request $req, $id){
     
      $data = DB::table('graduating_list')
       ->join('session', 'session.id', 'graduating_list.session_id')
        ->where('graduating_list.status', '1')
        ->where('graduating_list.center_id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
   }
  
  
   public function GetSingleGraduatingList(Request $req, $id){
     
      $data = DB::table('graduating_list')
       //	
        ->where('status', '1')
        ->where('id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
   }
  
  
  
  public function AddStudentToGraduationList(Request $req, $id){
    $chk = DB::table('graduating_list_student')
      ->where('student_id', $req->student_id)
      ->count();
    
    if($chk == 0){
      
      $data = [
        'student_id' => $req->student_id,
        'graduation_list_id' => $id,
      ];
        
      $add= DB::table("graduating_list_student")
       ->insert($data);
      
      if($add){
        return response()->json(['data' => "Student Added Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "Student Already Added"], 201);
    }
  }
  
  public function DeleteStudentfromGraduationList(Request $req, $id){
     $data = [
        'status' => '0',
      ];
    
    
     $add= DB::table("graduating_list_student")
       ->where('id', $id)
       ->update($data);
      
      if($add){
        return response()->json(['data' => "Deleted Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
  }
  
  
  public function viewStudentGraduationList(Request $req, $id){
    $data = DB::table('graduating_list_student')
      			->leftjoin('students','students.id', 'graduating_list_student.student_id')
				->leftjoin('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
                ->leftjoin('course_attendees','course_attendees.student_id','students.id')
        ->where('graduating_list_student.graduation_list_id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  
  public function viewRegisteredStudentByModule(Request $req){
			 $students = DB::table('students')
               ->leftjoin('programmes','programmes.id', 'students.programme_id')
                ->leftjoin('faculties','faculties.id', 'students.faculty_id')
                ->leftjoin('departments','departments.id', 'students.department_id')
                ->leftjoin('state','state.id', 'students.state_id')
                ->leftjoin('lga','lga.id', 'students.lga_id')
                ->leftjoin('course_attendees','course_attendees.student_id','students.id')
                
               ->where('students.status', '1')
               ->where('course_attendees.course_id', $req->course_id)
                ->where('course_attendees.center_id', $req->center_id)
               ->where('course_attendees.session_id', $req->session_id)
          ->orderBy('students.id')
         ->select('students.*', 'programmes.title as programmes_title', 'faculties.title as faculties_title', 'departments.title as departments_title','state.title as state_title', 'lga')
         
               ->get();
    
     return response()->json(['students' => $students], 200);
  
  }
  
  
  public function viewAllAcademicPartners(Request $req, $id){
    $data = DB::table('academic_partners')
      			
      ->where('status', '1')
      ->where('center_id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  public function viewSingleAcademicPartner(Request $req, $id){
    $data = DB::table('academic_partners')
      			
     
      ->where('id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  public function addAcademicPartners(Request $req){
    $chk = DB::table('academic_partners')
      ->where('name', $req->name)
      ->count();
    
    if($chk == 0){
      
      $data = [
        'name' => $req->name,
        'type' => $req->type,
        'center_id'=> $req->center_id,
      ];
        
      $add= DB::table("academic_partners")
       ->insert($data);
      
      if($add){
        return response()->json(['data' => "Added Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "Already Added"], 201);
    }
  }
  
  
  
   public function editAcademicPartners(Request $req, $id){  
      $data = [
        'name' => $req->name,
        'type' => $req->type,
      ];
        
      $add= DB::table("academic_partners")
        ->where('id', $id)
       ->update($data);
      
      if($add){
        return response()->json(['data' => "Edited Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
   
  }
  
  public function deleteAcademicPartners(Request $req, $id){
     $data = [
        'status' => '0',
      ];
    
    
     $add= DB::table("academic_partners")
       ->where('id', $id)
       ->update($data);
      
      if($add){
        return response()->json(['data' => "Deleted Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
  }
  
  

   public function moveStudentToLevel(Request $req){
    $chk = DB::table('student_level')
      ->where('student_id', $req->student_id)
      ->where('session_id', $req->session_id)
       ->where('center_id', $req->center_id)
      ->count();
    
    if($chk == 0){
      
      $data = [
        'student_id' => $req->student_id,
        'session_id' => $req->session_id,
        'center_id'=> $req->center_id,
        'level'=> $req->level,
      ];
        
      $add= DB::table("student_level")
       ->insert($data);
      
      if($add){
        return response()->json(['data' => "Student Moved Successfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "Already Moved"], 201);
    }
  }
  
  
     public function DeleteStudentFromLevel(Request $req){
   
   
      $add= DB::table("student_level")
        ->where('student_id', $req->student_id)
         ->where('session_id', $req->session_id)
       ->delete();
      
      if($add){
        return response()->json(['data' => "Record Deleted Successfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    
  }
  
  
  //manage User
  public function AddNewUser(Request $req){
    
    $chk = DB::table('center_users')
      ->where('email', $req->email)
      ->count();
    
    if($chk == 0){
      
      $data = [
        'name' => $req->name,
        'email' => $req->email,
        'password'=> Hash::make($req->password),
        'phone_number' => $req->phone_number,
        'center_id' => $req->center_id,
        
      ];
        
      $add= DB::table("center_users")
       ->insert($data);
      
      if($add){
        return response()->json(['data' => "User Added Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "User Already Added"], 201);
    }
  }
  
  
  public function EditCenterUser(Request $req, $id){
    
      $data = [
        'name' => $req->name,
        'email' => $req->email,
        'password'=> Hash::make($req->password),
        'phone_number' => $req->phone_number,
      ];
        
      $add= DB::table("center_users")
       ->where('id', $id)
       ->update($data);
      
      if($add){
        return response()->json(['data' => "User Updated Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
  }
  
  
   public function DeleteCenterUser(Request $req, $id){
    
      $data = [
        'status' => '0',
      ];
        
      $add= DB::table("center_users")
       ->where('id', $id)
       ->update($data);
      
      if($add){
        return response()->json(['data' => "User Deleted Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
  }
  
  
  //AddUserPermission,RemoveUserPermission,ViewSingleUserPermission

  public function ViewAllUser(Request $req, $id){
    $data = DB::table('center_users')
      			
      ->where('status', '1')
      ->where('center_id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
   public function ViewSingleUser(Request $req, $id){
    $data = DB::table('center_users')
      			
      ->where('status', '1')
      ->where('id', $id)
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  
  public function GetAllMenu(Request $req){
    $data = DB::table('center_menu')
      			
      ->where('status', '1')
     
        
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  
    public function GetUserMenu(Request $req, $id){
    $data = DB::table('center_users_permission')
      ->leftjoin('center_menu', 'center_menu.id', 'center_users_permission.menu_id')			
      ->where('center_users_permission.user_id', $id)
        ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
  public function CheackUserMenu(Request $req){
    $data = DB::table('center_users_permission')	
      ->where('user_id', $req->user_id)
      ->where('menu_id', $req->menu_id)
      ->get();
     
         return response()->json(['data' => $data], 200);
  }
  
  
   
  

  public function AddUserPermission(Request $req){
    
    $chk = DB::table('center_users_permission')
      ->where('user_id', $req->user_id)
      ->where('menu_id', $req->menu_id)
      ->count();
    
    if($chk == 0){
        $data = [
          'user_id' => $req->user_id,
          'menu_id' => $req->menu_id,
        ];
        
      
      $add= DB::table("center_users_permission")
      ->insert($data);
      
      if($add){
        return response()->json(['data' => "Permission Added Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
      
    }else{
      return response()->json(['data' => "Permission Already Added"], 201);
    }
  }
 
  
  
    public function RemoveUserPermission(Request $req){
    
 		$add= DB::table("center_users_permission")
       ->where('user_id', $req->user_id)
       ->where('menu_id', $req->menu_id)
      ->delete();
      
      if($add){
        return response()->json(['data' => "Permission Removed Succesfully"], 200);
      }else{
        return response()->json(['data' => "Something Went Wrong"], 200);
      }
  }
  
  public function GetAllDLi(Request $req){
    $data = DB::table('DLIs')
     
        ->get();
     	return response()->json(['data' => $data], 200);
  }

  
  
  
  
  
  
  
  
  
  
  public function GetSateAllResult(){
    $result = DB::table('words')
     //->join('parties_results', 'parties_results.punit_id', 'words.id') 
     //->join('parties', 'parties.id', 'parties_results.party_id')
      
      ->orderBy('words.word')
    ->get();
    
    
    $total = DB::table('parties_results')
      ->sum("value");
    
   
    
    
     $total_PDP = DB::table('parties_results')
      ->where('party_id', '1')
      ->sum("value");
    
    $total_APC = DB::table('parties_results')
      ->where('party_id', '2')
      ->sum("value");
    
    $total_LP = DB::table('parties_results')
      ->where('party_id', '3')
      ->sum("value");
    
    
    
     $total = number_format($total,0);
     $total_PDP = number_format($total_PDP,0);
     $total_APC = number_format($total_APC,0);
     $total_LP = number_format($total_LP,0);
    
    
      
   return response()->json(['result' => $result, 'total'=>$total, 'total_PDP'=>$total_PDP, 'total_APC'=>$total_APC, 'total_LP'=>$total_LP ], 200);
  }
  
  
  
   public function GetWardResults($id){
    
     $total = DB::table('parties_results')
       ->where('punit_id', $id)
      ->sum("value");
    
   
    
    
     $total_PDP = DB::table('parties_results')
        ->where('punit_id', $id)
      ->where('party_id', '1')
      ->sum("value");
    
    $total_APC = DB::table('parties_results')
       ->where('punit_id', $id)
      ->where('party_id', '2')
      ->sum("value");
    
    $total_LP = DB::table('parties_results')
       ->where('punit_id', $id)
      ->where('party_id', '3')
      ->sum("value");
    
    
    
     $total = number_format($total,0);
     $total_PDP = number_format($total_PDP,0);
     $total_APC = number_format($total_APC,0);
     $total_LP = number_format($total_LP,0);
  
  return response()->json(['total'=>$total, 'total_PDP'=>$total_PDP, 'total_APC'=>$total_APC, 'total_LP'=>$total_LP ], 200);
  }
  
  
     public function GetStateResults($id){
    
     $total = DB::table('parties_results')
       ->where('state_id', $id)
      ->sum("value");
    
   
    
    
     $total_PDP = DB::table('parties_results')
          ->where('state_id', $id)
      ->where('party_id', '1')
      ->sum("value");
    
    $total_APC = DB::table('parties_results')
        ->where('state_id', $id)
      ->where('party_id', '2')
      ->sum("value");
    
    $total_LP = DB::table('parties_results')
        ->where('state_id', $id)
      ->where('party_id', '3')
      ->sum("value");
    
    
    
     $total = number_format($total,0);
     $total_PDP = number_format($total_PDP,0);
     $total_APC = number_format($total_APC,0);
     $total_LP = number_format($total_LP,0);
  
  return response()->json(['total'=>$total, 'total_PDP'=>$total_PDP, 'total_APC'=>$total_APC, 'total_LP'=>$total_LP ], 200);
  }
  
  
  
  
  
  
  public function GetAllStatess(){
    
     $result = DB::table('state')
       ->where('status', '1')
       ->orderBy('title')
      ->get();
    
     $total = DB::table('parties_results')
      ->sum("value");
    
   
    
    
     $total_PDP = DB::table('parties_results')
      ->where('party_id', '1')
      ->sum("value");
    
    $total_APC = DB::table('parties_results')
      ->where('party_id', '2')
      ->sum("value");
    
    $total_LP = DB::table('parties_results')
      ->where('party_id', '3')
      ->sum("value");
    
    
    
     $total = number_format($total,0);
     $total_PDP = number_format($total_PDP,0);
     $total_APC = number_format($total_APC,0);
     $total_LP = number_format($total_LP,0);
    
    
      
   return response()->json(['result' => $result, 'total'=>$total, 'total_PDP'=>$total_PDP, 'total_APC'=>$total_APC, 'total_LP'=>$total_LP ], 200);
  }
  
  
   public function getSummary2(){
     $state = DB::table('state')
        ->where('status', '1')
       ->count();
     
     
      $lga = DB::table('lga')
        ->where('status', '1')
       ->count();
     
     
     
      $wards = DB::table('words')
        ->where('status', '1')
       ->count();
     
     
      $total = DB::table('parties_results')
      ->sum("value");
    
   
    
    
     $total_PDP = DB::table('parties_results')
      ->where('party_id', '1')
      ->sum("value");
    
    $total_APC = DB::table('parties_results')
      ->where('party_id', '2')
      ->sum("value");
    
    $total_LP = DB::table('parties_results')
      ->where('party_id', '3')
      ->sum("value");
     
     
     $total_PDPP = number_format(($total_PDP/$total) * 100,2);
     $total_APCP = number_format(($total_APC/$total) * 100,2);
     $total_LPP = number_format(($total_LP/$total) * 100,2);
     
    
     return response()->json(['state' => $state, 'lga'=>$lga, 'wards'=>$wards, 'total'=>$total, 'total_PDP'=>$total_PDP, 'total_APC'=>$total_APC, 'total_LP'=>$total_LP,'total_PDPP'=>$total_PDPP, 'total_APCP'=>$total_APCP, 'total_LPP'=>$total_LPP], 200);
  }
  
  
  public function RecentSubmitedResult(){
     $result = DB::table('parties_results')
    	->join('state', 'state.id', 'parties_results.state_id')
       ->join('lga', 'lga.Lga', 'parties_results.lga_id')
       ->join('words', 'words.id', 'parties_results.punit_id')
      
      ->where('parties_results.party_id', '1')
      ->orderBy('parties_results.id', 'DESC')
       ->limit(10)
       
      // ->select('words.result as words_result', 'parties_results', 'state', 'lga', 'words')
    ->get();
    
     return response()->json(['result' => $result], 200);
  }
    
}