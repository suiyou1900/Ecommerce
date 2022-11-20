<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('-Mcqueen-') }}
        </h2>
    </x-slot>

   
    <div class="bg-white">
  <div class="pt-6">
    <nav aria-label="Breadcrumb">

      <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">

        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900">{{$products['category']}}</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>

        <li class="text-sm">
          <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{$products['name']}}</a>
        </li>
      </ol>

    </nav>

    <!-- Image gallery -->
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
      <div class="aspect-w-3 aspect-h-4 hidden overflow-hidden rounded-lg lg:block">
        <img src="{{$products['image']}}" alt="商品画像" class="h-full w-full object-cover object-center">
      </div>
    </div>

 
    
    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-serif tracking-tight text-gray-900 sm:text-3xl border-b-4">商品名：{{$products['name']}}</h1><br>

        <h1 class="text-2xl font-serif">商品の詳細：{{$products['description']}}</h1>
        
      </div>
      
      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pb-16 lg:pr-8">

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <h2 class="sr-only">Product information</h2>
        <p class="font-serif text-2xl tracking-tight text-gray-900 ">値段：{{$products['price']}}円＋送料（税込）</p><br>
        <p class="font-serif text-2xl tracking-tight text-gray-900 ">個数：
        <select>
            <option>選択してください</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
        </p><br>
        <p class="font-serif text-2xl tracking-tight text-gray-900">サイズ：  
            <select>
            <option>選択してください</option>
            <option>S</option>
            <option>M</option>
            <option>L</option>
        　　 </select></p><br>

        <form class="mt-10" method='post' action="{{route('cart')}}">
            @csrf
            <input type='hidden' name='product_id' value="{{$products['id']}}">
          <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">商品をカートに入れる</button>
        </form>
      </div>

      
    </div>
  </div>
</div>
</x-app-layout>
