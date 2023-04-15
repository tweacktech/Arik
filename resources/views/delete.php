<div class="flex-row-fluid py-lg-5 px-lg-15">
 <!--begin::Form-->
 <form class="form" novalidate="novalidate" id="kt_modal_create_app_form" method="POST" action="{{ route('editproduct', ['id' => $product->id]) }}"
       enctype="multipart/form-data">
   
    <a href="{{ route('viewproductproperty',['id' => $product->id]) }}" > Add Properties</a>
   
 @csrf
 @method('put')
 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Image</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="file" class="form-control form-control-lg form-control-solid" name="img_url_1" placeholder="" value="" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('img_url_1')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror

 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Image 2</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="file" class="form-control form-control-lg form-control-solid" name="img_url_2" placeholder="" value="" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('img_url_2')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror

 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Image 3</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="file" class="form-control form-control-lg form-control-solid" name="img_url_3" placeholder="" value="{{ $product->img_url_2 }}" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('img_url_3')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror


 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Name</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="{{ $product->name }}" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>


 <div class="row" >
   <div class="w-100">
   <!--begin::Input group-->
   <div class="fv-row mb-10">
   <!--begin::Label-->
   <label class="d-flex align-items-center fs-5 fw-bold mb-2">
   <span class="required">Product Price</span>
   <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
   </label>
   <!--end::Label-->
   <!--begin::Input-->
   <input type="text" class="form-control form-control-lg form-control-solid" name="price" placeholder="" value="{{ $product->price }}" required/>
   <!--end::Input-->
   </div>
   <!--end::Input group-->
   
   </div>
   </div>


 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span>Product EAN</span>
 
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="text" class="form-control form-control-lg form-control-solid" name="ean" placeholder="" value="{{ $product->EAN }}"/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('ean')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror

 

 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Property</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <select name="property" id="" class="form-control form-control-lg form-control-solid">
    <option value="">Select Property</option>
    @foreach($pros as $pro)
    <option value="{{$pro->id}}">{{$pro->category}}</option>
    @endforeach
 
 </select>
 
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('property')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror



 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Maker</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <select name="maker" id="" class="form-control form-control-lg form-control-solid">
 
    @foreach($makers as $maker)
    <option value="{{$maker->id}}">{{$maker->name}}</option>
    @endforeach

 </select>
 
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('maker')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror

 


 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Description</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <textarea type="text" class="form-control form-control-lg form-control-solid" name="description" placeholder="" required>
 {{ $product->description }}
 </textarea>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>

 


 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Article Numeber</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="text" value="{{ $product->article_number }}" class="form-control form-control-lg form-control-solid" name="article_number" placeholder="" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('article_number')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror
 

 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Category</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <select name="category" id="" class="form-control form-control-lg form-control-solid" required>
 
 <option value="{{ $product->category}}">{{$product->category}}</option>
 @php
 $cats = DB::table('cats')->get();
 @endphp
 @foreach($cats as $cat)
 <option value="{{ $cat->id }}">{{ $cat->title }}</option>
 @endforeach
 </select>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>

 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Product Sub Category</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <select name="sub_category" id="sub_category" class="form-control form-control-lg form-control-solid" onchange="getSubSubCat()">
   <option></option>
    @foreach($subcats as $subcat)
    <option value="{{$subcat->sub_cat_id}}">{{$subcat->sub_title}}</option>
    @endforeach
 
 </select>
 
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
 @error('sub_category')
 <span class="required" style="color:red">{{ $message }}</span>
 @enderror



 <div class="row" >
   <div class="w-100">
   <!--begin::Input group-->
   <div class="fv-row mb-10">
   <!--begin::Label-->
   <label class="d-flex align-items-center fs-5 fw-bold mb-2">
   <span class="required">Product Sub Sub Category</span>
   <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
   </label>
   <!--end::Label-->
   <!--begin::Input-->
   <select name="sub_sub_category" id="sub_sub_category" class="form-control form-control-lg form-control-solid">
      <option></option>
   </select>
   
   <!--end::Input-->
   </div>
   <!--end::Input group-->
   
   </div>
   </div>
   @error('sub_sub_category')
   <span class="required" style="color:red">{{ $message }}</span>
   @enderror

 

 
 <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Weight <strong>kg</strong></span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <input type="text" class="form-control form-control-lg form-control-solid" name="weight_in_kg" placeholder="" value="{{ $product->weight_in_kg}}" required/>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
   
    <div class="row" >
 <div class="w-100">
 <!--begin::Input group-->
 <div class="fv-row mb-10">
 <!--begin::Label-->
 <label class="d-flex align-items-center fs-5 fw-bold mb-2">
 <span class="required">Compatibility</span>
 <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
 </label>
 <!--end::Label-->
 <!--begin::Input-->
 <textarea type="text" class="form-control form-control-lg form-control-solid" name="compatibility" placeholder="" required>
 {{ $product->compatibility }}
 </textarea>
 <!--end::Input-->
 </div>
 <!--end::Input group-->
 
 </div>
 </div>
   
   
 
 <button type="submit" class="btn btn-lg btn-primary" >Update Product
 <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
 <span class="svg-icon svg-icon-3 ms-1 me-0">
 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
 <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
 <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
 </svg>
 </span>
 <!--end::Svg Icon--></button>

 <a href="{{ route('manage-product') }}"> <button type="button" class="btn btn-lg btn-secondary" >Cancel</button></a>
 </div>
 <!--end::Wrapper-->
 </div>
 <!--end::Actions-->
 </form>
 <!--end::Form-->
 </div>




 