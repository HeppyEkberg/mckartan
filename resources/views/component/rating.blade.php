<ul class="list-unstyled list-inline rating">
    @for($i = 0; $i < 5; $i++)
        @if($rating >= ($i + 1))
            <li class="star filled"><i class="fas fa-star"></i></li>
        @elseif($rating > $i and ($rating - $i) > 0 and ($rating - $i) < 1)
            <li class="star filled"><i class="fas fa-star-half"></i></li>
        @else
            <li class="star"><i class="far fa-star"></i></li>
        @endif
    @endfor
    <li>{{ $rating }}/5</li>
    <li>(x röster)</li>
</ul>