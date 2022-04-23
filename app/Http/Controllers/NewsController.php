<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke(Request $request)
    {
        $news = [
            '1' => [
                'title' => 'Some news 1',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate ipsam magni nostrum quasi quisquam veniam
                            vero! Autem ipsum nam obcaecati omnis perspiciatis quasi quia saepe veniam. Consequatur consequuntur dolor qui!',
                'date' => date('Y:m:d')
            ],
            '2' => [
                'title' => 'Some news 2',
                'text' => 'Ab amet fugit harum nesciunt nisi optio perspiciatis quos similique suscipit voluptate! Accusamus asperiores
                            doloribus eius est, illo iste iusto laudantium molestias possimus provident quo rerum ut. Culpa, natus, optio?',
                'date' => date('Y:m:d')
            ],
            '3' => [
                'title' => 'Some news 3',
                'text' => 'Cupiditate, delectus deserunt labore laudantium pariatur reiciendis sapiente sint tempore! Amet, autem corporis
                            ea enim excepturi facilis in labore omnis porro provident quod repellat sit unde vero, voluptas voluptate
                            voluptatem.',
                'date' => date('Y:m:d')
            ],
            '4' => [
                'title' => 'Some news 4',
                'text' => 'Accusamus accusantium blanditiis eligendi labore natus necessitatibus nemo non odio perspiciatis quia quis quos
                            rem, voluptatum? Accusamus consequatur corporis dolor eveniet itaque nobis odio quo repellat rerum temporibus.
                            Accusantium, quae.',
                'date' => date('Y:m:d')
            ],
        ];

        return view('news', compact('news'));
    }
}
