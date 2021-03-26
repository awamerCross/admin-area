@extends('admin.layout.master')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="page-header callout-primary d-flex justify-content-between">
                        <h2>الاعدادات</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card page-body">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs text-md" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#main-tab" role="tab" aria-controls="to-main" aria-selected="true">إعدادات التطبيق</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="pill" href="#social-tab" role="tab" aria-controls="to-social" aria-selected="false">مواقع التواصل</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="pill" href="#terms-tab" role="tab" aria-controls="to-terms" aria-selected="false">الشروط والاحكام</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-toggle="pill" href="#about-tab" role="tab" aria-controls="to-about" aria-selected="false">من نحن</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-two-tabContent">

                <!---------------- Main ------------------>
                <div class="tab-pane fade show active" id="main-tab" role="tabpanel" aria-labelledby="to-main">

                  <form accept="{{route('admin.settings.update')}}" method="post">
                      @method('put')
                      @csrf

                      <div class="row">
                          
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>البريد الالكتروني</label>
                              <input type="email" name="email" class="form-control" value="{{$data['email']}}"  required>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>رقم الهاتف</label>
                                  <input type="number" name="phone" class="form-control" value="{{$data['phone']}}" required>
                              </div>
                          </div>
                        
                          <div class="col-sm-6">
                            <div class="form-group"><button type="submit" class="btn btn-primary">حفظ</button></div>
                          </div>
                
                      </div>
                  </form>
                </div>

                <!---------------- Social ------------------>
                <div class="tab-pane fade" id="social-tab" role="tabpanel" aria-labelledby="to-social">
                  <form accept="{{route('admin.settings.update')}}" method="post">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>رابط الفيسبوك</label>
                            <input type="url" name="facebook" class="form-control" value="{{$data['facebook']}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>رابط الانستجرام</label>
                                <input type="url" name="instagram" class="form-control" value="{{$data['instagram']}}"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>رابط تويتر</label>
                            <input type="url" name="twitter" class="form-control" value="{{$data['twitter']}}"  required>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group"><button type="submit" class="btn btn-primary">حفظ</button></div>
                  
                  </form>
                </div>

                <!---------------- Terms ------------------>
                <div class="tab-pane fade" id="terms-tab" role="tabpanel" aria-labelledby="to-terms">

                  <form accept="{{route('admin.settings.update')}}" method="post">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>الشروط والاحكام بالعربية</label>
                            <textarea name="terms_ar" class="form-control" rows="10">{{$data['terms_ar']}}</textarea>
                          </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>الشروط والاحكام بالانجليزية</label>
                              <textarea name="terms_en" class="form-control" rows="10">{{$data['terms_en']}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group"><button type="submit" class="btn btn-primary">حفظ</button></div>
                        </div>
                    </div>

                  </form>
                </div>

                <!---------------- About ------------------>
                <div class="tab-pane fade" id="about-tab" role="tabpanel" aria-labelledby="to-about">
                  <form accept="{{route('admin.settings.update')}}" method="post">
                    @method('put')
                    @csrf

                    <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>من نحن بالعربية</label>
                            <textarea name="about_ar" class="form-control" rows="10">{{$data['about_ar']}}</textarea>
                          </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                              <label>من نحن بالانجليزية</label>
                              <textarea name="about_en" class="form-control" rows="10">{{$data['about_en']}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group"><button type="submit" class="btn btn-primary">حفظ</button></div>
                        </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
