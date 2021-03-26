@extends('admin.layout.master')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="page-header callout-primary d-flex justify-content-between">
                        <h2>الصلاحيات</h2>
                        <a href="{{route('admin.roles.create')}}" class="btn btn-primary btn-wide  waves-effect waves-light"><i class="fas fa-plus"></i> اضافة صلاحية</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card page-body">
            <div class="table-responsive">
                <table id="datatable-table" class="table table-striped table-bordered dt-responsive nowrap"  style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name ar</th>
                        <th>Name en</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $ob)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ob->name_ar}}</td>
                            <td>{{$ob->name_en}}</td>
                            <td>
                                <a href="{{route('admin.roles.edit',$ob->id)}}" class="btn btn-success mx-2"><i class="fas fa-edit"></i></a>
                                <button class="btn btn-danger" onclick="confirmDelete('{{route('admin.roles.delete',$ob->id)}}')" data-toggle="modal" data-target="#delete-model">
                                    <i class="fas fa-trash-alt"></i> 
                                </button>
                        
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
