@extends('layouts.app')
@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="">Name</th>
                            <th scope="">Prize</th>
                            <th scope="">Description</th>
                        </tr>
                    </thead>
                    @foreach ($product as $products)
                        <tbody>
                            <tr>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->prize }}</td>
                                <td>{{ $products->description }}</td>
                                <td>
                                    @if (isset($products->productImages[0]))
                                        <img src="{{ asset('storage/products_pictures/' . $products->productImages[0]->name) }}"
                                            alt="picture">
                                    @else
                                        No image
                                    @endif


                                </td>
                                

                            </tr>

                        </tbody>
                    @endforeach
                </table>
</body>
</html>

@endsection
