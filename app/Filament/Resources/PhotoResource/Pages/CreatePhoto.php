<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use App\Models\Photo;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CreatePhoto extends CreateRecord
{
    protected static string $resource = PhotoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Log the form data for debugging
        Log::info('Form Data:', $data);

        // Extract the file paths from the form data
        $filePaths = $data['files'] ?? [];
        $description = $data['description'] ?? null;

        // Log the file paths
        Log::info('File Paths:', $filePaths);

        // Iterate over each file path to create a separate Photo record
        foreach ($filePaths as $path) {
            // Check if $path is a string
            if (is_string($path)) {
                // Get the filename from the path
                $filename = basename($path);

                // Log the filename and path
                Log::info('Creating Photo:', ['filename' => $filename, 'filepath' => $path]);

                // Create the photo record
                Photo::create([
                    'filename' => $filename,
                    'filepath' => $path,
                    'description' => $description,
                ]);
            } else {
                Log::error('File path is not a string:', ['path' => $path]);
            }
        }

        // Return an empty array to prevent additional saves
        return [];
    }

    protected function getRedirectUrl(): string
    {
        $tableName = 'photos';
        $columnsToCheck = ['filename', 'filepath'];

        DB::table($tableName)
            ->whereNull($columnsToCheck)
            ->orWhere(function ($query) use ($columnsToCheck) {
                foreach ($columnsToCheck as $column) {
                    $query->orWhere($column, null);
                }
            })
            ->delete();

        return $this->getResource()::getUrl('index');
    }
}
