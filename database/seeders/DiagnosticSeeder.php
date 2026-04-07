<?php

namespace Database\Seeders;

use App\Models\Diagnostic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnostics = [
            [
                'result' => 'rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus',
                'user_id' => 2,
                'hitability' => 0.4605,
                'image_path' => 'https://picsum.photos/id/10/800/600'
            ],
            [
                'result' => 'ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac',
                'user_id' => 8,
                'hitability' => 0.6041,
                'image_path' => 'https://picsum.photos/id/20/800/600'
            ],
            [
                'result' => 'nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse',
                'user_id' => 3,
                'hitability' => 0.3709,
                'image_path' => 'https://picsum.photos/id/28/800/600'
            ],
            [
                'result' => 'eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis',
                'user_id' => 5,
                'hitability' => 0.5948,
                'image_path' => 'https://picsum.photos/id/42/800/600'
            ],
            [
                'result' => 'leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis',
                'user_id' => 1,
                'hitability' => 0.2155,
                'image_path' => 'https://picsum.photos/id/55/800/600'
            ],
            [
                'result' => 'nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis',
                'user_id' => 1,
                'hitability' => 0.7818,
                'image_path' => 'https://picsum.photos/id/64/800/600'
            ],
            [
                'result' => 'libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante',
                'user_id' => 1,
                'hitability' => 0.831,
                'image_path' => 'https://picsum.photos/id/76/800/600'
            ],
            [
                'result' => 'arcu libero rutrum ac lobortis vel dapibus at diam nam tristique tortor',
                'user_id' => 9,
                'hitability' => 0.788,
                'image_path' => 'https://picsum.photos/id/88/800/600'
            ],
            [
                'result' => 'sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam',
                'user_id' => 6,
                'hitability' => 0.859,
                'image_path' => 'https://picsum.photos/id/95/800/600'
            ],
            [
                'result' => 'molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus',
                'user_id' => 6,
                'hitability' => 0.316,
                'image_path' => 'https://picsum.photos/id/103/800/600'
            ],
        ];

        foreach ($diagnostics as $diagnostic){
            Diagnostic::factory()->create($diagnostic);
        }
    }
}
