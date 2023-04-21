@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="#" target="_blank">صفحه اصلی</a>
                    <span>/</span>
                    <span>لیست دسته بندی ها</span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-striped table-striped--vertical">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            نوع دسته
                        </th>
                        <th>
                            نام دسته
                        </th>

                        <th>
                            عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <th>
                                @if ($category->parent_id == 0)
                                    نوع دسته: بدون والد
                                @else
                                    نوع دسته:{{ $category->parent->title }}
                                @endif
                            </th>
                            <td>
                                <span class="u-bold">{{$category->title}}</span>
                            </td>


                            <td class="">
                                <form method="post" action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" style="display: inline-block;">
                                    {{csrf_field()}}
                                    @method('delete')
                                    @if($category->children()->count() == 0)
                                    <button type="submit" class="btn btn-sm btn-delete btn-fill"
                                            onclick="return confirm('آیا مطمئن هستید؟')">
                                        <i class="fas fa-user-minus"></i>
                                        حذف
                                    </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-delete btn-fill"
                                                onclick="return confirm('این دسته بندی دارای زیر دسته است در صورت حذف همراه با زیر دستها حذف می شود ')">
                                            <i class="fas fa-user-minus"></i>
                                            حذف
                                        </button>
                                    @endif
                                </form>

                                <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-primary btn-fill">
                                    <i class="far fa-edit"></i>
                                    ویرایش
                                </a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
            {{$categories->links()}}
        </div>



    </div>






    <br>
    <br>

    <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">

        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.categories.create') }}">
            <i class="fa fa-plus"></i>
            ایجاد دسته بندی
        </a>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection
@section('extraCSS')
    <style>
        .pagination{
            text-align: center;
            margin: auto;
            margin-top: 15px;
        }
    </style>


@endsection
@section('extraJS')
@endsection
