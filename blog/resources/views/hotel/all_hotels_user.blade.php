@extends('layout.master')

@section('content')

    <section class="header header-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Listing Menu</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since </p>
                            <div class="ui breadcrumb">
                                <a href="index.html" class="section">Home</a>
                                 <div class="divider"> / </div>
                                <div class="active section">Blog Details</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="destination_details">
        <section id="experience">
            <div class="container">
                <div class="row">


                    <div class="col-sm-12">
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                            <tr><th>Sr</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $h)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$h->propertyName}}</td>
                                    <td>{{$h->propertyType}}</td>
                                    <td>{{$h->contact}}</td>
                                    <td>{{$h->city}}</td>
                                    <td><a href="{{url('/hotels/'.$h->id.'/view')}}" class="btn btn-success">View Details</a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                    </div>
        </section>
        </div>
        </div>


        </div>


        </div>

        </div>
        </section>

    </main>
@endsection