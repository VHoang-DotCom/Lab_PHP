@extends('furnitures.layout')
@section('content')


  <div class="row">
      <div class="col-lg-12">
          <h2 class="text-center">Add Furniture</h2>
      </div>
      <div class="col-lg-12 text-center" style="margin-top:10px; margin-bottom: 10px;">
          <a class="btn btn-primary" href="{{route('furnitures.index')}}">Back</a>
      </div>
  </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops !</strong> There were some problems with your input. <br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('furnitures.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Code :</strong>
                    <input type="text" name="productCode" class="form-control" placeholder="Product Code">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name :</strong>
                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product price :</strong>
                    <input type="number" name="price" class="form-control" placeholder="Product Price">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product avatar :</strong>
                    <input type="file"  name="avatar" class="form-control" placeholder="Product Avatar">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
@endsection
