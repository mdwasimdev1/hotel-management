<!-- Food Card Section -->
<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Title -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Restaurants</h2>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            <!-- Single Card -->
            @foreach ($restaurants as $restaurant)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition duration-300">
                    <!-- Image -->
                    <div class="relative">
                        <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                             class="w-full h-48  object-cover rounded-t-2xl">
                        @if($restaurant->discount)
                            <span class="absolute top-2 left-2 bg-pink-600 text-white text-xs px-2 py-1 rounded">
                                {{ $restaurant->discount }}% Off
                            </span>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $restaurant->name }}</h3>
                        <p class="text-sm text-gray-500 mt-1">{{ $restaurant->category }}</p>

                        <div class="flex items-center justify-between mt-3">
                            <div class="flex items-center gap-1 text-sm text-yellow-500">
                                ⭐ <span class="text-gray-700 font-medium">{{ $restaurant->rating }}</span>
                            </div>
                            <div class="text-sm text-gray-600">
                                ⏱ {{ $restaurant->delivery_time }} min • Tk {{ $restaurant->delivery_fee }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
