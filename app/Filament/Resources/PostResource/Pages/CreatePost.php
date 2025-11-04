<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Create Note');
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Primeiro, criar o post se os dados estão no relacionamento
        if (isset($data['post']) && is_array($data['post'])) {
            $postData = $data['post'];
            $postData['user_id'] = $data['user_id'];
            $post = Post::create($postData);

            // Atualizar os dados da página com o post_id
            $data['post_id'] = $post->id;

            // Remover os dados do post dos dados da página
            unset($data['post']);
        }

        // Criar a página
        return static::getModel()::create($data);
    }
}
