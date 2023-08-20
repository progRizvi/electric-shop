@extends('backend.master')
@section('contents')
    <div>
        <h3 style="font-size: 30px;">Product List</h3>
        <div class="row">

            <div class="col-md-6">
                <a class="btn btn-success my-2" href="{{ route('product.create.form') }}">Create Product</a>
            </div>
            <div class="col-md-6">
                <form action="{{ route('product.list') }}" method="get">
                    <div class="row">
                        <div class="col-md-8">
                            <input class="form-control" name="search" type="text" placeholder="Search product">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <button onclick="printReport()" type="button" class="btn btn-success my-2">Print</button>
                        </div>
                </form>
            </div>
        </div>


        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif


        <div id="printableArea" style="padding-top: 10px;">

            <table class="table">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Details</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Products as $key => $Product)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $Product->product_name }}</td>
                            <td>{{ $Product->categories->category_name }}</td>
                            <td><img width="70px" src="{{ url('uploads/product', $Product->product_image) }}"
                                    alt="" srcset=""></td>
                            <td>{{ $Product->product_details }}</td>
                            <td>{{ $Product->product_price }}</td>
                            <td>{{ $Product->product_quantity }}</td>
                            <td>{{ $Product->product_status }}</td>
                            <td><a class="btn btn-success my-2" href="{{ route('edit.product', $Product->id) }}">Edit</a>
                                <!-- <a class="btn btn-primary" href="{{ route('view.product', $Product->id) }}">view</a> -->
                                <a class="btn btn-danger" href="{{ route('delete.product', $Product->id) }}">Delete</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function printReport() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
