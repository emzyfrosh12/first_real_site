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
                                                name="name" placeholder="Product Name">
                                        </div>

                                        <div class="form-group ">
                                            <select class="form-select form-select-lg mt-5" name="categories_id"
                                                id="">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                @endforeach


                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group  ">

                                            <input type="number" class="form-control rounded form-control-lg mt-5"
                                                name="prize" placeholder="prize">
                                        </div>


                                        <div class="form-group  ">

                                            <input type="file" class="form-control rounded  mt-5" name="picture[]"
                                                multiple>
                                        </div>


                                    </div>

                                    <div class="form-group  ">

                                        <input type="text" class="form-control rounded form-control-lg mt-3"
                                            name="description" placeholder="description">
                                    </div>


                                    <div class="col-md-2">
                                        <button class="btn btn-md btn-primary">add</button>

                                    </div>
                                </div>
                            </div>

                </form>
            </div>


            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2>Product</h2>

                        <form action="{{ route('admin.search.product') }}" method="GET">
                            <input class="form-control form-control-sm mt-3" type="text" name="search" placeholder="Search ">
                            <button class="btn btn-md btn-secondary" type="submit">Search</button>
                        </form>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Prize</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            @foreach ($product as $products)
                                <tbody>
                                    <tr>
                                        <td>{{ $products->name }}</td>
                                        <td>{{ number_format($products->prize, 2) }}</td>
                                        <td>{{ $products->category->name }}</td>
                                        <td>{{ $products->description }}</td>
                                        <td> 
                                            @if (isset($products->productImages[0]))
                                                <img src="{{ asset('storage/products_pictures/' . $products->productImages[0]->name) }}"
                                                    alt="picture">
                                            @else
                                                No image
                                            @endif


                                        </td>
                                        <td>
                                            <div class="col-md-6">
                                                <a type="button" class="btn btn-sm btn-primary" href="{{route ('admin.view.product')}}">view</a>

                                                {{-- <a type="button" class="btn btn-sm btn-warning" href="/admin/edit/{{$category->id}}">edit</a> --}}

                                                {{-- <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#{{ 'edit' . $products->id }}">edit</button> --}}

                                                    
                                                <a type="button" class="btn btn-sm btn-warning"
                                                href="{{ route('admin.update.product', $products->id) }}">edit</a>

                                                <a type="button" class="btn btn-sm btn-danger"
                                                    href="{{ route('admin.delete.product', $products->id) }}">delete</a>

                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            @endforeach

                            <div class="paginate">
                                {{ $product->links('pagination::bootstrap-4') }}
                            </div>

                        </table>

                       




                        {{-- <p>{{$products->productimage->name}}</p> --}}

                        {{-- <img src="public/products_pictures/{{ $products->productimage->name }}" alt=""> --}}


                    </div>
                </div>
            </div>



        </div>

{{-- 
        @foreach ($product as $productE)
            @csrf
            <div class="modal fade" id="{{ 'edit' . $productE->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.update.product', $productE->id) }}" method="POST">

                                <div class="form-group ">
                                    <input type="hidden" name="id" value="{{ $productE->name }}">
                                    <input type="text" class="form-control form-control-lg mt-3" name="name"
                                        value="{{ $productE->name }}">
                                </div>

                                <div class="form-group ">
                                    <input type="hidden" name="id" value="{{ $productE->prize }}">
                                    <input type="text" class="form-control form-control-lg mt-3" name="prize"
                                        value="{{ $productE->prize }}">
                                </div>

                                        <div class="form-group ">
                                    <input type="hidden" name="id" value="{{ $productE->description }}">
                                    <input type="text" class="form-control form-control-lg mt-3" name="description"
                                        value="{{ $productE->description }}">
                                </div>



                                <button class="btn btn-md btn-primary">add</button>

                           

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}

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
