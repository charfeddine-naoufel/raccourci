@extends('layouts.app')

@section('content')
<div class="container">
<div class="row d-flex justify-content-center align-items-center rows">

<div class="col-md-12">


    <div class="card px-5">


        <div class="text-center">

            <h2 class=" mt-3">Tape URL and click ShortURL</h2>

            <div class="mx-5">


               <div class="input-group mb-3 mt-4">
                  <input type="text" class="form-control" placeholder="Your URL ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-success border-rad" type="button" id="button-addon2">Short URL</button>
                </div>
                

            </div>
            
        </div>
        <div class=" table-responsive mt-5 ">
                    <table class="table">
                        <thead class="thead-dark" >
                            <tr>
                                <th>#</th>
                                <th>url</th>
                                <th>URL Shorted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>www.google.com</td>
                                <td>localhost/xvc5F</td>
                                
                                <td>
                                    
                                        <a href="#" ><i class="fa fa-edit text-success fa-2x"></i></a>
                                        <a href="#" ><i class="fa fa-trash text-danger fa-2x"></i></a>
                                   
                                </td>
                            </tr>
                            
                           
                            
                            
                        </tbody>
                    </table>
                </div>
        
    </div>
    
</div>




</div>
</div>
@endsection
