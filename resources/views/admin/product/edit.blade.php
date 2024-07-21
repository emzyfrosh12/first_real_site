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



            <div class="row">
                <form action="{{ route('admin.create.product') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mt-5"> Add product </h2>
                                <div class="row mt-4">

                                   

                                    <div class="col-md-6">
                                        <div class="form-group  ">

                                            <input type="text" class="form-control rounded form-control-lg mt-5"
                                                name="name" placeholder="{{ $product->name}}">
                                        </div>

                                        <div class="form-group ">
                                            <select class="form-select form-select-lg mt-5" name="categories_id"
                                                id="">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group  ">
                                            <input type="number" class="form-control rounded form-control-lg mt-5"
                                                name="{{ $product->prize}}" placeholder="prize">
                                        </div>


                                        <div class="form-group  ">
                                            <input type="file" class="form-control rounded  mt-5" name="picture[]"
                                                multiple>
                                        </div>

                                    </div>

                                    <div class="form-group  ">
                                        <input type="text" class="form-control rounded form-control-lg mt-3"
                                            name="description" placeholder="{{ $product->description}}">
                                    </div>


                                    <div class="col-md-2">
                                        <button class="btn btn-md btn-primary">add</button>

                                    </div>
                                </div>
                            </div>

                </form>
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
