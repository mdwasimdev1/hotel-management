
  <!-- Header -->
  <section class="bg-cover bg-center bg-no-repeat h-[40vh] flex items-center justify-center" style="background-image: url('{{ asset('img/hotel-view-1.jpg') }}');">
    <div class="bg-black bg-opacity-50 p-10 rounded text-white text-center">
      <h1 class="text-4xl md:text-5xl text-yellow-600 font-bold mb-4 font-lobster">Contact Star Hotel</h1>
      <p class="text-lg">We’re happy to answer your questions and hear your feedback.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 py-12 px-6">

    <!-- Left: Info + Map -->
    <div class="bg-white rounded-lg shadow-lg p-6 space-y-6">
      <div>
        <h2 class="text-2xl font-bold text-yellow-600 mb-2">Get in Touch</h2>
        <p class="text-gray-600">You can visit us or reach out using the details below.</p>
      </div>
      <div class="text-sm space-y-1">
        <p>📍 123 Grand Street, Dhaka 1207, Bangladesh</p>
        <p>📞 +880 1234 567 890</p>
        <p>✉️ contact@hotelbliss.com</p>
      </div>

      <!-- Google Map Embed -->
      <div class="overflow-hidden rounded-md shadow-md">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.827778012086!2d90.39125491445574!3d23.791322093210103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c790f2f96d8d%3A0x7f05c5907ffcc8a0!2sDhaka!5e0!3m2!1sen!2sbd!4v1620373830163!5m2!1sen!2sbd"
          width="100%"
          height="300"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Right: Contact Form -->
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-2xl font-bold text-yellow-500 mb-6">Send Us a Message</h2>
      <form id="contactForm" class="space-y-4">
        <div>
          <label class="block text-sm font-medium">Full Name</label>
          <input type="text" id="name" required class="w-full mt-1 p-3 border border-gray-300 rounded-md" placeholder="Your Name"/>
        </div>
        <div>
          <label class="block text-sm font-medium">Email Address</label>
          <input type="email" id="email" required class="w-full mt-1 p-3 border border-gray-300 rounded-md" placeholder="you@example.com"/>
        </div>
        <div>
          <label class="block text-sm font-medium">Phone Number</label>
          <input type="tel" id="phone" required class="w-full mt-1 p-3 border border-gray-300 rounded-md" placeholder="+880 1234 567 890"/>
        </div>
        <div>
          <label class="block text-sm font-medium">Message</label>
          <textarea id="message" required rows="5" class="w-full mt-1 p-3 border border-gray-300 rounded-md" placeholder="Your message..."></textarea>
        </div>
        <button type="submit" class="w-full bg-yellow-600 text-white p-3 rounded-md hover:bg-yellow-600 transition">Submit</button>
        <p id="formSuccess" class="hidden text-green-600 font-medium mt-3">Thanks for contacting us! We'll get back to you shortly.</p>
      </form>
    </div>
  </section>

  <!-- JavaScript -->
  <script>
    const form = document.getElementById('contactForm');
    const success = document.getElementById('formSuccess');

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      // simulate form submission
      form.reset();
      success.classList.remove('hidden');
      setTimeout(() => {
        success.classList.add('hidden');
      }, 4000);
    });
  </script>
