<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use App\Models\Buku;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use App\Filament\Admin\Resources\BukuResource\Pages;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Petugas\Resources\BukuResource\RelationManagers;
use Filament\Forms\Components\RichEditor;
use PhpParser\Node\Stmt\Label;
use function Laravel\Prompts\textarea;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Buku';
    protected static ?string $navigationLabel = 'Buku';
    protected static ?string $label = 'Daftar Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul_buku')
                    ->required(),
                TextInput::make('penulis')
                    ->required(),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama')
                    ->required(), 
                Select::make('rack_id')
                    ->label('Rak Buku')
                    ->relationship('rack', 'rack_name')
                    ->required(),
                TextInput::make('penerbit')
                    ->required(),         
                TextInput::make('tahun_terbit')
                    ->required()
                    ->minLength(4) 
                    ->maxLength(4) 
                    ->numeric() 
                    ->rule('digits:4'),
                RichEditor::make('description')
                    ->label('Deskripsi Buku')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'h2',
                        'h3',
                        'orderedList',
                        'unorderedList',
                        'blockquote',
                        'codeBlock',
                        'undo',
                        'redo',
                    ]),
                TextInput::make('stock')
                    ->label('Jumlah')
                    ->numeric()
                    ->maxLength(4)
                    ->required(),
                FileUpload::make('cover')
                    ->image() 
                    ->required()
                    ->directory('uploads/covers'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->disableClick()
                    ->getStateUsing(fn ($rowLoop) => $rowLoop->iteration),
                TextColumn::make('id')
                    ->Label('Code buku')
                    ->copyable(),
                TextColumn::make('created_at')
                    ->label('Create')
                    ->copyable()
                    ->searchable()
                    ->sortable()
                    ->date('d M Y'),
                TextColumn::make('judul_buku')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('cover') 
                    ->label('Cover Buku')
                    ->disk('public')
                    ->url(fn ($record) => asset($record->cover)), 
                TextColumn::make('penulis')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('penerbit')
                    ->copyable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->copyable()
                    ->searchable()
                    ->wrap()
                    ->tooltip(fn ($record) => strip_tags($record->description))
                    ->limit(50) 
                    ->formatStateUsing(fn ($state) => strip_tags($state)) 
                    ->extraAttributes(['style' => 'min-width: 300px; max-width: 500px;']) 
                    ->grow(),
                TextColumn::make('category.nama')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable()
                    ->copyable(),
                TextColumn::make('rack.rack_name')
                    ->label('Rak')
                    ->sortable()
                    ->searchable()
                    ->copyable(),
                TextColumn::make('tahun_terbit')
                    ->copyable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('stock')
                    ->copyable()
                    ->default(0)
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'nama'),
                \Filament\Tables\Filters\SelectFilter::make('rack')
                    ->relationship('rack', 'rack_name')
            ])
            ->actions([ 
                Tables\Actions\ViewAction::make()
                    ->infolist([
                        TextEntry::make('judul_buku'),
            
                        ImageEntry::make('cover')
                            ->label('Cover Buku')
                            ->url(fn ($record) => asset('storage/' . $record->cover))
                            ->defaultImageUrl(url('/images/book.png'))
                            ->extraAttributes([
                                'class' => 'rounded-lg shadow-md w-40', // Styling gambar
                            ]),
            
                        TextEntry::make('penulis'),
                        TextEntry::make('penerbit'),
            
                        TextEntry::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull() 
                            ->markdown() 
                            ->html() 
                            ->hidden(fn ($record) => empty($record->description)),
            
                        TextEntry::make('category.nama')
                            ->label('Kategori'),
            
                        TextEntry::make('rack.rack_name')
                            ->label('Rak Buku'),
            
                        TextEntry::make('tahun_terbit')
                            ->label('Tahun Terbit'),
                    ]),
            
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
            // 'view' => Pages\ViewBuku::route('/{record}'),
        ];
    }
}
