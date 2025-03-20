<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Admin;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\AdminResource\Pages;
use App\Filament\Admin\Resources\AdminResource\RelationManagers;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role', 'admin');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'Role';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('email')->disabled(),
                TextInput::make('telepon')
                    ->numeric() 
                    ->maxLength(15) 
                    ->rule('digits_between:10,15')
                    ->placeholder('Masukkan nomor telepon')
                    ->required(),
                TextInput::make('alamat'),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'petugas' => 'Petugas',
                        'user' => 'User',
                    ])
                    ->required()
                    ->label('Role'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('row_number')
                    ->label('No')
                    ->rowIndex()
                    ->copyable(),
                TextColumn::make('id')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('name')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('telepon')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('alamat')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('role')
                    ->searchable()
                    ->copyable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
        ];
    }
}
