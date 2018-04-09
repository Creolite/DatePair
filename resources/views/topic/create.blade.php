@extends('home')

@section('content')
    <div class="widget nopadding clearfix">
    <div class="panel panel-primary nopadding">
        <div class="panel-heading">
            <h3 class="panel-title">
                Write something amazing! <i class="fa fa-smile-o" style="color: yellow; margin-left: 5px;"></i>
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

            <form method="post" action="{{ route('addTopic') }}" class="">
                {{ csrf_field() }}

                {{-- Title --}}
                <div class="form-group label-floating">
                    <label class="control-label" for="title">Topic Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required />
                </div>

                <div class="row">
                    {{-- Category (Forum) --}}
                    <div class="form-group label-floating col-lg-6 col-md-6">
                        <label class="control-label" for="forums_id">Category</label>
                        <select name="forums_id" id="forums_id" class="form-control" >
                            @include('components.options', [
                                'name' => 'forums_id', 'items' => $categories, 'value' => 'id',
                                'label' => 'name', 'selected' => old('forums_id')
                            ])
                        </select>
                    </div>

                    {{-- Subcategory (Trend) --}}
                    <div class="form-group label-floating col-lg-6 col-md-6">
                        <label class="control-label" for="trends_id">Subcategory</label>
                        <select name="trends_id" id="trends_id"  class="form-control" >
                            @include('components.options', [
                                'name' => 'trends_id', 'items' => $trends, 'value' => 'id',
                                'label' => 'name', 'selected' => old('trends_id')
                            ])
                        </select>
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group label-floating">
                    <label class="control-label" for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                </div>

                <div class="row newtopcheckbox">
                    {{-- Privacy | Scope --}}
                    <div class="col-sm-6 col-md-6">
                        <label class="control-label">Who can see this?</label>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="privacy" @if(!old('privacy') or old('privacy') == 1) checked @endif id="tp_1" value="1" />
                                        Everyone
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="privacy" @if(old('privacy') == 2) checked @endif id="tp_2" value="2" />
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
                                        <input type="checkbox" name="share_fb" id="share_fb" @if(old('share_fb')) checked @endif />
                                        <i class="fa fa-facebook-square"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="share_tw" id="share_tw" @if(old('share_tw')) checked @endif />
                                        <i class="fa fa-twitter"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="share_gp" id="share_gp" @if(old('share_gp')) checked @endif />
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
                </div>
            </form>

        </div>
    </div>
</div>
@endsection