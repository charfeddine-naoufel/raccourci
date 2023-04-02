@extends('layouts.app')

@section('content')
<div class="container">
<div class="row d-flex justify-content-center align-items-center rows">

<div class="col-md-12">


    <div class="card px-5">


        <div class="text-center">

            <h2 class=" mt-3">{{__('contenu.slogan2')}}</h2>

            <div class="mx-5">

                <form action="{{ route('links.store') }}" method="post">

                    @csrf
                    <div class="input-group mb-3 mt-4">
                       <input type="text" class="form-control" placeholder="{{{__('contenu.placeholder')}}}" name="url">
                       <button class="btn btn-success border-rad" type="submit" id="button-add">{{__('contenu.shorturl')}}</button>
                    </div>
                    @error('url')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                     @enderror
                </form>
                

            </div>
            
        </div>
        <div class=" table-responsive mt-5 ">
                    <table class="table">
                        <thead class="thead-dark" >
                            <tr>
                                <th>#</th>
                                <th>URL</th>
                                <th>{{__('contenu.urlshorted')}}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($links as $link)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$link->url}}</td>
                                <td><a href="{{route('short',$link->url)}}"  target="_blank" > {{$link->url_shorted}} </a></td>
                                
                                <td>
                                <form action="{{ route('links.destroy',$link->id) }}" method="POST">
                                @csrf

                                    @method('DELETE')
                                        <!-- <a href="#" ><i class="fa fa-edit text-success fa-2x"></i></a> -->
                                        <button type="submit" class="btn btn-link" {{ auth()->user()->id === $link->user_id ? "" : "disabled" }} ><i class="fa fa-trash text-danger fa-2x"></i></button>
                                </form>  
                                </td>
                            </tr>
                            
                           @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
        
    </div>
    
</div>




</div>
</div>
@endsection
