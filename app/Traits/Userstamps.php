<?php
namespace App\Traits;

use App\Services\ApiService\PaisTemplateService;

trait Userstamps
{
    protected static function booted()
    {
        $service = new PaisTemplateService;
        $userId = $service->currentUser()['data']['id'];
        static::creating(function ($model) use($userId) {
            $model->created_by = $userId;
        });

        static::updating(function ($model) use($userId) {
            $model->updated_by = $userId;
        });

        static::deleting(function ($model) use($userId) {
            $model->deleted_by = $userId;
        });
    }
}