@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Tỉnh thành</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($cities) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($cities as $citie)
                        <tr>
                            <th scope="row">{{$citie->id}}</th>
                            <td>{{ $citie->name }}</td>
                            <td>{{ count($citie->customers) }}</td>
                            <td><a href="{{route('cities.edit',['id'=>$citie->id])}}">sửa</a></td>
                            <td><a href="{{route('cities.destroy',['id'=>$citie->id])}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('cities.create')}}">Thêm mới</a>
            <a class="btn btn-primary" href="{{route('cities.customers')}}">Danh sách khách hàng</a>
        </div>
    </div>
@endsection