<div style="display:flex; flex-direction: column; width: 200px">

        @foreach($products as $product)
        <div style="margin-top:20px">
                <div>
                    {{ $product->short_name }}
                  </div>
                <div style="margin-top:10px">
                    {!! DNS1D::getBarcodeHTML($product->code, 'UPCA') !!}
                   
                  <div>
                    {{ $product->code }}
                  </div>
                </div>  

                <hr>
        </div>

        
        @endforeach

</div>

