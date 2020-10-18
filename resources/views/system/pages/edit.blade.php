@extends('system.theme.main')

@section('title', 'Blog Kategorisi Oluştur')

@section('toolbar')
    <a href="{{ session('onceki') }}" class="btn btn-light-success font-weight-bolder btn-sm">İptal</a>
@endsection

@section('content')
    {!! Form::open([ 'route' => [ 'page.edit', $get['id'] ], 'class' => 'kt-form kt-form--label-right']) !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex flex-column">
                        <ul class="nav nav-tabs  nav-tabs-line" role="tablist">
                            @foreach(getAllLanguages() as $code => $name)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#tab_{{$code}}" role="tab">{{$name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach(getAllLanguages() as $code => $name)
                            <div class="tab-pane @if($loop->first) active @endif" id="tab_{{$code}}" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} Adı:</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('title[' . $code . ']', unserialize($get['title'])[$code], [ 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} Slug:</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('slug[' . $code . ']', unserialize($get['slug'])[$code], [ 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} İçerik:</label>
                                    <div class="col-lg-9">
                                        {{ Form::textarea('content[' . $code . ']', unserialize($get['content'])[$code], [ 'id' => 'kt-tinymce-4', 'class' => 'tox-target']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} SEO Description:</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('seo_description[' . $code . ']', unserialize($get['seo_description'])[$code], [ 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} SEO Description:</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('seo_keywords[' . $code . ']', unserialize($get['seo_keywords'])[$code], [ 'class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">{{ $name }} Ekstra:</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('extra[' . $code . ']', null, [ 'class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Ekle', ['class' => 'btn btn-success']) !!}
                        <button type="reset" class="btn btn-secondary">Formu Sıfırla</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@section('pageJs')
    <script src="{!! asset('backend/plugins/custom/tinymce/tinymce.bundle.js') !!}"></script>
    <script src="{!! asset('backend/js/pages/crud/forms/editors/tinymce.js') !!}"></script>
@endsection