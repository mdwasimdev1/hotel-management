<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner h-screen">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                    <img class="w-100" src="{{ asset('storage/' . $slider->image) }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">
                                {{ $slider->subtitle ?? 'Luxury Living' }}
                            </h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">
                                {{ $slider->title ?? 'Discover A Brand Luxurious Hotel' }}
                            </h1>
                            @if($slider->button_link)
                                <a class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"
                                   href="{{ $slider->button_link }}">
                                    {{ $slider->button_text ?? 'Book A Room' }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

