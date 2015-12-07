@extends ('theme.portfolio')

@section ('content')
	
<!-- Projects Row -->
<div class="row">
    @foreach ($images as $image)
    <div class="col-md-3 col-sm-6 portfolio-item">
        <a href="#" data-toggle="modal" data-target=".photo-modal-lg" data-standard-resolution="{{ $image->standard_resolution }}" data-caption-text="{{ $image->caption_text }}" data-link="{{ $image->link }}">
            <img class="img-responsive" src="{{ $image->low_resolution }}" alt="">
        </a>
    </div>
    @endforeach
</div>
<!-- /.row -->

@stop