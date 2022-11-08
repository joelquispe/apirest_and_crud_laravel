

<div class="col-12 d-grid ">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control"
            value="{{ isset($product->nombre) ? $product->nombre : old('nombre') }}">
    </div>
    
    <div>
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio" class="form-control"
            value="{{ isset($product->precio) ? $product->precio : old('precio') }}">
    </div>
    <div>
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca" class="form-control"
            value="{{ isset($product->marca) ? $product->marca : old('marca') }}">
    </div>
    <div>
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control"
            value="{{ isset($product->descripcion) ? $product->descripcion : old('descripcion') }}">
    </div>
    <div>
        <label for="foto">Foto</label>
        @if (isset($product->foto))
        <div class="my-3 d-flex justify-content-around align-items-center">
           
           
            <img src="{{ asset('storage') . '/' . $product->foto }}" height="100px" width="100px" alt="">       
           
        </div>
        @endif
        <input type="file" name="foto" id="foto" class="form-control">
    </div>
    @if(count($errors)>0)
    <div class="alert alert-danger mt-2" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
      
   
            <li>
                <strong>  {{$item}}</strong> 
            </li>
            @endforeach
        </ul>
       
    </div>
    
    
@endif
    <div class="d-flex justify-content-around mt-3 ">
        <button type="submit" class="btn btn-warning">{{$modo}}</button>
    
        <a href="{{url('/product')}}" class="btn btn-warning">Regresar</a>
    </div>
   
</div>

