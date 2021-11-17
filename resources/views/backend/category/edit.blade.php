@extends('backend.layouts.master')

@section('main-content')

<div class="card">
  <div class="row">
    <div class="col-md-12">
      @include('backend.layouts.notification')
    </div>
  </div>
  <h5 class="card-header">Edit Category</h5>
  <div class="card-body">
    <form method="post" action="{{route('category.update',$category->id)}}">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name" value="{{$category->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
          <!-- Kiểm tra xem trạng thái của category hiện tại đang là active hay inactive rồi gán vào opption tương ứng -->
          <option value="active" {{(($category->status=='active')? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($category->status=='inactive')? 'selected' : '')}}>Inactive</option>
        </select>
        @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group mb-3">
        <button class="btn btn-success" type="submit">Update</button>
      </div>
    </form>
  </div>
</div>

@endsection
