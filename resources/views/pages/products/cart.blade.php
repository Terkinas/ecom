@extends('layouts.app')

@section('content')


<!--  PAGE HEADER -->
<section class="py-5 sm:py-7 bg-gray-800">
    <div class="container max-w-screen-xl mx-auto px-4">
        <!-- breadcrumbs start -->
        <h2 class="text-3xl font-semibold mb-2 text-gray-200">Shopping cart</h2>

    </div><!-- /.container -->
</section>
<!--  PAGE HEADER .//END  -->

<section class="py-10">
    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col md:flex-row gap-4">
            <main class="md:w-3/4">

                @if(Session::has('cart'))
                <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">


                    @foreach($products as $product)
                    <!-- item-cart -->
                    <div class="flex flex-wrap lg:flex-row gap-5  mb-4">
                        <div class="w-full lg:w-2/5 xl:w-2/4">
                            <figure class="flex leading-5">
                                <div>
                                    <div class="block w-16 h-16 rounded border border-gray-200 overflow-hidden p-1">
                                        <img class="object-contain h-full w-full" src="{{ $product['item']['image_path'] }}" alt="Title">
                                    </div>
                                </div>
                                <figcaption class="ml-3">
                                    <p><a href="#" class="hover:text-blue-600">{{ $product['item']['name'] }} </a></p>
                                    <p class="mt-1 text-gray-400"> Spalva: {{ $product['item']['color'] }} </p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="">
                            <!-- selection -->
                            <div class="w-16 relative">
                                <input value="{{ $product['qty'] }}" class="text-center block appearance-none border border-gray-200 bg-gray-100 rounded-md py-2 px-3 hover:border-gray-400 focus:outline-none focus:border-gray-400 w-full">
                            </div>
                            <!-- selection .//end -->
                        </div>
                        <div>
                            <div class="leading-5">
                                <p class="font-semibold not-italic">${{ $product['price'] / 100 }}</p>
                                <small class="text-gray-400"> ${{ $product['item']['price'] / 100 }} / per item </small>
                            </div>
                        </div>
                        <div class="flex-auto">
                            <div class="float-right">
                                <a class="px-4 py-2 inline-block text-red-600 bg-white shadow-sm border border-gray-200 rounded-md hover:bg-gray-100" href="#"> <i class="fa-solid fa-xmark"></i> </a>
                            </div>
                        </div>
                    </div> <!-- item-cart end// -->

                    @endforeach

                    <hr class="my-4">

                    <div class="flex justify-end">
                        <x-jet-button type="submit" wire:loading.attr="disabled">
                            {{ __('Atnaujinti krepšelį') }}
                        </x-jet-button>
                    </div>

                    <h6 class="font-bold">Free Delivery within 1-2 weeks</h6>
                    <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                </article> <!-- card end.// -->
                @else
                <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">
                    <h3 class="text-lg"> Krepšelis tuščias </h3>
                </article>
                @endif

            </main>
            <aside class="md:w-1/4">

                <article class="border border-gray-200 bg-white shadow-sm rounded mb-5 p-3 lg:p-5">

                    <ul class="mb-5">
                        <li class="flex justify-between text-gray-600  mb-1">
                            <span>Prekių suma:</span>
                            <span>${{ $totalPrice / 100 }}</span>
                        </li>
                        <!-- <li class="flex justify-between text-gray-600  mb-1">
                            <span>Discount:</span>
                            <span class="text-green-500">- $60.00</span>
                        </li> -->
                        <li class="flex justify-between text-gray-600  mb-1">
                            <span>PVM:</span>
                            <span>$ {{ round($totalPrice / 100 * 0.21, 2) }} </span>
                        </li>
                        <li class="text-lg font-bold border-t flex justify-between mt-3 pt-3">
                            <span>Total price:</span>
                            <span>$ {{ $totalPrice / 100 + round($totalPrice / 100 * 0.21, 2) }}</span>
                        </li>
                    </ul>

                    <a href="#" class="w-full text-center">
                        <x-jet-button class="bg-orange-500 hover:bg-orange-600 px-4 py-4 mb-2 inline-block text-sm w-full font-medium text-white border border-transparent rounded-md font-bold" type="submit" wire:loading.attr="disabled">
                            {{ __('Testi apmokėjimą') }}
                        </x-jet-button>
                    </a>

                    <a href="#" class="w-full text-center">
                        <x-jet-button class="px-4 py-4 inline-block text-sm w-full text-center font-medium text-orange-500 bg-white shadow-sm border border-gray-200 rounded-md font-bold hover:bg-gray-200 bg-gray-50" type="submit" wire:loading.attr="disabled">
                            {{ __('Grižti į parduotuvę') }}
                        </x-jet-button>
                    </a>


                </article> <!-- card end.// -->

            </aside> <!-- col.// -->
        </div> <!-- grid.// -->

    </div>
</section>

@endsection