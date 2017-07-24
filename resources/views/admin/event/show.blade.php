@extends('admin.layouts.app')
@section('content')
    @include('admin.partials.header')
    @include('admin.partials.side-menu')

    <?php function dazo_substr_small($txt='',$limit = 141){
        $buf = '';
        $k=0; //үсгийн байрлалыг тодорхойлоход ашиглагдана.

        for($i=0;$i<strlen($txt);$i++){

            $k++;

            $buf .= $txt{$i};
            if(ord($txt{$i})>207 && ord($txt{$i})<212){ //крилл үсэг үсэг байх тохиолдолд хийх үйлдэл
                $i++;
                $buf .= $txt{$i};
            }
            if($k>=$limit){ //авах үсгийн хязгаарт хүрмэгч зогсоно
                return $buf;
            }
        }
        return $buf;
    }

    ?>
    <div class="content-wrapper">
       <section class="content">
           <div class="row">
               <div class="col-md-12">
                @if(Session::has('event_delete'))
                            <p class="alert alert-success">{{ Session::get('event_delete') }}</p>
                        @endif
                  <div class="box">
                      <div class="box-header">
                          <h4>Event</h4>
                          <div class="btn-group">
                              <a href="{{ url('admin/event/add') }}" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add</a>
                          </div>
                      </div>
                      <div class="box-body">
                          <div class="box-body table-responsive no-padding">
                              <table class="table table-condensed">
                                  <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Image</th>
                                      <th>More</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($data as $d)
                                      <tr>
                                          <td width="50px;">{!! $d->id !!}</td>
                                          <td>{!! $d->title !!}</td>
                                          <td>{!! dazo_substr_small($d->body,200) !!}</td>
                                          <td><img style="width: 200px;" src="/public/uploads/event/news/{{$d->image}}"></td>
                                          <td style="width: 150px;">
                                              <div class="btn-group">
                                                  <a href="{{ url('admin/event/edit',array($d->id)) }}" type="button" class="btn btn-success"><i class="fa fa-pencil "></i></a>
                                                 <form method="POST" action="{{ url('admin/event/delete', $d->id) }}" class="delete_form">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="_method" value="DELETE">
                                                  
                                                  <button class="btn btn-danger btn-md" id="delete-btn">
                                                      <i class="fa fa-trash delete-white"></i>
                                                  </button>
                                              </form>
                                              </div>
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
       </section>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')

@endsection