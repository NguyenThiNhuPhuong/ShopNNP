@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách mã giảm giá</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{route('adminListFeedback')}}">phan hoi</a></li>
                    <li class="breadcrumb-item active">Danh sach phan hoi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả: {{count($listFeedback)}}</h3>
        @if($listFeedback->lastPage()>1)
        <div class="card-tools">
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="?page={{$listFeedback->currentPage()==1?$listFeedback->currentPage():$listFeedback->currentPage()-1}}">«</a></li>
                    @for($i=0;$i<$listFeedback->lastPage();$i++)
                    <li class="page-item "><a class="page-link {{$listFeedback->currentPage()==$i+1?'active_page':''}}" href="?page={{$i+1}}">{{$i+1}}</a></li>
                   @endfor
                    <li class="page-item"><a class="page-link" href="?page={{$listFeedback->currentPage()==$listFeedback->lastPage()?$listFeedback->currentPage():$listFeedback->currentPage()+1}}">»</a></li>
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
                    <th>ID</th>
                    <th>User_id</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Ngày gửi</th>
                    <th>Ngày phản hồi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listFeedback as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{$feedback->user_id}}</td>
                    <td>{{$feedback->email}}</td>
                    <td>{{$feedback->content}}</td>
                    <td>
                        @if($feedback->active==0)
                        <span>Chưa xem</span>
                        @elseif($feedback->active==1)
                        <span>Đã xem</span>
                        @else
                        <span >Đã rep</span>
                        @endif
                    </td>
                    <td>{{$feedback->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$feedback->updated_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="delete_feedback('{{$feedback->code}}')"><i class="far fa-trash-alt"></i></button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection