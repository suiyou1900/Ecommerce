<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('-Mcqueen-') }}
        </h2>
    </x-slot>
  
　<body class="bg-gray-100">
  <div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
      <div class="w-2/5 bg-white px-10 py-10">
        <div class="flex justify-between border-b pb-8">
          <h1 class="font-semibold text-2xl">注文内容</h1>
          <h2 class="font-semibold text-2xl"></h2>
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
             
            </div>
          </div>

          <div class="flex justify-center w-1/5">
            <input class="mx-2 border text-center w-8" type="text" name='quantity' value="1">
          </div>
    
          <span class="text-center w-1/5 font-semibold text-sm">{{$item->price}}円</span>
        
        </div>
        @endforeach

       
      </div>
     

      <div id="summary" class="w-1/4 px-8 py-10">
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-m uppercase">商品の数</span>
          <span class="font-semibold text-m">{{$total}}個</span>
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-m uppercase">
            <span>合計金額</span>
            <span>{{$totalprice}}円</span>
          </div>
        </div>
      </div>
      <div class="w-2/5 bg-white px-10 py-10">
      <div class="mt-5 md:col-span-2 md:mt-0">
      <form action="/order_detail" method="POST">
        <div class="overflow-hidden shadow sm:rounded-md">
        <h1>配送先の情報を入力してください</h1>
          <div class="bg-white px-4 py-5 sm:p-6">
          @csrf
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">姓</label>
                <input type="text" value="{{old('first_name')}}" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('first_name')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
               </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">名</label>
                <input type="text" value="{{old('last_name')}}" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('last_name')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="email-address" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="text" name="email" value="{{old('email')}}" id="email" autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('email')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">郵便番号</label>
                <input type="text" name="postal_code" value="{{old('postal_code')}}" id="postal_code" autocomplete="postal_code" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('postal_code')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
              </div>


              <div class="col-span-6">
                <label for="address" class="block text-sm font-medium text-gray-700">住所</label>
                <input type="text" name="address" value="{{old('address')}}" id="address" autocomplete="street-address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('address')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="region" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phonenumber" value="{{old('phonenumber')}}" id="phonenumber" autocomplete="address-level1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('phonenumber')
                <div class="text-red-600">{{ $message }}</div>
                @enderror
              </div>     

              <div class="col-span-6 sm:col-span-6">
                <label for="region" class="block text-sm font-medium text-gray-700">お支払い方法</label>
                <input type="radio" name="payment" value='card'><span class='p-2'>クレジットカード</span>
                <input type="radio" name="payment" value='money'><span class='p-2'>代金引換</span>
                <input type="radio" name="payment" value='bank'><span class='p-2'>銀行振込</span>
              </div>     
            </div>
      </div>

      <div class="col-span-6 sm:col-span-4">
            <a href='/order_detail'>
            <button class="bg-red-500 font-semibold hover:bg-red-600 py-3 text-sm text-white uppercase w-full">商品購入を完了する</button>
            </a>
            </div>
          </form>
    </div>
  </div>
</body>

</x-app-layout>


