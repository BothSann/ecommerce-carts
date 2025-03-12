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
            <h4 class="mb-3 text-primary">Edit Product</h4>
            <div class="card">
                <div class="flex-row-reverse card-header d-flex justify-content-between align-items-center">
                    <h5>Edit Product</h5>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div>
                                <img src="{{ asset($product->thumbnail) }}"
                                    style="width: 250px !important;  height: 250px; border: solid 1px #000; ">
                            </div>
                            <x-input-label for="product_image" :value="__('Thumbnail Picture')" />
                            <x-text-input type="file" id="product_thumbnail" name="product_thumbnail"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <div class="mt-4 ">
                                @foreach ($product->images as $image)
                                    <img src="{{ asset($image->path) }}"
                                        style="width: 250px !important; height: 250px; border: solid 1px #000; ">
                                @endforeach
                            </div>
                            <div>
                                <x-input-label for="product_images" :value="__('Product Images')" />
                                <x-text-input type="file" id="product_images" name="product_images[]"
                                    class="form-control" multiple />
                            </div>
                            <div class="form-group">
                                <x-input-label for="product_name" :value="__('Product Name')" />
                                <x-text-input type="text" id="product_name" name="product_name" class="form-control"
                                    value="{{ $product->name }}" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="product_price" :value="__('Product Price')" />
                                <x-text-input type="text" id="product_price" name="product_price"
                                    class="form-control" value="{{ $product->price }}" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="product_color" :value="__('Product Color')" />
                                <x-select-input id="product_colors" name="product_colors[]" multiple>
                                    <option value="red" @selected(in_array('red', $colors))>Red</option>
                                    <option value="black" @selected(in_array('black', $colors))>Black</option>
                                    <option value="blue" @selected(in_array('blue', $colors))>Blue</option>
                                    <option value="green" @selected(in_array('green', $colors))>Green</option>
                                    <option value="yellow" @selected(in_array('yellow', $colors))>Yellow</option>
                                    <option value="cyan" @selected(in_array('cyan', $colors))>Cyan</option>
                                    <option value="purple" @selected(in_array('purple', $colors))>Purple</option>
                                    <option value="orange" @selected(in_array('orange', $colors))>Orange</option>
                                    <option value="pink" @selected(in_array('pink', $colors))>Pink</option>
                                    <option value="brown" @selected(in_array('brown', $colors))>Brown</option>
                                    <option value="grey" @selected(in_array('grey', $colors))>Grey</option>
                                    <option value="white" @selected(in_array('white', $colors))>White</option>
                                </x-select-input>
                            </div>

                            <div class="form-group">
                                <x-input-label for="short_description" :value="__('Short Description')" />
                                <textarea class="form-control" id="product_short_description" name="product_short_description" rows="3"
                                    value="{{ $product->short_description }}">{{ $product->short_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <x-input-label for="qty" :value="__('Quantity')" />
                                <x-text-input type="text" id="product_quantity" name="product_quantity"
                                    class="form-control" value="{{ $product->quantity }}" />
                            </div>

                            <div class="form-group">
                                <x-input-label for="sku" :value="__('SKU')" />
                                <x-text-input type="text" id="product_sku" name="product_sku" class="form-control"
                                    value="{{ $product->sku }}" />
                            </div>

                            <div class="form-group">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="form-control" id="product_description" name="product_description" rows="3">{!! $product->description !!}</textarea>
                            </div>

                            <x-primary-button>Save Changes</x-primary-button>
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
