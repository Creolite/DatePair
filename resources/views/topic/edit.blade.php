@extends('home')

@section('content')
    <div class="widget nopadding clearfix">
    <div class="panel panel-primary nopadding">
        <div class="panel-heading">
            <h3 class="panel-title">
                Edit Mode: <strong>{{ $topic->title }}</strong>
            </h3>
            {{-- insert happy smmiley here --}}
        </div>
        <div class="panel-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('saveTopic', $topic->title_slug) }}" class="">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                {{-- Title --}}
                <div class="form-group label-floating">
                    <label class="control-label" for="title">Topic Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $topic->title }}" disabled />
                </div>

                <div class="row">
                    {{-- Category (Forum) --}}
                    <div class="form-group label-floating col-lg-6 col-md-6">
                        <label class="control-label" for="forums_id">Category</label>
                        <select name="forums_id" id="forums_id" class="form-control" >
                            @include('components.options', [
                                'name' => 'forums_id', 'items' => $categories, 'value' => 'id',
                                'label' => 'name', 'selected' => old('forums_id') ?: $topic->forums_id
                            ])
                        </select>
                    </div>

                    {{-- Subcategory (Trend) --}}
                    <div class="form-group label-floating col-lg-6 col-md-6">
                        <label class="control-label" for="trends_id">Subcategory</label>
                        <select name="trends_id" id="trends_id"  class="form-control" >
                            @include('components.options', [
                                'name' => 'trends_id', 'items' => $trends, 'value' => 'id',
                                'label' => 'name', 'selected' => old('trends_id') ?: $topic->trends_id
                            ])
                        </select>
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group label-floating">
                    <label class="control-label" for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ $topic->description }}</textarea>
                </div>

                <div class="row newtopcheckbox">
                    {{-- Privacy | Scope --}}
                    <div class="col-sm-6 col-md-6">
                        <label class="control-label">Who can see this?</label>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="privacy" @if(!$topic->privacy or $topic->privacy == 1) checked @endif id="tp_1" value="1" />
                                        Everyone
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="privacy" @if($topic->privacy == 2) checked @endif id="tp_2" value="2" />
                                        Only Friends
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Share --}}
                    <div class="col-sm-6 col-md-6">
                        <label class="control-label">Share on Social Networks</label>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="checkbox">
                                    <label>
                                        {{$topic->share}}
                                        <input type="checkbox" name="share_fb" id="share_fb" @if($topic->share_fb) checked @endif />
                                        <i class="fa fa-facebook-square"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="share_tw" id="share_tw" @if($topic->share_tw) checked @endif />
                                        <i class="fa fa-twitter"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="share_gp" id="share_gp" @if($topic->share_gp) checked @endif />
                                        <i class="fa fa-google-plus-square"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group clearfix">
                    <div class="submit-button pull-right">
                        <button type="submit" class="btn btn-raised btn-info gr">
                            <i class="material-icons">publish</i><span class="btn-text top right">Post</span>
                        </button>
                    </div>
                    <div class="route-nav-btn inline pull-left">
                        <a href="{{ route('topic', $topic->title_slug) }}" class="btn btn-fab btn-fab-mini btn-grey">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection