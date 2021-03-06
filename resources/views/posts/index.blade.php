@extends('layouts.app')
@section('title',isset($category)? $category->name : '帖子')
@section('content')
<div class="row">
  <div class="col-md-9 ">
    <div class="card ">
      <div class="card-header">
        <h1>
            {{ isset($category)? $category->name : '帖子' }}
            <a class="btn btn-success float-xs-right" href="{{ route('posts.create') }}">新建</a>
        </h1>
          @if(isset($category))
              <div class="category-description">
                    {{ $category->description }}
              </div>
          @endif

      </div>
      <div class="card-body">
          <div class="card-header bg-transparent">
              <ul class="nav nav-pills">
                  {{-- 排序 --}}

                  <li class="nav-item"><a class="nav-link @if(request('order') !== 'recent') active @endif" href="{{ request()->url().'?order=reply' }}">最后回复</a></li>
                  <li class="nav-item"><a class="nav-link @if(request('order') === 'recent') active @endif" href="{{ request()->url().'?order=recent' }}">最新发布</a></li>
              </ul>
          </div>

          <ul class="media-list">
              {{--帖子列表--}}
              @include('posts._post_list')
          </ul>

          {{--页码--}}
          {!! $posts->appends(['order'=>request('order')])->render() !!}
      </div>
    </div>
  </div>
    <div class="col-md-3">
        {{--右侧导航--}}
        @include('posts._right_side')
    </div>
</div>
@endsection
