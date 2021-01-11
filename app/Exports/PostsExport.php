<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Post::all();
    }

    public function headings():array
    {
        return[
            'id',
            'title',
            'description',
            'status',
            'create_user_id',
            'updated_user_id',
            'deleted_user_id',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}
