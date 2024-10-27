<?php

namespace App\Models;

use App\FastAdminPanel\Models\MultilanguageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends MultilanguageModel
{

    protected $table = 'weights';

    use HasFactory;

    public function getWeightGramAttribute()
    {
        $value = $this->slug;
        if (str_contains($value, 'kg') || str_contains($value, '-kg')) {
            $kgValue = (float)str_replace(['-kg', 'kg', '-'], ['', '', '.'], $value);
            return $kgValue * 1000;
        }
        return (float)str_replace(['-g', 'g'], '', $value);
    }

    public function getWeightKgAttribute()
    {
        $value = $this->slug;

        if (str_contains($value, 'kg') || str_contains($value, '-kg')) {
            return (float)str_replace(['-kg', 'kg', '-'], ['', '', '.'], $value);
        }
        return (float)str_replace(['-g', 'g'], '', $value) / 1000; // Ділимо на 1000
    }
}
