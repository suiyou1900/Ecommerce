<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('-Mcqueen-') }}
        </h2>
    </x-slot>
  
　<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    @if (session('cart'))
    <div class="bg-red-100 border border-red-500 text-red-700 px-4 py-3 rounded" role="alert">
    <p class="font-bold">{{session('cart')}}</p>
    </div>
    @endif
    <div class="flex shadow-md my-10">
      <div class="w-3/5 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">カート</h1>
          <h2 class="font-semibold text-2xl">商品の数：</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-serif text-gray-600 text-xs uppercase w-2/5">商品</h3>
          <h3 class="font-serif text-center text-gray-600 text-xs uppercase w-1/5">数量</h3>
          <h3 class="font-serif text-center text-gray-600 text-xs uppercase w-1/5">価格</h3>
        </div>
　　　　　@foreach($cartlist as $item)
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            <div class="w-20">
              <img class="h-24" src="{{$item->image}}" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{$item->name}}</span>
              <span class="text-red-500 text-xs">{{$item->category}}</span>
              <a href="/removecart/{{$item->cart_id}}" class="font-semibold hover:text-red-500 text-gray-500 text-xs">削除する</a>
            </div>
          </div>

          <div class="flex justify-center w-1/5">
            <input class="mx-2 border text-center w-8" type="text" name='quantity' value="1">
          </div>
    
          <span class="text-center w-1/5 font-semibold text-sm">{{$item->price}}円</span>
        
        </div>
        @endforeach

        <a href="/dashboard" class="flex font-semibold text-indigo-600 text-sm mt-10">
          <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
         お買い物を続ける
        </a>
      </div>
     

      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">注文概要</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-m uppercase">商品の数</span>
          <span class="font-semibold text-m">{{$total}}個</span>
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-m uppercase">
            <span>合計金額</span>
            <span>{{$totalprice}}円</span>
          </div>
          <a href='/order'>
          <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">購入手続きへ</button>
          </a>
        </div>
      </div>

    </div>
  </div>
</body>

</x-app-layout>
