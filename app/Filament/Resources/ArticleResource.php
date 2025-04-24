<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use FilamentTiptapEditor\TiptapEditor;
use Rawilk\FilamentQuill\Filament\Forms\Components\QuillEditor;
use Rawilk\FilamentQuill\Enums\ToolbarButton;
use Illuminate\Support\Facades\Storage;


class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $state, Forms\Set $set) =>
                                    $set('slug', Str::slug($state))),                               
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                QuillEditor::make('content')
                                    ->toolbarButtons([
                                        ToolbarButton::Font,
                                        ToolbarButton::Size,
                                        ToolbarButton::Bold,
                                        ToolbarButton::Italic,
                                        ToolbarButton::Underline,
                                        ToolbarButton::Strike,
                                        ToolbarButton::BlockQuote,
                                        ToolbarButton::OrderedList,
                                        ToolbarButton::UnorderedList,
                                        ToolbarButton::Indent,
                                        ToolbarButton::Link,
                                        ToolbarButton::Image,
                                        ToolbarButton::UnorderedList,
                                        ToolbarButton::TextAlign,
                                        ToolbarButton::TextColor,
                                        ToolbarButton::BackgroundColor,
                                        ToolbarButton::Undo,
                                        ToolbarButton::Redo,
                                        ToolbarButton::ClearFormat,
                                        ToolbarButton::CodeBlock,
                                        ToolbarButton::Header,
                                        
                                    ])
                                    ->fileAttachmentsDisk('images_public_html')
                                    ->fileAttachmentsDirectory('')
                                    ->fileAttachmentsVisibility('public'),
                                   
                                   
        
                                 
                                Forms\Components\Textarea::make('excerpt')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Section::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->directory('blog-images'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Published')
                                    ->default(false),
                                Forms\Components\DateTimePicker::make('published_at'),
                            ]),
                        Forms\Components\Section::make('Relations')
                            ->schema([
                                Forms\Components\Select::make('tags')
                                    ->multiple()
                                    ->relationship('tags', 'name')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(string $state, Forms\Set $set) =>
                                            $set('slug', Str::slug($state))),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->unique('tags', 'slug'),
                                    ]),
                                Forms\Components\Select::make('video')
                                    ->relationship('video', 'title')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                        Forms\Components\TextInput::make('url')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
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
            ArticleResource\RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
