<?php

namespace App\Filament\Resources;

use App\Exports\TestimonialExport;
use App\Filament\Components\FileUpload;
use App\Filament\Components\TextInput;
use App\Filament\Resources\TeamMemberResource\Pages;
use App\Filament\Resources\TeamMemberResource\RelationManagers;
use App\Helpers\Utilities;
use App\Models\Block\Block;
use App\Models\Language;
use App\Models\TeamMember;
use App\Models\Testimonial;
use CactusGalaxy\FilamentAstrotomic\Forms\Components\TranslatableTabs;
use CactusGalaxy\FilamentAstrotomic\Resources\Concerns\ResourceTranslatable;
use CactusGalaxy\FilamentAstrotomic\TranslatableTab;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class TeamMemberResource extends Resource
{
    use ResourceTranslatable;

    protected static ?string $model = TeamMember\TeamMember::class;

    protected static ?string $navigationIcon = 'bi-question';

    public static function getNavigationLabel(): string
    {
        return __("Team Members");
    }

    public static function getModelLabel(): string
    {
        return __("Team Member");
    }

    public static function getPluralLabel(): ?string
    {
        return __("Team Members");
    }

    public static function getPluralModelLabel(): string
    {
        return __("Team Members");
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
                    Forms\Components\Grid::make()
                        ->schema([
                            TranslatableTabs::make()
                                ->localeTabSchema(fn (TranslatableTab $tab) => [
                                    FileUpload::make('image_id')
                                        ->multiple(false)
                                        ->label(__('Image')),

                                    TextInput::make($tab->makeName('title'))
                                        ->label(__("Title"))
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make($tab->makeName('position'))
                                        ->label(__("Position"))
                                        ->maxLength(255)
                                ])->columnSpanFull()
                        ])
                        ->columnSpan(2),
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make()->schema(
                            array_merge(
                                Filament::auth()->user()->can('change_author_team-member') ? [
                                    Select::make('author.name')
                                        ->label(__("Author"))
                                        ->relationship('author', 'name')
                                        ->default(Filament::auth()->user()->id)
                                        ->required()
                                        ->native(false)
                                ] : [] , [
                                TextInput::make('facebook')
                                    ->label(__("Facebook"))
                                    ->url(),

                                TextInput::make('youtube')
                                    ->label(__("Youtube"))
                                    ->url(),

                                TextInput::make('linkedin')
                                    ->label(__("LinkedIn"))
                                    ->url(),

                                TextInput::make('instagram')
                                    ->label(__("Instagram"))
                                    ->url(),

                                Forms\Components\DatePicker::make('published_at')
                                    ->label(__("Published At"))
                                    ->default(Carbon::today())
                                    ->native(false)
                                    ->required(),

                                Select::make('status')
                                    ->label(__("Status"))
                                    ->options(Block::getStatuses())
                                    ->native(false)
                                    ->default(1)
                            ])
                        )
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
                Tables\Columns\ImageColumn::make('image_id')
                    ->label(__("Image"))
                    ->toggleable()
                    ->getStateUsing(function ($record){
                        if ($record->image) {
                            return config('app.url') . $record->image->thumbnail_url;
                        }
                        return asset('/storage/' . "panel-assets/no-image.png") ;
                    })
                    ->default(asset('/storage/' . "panel-assets/no-image.png"))
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->toggleable()
                    ->searchable()
                    ->label(__("Title")),
                Tables\Columns\TextColumn::make('status')
                    ->toggleable()
                    ->label(__("Status"))
                    ->badge()
                    ->color(function (TeamMember\TeamMember $record){
                        return $record->status == Utilities::PUBLISHED ? "success" : "danger";
                    })
                    ->formatStateUsing(function(TeamMember\TeamMember $record){
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
                    ->options(Block::getStatuses())
                    ->searchable()
                    ->native(false)

            ])
            ->actions([
                Tables\Actions\ReplicateAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->poll("30s")
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    ExportBulkAction::make('Export')->label(__('Export'))->exports([
//                        TestimonialExport::make()->fromModel()
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
