@extends('admin.layout.master')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="page-header callout-info d-flex justify-content-between">
                        <h2>Edit Role</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card page-body">
            <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                @method('put')
                @csrf


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name ar</label>
                            <input type="text" name="name_ar" class="form-control" value="{{$role->name_ar}}" placeholder="Enter ..." required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name en</label>
                            <input type="text" name="name_en" class="form-control" value="{{$role->name_en}}" placeholder="Enter ..." required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{editRole($role->id)}}
                </div>
                <div class="m-5">
                    <input type="submit" value="Save" class="btn btn-success form-control" >
                </div>
            </form>
        </div>
    </section>


@endsection

@section('script')
    <script>
        $(function () {
            $('.roles-parent').change(function () {

                var childClass = '.' + $(this).attr('id');
                if (this.checked) {

                    $(childClass).prop("checked", true);

                } else {

                    $(childClass).prop("checked", false);
                }
            });
        });


        $("#checkedAll").change(function () {
            if (this.checked) {
                $("input[type=checkbox]").each(function () {
                    this.checked = true
                })
            } else {
                $("input[type=checkbox]").each(function () {
                    this.checked = false;
                })
            }
        });
    </script>
@endsection

