<section class="product-box">
                        <div class="image">
                            <img src="{{asset('storage/' . $product->image)}}" alt="">
                        </div>
                        <div class="product-title">{{$product->title}}</div>
                        <div class="color-plateletes">
                            @foreach ($product->colors as $color)
                            <div class="color-platelete" style="background: {{$color->code}}"></div>
                            @endforeach
                        </div>
                        <div class="product-categoty">Chairs</div>
                        <div class="product-price">$99.00</div>
                    </section>