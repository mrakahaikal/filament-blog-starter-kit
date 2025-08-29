<?php

namespace App\Filament\Resources\Blog\Posts\Pages;

use Carbon\Carbon;
use App\Models\Blog\Post;
use App\Events\BlogPublished;
use App\Jobs\PostScheduleJob;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Blog\Posts\PostResource;
use App\Filament\Resources\Blog\SeoDetails\SeoDetailResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function afterCreate()
    {
        if ($this->record->isScheduled()) {

            $now = Carbon::now();
            $scheduledFor = Carbon::parse($this->record->scheduled_for);
            PostScheduleJob::dispatch($this->record)
                ->delay($now->diffInSeconds($scheduledFor));
        }
        if ($this->record->isStatusPublished()) {
            $this->record->published_at = date('Y-m-d H:i:s');
            $this->record->save();
            event(new BlogPublished($this->record));
        }
    }

    protected function getRedirectUrl(): string
    {
        return SeoDetailResource::getUrl('create', ['post_id' => $this->record->id]);
    }
}
