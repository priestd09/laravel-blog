@extends('blog::admin/layouts/master')

@section('title')
    {{ $post->title }} (edit)
@stop

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h2>{{ $post->title }}</h2>
                
                <div class="margin-top-lg">
                    {!! Form::model($post, ['route' => ['blog::admin.posts.update', $post->id]]) !!}
                    
                    {{ method_field('PUT') }}
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            Please check your input and correct any errors.
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group {{ Html::highlightOnError('title') }}">
                                <label for="title" class="form-control-label">Title</label>
                                {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'maxlength' => 80, 'required']) !!}
                                {!! Html::error('title') !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ Html::highlightOnError('slug') }}">
                                <label for="slug" class="form-control-label">Slug</label>
                                <slug-input-field id="slug" name="slug" class="form-control" value="{{ old('slug') ?? $post->slug }}" maxlength="80" read-from="#title" required></slug-input-field>
                                {!! Html::error('slug') !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ Html::highlightOnError('published_at') }}">
                                <label for="published_at" class="form-control-label">Publish date</label>
                                {!! Form::date('published_at', old('published_at') ?? $post->published_at ?? \Carbon\Carbon::now(), ['id' => 'published_at', 'class' => 'form-control', 'maxlength' => 9]) !!}
                                {!! Html::error('published_at') !!}
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group {{ Html::highlightOnError('is_draft') }}">
                                <label for="is_draft" class="form-control-label">Draft</label>
                                <div class="onoffswitch onoffswitch-form-control">
                                    {!! Form::hidden('is_draft', 0) !!}
                                    {!! Form::checkbox('is_draft', 1, null, ['id' => 'is_draft', 'class' => 'onoffswitch-checkbox']) !!}
                                    <label for="is_draft" class="onoffswitch-label"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group {{ Html::highlightOnError('body') }}">
                        <markdown-editor name="body" id="body" class="form-control" maxlength="4194303" rows="12">{{ old('body') ?? $post->body }}</markdown-editor>
                        {!! Html::error('body') !!}
                    </div>
                    
                    <div class="row flex-items-xs-middle">
                        <div class="col-md-6">
                            <a class="text-muted" href="#" title="Delete this post" data-toggle="modal" data-target="#delete-post-modal">Delete&hellip;</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            
            </div>
        </div>
    </div>
    
    @include('blog::admin/partials/delete-post-modal')

@stop