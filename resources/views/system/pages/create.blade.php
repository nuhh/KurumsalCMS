@extends('system.theme.main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        {{ Form::open([ 'route' => 'page.store', 'class' => 'form' ]) }}
            <div class="card-body">
              <div class="form-group">
                <label>Başlık</label>
                {{ Form::text('title', null, [ 'class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Slug</label>
                {{ Form::text('slug', null, [ 'class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>İçerik</label>
                {{ Form::textarea('content', null, [ 'class' => 'form-control', 'id' => 'summernote' ]) }}
              </div>
            </div>
            <div class="card-footer">
                {{ Form::submit('Kaydet', [ 'class' => 'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('pageJs')
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
