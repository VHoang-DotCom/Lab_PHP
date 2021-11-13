@extends('furnitures.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Furniture Management</h2>

        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px;margin-bottom: 10px;">
            <a class="btn btn-success" href="{{route('furnitures.create')}}">Add Furniture</a>
        </div>
    </div>

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    @if(sizeof($furnitures)>0)
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Avatar</th>
                <th width="300px">More</th>
            </tr>

            @foreach($furnitures as $furniture)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$furniture->productCode}}</td>
                    <td>{{$furniture->name}}</td>
                    <td>{{$furniture->price}}</td>
                    <td><img src="{{$furniture->avatar}}" alt="" /></td>
                    <td>
                        <form action="#" method="post">
                            <a class="btn btn-info" href="#">Show</a>
                            <a class="btn btn-primary" href="#">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
    <div class="alert alert-alert">Start Adding to the Database</div>
        @endif
    {!! $furnitures->links() !!}
@endsection
