


@foreach($children->children as $child)

    @if($child->children()->count()>0)
        <li class="menu-section">
            <a href="#" class="menu-section-header">{{$child->title}}</a>
            <ul class="menu-section-content">

                @include('site.partial', ['children' => $child])

            </ul>
        </li>
    @else

        <li><a href="#">{{$child->title}}</a></li>
    @endif
@endforeach
