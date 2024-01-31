@extends('admin.layouts.root')

@section('title', 'Brand | Create brand')

@section('content-page')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand - Create brand</h1>
            <a href="{{ route(ROUTE_BRAND['INDEX']) }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">List brand</a>
        </div>

        <div class="d-flex justify-content-center">
            <div class="w-50">
                <form id="handle-category" action="{{ route(ROUTE_BRAND['STORE']) }}" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nameCategory" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Avatar</label>
                        <input type="file" name="avatar" id="image-input" accept="image/png, image/jpeg, image/jpg" class="form-control">
                    </div>
                    <div class="mb-3">
                        <img id="image-preview" src="#" alt="Image Preview" class="d-none image-avatar-preview">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin_asset/js/brand.js') }}" type="module"></script>
@endsection
