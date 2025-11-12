{{-- resources/views/foodfinder.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header / Search -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-6 flex items-center gap-4">
            <div class="flex-1">
                <input id="search" type="search" placeholder="Search for restaurants, cuisines, and dishes"
                    class="w-full rounded-full border border-gray-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-300" />
            </div>
            <div class="hidden md:flex items-center gap-3">
                <button id="filtersToggle" class="px-4 py-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50">
                    Filters
                </button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-md">Sign in</button>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Sidebar Filters (desktop) -->
        <aside id="sidebar" class="hidden lg:block lg:col-span-3">
            <div class="sticky top-6 space-y-4">
                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <h3 class="font-semibold text-lg mb-3">Filters</h3>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="sort" checked class="form-radio h-4 w-4 text-indigo-600"/>
                            <span class="text-sm">Relevance</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="sort" class="form-radio h-4 w-4 text-indigo-600"/>
                            <span class="text-sm">Fastest delivery</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="sort" class="form-radio h-4 w-4 text-indigo-600"/>
                            <span class="text-sm">Top rated</span>
                        </label>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <h4 class="font-medium mb-2">Cuisines</h4>
                    <div class="flex flex-col gap-2 text-sm">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Pizza</span>
                        </label>
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Biryani</span>
                        </label>
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Chinese</span>
                        </label>
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Desserts</span>
                        </label>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-lg shadow-sm">
                    <h4 class="font-medium mb-2">Offers</h4>
                    <div class="flex flex-col gap-2">
                        <label class="inline-flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Free delivery</span>
                        </label>
                        <label class="inline-flex items-center gap-2 text-sm">
                            <input type="checkbox" class="rounded border-gray-300">
                            <span>Discounts</span>
                        </label>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <main class="lg:col-span-9 space-y-6">
            <!-- Hero / Banner -->
            <div class="bg-gradient-to-r from-pink-50 to-white rounded-lg p-6 shadow-sm flex flex-col md:flex-row items-center gap-6">
                <div class="flex-1">
                    <h2 class="text-2xl md:text-3xl font-bold">Sign up for free delivery on your first order</h2>
                    <p class="text-gray-600 mt-2">Discover restaurants, exclusive deals and your favourite cuisines.</p>
                    <div class="mt-4">
                        <a href="#" class="inline-block px-5 py-2 bg-pink-500 text-white rounded-md">Sign up</a>
                    </div>
                </div>
                <div class="w-48 h-28 bg-pink-100 rounded-lg flex items-center justify-center">
                    <img src="{{ asset('img/mascot.png') }}" alt="mascot" class="max-h-20"/>
                </div>
            </div>

            <!-- Daily deals carousel -->
            <section>
                <h3 class="text-lg font-semibold mb-3">Your daily deals</h3>
                <div class="relative">
                    <div id="dealsContainer" class="flex gap-4 overflow-x-auto snap-x snap-mandatory py-2 scrollbar-hide">
                        {{-- cards --}}
                        <template id="dealTpl">
                            <div class="snap-start flex-none w-64 bg-pink-50 rounded-lg p-4 shadow-sm">
                                <div class="h-28 bg-pink-100 rounded-md mb-3 flex items-center justify-center">
                                    <img src="{{ asset('img/menu/promo.jpg') }}" alt="promo" class="h-full object-cover rounded-md">
                                </div>
                                <div class="text-sm font-medium">Flat 50% off</div>
                                <div class="text-xs text-gray-600">On first order</div>
                            </div>
                        </template>
                        {{-- JS will duplicate template for demo items --}}
                    </div>

                    <button id="dealsPrev" class="hidden md:inline-flex absolute left-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <button id="dealsNext" class="hidden md:inline-flex absolute right-0 top-1/2 -translate-y-1/2 bg-white p-2 rounded-full shadow mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </div>
            </section>

            <!-- Favorite cuisines chips -->
            <section>
                <h3 class="text-lg font-semibold mb-3">Your favourite cuisines</h3>
                <div id="cuisines" class="flex gap-3 overflow-x-auto py-2">
                    {{-- chips inserted by JS --}}
                </div>
            </section>

            <!-- New on platform carousel -->
            <section>
                <h3 class="text-lg font-semibold mb-3">New on platform</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="newGrid">
                    {{-- new cards inserted by JS --}}
                </div>
            </section>

            <!-- All restaurants list -->
            <section>
                <h3 class="text-lg font-semibold mb-3">All restaurants</h3>
                <div id="restaurantsGrid" class="">
                    @include('sections.foodCard')
                </div>
            </section>
        </main>
    </div>
</div>
@endsection

@push('styles')
<!-- small helper: hide scrollbar for horizontal lists -->
<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Demo data - replace with backend data when ready
    const DEALS = [1,2,3,4];
    const CUISINES = ['Pizza','Biryani','Cakes','Burgers','Cafe','Tehari','Pasta','Snacks'];
    const NEW = [
        {id:1, name:'Oven Fresh - Gulshan', rating:4.1, eta:'20-35 min', price:'৳50', img:'{{ asset("img/menu/pizza.jpg") }}'},
        {id:2, name:"Shumi's Hot Cake", rating:4.9, eta:'5-20 min', price:'৳40', img:'{{ asset("img/menu/dessert.jpg") }}'},
        {id:3, name:'Slaw Bistro', rating:4.6, eta:'30-45 min', price:'৳60', img:'{{ asset("img/menu/salmon.jpg") }}'},
    ];
    const RESTAURANTS = [
        {id:1, name:'Cheez - Banani', category:'Pizza', rating:4.9, eta:'20-35 min', price:'৳45', img:'{{ asset("img/menu/pizza.jpg") }}', badge:'BOGO'},
        {id:2, name:'Bella Italia - Gulshan', category:'Pizza', rating:4.9, eta:'25-40 min', price:'৳145', img:'{{ asset("img/menu/pizza2.jpg") }}'},
        {id:3, name:'Shang High', category:'Dumpling', rating:4.8, eta:'15-30 min', price:'৳65', img:'{{ asset("img/menu/bruschetta.jpg") }}'},
        {id:4, name:'Kustary Sultan', category:'Shawarma', rating:4.4, eta:'15-30 min', price:'৳50', img:'{{ asset("img/menu/pizza3.jpg") }}'},
        {id:5, name:'Cake Corner', category:'Dessert', rating:4.7, eta:'10-20 min', price:'৳80', img:'{{ asset("img/menu/dessert2.jpg") }}'},
        {id:6, name:'Green Salad House', category:'Healthy', rating:4.2, eta:'10-20 min', price:'৳90', img:'{{ asset("img/menu/salad.jpg") }}'},
    ];

    // Populate deals
    const dealsContainer = document.getElementById('dealsContainer');
    const dealTpl = document.getElementById('dealTpl').content;
    DEALS.forEach((d, i) => {
        const node = dealTpl.cloneNode(true);
        // optionally change content per item
        dealsContainer.appendChild(node);
    });

    // carousel buttons
    const prevBtn = document.getElementById('dealsPrev');
    const nextBtn = document.getElementById('dealsNext');
    prevBtn?.classList.remove('hidden'); nextBtn?.classList.remove('hidden');
    prevBtn?.addEventListener('click', ()=> dealsContainer.scrollBy({ left: -300, behavior:'smooth' }));
    nextBtn?.addEventListener('click', ()=> dealsContainer.scrollBy({ left: 300, behavior:'smooth' }));

    // Cuisines chips
    const cuisinesWrap = document.getElementById('cuisines');
    CUISINES.forEach(c => {
        const b = document.createElement('button');
        b.className = 'flex flex-col items-center gap-1 bg-white p-3 rounded-lg shadow-sm min-w-[90px] text-sm';
        b.innerHTML = `<div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center">
                        <img src="{{ asset('img/menu/pizza.jpg') }}" class="h-10 w-10 object-cover rounded-full" />
                       </div>
                       <div class="text-xs mt-1">${c}</div>`;
        cuisinesWrap.appendChild(b);
    });

    // New cards
    const newGrid = document.getElementById('newGrid');
    NEW.forEach(n => {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-lg p-3 shadow-sm flex gap-3 items-center';
        card.innerHTML = `
            <img src="${n.img}" alt="${n.name}" class="w-28 h-20 object-cover rounded-md">
            <div>
                <div class="flex items-center gap-2">
                    <h4 class="font-semibold">${n.name}</h4>
                    <span class="text-sm text-green-600 ml-2">New</span>
                </div>
                <p class="text-xs text-gray-500">${n.eta} · ${n.price}</p>
                <div class="text-sm text-yellow-500">★ ${n.rating}</div>
            </div>
        `;
        newGrid.appendChild(card);
    });

    // Restaurants grid
    const restGrid = document.getElementById('restaurantsGrid');
    RESTAURANTS.forEach(r => {
        const card = document.createElement('article');
        card.className = 'bg-white rounded-lg shadow-sm overflow-hidden';
        card.innerHTML = `
            <div class="relative">
                <img src="${r.img}" alt="${r.name}" class="w-full h-40 object-cover">
                ${r.badge ? `<div class="absolute top-3 left-3 bg-pink-600 text-white text-xs px-2 py-1 rounded">${r.badge}</div>` : ''}
            </div>
            <div class="p-3">
                <div class="flex justify-between items-start gap-2">
                    <h4 class="font-semibold">${r.name}</h4>
                    <div class="text-sm text-yellow-500">★ ${r.rating}</div>
                </div>
                <p class="text-xs text-gray-500 mt-1">${r.category} · ${r.eta} · ${r.price}</p>
                <div class="mt-3 flex gap-2">
                    <button class="px-3 py-1 bg-indigo-600 text-white rounded text-sm">View menu</button>
                    <button class="px-3 py-1 border border-gray-200 rounded text-sm">Add to favourites</button>
                </div>
            </div>
        `;
        restGrid.appendChild(card);
    });

    // Simple search (client-side)
    const searchInput = document.getElementById('search');
    function debounce(fn, ms=250){
        let t;
        return (...a)=>{ clearTimeout(t); t=setTimeout(()=>fn(...a), ms); };
    }
    searchInput.addEventListener('input', debounce((e)=>{
        const q = e.target.value.trim().toLowerCase();
        // filter restaurants by name or category
        const filtered = RESTAURANTS.filter(r => r.name.toLowerCase().includes(q) || r.category.toLowerCase().includes(q));
        restGrid.innerHTML = '';
        if(filtered.length === 0){
            restGrid.innerHTML = `<div class="col-span-full text-center text-gray-500 py-10">No restaurants found</div>`;
            return;
        }
        filtered.forEach(r => {
            const card = document.createElement('article');
            card.className = 'bg-white rounded-lg shadow-sm overflow-hidden';
            card.innerHTML = `
                <div class="relative">
                    <img src="${r.img}" alt="${r.name}" class="w-full h-40 object-cover">
                    ${r.badge ? `<div class="absolute top-3 left-3 bg-pink-600 text-white text-xs px-2 py-1 rounded">${r.badge}</div>` : ''}
                </div>
                <div class="p-3">
                    <div class="flex justify-between items-start gap-2">
                        <h4 class="font-semibold">${r.name}</h4>
                        <div class="text-sm text-yellow-500">★ ${r.rating}</div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">${r.category} · ${r.eta} · ${r.price}</p>
                    <div class="mt-3 flex gap-2">
                        <button class="px-3 py-1 bg-indigo-600 text-white rounded text-sm">View menu</button>
                        <button class="px-3 py-1 border border-gray-200 rounded text-sm">Add to favourites</button>
                    </div>
                </div>
            `;
            restGrid.appendChild(card);
        });
    }, 300));
});
</script>
@endpush
