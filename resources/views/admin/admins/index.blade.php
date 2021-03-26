@extends('admin.layout.master')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="page-header callout-primary d-flex justify-content-between">
                        <h2>المشرفين</h2>
                        <button type="button" data-toggle="modal" data-target="#addModel" class="btn btn-primary btn-wide waves-effect waves-light">
                            <i class="fas fa-plus"></i> اضافة مشرف
                        </button>
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
                        <th>الاسم</th>
                        <th>البريد الالكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>الحالة</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $ob)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ob->name}}</td>
                            <td>{{$ob->email}}</td>
                            <td>{{$ob->phone}}</td>
                            <td>
                                @if($ob->block)
                                    <span class="badge badge-danger p-2">محظور</span>
                                @else
                                    <span class="badge badge-success p-2">فعال</span>
                                @endif
                            </td>
                            <td>
                            <button class="btn btn-success mx-2"  onclick="edit({{$ob}})" data-toggle="modal" data-target="#editModel"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger" onclick="confirmDelete('{{route('admin.admins.delete',$ob->id)}}')" data-toggle="modal" data-target="#delete-model">
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


 <!-- add model -->
 <div class="modal fade" id="addModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">اضافة مشرف</h4></div>
            <form action="{{route('admin.admins.store')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row">

                        <div class = "col-sm-12 text-center">
                            <label class = "mb-0">الصورة الشخصية</label>
                            <div class = "text-center">
                                <div class = "images-upload-block single-image">
                                    <label class = "upload-img">
                                        <input type = "file" name = "avatar" id = "image" accept = "image/*" class = "image-uploader" required>
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </label>
                                    <div class = "upload-area"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" name="password" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الصلاحية</label>
                                <select name="role_id" class="form-control">
                                    <option value="" selected hidden disabled>اختر الصلاحية</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add model -->

<!-- edit model -->
<div class="modal fade" id="editModel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h4 class="modal-title">تعديل مشرف</h4></div>
            <form action=""  id="editForm" method="post" role="form" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="row">

                        <div class = "col-sm-12 text-center">
                            <label class = "mb-0">الصورة الشخصية</label>
                            <div class = "text-center">
                                <div class = "images-upload-block single-image">
                                    <label class = "upload-img">
                                        <input type = "file" name = "avatar" id = "image" accept = "image/*" class = "image-uploader">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </label>
                                    <div class = "upload-area" id="upload_area_img"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control" id="phone" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" name="password" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الصلاحية</label>
                                <select name="role_id" class="form-control" id="role_id" required>
                                    <option value="" selected hidden disabled>اختر الصلاحية</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <div class="icheck-primary d-inline mx-2">
                                    <input type="checkbox" name="block"  id="block">
                                    <label for="block" dir="ltr"></label>
                                </div>
                                <label for="block">حظر</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end edit model -->

@endsection
@section('script')
    <script>
        
        function edit(ob){

            $('#editForm')      .attr("action","{{route('admin.admins.update','obId')}}".replace('obId',ob.id));
            $('#name')          .val(ob.name);
            $('#phone')         .val(ob.name);
            $('#email')         .val(ob.name);

            if ( ob.block == 1 )
                $( "#block" ).attr( 'checked', '' );
            else
                $( "#block" ).removeAttr( 'checked', '' );

            $( '#role_id option' ).each( function () {
                if ( $( this ).val() == ob.role_id )
                    $( this ).attr( 'selected', '' )
            } );

            let image = $( '#upload_area_img' );
            image.empty();
            image.append( '<div class="uploaded-block" data-count-order="1"><img src="' + ob.avatar + '"><button class="close">&times;</button></div>' );
        }
    </script>
@endsection