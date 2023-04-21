@extends('layouts.app')
@section('extraCSS')

    <link href="/site/assets/css/style.css" rel="stylesheet">
@endsection
@section('content')
@if($categories->count()>0)
    <nav class="accordion-menu">
        <ul class="menu-sections">
            @foreach($categories as $category)

                <li class="menu-section">
                    <a href="#" class="menu-section-header">{{$category->title}}</a>
                    <ul class="menu-section-content">
                        @if($category->children()->count()>0)

                                @include('site.partial', ['children' => $category])

                        @endif
                    </ul>
                </li>

            @endforeach

        </ul>
    </nav>
@else
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                لطفا به قسمت پنل سایت رفته و دسته بندی های مورد نظر خود را ایجاد کنید
            </div>
        </div>
    </div>
@endif


@endsection

@section('extraJS')
    <script>
        $(function () {
            $('.menu-section-header').click(function (e) {
                e.preventDefault();
                $(this).next('.menu-section-content').slideToggle();
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection

