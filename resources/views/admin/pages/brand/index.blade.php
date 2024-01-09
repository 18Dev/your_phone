@extends('admin.layouts.root')

@section('title', 'Brand | List brand')

@section('content-page')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand - List brand</h1>
            <a href="{{ route(ROUTE_BRAND['CREATE']) }}"
               class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Create brand</a>
        </div>

        <div id="list-brand">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="w-25">Handle</th>
                </tr>
                </thead>
                <tbody>
                @include('admin.pages.brand.table')
                </tbody>
            </table>
            <div class="render-paginate">
                {{ $brands->links('pagination.custom') }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin_asset/js/brand.js') }}" type="module"></script>
@endsection
