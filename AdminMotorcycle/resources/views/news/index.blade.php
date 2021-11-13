@extends('layout.index')
@section('content')

    <main id="main" class="main">
    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item">Blogs</li>
                <li class="breadcrumb-item active">List Blogs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('news.create')}}">Add Blogs</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Show Blogs here -->
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif

        @if(sizeof($news)>0)

        <section class="section">
            <div class="row align-items-top">
                <div class="col-lg-6">

                    @foreach($news as $new)
                    <!-- Default Card -->
                    <div class="card" >
                        <div class="card-header">Author : {{createdBy}}</div>
                        <div class="card-body">

                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{image}}"  class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{route('news.show',$new->newsID)}}">{{title}}</a></h5>
                                        <p class="card-text">{{description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" >
                            <form action="{{route('news.destroy',$news->newsID)}}" method="post">
                            <p style="float: right; margin-left: 40px;" class="card-text"><a href="" class="btn btn-primary"><i class="bi bi-download"></i>  Download</a></p>
                                <p style="float: right" class="card-text"><a href="{{route('news.edit',$new->newsID)}}" class="btn btn-primary"><i class="bi bi-file-earmark-font"></i>  Update</a></p>
                                @csrf
                                @method('DELETE')
                            <p style="float: right; margin-left: 40px;" class="card-text" type="submit"><a class="btn btn-primary"><i class="bi bi-trash"></i>   Delete</a></p>

                            </form>
                        </div>
                    </div><!-- End Card with header and footer -->
                        @endforeach

                        @else
                            <div class="alert alert-alert">Start Adding to the Database.</div>
                        @endif

                        {!! $news->links() !!}

                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection

