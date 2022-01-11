@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách slider</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListSlider')}}">slider</a></li>
                    <li class="breadcrumb-item active">Danhsachslider</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả: {{count($listSlider)}}</h3>
        @if($listSlider->lastPage()>1)
        <div class="card-tools">
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="?page={{$listSlider->currentPage()==1?$listSlider->currentPage():$listSlider->currentPage()-1}}">«</a></li>
                    @for($i=0;$i<$listSlider->lastPage();$i++)
                    <li class="page-item "><a class="page-link {{$listSlider->currentPage()==$i+1?'active_page':''}}" href="?page={{$i+1}}">{{$i+1}}</a></li>
                   @endfor
                    <li class="page-item"><a class="page-link" href="?page={{$listSlider->currentPage()==$listSlider->lastPage()?$listSlider->currentPage():$listSlider->currentPage()+1}}">»</a></li>
                </ul>
            </div>
        </div>
        @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th >ID</th>
                    <th>Tên slider</th>
                    <th>Hình ảnh</th>
                    <th>Link</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listSlider as $slider)
                <tr>
                    <td>{{$slider->id}}</td>
                    <td>{{$slider->name}}</td>
                    <td>
                        <img src=" {{$slider->image}}" alt="ảnh sản phẩm" style="width:180px;height:100px;">
                    </td>
                    <td>{{$slider->url}}</td>
                    <td>{{$slider->content}}</td>
                    <td>
                        @if($slider->active==1)
                        <span class="badge bg-success">active</span>
                        @else
                        <span class="badge bg-danger">stop</span>
                        @endif
                    </td>
                    <td>{{$slider->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$slider->updated_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="./editSlider/{{$slider->id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" onclick="delete_slider('{{$slider->id}}')"><i class="far fa-trash-alt"></i></button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection