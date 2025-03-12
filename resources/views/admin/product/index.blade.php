<x-app-layout>

    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            <h4 class="mb-3 text-primary">Dashboard</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>All Products</h5>
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Create New</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="{{ asset($product->thumbnail) }}"
                                            style="width: 50px !important;  height: 50px !important; ">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
