<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReviewResource\Pages;
use App\Filament\Admin\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Buku;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\BulkAction;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Buku';
    protected static ?string $label = 'Rating dan komentar buku';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Username')
                    ->relationship('user', 'name') // Relasi ke model User, menampilkan 'name'
                    ->searchable()
                    ->disabled(),
                Select::make('buku_id')
                    ->label('Judul Buku')
                    ->relationship('buku', 'judul_buku') // Relasi ke model User, menampilkan 'name'
                    ->searchable()
                    ->disabled(),
                Textarea::make('komentar')->disabled(),
                Select::make('rating')
                    ->disabled()
                    ->label('Rating')
                    ->options([
                        '5' => '⭐⭐⭐⭐⭐',
                        '4' => '⭐⭐⭐⭐',
                        '3' => '⭐⭐⭐',
                        '2' => '⭐⭐',
                        '1' => '⭐',
                    ]),
                Toggle::make('is_hidden')
                        ->label('Sembunyikan Komentar')
                        ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->copyable()
                    ->searchable()
                    ->sortable()
                    ->date('d M Y'),
                TextColumn::make('user.name')
                    ->label('Username')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('buku.judul_buku')
                    ->copyable()
                    ->searchable(),
                TextColumn::make('rating')
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state)) // Hanya bintang penuh
                    ->html()
                    ->searchable()
                    ->copyable(),
                TextColumn::make('komentar')
                    ->searchable()
                    ->copyable()
                    ->wrap()
                    ->tooltip(fn ($record) => strip_tags($record->description))
                    ->limit(50) 
                    ->formatStateUsing(fn ($state) => strip_tags($state)) 
                    ->extraAttributes(['style' => 'min-width: 300px; max-width: 500px;']) 
                    ->grow(),
                TextColumn::make('is_hidden')
                    ->label('Hidden')    
                    ->icon(fn ($state) => $state ? 'heroicon-o-check' : 'heroicon-o-x-mark'),
            ])
            ->filters([
                SelectFilter::make('rating')
                    ->label('Rating')
                    ->options([
                        '5' => '⭐⭐⭐⭐⭐',
                        '4' => '⭐⭐⭐⭐',
                        '3' => '⭐⭐⭐',
                        '2' => '⭐⭐',
                        '1' => '⭐',
                    ]),
                    SelectFilter::make('buku_id')
                        ->label('Judul Buku')
                        ->options(Buku::pluck('judul_buku', 'id')->toArray()) 
                        ->searchable(),
                    SelectFilter::make('user_id')
                        ->label('Username')
                        ->options(User::where('role', 'user')->pluck('name', 'id')->toArray())
                        ->searchable(), 
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->infolist([
                        TextEntry::make('user.name'),
                        TextEntry::make('buku.judul_buku'),
                        TextEntry::make('rating')
                            ->formatStateUsing(fn ($state) => str_repeat('⭐', $state)) // Hanya bintang penuh
                            ->html(),
                        TextEntry::make('komentar')
                            ->label('Komentar'),
                    ]),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            BulkAction::make('Sembunyikan Komentar')
                ->action(fn ($records) => $records->each->update(['is_hidden' => true]))
                ->requiresConfirmation()
                ->color('info'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //  
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
