<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $state, Forms\Set $set) =>
                                    $set('slug', Str::slug($state)))
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                               
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->url()
                    ->required(),
                Forms\Components\TextInput::make('repository')
                    ->url()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('images_public_html')
                    ->directory('projects')
                    ->visibility('public'),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Select::make('stacks')
                            ->multiple()
                            ->relationship('stacks', 'name')
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()                              
                            ]),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')                    
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('repository')                    
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
            ])->filters([
                //
            ])->headerActions([
                
            ])->actions([
                //
            ])->bulkActions([
                //
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
