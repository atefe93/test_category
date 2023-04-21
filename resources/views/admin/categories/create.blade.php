@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-5">
        <div class="card mb-4 wow fadeIn">
            <div class="card-body d-sm-flex justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="#" target="_blank">صفحه اصلی</a>
                    <span>/</span>
                    <span>ثبت دسته بندی</span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            {{csrf_field()}}
            <section class="section card mb-5">

                <div class="card-body">
                    <h5 class="pb-5">ثبت دسته</h5>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="md-form">
                                <select title="category_id" name="parent_id" class="browser-default custom-select">
                                    <option value="{{null}}">بدون والد</option>
                                    @foreach($parentCategories as $cat)

                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('parent_id'))
                                <span class="help-block sub-error " >
                                       {{$errors->first('parent_id')}}
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="md-form">
                                <input type="text" id="form1" name="title" value="{{old('title')}}"
                                       class="form-control">
                                <label for="form1" class="">نام دسته :</label>

                                @if($errors->has('title'))
                                    <span class="help-block sub-error " >
                                       {{$errors->first('title')}}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <br>
            <br>
            <button type="submit" class="btn btn-info">ثبت دسته</button>
        </form>
    </div>
@endsection
@section('extraCSS')

@endsection
@section('extraJS')
    <script>
        function preview_images() {
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
            }
        }
    </script>
@endsection
