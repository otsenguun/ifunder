@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')
    <div class="content-wrapper">
       <div class="row">
           <div class="container">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <h4>Partners Add</h4>
                   </div>
                   <div class="panel-body">
                       <form action="{{url('admin/partners/post')}}" method="post" enctype="multipart/form-data">
                           {{csrf_field()}}
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="title"> Title </label>
                                   <input type="text" name="title" id="title" class="form-control" required/>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="title"> Link </label>
                                   <input type="text" name="links" id="title" class="form-control" required/>
                               </div>
                           </div>
                           <div class="col-md-12">
                               <div class="form-group">
                                   <label for="exampleInputFile">File input</label>
                                   <input type="file" id="exampleInputFile" name="file">
                                   <p class="help-block">choose partners logo.</p>
                               </div>

                               <div class="form-group">
                                   <input type="submit" class="btn btn-primary pull-left" name="send" id="send" value="save" >

                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <!-- /.content-wrapper -->
    @include('admin.partials.footer')

@endsection