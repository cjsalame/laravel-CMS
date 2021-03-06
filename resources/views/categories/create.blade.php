@extends('layouts.app')
@section('title')
Add Category
@endsection
@section('content')
<div class="card card-default">
  <div class="card-header">
    {{ isset($category) ? 'Edit Category' : 'Add Category' }}
  </div>
  <div class="card-body">
    @include('partials.errors')
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
      @csrf
      @if(isset($category))
        @method('PUT')
      @endif
      <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ isset($category) ? $category->title : '' }}">
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success">
          {{ isset($category) ? 'Update' : 'Add' }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
