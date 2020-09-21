@if ($heroProduct)
<section class="text-gray-700 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font text-re sm:text-4xl text-3xl mb-4 font-medium text-gray-700">
            {{ $heroProduct->name }}
        </h1>
        <p class="leading-relaxed">
            {{ $heroProduct->description }}
        </p>
        <div class="text-2xl text-red-700 font-semibold my-4">
            {{ session()->get('default_currency')->symbol . number_format($heroProduct->price, 2) }}
        </div>
        <div class="flex justify-center">
            <form  method="post" action="{{ route('add.to.cart') }}">
                @csrf
                <input type="hidden" name="slug" value="{{ $heroProduct->slug }}" />
                <input type="hidden" name="qty" value="1" />
                <button type="submit" class="px-6 py-3 bg-red-500 text-white font-semibold rounded">
                    Add to cart
                </button>
            </form>
           
            {{-- <button class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Button</button> --}}
        </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="{{ $heroProduct->mainImage->path ?? 'https://placehold.it/250x250' }}">
        </div>
    </div>
</section>
@endif
