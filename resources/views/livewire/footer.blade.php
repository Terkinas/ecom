<footer class="bg-gray-900">
	<!-- section footer top -->

	<section class="py-10 text-white">
		<div class="container max-w-screen-xl mx-auto px-4">

			<div class="flex flex-wrap md:px-16">

				<aside class="w-1/2 sm:w-auto flex-auto mb-5">
					<h3 class="font-semibold uppercase text-sm"> {{ env("APP_NAME") }} </h3>
					<ul class="mt-2 space-y-1">
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Kontaktai </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Parduotuvių tinklas </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Partneriai </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Pirkėjų atsiliepimai </a>
						</li>
					</ul>
				</aside> <!-- col .// -->

				<aside class="w-1/2 sm:w-auto flex-auto  mb-5">
					<h3 class="font-semibold uppercase text-sm"> Informacija </h3>
					<ul class="mt-2 space-y-1 font">
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> DUK </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Pristatymas </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Apmokėjimas </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Gražinimas ir garantinis taisymas </a>
						</li>
					</ul>
				</aside> <!-- col .// -->
				<aside class="w-1/2 sm:w-auto flex-auto  mb-5">
					<h3 class="font-semibold uppercase text-sm"> Pirkėjo paskira </h3>
					<ul class="mt-2 space-y-1">
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Užsakymo informacija </a>
						</li>
						<li>
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Nustatymai</a>
						</li>
						<li>
							@auth
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Profilis </a>
							@endauth
							@guest
							<a href="#" class="text-sm font-semibold opacity-70 hover:opacity-100"> Prisijungti </a>
							@endguest
						</li>
					</ul>
				</aside> <!-- col .// -->
				<aside class="w-1/2 sm:w-auto lg:w-40  mb-5">
					<h3 class="font-semibold uppercase text-sm"> Programėlė </h3>
					{{-- <a href="#" class="mt-3 inline-block"> 
							<img class="h-10" src="images/misc/btn-appstore.png" height="38">
						</a>
						<a href="#" class="inline-block"> 
							<img class="h-10" src="images/misc/btn-market.png" height="38">
						</a> --}}
					<h2 class="opacity-50 text-xs"> Greitu metu... </h2>
				</aside> <!-- col .// -->







			</div> <!-- grid .// -->
		</div> <!-- container .// -->
	</section>
	<!-- section footer top end -->


	<!-- section footer bottom  -->
	<section class="bg-gray-900 py-6 text-white">

		<div class="container max-w-screen-xl mx-auto px-4">
			<span class="mb-1 w-full block text-xs text-gray-50 opacity-70 sm:text-center dark:text-gray-400">© 2022 UAB „Mena“ | <a href="https://mena.lt" class="hover:underline">Mena.lt </a></span>
			<div class="lg:flex justify-between">
				<div class="mb-3">
					<img src="{{asset('images/general/payment-card.png')}}" height="24" class="h-8" alt="Payment methods">
				</div> <!-- col .// -->
				<div class="space-x-6">
					<nav class="text-sm space-x-4">
						<a href="#" class="text-xs font-semibold opacity-70 hover:opacity-100">
							Pagalba
						</a>
						<a href="#" class="text-xs font-semibold opacity-70 hover:opacity-100">
							Privatumo politika
						</a>
						<a href="#" class="text-xs font-semibold opacity-70 hover:opacity-100">
							Taisyklės
						</a>
					</nav>
				</div> <!-- col .// -->
			</div> <!-- grid .// -->
		</div> <!-- container .// -->
	</section>
	<!-- section footer bottom  end -->
</footer>