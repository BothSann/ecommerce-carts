<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4 class="mb-3 text-primary">Create New Product</h4>
            <div class="card">
                <div class="flex-row-reverse card-header d-flex justify-content-between align-items-center">
                    <h5>Create Product</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <x-input-label for="product_image" :value="__('Thumbnail Picture')" />
                            <x-text-input type="file" id="product_thumbnail" name="product_thumbnail"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_images" :value="__('Product Images')" />
                            <x-text-input type="file" id="product_images" name="product_images[]"
                                class="form-control" multiple />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_name" :value="__('Product Name')" />
                            <x-text-input type="text" id="product_name" name="product_name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_price" :value="__('Product Price')" />
                            <x-text-input type="text" id="product_price" name="product_price" class="form-control" />
                        </div>
                        <div class="form-group">
                            <x-input-label for="product_color" :value="__('Product Color')" />
                            <x-select-input id="product_colors" name="product_colors[]" multiple>
                                <option value="red">Red</option>
                                <option value="black">Black</option>
                                <option value="blue">Blue</option>
                                <option value="green">Green</option>
                                <option value="yellow">Yellow</option>
                                <option value="cyan">Cyan</option>
                                <option value="purple">Purple</option>
                                <option value="orange">Orange</option>
                                <option value="pink">Pink</option>
                                <option value="brown">Brown</option>
                                <option value="grey">Grey</option>
                                <option value="white">White</option>
                            </x-select-input>
                        </div>

                        <div class="form-group">
                            <x-input-label for="short_description" :value="__('Short Description')" />
                            <textarea class="form-control" id="product_short_description" name="product_short_description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <x-input-label for="qty" :value="__('Quantity')" />
                            <x-text-input type="text" id="product_quantity" name="product_quantity"
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="sku" :value="__('SKU')" />
                            <x-text-input type="text" id="product_sku" name="product_sku" class="form-control" />
                        </div>

                        <div class="form-group">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
                        </div>

                        <x-primary-button>Submit</x-primary-button>
                    </form>
                </div>
            </div>
    </section>

    <x-slot name="scripts">
        <script>
            tinymce.init({
                selector: 'textarea#product_description',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
    </x-slot>

</x-app-layout>
