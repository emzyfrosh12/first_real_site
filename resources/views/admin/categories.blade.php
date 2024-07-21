@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome John</h3>

                        </div>

                    </div>
                </div>
            </div>

            <form action="{{ route('admin.product.category') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mt-5"> Add Category </h2>

                                <div class="form-group ">

                                    <input type="text" class="form-control form-control-lg mt-3" name="name"
                                        placeholder="Product Name">
                                </div>

                                <div class="form-group">
                                    <select class="form-select form-select-lg" name="status"
                                        id="exampleFormControlSelect2">
                                        <option>avialiable</option>
                                        <option>out of stock</option>
                                        <option>awaiting restock</option>

                                    </select>
                                </div>

                                <button class="btn btn-md btn-primary">add</button>
                            </div>
                        </div>
                    </div>
            </form>

            <div class="col-md-1"></div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Categories</h2>


                        <form action="{{ route('admin.search.category') }}" method="GET">
                            <input class="form-control form-control-sm mt-3" type="text" name="search"
                                placeholder="Search ">
                            <button class="btn btn-md btn-secondary" type="submit">Search</button>
                        </form>


                        @foreach ($categories as $category)
                            <div class="row mt-4">

                                <div class="col-md-2">
                                    <p>{{ $category->name }}</p>
                                </div>
                                <div class="col-md-3 ">
                                    <p>{{ $category->status }}</p>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <a type="button" class="btn btn-sm btn-primary" href="">view</a>

                                    {{-- <a type="button" class="btn btn-sm btn-warning" href="/admin/edit/{{$category->id}}">edit</a> --}}

                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#{{ 'edit' . $category->id }}">edit</button>


                                    <a type="button" class="btn btn-sm btn-danger"
                                        href="{{ route('admin.delete.category', $category->id) }}">delete</a>

                                </div>


                            </div>
                        @endforeach

                        {{-- <div class="paginate">
                            {{ $categories->links('pagination::bootstrap-4') }}
                        </div> --}}

                    </div>
                </div>
            </div>

        </div>

        @foreach ($categories as $categoryE)
            @csrf
            <div class="modal fade" id="{{ 'edit' . $categoryE->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.update.category') }}" method="POST">

                                <div class="form-group ">
                                    <input type="hidden" name="id" value="{{ $categoryE->id }}">
                                    <input type="text" class="form-control form-control-lg mt-3" name="name"
                                        value="{{ $categoryE->name }}">
                                </div>



                                <div class="form-group">
                                    <select class="form-select form-select-lg" name="status"
                                        id="exampleFormControlSelect2">
                                        <option>avialiable</option>
                                        <option>out of stock</option>
                                        <option>awaiting restock</option>

                                    </select>
                                </div>

                                <button class="btn btn-md btn-primary">add</button>

                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                    template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                with <i class="ti-heart text-danger ms-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
    </div>
@endsection
