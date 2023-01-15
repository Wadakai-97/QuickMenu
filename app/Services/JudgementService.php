<?php

namespace App\Services;

class JudgementService
{
    public function saveResultKey($result) {
        if($result) {
            return config('status.message.key.success');
        } else {
            return config('status.message.key.failed');
        }
    }

    public function saveResultMessage($result) {
        if($result) {
            return config('message.save.success');
        } else {
            return config('message.save.failed');
        }
    }

    public function deleteResultKey($result) {
        if($result >= config('status.db.delete.success')) {
            return config('status.message.key.success');
        } else {
            return config('status.message.key.failed');
        }
    }

    public function deleteResultMessage($result) {
        if($result >= config('status.db.delete.success')) {
            return config('message.delete.success');
        } else {
            return config('message.delete.success');
        }
    }
}
