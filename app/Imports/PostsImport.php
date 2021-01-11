<?php

namespace App\Imports;

use App\Post;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class PostsImport implements ToModel, WithHeadingRow, withValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title'  => $row['title'],
            'description'  => $row['description'],
            'status' => $row['status'],
            'create_user_id'  => $row['create_user_id'],
            'updated_user_id'  => $row['updated_user_id'],
            'deleted_user_id'  => $row['deleted_user_id']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            '*.description' => ['required', 'string'],
            '*.status' => ['required', 'integer'],
            '*.create_user_id' => ['required', 'integer'],
            '*.updated_user_id' => ['required', 'integer'],
            '*.deleted_user_id' => ['nullable', 'integer']
        ];
    }
}
