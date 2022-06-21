@extends('layouts.app')

@section('content')

<!--  PAGE HEADER -->
<section class="py-5 sm:py-7 bg-gray-800">
    <div class="container max-w-screen-xl mx-auto px-4">
        <!-- breadcrumbs start -->
        <h2 class="text-3xl font-semibold mb-2 text-gray-300">Men’s wear</h2>
        <ol class="inline-flex flex-wrap text-gray-200 space-x-1 md:space-x-3 items-center">
            <li class="inline-flex items-center">
                <a class="text-gray-400 hover:text-blue-600 text-xs font-semibold" href="#">Home</a>
                <i class="mx-1 ml-2 text-gray-600 fa fa-chevron-right"></i>
            </li>
            <li class="inline-flex items-center" aria-current="page">
                <a class="text-gray-400 hover:text-blue-600 text-xs font-semibold" href="#">Clothings</a>
                <i class="mx-1 ml-2 text-gray-600  fa fa-chevron-right"></i>
            </li>
            <li class="inline-flex items-center text-gray-500 text-xs font-semibold"> Men’s wear </li>
        </ol>
        <!-- breadcrumbs end -->
    </div><!-- /.container -->
</section>
<!--  PAGE HEADER .//END  -->

<script>
    function toggleFilterMenu() {
        document.getElementById('filterMenu').classList.toggle('hidden');
    }
</script>

<!-- SECTION-CONTENT -->
<section class="py-12">
    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col md:flex-row -mx-4">
            <aside class="md:w-1/3 lg:w-1/4 px-4">
                <form class="mb-8" action="{{ route('products.show') }}" method="get">
                    @csrf

                    <label for="price" class="block text-sm font-medium text-gray-700">Paieška</label>
                    <div class="mt-1 relative rounded-md shadow-sm mb-4">
                        @if(isset($search))
                        <input value="{{ $search }}" type="text" name="search" id="searchText" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Įveskite raktažodį">
                        @else
                        <input value="" type="text" name="search" id="searchText" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Įveskite raktažodį">
                        @endif

                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <label for="search" class="sr-only">Paieška</label>
                            <button type="submit" class="hover:text-gray-800  h-full py-0 pl-2 pr-3 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>





                    <x-jet-button class="cursor-pointer md:hidden mb-5  w-full text-center px-4 py-2 inline-block text-sm text-gray-700 bg-white shadow-sm border border-gray-200 rounded-md " onclick="toggleFilterMenu()" type="button" wire:loading.attr="disabled">
                        {{ __('Detali paieška') }}
                    </x-jet-button>



                    <div id="filterMenu" class="hidden  md:block px-6 py-4 border border-gray-200 bg-white rounded shadow-sm mb-12 sm:md-0">
                        <h3 class="font-semibold mb-2">Kategorija</h3>

                        <ul class="text-gray-500 space-y-1">
                            {{-- @foreach ($categories as $category)
                                <li><a class="hover:text-blue-600 hover:underline" href="{{ route('show_filtered', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach --}}
                            {{-- <li><input type="checkbox" class="hidden hover:text-blue-600 hover:underline mr-2" name="category" value="" checked ></li> --}}
                            @foreach ($categories as $category)
                            <li><input type="checkbox" class="hover:text-blue-600 hover:underline mr-2" name="category[]" value="{{ $category->id }}">{{ $category->name }}</li>
                            @endforeach

                        </ul>

                        {{-- <hr class="my-4">

						<h3 class="font-semibold mb-2">Filter by</h3>
						<ul class="space-y-1">
							<li>
								<label class="flex items-center">
									<input name="" type="checkbox" checked="" class="h-4 w-4">
									<span class="ml-2 text-gray-500"> Samsung </span>
								</label>
							</li>
							<li>
								<label class="flex items-center">
									<input name="" type="checkbox" checked="" class="h-4 w-4">
									<span class="ml-2 text-gray-500"> Huawei </span>
								</label>
							</li>
							<li>
								<label class="flex items-center">
									<input name="" type="checkbox" class="h-4 w-4">
									<span class="ml-2 text-gray-500"> Tesla model </span>
								</label>
							</li>
							<li>
								<label class="flex items-center">
									<input name="" type="checkbox" class="h-4 w-4">
									<span class="ml-2 text-gray-500"> Best brand </span>
								</label>
							</li>
							<li>
								<label class="flex items-center">
									<input name="" type="checkbox" class="h-4 w-4">
									<span class="ml-2 text-gray-500"> Other brands </span>
								</label>
							</li>
						</ul> --}}

                        <hr class="my-4">

                        <h3 class="font-semibold mb-2">Rušiuoti pagal</h3>
                        <ul class="space-y-1">
                            <li>
                                <label class="flex items-center">
                                    <input name="filterBy" value="1" type="radio" checked="" class="h-4 w-4">
                                    <span class="ml-2 text-gray-500"> Geriausiai vertinami </span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input name="filterBy" value="2" type="radio" class="h-4 w-4">
                                    <span class="ml-2 text-gray-500"> Naujausi </span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input name="filterBy" value="3" type="radio" class="h-4 w-4">
                                    <span class="ml-2 text-gray-500"> Kainos nuo <i class="fa-solid fa-arrow-up-long text-gray-300"></i> </span>
                                </label>
                            </li>
                            <li>
                                <label class="flex items-center">
                                    <input name="filterBy" value="4" type="radio" class="h-4 w-4">
                                    <span class="ml-2 text-gray-500"> Kainos nuo <i class="fa-solid fa-arrow-down-long text-gray-300"></i> </span>
                                </label>
                            </li>
                        </ul>
                </form>
            </aside> <!-- col.// -->
            <main class="md:w-2/3 lg:w-3/4 px-3">



                @foreach($products as $product)
                <!-- COMPONENT: PRODUCT ITEM -->
                <article class="border border-gray-200 overflow-hidden bg-white shadow-sm rounded mb-5">
                    <div class="flex flex-col md:flex-row">
                        <a href="#" class="md:w-1/4">
                            <img class="mx-auto object-contain h-full w-full" src="https://www.kindpng.com/picc/m/595-5956067_nike-air-force-1-07-lv8-4-white.png" alt="Product name text">
                        </a> <!-- col.// -->
                        <div class="md:w-2/4">
                            <div class="p-4">
                                <a href="#" class="hover:text-blue-600">
                                    <!-- Nike Airforce 1 Model New Collection -->
                                    {{ $product->name }}
                                </a>
                                <div class="flex flex-wrap items-center space-x-1 mb-2">
                                    @for($j = 0; $j < 2; $j++) <i class="fa-solid fa-star text-xs text-red-400"></i>
                                        @endfor
                                        <span class="ml-3 pl-1 text-gray-500">4.3</span>
                                </div>
                                <p class="text-gray-500 mb-2">
                                    The largest Canon Camera display yet. Electrical heart sensor. Re-engineered Digital Crown with haptic feedback. Entirely familiar, yet completely redesigned
                                </p>
                                <p class="space-y-2">
                                    <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded"> Nauji </span>
                                    <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded"> Balti </span>
                                    <span class="inline-block px-3 text-sm py-1 border border-gray-300 text-gray-400 rounded"> Originalus </span>
                                </p>
                            </div>
                        </div> <!-- col.// -->
                        <div class="md:w-1/4 border-t lg:border-t-0 lg:border-l border-gray-200">
                            <div class="p-5">
                                <p>
                                    <span class="text-xl font-semibold text-black">$120.50</span>
                                    <del class="line-through text-sm text-gray-400"> $230.00</del>
                                </p>
                                <p class="text-green-500 text-xs">Nemokamas pristatymas</p>
                                <div class="my-3 mb-2">
                                    <form class="inline" action="{{ route('products.addToCart', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        <input hidden value="{{$product->id}}" name="product_id" />
                                        <x-jet-button type="submit" wire:loading.attr="disabled">
                                            {{ __('Į krepšelį') }}
                                        </x-jet-button>
                                    </form>
                                    <a class="px-2 pr-2 py-1 inline-block text-gray-800 rounded-md hover:bg-gray-100" href="#">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>

                                <a class="font-medium text-orange-600 hover:text-orange-700 text-xs" href="#"><i class="fa-solid fa-certificate"></i> Greitas siuntimas </a>
                            </div>
                        </div> <!-- col.// -->
                    </div> <!-- flex.// -->
                </article>
                <!-- COMPONENT: PRODUCT ITEM //END -->
                @endforeach

            </main> <!-- col.// -->
        </div> <!-- grid.// -->

    </div> <!-- container .// -->
</section>
<!--  SECTION-CONTENT  //END -->

@endsection