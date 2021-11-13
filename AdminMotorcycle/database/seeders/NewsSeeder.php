<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\news;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        news::create([
            'newsCode' => 'new01',
             'title' => 'Our new Product',
            'description' => 'You need to read this',
            'content'  => '- Đạo đức là cái gốc của người cách mạng.
+ Đạo đức là nguồn nuôi dưỡng và phát triển con người.
+ Đạo đức bộc lộ thông qua hành động, lấy hiểu quả thực tế là thước đo, vì vậy đạo đức có mối liên hệ mật thiết với tài năng.
- Đạo đức là nhân tố tạo nên sức hấp dẫn của chủ nghĩa xã hội.
+ Sức hấp dẫn của chủ nghĩa xã hội, chưa phải là ở lý tưởng cao xa, ở mức sống vật chất dồi dào, mà trước hết là ở những giá trị đạo đức cao đẹp, ở phẩm chất của những người cộng sản luôn sống và chiến đấu cho lý tưởng cách mạng để tư tưởng được tự do giải phóng của loài người thành hiện thực.
+ Những phẩm chất đạo đức cao quý làm cho CNCS trở thành một sức mạnh vô địch.' ,

            'createdBy' => 'Viet Hoang',
            'adminID' => '1',

        ]);
    }
}
