<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use App\Models\AuditLog;

class AuditObserver
{
    protected function log($model, $event)
    {
        try {
            $user = Auth::user();
            AuditLog::create([
                'user_id' => $user?->id,
                'action' => sprintf('%s %s:%s', $event, class_basename($model), $model->getKey()),
                'method' => $event,
                'path' => request()?->path() ?? null,
                'ip' => request()?->ip() ?? null,
                'user_agent' => substr(request()?->header('User-Agent') ?? '', 0, 1000),
                'payload' => substr(json_encode($model->getAttributes()), 0, 2000),
            ]);
        } catch (\Throwable $e) {
            // ignore
        }
    }

    public function created($model)
    {
        $this->log($model, 'created');
    }

    public function updated($model)
    {
        $this->log($model, 'updated');
    }

    public function deleted($model)
    {
        $this->log($model, 'deleted');
    }

    public function restored($model)
    {
        $this->log($model, 'restored');
    }

    public function forceDeleted($model)
    {
        $this->log($model, 'forceDeleted');
    }
}
