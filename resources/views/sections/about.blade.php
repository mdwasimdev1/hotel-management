

  <!-- Hero Section -->
  <section class="bg-cover bg-center bg-no-repeat h-[60vh] flex items-center justify-center" style="background-image: url('{{ asset('img/hotel-view-3.jpg') }}');">
    <div class="bg-black bg-opacity-50 p-10 rounded text-white text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-4 font-lobster text-yellow-600">Welcome to Star Hotel</h1>
      <p class="text-lg">Where luxury meets comfort and hospitality is a tradition.</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="max-w-6xl mx-auto py-12 px-6">
    <div class="grid md:grid-cols-2 gap-10 items-center">
      <img src="{{ asset('img/carousel-1.jpg') }}" alt="Hotel Room" class="rounded-lg shadow-lg w-full"/>

      <div>
        <h2 class="text-3xl font-bold text-yellow-600 mb-4">About Our Hotel</h2>
        <p class="text-gray-600 leading-relaxed">
          Hotel Bliss is a premier destination for travelers seeking top-tier service, elegant rooms, and modern amenities. Our hotel offers a peaceful retreat in the heart of the city, with spacious accommodations, fine dining, and a commitment to excellence in hospitality.
        </p>
        <ul class="mt-6 space-y-2">
          <li class="flex items-center">
            <span class="text-green-500 mr-2">✔</span> 24/7 Room Service
          </li>
          <li class="flex items-center">
            <span class="text-green-500 mr-2">✔</span> Luxurious Rooms
          </li>
          <li class="flex items-center">
            <span class="text-green-500 mr-2">✔</span> Free Wi-Fi & Parking
          </li>
          <li class="flex items-center">
            <span class="text-green-500 mr-2">✔</span> Conference & Event Halls
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Mission Section -->
  <section class="bg-white py-12">
    <div class="max-w-4xl mx-auto text-center px-4">
      <h2 class="text-3xl font-bold text-blue-700 mb-6">Our Mission</h2>
      <p class="text-gray-600 leading-relaxed">
        To deliver exceptional service with warmth, efficiency, and attention to detail. At Hotel Bliss, we believe every guest should feel like royalty, and we strive to create unforgettable experiences every day.
      </p>
    </div>
  </section>

  <!-- Testimonials Carousel (Simple JS) -->
  <section class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-2xl font-bold text-blue-700 mb-6">What Guests Say</h2>
      <div id="testimonial" class="text-gray-700 text-lg italic transition duration-500 ease-in-out">
        “Amazing stay! The staff were incredibly helpful and the rooms were spotless.”
      </div>
    </div>
  </section>

  <script>
    const testimonials = [
      "“Amazing stay! The staff were incredibly helpful and the rooms were spotless.”",
      "“Beautiful ambiance and delicious food. Would love to come back!”",
      "“Great location and even better service. Highly recommend Hotel Bliss.”",
    ];
    let index = 0;
    setInterval(() => {
      index = (index + 1) % testimonials.length;
      document.getElementById('testimonial').textContent = testimonials[index];
    }, 4000);
  </script>



