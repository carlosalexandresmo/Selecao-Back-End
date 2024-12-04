<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('comments')->insert([
            [
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac dolor risus. Curabitur eros lorem, iaculis nec rutrum eu, aliquet at ligula. Aliquam fringilla ornare quam, vitae varius magna placerat sed. Duis laoreet tortor neque, ut accumsan odio tempor sit amet. Nullam sodales commodo facilisis. Cras id vulputate est. Aliquam cursus, nulla vel dictum gravida, diam metus porta augue, et dignissim lorem ante ac dui.',
                'user_id' => 2
            ],
            [
                'content' => 'Nunc et augue sapien. Morbi placerat, libero eu congue luctus, lacus lectus gravida neque, ac tempor metus mi pellentesque velit. Nunc dignissim nisi eget libero pulvinar mollis. Nulla malesuada odio eget suscipit venenatis. Vestibulum vestibulum blandit nisl, vitae dictum arcu malesuada et. Integer ut dolor rutrum, accumsan lacus vel, tincidunt orci. Pellentesque aliquam consectetur tristique. Vestibulum nec ipsum lobortis, semper nunc tincidunt, tincidunt felis. Aenean sit amet lectus neque. Pellentesque cursus sagittis urna ac cursus. Integer sed sapien metus. Suspendisse egestas urna nec laoreet tincidunt. In nisl elit, consequat tincidunt semper pellentesque, vehicula vel sapien. Vestibulum sollicitudin lectus sit amet arcu euismod aliquet.',
                'user_id' => 3
            ],
            [
                'content' => 'Ut velit arcu, consequat ut tellus sed, ultrices cursus odio. Vestibulum convallis, ante in maximus viverra, magna ante finibus dolor, a tincidunt massa enim sed massa. Vestibulum eros lorem, dapibus vel sem in, sodales pellentesque orci. Morbi at ultricies arcu. Praesent gravida ligula quis ligula faucibus, vel porta eros mattis. Aenean ac felis turpis. Pellentesque vel sollicitudin mi. Curabitur eget velit id ligula imperdiet molestie. Vestibulum eleifend odio sem, ac pharetra nulla ultrices ut. Integer vitae dapibus mi, in vulputate elit. Suspendisse consectetur varius orci, quis tempus neque fringilla id. Curabitur eu dolor est. Nulla in tellus eget sem ornare mollis. Aliquam quis ipsum sollicitudin, finibus nibh ac, condimentum elit.',
                'user_id' => 4
            ],
            [
                'content' => 'Duis eros nisl, dictum nec consectetur nec, venenatis semper libero. Fusce faucibus ullamcorper bibendum. In hac habitasse platea dictumst. Nullam eu nunc at arcu porta ornare. Vestibulum scelerisque sit amet purus egestas ornare. Sed facilisis pulvinar risus, pretium sodales quam eleifend in. Duis sit amet lorem eu nunc ornare ultrices. Nam pulvinar, metus sit amet molestie fringilla, ex ipsum tempus leo, et lacinia nunc ligula ac metus. Quisque tincidunt viverra metus, vitae iaculis odio placerat sed. Vestibulum pulvinar dui justo, ac sollicitudin quam viverra eu. Donec ac ornare ante, vel semper leo.',
                'user_id' => 3
            ],
            [
                'content' => 'Mauris ultrices, sapien sit amet tempus vehicula, urna dolor facilisis nisl, ut eleifend risus tortor ut nibh. Vivamus hendrerit quis diam id imperdiet. Ut pulvinar odio erat, quis pharetra massa dictum gravida. In hac habitasse platea dictumst. Nam ut lacus feugiat, gravida metus in, malesuada tortor. Aliquam sed erat libero. Donec pellentesque, lorem sed elementum pellentesque, lacus purus sagittis massa, eu dictum massa lectus quis ipsum. Phasellus non mollis ligula. Vivamus fermentum nisl sem, ac scelerisque lectus semper in.',
                'user_id' => 4
            ],
            [
                'content' => 'Donec pellentesque, lorem sed elementum pellentesque, lacus purus sagittis massa, eu dictum massa lectus quis ipsum. Phasellus non mollis ligula. Vivamus fermentum nisl sem, ac scelerisque lectus semper in. Vestibulum scelerisque sit amet purus egestas ornare. Sed facilisis pulvinar risus, pretium sodales quam eleifend in. Duis sit amet lorem eu nunc ornare ultrices. Nam pulvinar, metus sit amet molestie fringilla, ex ipsum tempus leo, et lacinia nunc ligula ac metus.',
                'user_id' => 2
            ],
            [
                'content' => 'Nulla in tellus eget sem ornare mollis. Aliquam quis ipsum sollicitudin, finibus nibh ac, condimentum elit. Vestibulum sollicitudin lectus sit amet arcu euismod aliquet.',
                'user_id' => 2
            ],
            [
                'content' => 'Aliquam cursus, nulla vel dictum gravida, diam metus porta augue, et dignissim lorem ante ac dui. Curabitur eu dolor est. Nulla in tellus eget sem ornare mollis. Aliquam quis ipsum sollicitudin, finibus nibh ac, condimentum elit.',
                'user_id' => 3
            ],
            [
                'content' => 'Aenean sit amet lectus neque. Pellentesque cursus sagittis urna ac cursus. Integer sed sapien metus. Suspendisse egestas urna nec laoreet tincidunt.Vestibulum vestibulum blandit nisl, vitae dictum arcu malesuada et. Integer ut dolor rutrum, accumsan lacus vel, tincidunt orci.',
                'user_id' => 4
            ],
            [
                'content' => 'Mauris ultrices, sapien sit amet tempus vehicula, urna dolor facilisis nisl, ut eleifend risus tortor ut nibh. Vivamus hendrerit quis diam id imperdiet.Vestibulum sollicitudin lectus sit amet arcu euismod aliquet. Aliquam sed erat libero. Donec pellentesque, lorem sed elementum pellentesque, lacus purus sagittis massa, eu dictum massa lectus quis ipsum.',
                'user_id' => 2
            ],
        ]);
    }
}
