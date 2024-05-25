<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Models\Photo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class PhotoResource extends Resource
{
    protected static ?string $model = Photo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('files')
                    ->multiple()
                    ->openable()
                    ->imageEditor()
                    ->preserveFilenames()
                    ->storeFileNamesIn('filenames')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filename')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('filepath')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                // Add filters here if needed
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Image information')
                ->columns(3)
                    ->schema([
                        ImageEntry::make('filepath')
                        ->columnSpan(2)
                        ->width(500)
                        ->height('auto')
                        ->label('Image'),
                        TextEntry::make('filename'),
                        TextEntry::make('description'),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relation managers here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotos::route('/'),
            'create' => Pages\CreatePhoto::route('/create'),
            'edit' => Pages\EditPhoto::route('/{record}/edit'),
            'view' => Pages\ViewPhoto::route('/{record}'),
        ];
    }
}
