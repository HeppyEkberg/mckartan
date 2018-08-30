<div class="col-md-12">
    @foreach($tags as $tag)
        <span class="label {{ $tag->class ? $tag->class : 'label-default' }}">{{ $tag->name }}</span>
    @endforeach
</div>