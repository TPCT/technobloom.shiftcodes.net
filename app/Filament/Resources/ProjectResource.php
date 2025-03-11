<?php

namespace App\Filament\Resources;

use App\Exports\PageExport;
use App\Filament\Components\FileUpload;
use App\Filament\Components\TextInput;
use App\Filament\Components\TinyEditor;
use App\Filament\Resources\ProjectResource\Pages\CreateProject;
use App\Filament\Resources\ProjectResource\Pages\EditProject;
use App\Filament\Resources\ProjectResource\Pages\ListProjects;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Helpers\Utilities;
use App\Models\Dropdown\Dropdown;
use App\Models\Language;
use App\Models\Page\Page;
use App\Models\Project;
use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use CactusGalaxy\FilamentAstrotomic\Resources\Concerns\ResourceTranslatable;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProjectResource extends Resource
{
    use ResourceTranslatable;

    protected static ?string $model = Project\Project::class;

    protected static ?string $navigationIcon = 'bi-question';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __("Projects");
    }

    public static function getModelLabel(): string
    {
        return __("Project");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Projects");
    }

    public static function getPluralModelLabel(): string
    {
        return __("Projects");
    }

    public static function getNavigationGroup(): ?string
    {
        return __("Custom Modules");
    }

    public static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)->schema([
                    Forms\Components\Grid::make()->schema([
                        TranslatableTabs::make()
                            ->localeTabSchema(fn (TranslatableTab $tab) =>[
                                FileUpload::make('image_id')
                                    ->multiple(false)
                                    ->required()
                                    ->label(__("Image")),

                                TextInput::make($tab->makeName('title'))
                                    ->label(__("Title"))
                                    ->maxLength(255)

                                    ->multiLingual()
                                    ->unique(ignoreRecord: true)
                                    ->required(),

                                    TiptapEditor::make($tab->makeName('information'))
                                        ->label(__("Information")),

                                    TiptapEditor::make($tab->makeName('description'))
                                        ->label(__("Description")),
                            ])->columnSpanFull(),

                        Forms\Components\Section::make()->schema([
                            FileUpload::make('project_images')
                                ->multiple()
                                ->maxItems(4)
                                ->relationship('images', 'id')
                        ]),

                        Forms\Components\Section::make()->schema([
                            Forms\Components\Repeater::make('features')
                                ->defaultItems(0)
                                ->relationship()
                                ->schema(function (){
                                    $tabs = [];
                                    foreach (Language::all() as $language){
                                        $tabs[] = Forms\Components\Tabs\Tab::make($language->language)
                                            ->schema([
                                                Forms\Components\TextInput::make("{$language->locale}.title")
                                                    ->label(__("Title"))
                                                    ->required(),
                                            ]);
                                    }
                                    return [ Forms\Components\Tabs::make()->tabs($tabs)];
                                })
                                ->columnSpan(2)
                        ]),

                        Forms\Components\Section::make()->schema([
                            Forms\Components\Repeater::make('steps')
                                ->defaultItems(0)
                                ->relationship()
                                ->schema(function (){
                                    $tabs = [];
                                    foreach (Language::all() as $language){
                                        $tabs[] = Forms\Components\Tabs\Tab::make($language->language)
                                            ->schema([
                                                Forms\Components\Grid::make()->schema([
                                                    FileUpload::make('image_1_id')
                                                        ->label(__("Image"))
                                                        ->multiple(false),

                                                    FileUpload::make('image_2_id')
                                                        ->label(__("Image"))
                                                        ->multiple(false),
                                                ]),

                                                Forms\Components\TextInput::make("{$language->locale}.title")
                                                    ->label(__("Title"))
                                                    ->required(),

                                                TiptapEditor::make("{$language->locale}.description")
                                                    ->label(__("Description"))
                                            ]);
                                    }
                                    return [ Forms\Components\Tabs::make()->tabs($tabs)];
                                })
                                ->columnSpan(2)
                        ])
                    ])->columnSpan(2),

                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make()->schema(
                            array_merge(
                                Filament::auth()->user()->can('change_author_project') ? [
                                    Forms\Components\Select::make('author.name')
                                        ->label(__("Author"))
                                        ->relationship('author', 'name')
                                        ->default(Filament::auth()->user()->id)
                                        ->required()
                                        ->native(false)
                                ] : [] , [

//                                Forms\Components\Select::make('section_ids')
//                                    ->label(__("Section"))
//                                    ->multiple()
//                                    ->preload()
//                                    ->relationship('sections', 'title'),

                                TextInput::make('slug')
                                    ->label(__("Slug"))
                                    ->unique(ignoreRecord: true)
                                    ->disabledOn('edit')
                                    ->helperText(__("Will Be Auto Generated From Title"))
                                    ->markAsRequired('true'),

                                Forms\Components\Select::make('categories')
                                    ->label(__("Category"))
                                    ->multiple()
                                    ->relationship()
                                    ->required()
                                    ->options(function (){
                                        return Dropdown::where('category', Dropdown::PROJECT_CATEGORY)->get()->pluck('title', 'id')->toArray();
                                    })
                                    ->preload(),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label(__("Published At"))
                                    ->default(Carbon::today())
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('status')
                                    ->label(__("Status"))
                                    ->options(Page::getStatuses())
                                    ->native(false)
                                    ->default(1),
                            ])
                        ),
                        \App\Filament\Components\Seo::make(config('app.locales'))
                            ->columnSpan(1)
                    ])->columnSpan(1),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(function(){
                return self::$model::orderBy('published_at', 'desc');
            })
            ->columns([
                Tables\Columns\TextColumn::make('translation.title')
                    ->toggleable()
                    ->searchable(query: function ($query, $search){
                        return $query->whereTranslationLike('title', '%'.$search.'%');
                    })
                    ->label(__("Title")),
                Tables\Columns\TextColumn::make('status')
                    ->toggleable()
                    ->label(__("Status"))
                    ->badge()
                    ->color(function (Project\Project $record){
                        return $record->status == Utilities::PUBLISHED ? "success" : "danger";
                    })
                    ->formatStateUsing(function(Project\Project $record){
                        return $record->status == Utilities::PUBLISHED ? __("Published") : __("Pending");
                    }),
                Tables\Columns\TextColumn::make('published_at')
                    ->toggleable()
                    ->label(__("Publish Time"))
                    ->date(),
                Tables\Columns\TextColumn::make('author.name')
                    ->toggleable()
                    ->label(__("Author"))
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('author')
                    ->label(__("Author"))
                    ->searchable()
                    ->relationship('author', 'name')
                    ->native(false),
                Tables\Filters\SelectFilter::make('status')
                    ->label(__("Status"))
                    ->options(Project\Project::getStatuses())
                    ->searchable()
                    ->native(false)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->poll("30s")
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    ExportBulkAction::make('Export')->label(__('Export'))->exports([
//                        PageExport::make()->fromModel()
//                    ]),
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
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}
