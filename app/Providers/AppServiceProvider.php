<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Models\Position;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        Validator::extend('unique_array', function ($attribute, $value, $parameters, $validator) {
            // Mengekstrak nilai input lain yang ingin Anda bandingkan
            $otherInput = $validator->getData()[$parameters[0]];
    
            // Memeriksa apakah setiap nilai dalam array tidak sama dengan main position
            foreach ($value as $item) {
                if ($item === $otherInput) {
                    return false;
                }
            }

            // Memeriksa apakah setiap nilai dalam array unik
            foreach ($value as $item) {
                if (count(array_keys($value, $item)) > 1) {
                    return false;
                }
            }
    
            return true;
        });

        Validator::extend('positions_exist', function ($attribute, $value, $parameters, $validator) {
            // Mengekstrak model Position
            $positionModel = app(Position::class);
    
            // Mengekstrak nilai input lain yang ingin Anda bandingkan
            $otherInput = $validator->getData()[$parameters[0]];
    
            // Memeriksa apakah setiap nilai dalam array ada dalam tabel positions
            foreach ($value as $item) {
                if (!$positionModel->where('name', $item)->exists()) {
                    return false;
                }
            }
    
            return true;
        });

    }
}
