@extends('admin.layouts.root')

@section('title', 'Product | Create product')

@section('content-page')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product - Create product</h1>
            <a href="{{ route(ROUTE_PRODUCT['INDEX']) }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">List product</a>
        </div>

        <div class="d-flex justify-content-center">
            <div class="w-50">
                <form id="handle-category" action="{{ route(ROUTE_PRODUCT['STORE']) }}" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nameCategory" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <label>Avatar</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input name="avatar" class="d-none" type='file' id="image-upload"
                                           accept=".png,.jpg,.jpeg"/>
                                    <label for="image-upload">
                                        <div class="btn btn-primary icon-btn">
                                            <i class="fa fa-plus"></i> {{ __('Chọn file') }}
                                        </div>
                                    </label>
                                </div>
                                <div class="avatar-preview mt-2">
                                    <img class="profile-user-img img-responsive img-circle object-fit-cover d-none image-avatar-preview"
                                         id="image-preview"
                                         alt="User profile picture">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row error-message error_avatar"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Secondary photo</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input name="sub_image[]" multiple="" data-max_length="10" id="image-upload-multiple"
                                           class="d-none upload_multiple" type='file' accept=".png,.jpg,.jpeg"/>
                                    <label for="image-upload-multiple">
                                        <div class="btn btn-primary icon-btn">
                                            <i class="fa fa-plus"></i> {{ __('Chọn file') }}
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row upload__img-wrap">
                            @if(!empty($product->sub_image))
                                @foreach($product->sub_image as $subImage)
                                    <div class="upload__img-box">
                                        <div style="background-image: url('{{ $subImage['url'] }}')" data-number="0" data-file="download (6).jpeg" class="img-bg">
                                            <div class="upload__img-close remove-sub-image" data-sub_image_remove="{{ $subImage['id'] }}"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-12 row error-message error_sub_image"></div>
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
    <script src="{{ asset('admin_asset/js/product.js') }}" type="module"></script>
@endsection
