<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
     DB::table('products')->insert(
     [
        'name'=>'コート',
        'category'=>'outer',
        'description'=>'防寒機能とデザイン性の高さを兼ね備えたアウターです',
        'price'=>'25000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/442152001/item/goods_69_442152001.jpg'

     ]);
     DB::table('products')->insert(
     [
        'name'=>'ジャケット',
        'category'=>'outer',
        'description'=>'弾力性も保湿性も優れた上質ダウンジャケット',
        'price'=>'17000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/450453/sub/goods_450453_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'ブルゾン',
        'category'=>'outer',
        'description'=>'どんなボトムスにも合わせることのできる優れもの',
        'price'=>'18000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/452614/sub/goods_452614_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'コットンセーター',
        'category'=>'tops',
        'description'=>'ふんわりとした肌触りの素材を使用しています',
        'price'=>'20000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/439063/sub/goods_439063_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'スクエアネックセーター',
        'category'=>'tops',
        'description'=>'美しいシルエットに見せてくれ着心地を重視した素材で作られています',
        'price'=>'20000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/452646/sub/goods_452646_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'ストレッチジーンズ',
        'category'=>'pants',
        'description'=>'ストレッチ性があり美脚に見せてくれます',
        'price'=>'20000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/441990/item/goods_09_441990.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'ストレッチレギンス',
        'category'=>'pants',
        'description'=>'快適な履き心地を実現',
        'price'=>'30000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/456191/item/goods_01_456191.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'コーデュロイパンツ',
        'category'=>'pants',
        'description'=>'ゆったり楽に履けるコーデュロイ素材のパンツ',
        'price'=>'10000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/451320/sub/goods_451320_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'フレアスカート',
        'category'=>'skirt',
        'description'=>'綺麗なフレアシルエットのスカート',
        'price'=>'10000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/451565/sub/goods_451565_sub14.jpg'
     ]);
     DB::table('products')->insert(
     [
        'name'=>'プリーツスカート',
        'category'=>'skirt',
        'description'=>'柔らかな素材感を活かしたプリーツスカート',
        'price'=>'30000',
        'image'=>'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/458623/item/goods_01_458623.jpg'
     ]);
    }
}
?>