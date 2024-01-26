<?php

namespace App\Filament\Marketer\Resources;

use App\Filament\Marketer\Resources\KnowledgeResource\Pages;
use App\Filament\Marketer\Resources\KnowledgeResource\RelationManagers;
use App\Models\Knowledgebase;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KnowledgeResource extends Resource
{
    protected static ?string $model = Knowledgebase::class;
    protected static ?string $pluralModelLabel = 'Knowledge Base';
    protected static ?string $navigationIcon = 'heroicon-o-film';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Select::make('category')->options([
                        'News' => 'News', 'Assets' => 'Assets',
                        'Invoices' => 'Invoices', 'Authentication' => 'Authentication', 'Payments' => 'Payments'
                    ])->required(),
                    TextInput::make('title')->required(),
                    SpatieMediaLibraryFileUpload::make('attachment')->required()->multiple()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')->size('sm')->searchable()->sortable(),
                TextColumn::make('title')->size('sm')->searchable()->wrap(),
                TextColumn::make('media.file_name')->label('Video(s)')->searchable()->wrap()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKnowledge::route('/'),
            'create' => Pages\CreateKnowledge::route('/create'),
            'view' => Pages\ViewKnowledge::route('/{record}'),
            // 'edit' => Pages\EditKnowledge::route('/{record}/edit'),
        ];
    }

}
