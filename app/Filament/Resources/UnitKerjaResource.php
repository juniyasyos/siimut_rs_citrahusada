<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\UnitKerja;
use Filament\Tables\Table;
use App\Models\UserUnitKerja;
use Filament\Resources\Resource;
use Awcodes\TableRepeater\Header;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use App\Filament\Resources\UnitKerjaResource\Pages;
use Awcodes\TableRepeater\Components\TableRepeater;
use Filament\Forms\Components\{TextInput, Textarea, Select, Grid};
use App\Filament\Resources\UnitKerjaResource\RelationManagers\UsersRelationManager;

class UnitKerjaResource extends Resource
{
    protected static ?string $model = UnitKerja::class;

    protected static ?string $slug = 'work-units';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getGloballySearchableAttributes(): array
    {
        return ['unit_name', 'description'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            __('indikator-mutu::content.fields.description') => $record->description,
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->unit_name;
    }

    public static function getGlobalSearchResultUrl(Model $record): ?string
    {
        return route('filament.admin.resources.unit-kerja.edit', $record);
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any'
        ];
    }

    public static function getLabel(): ?string
    {
        return __('indikator-mutu::content.navigation.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('indikator-mutu::content.navigation.plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('indikator-mutu::content.navigation.group');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('indikator-mutu::content.form.unit.title'))
                    ->description(__('indikator-mutu::content.form.unit.description'))
                    ->schema([
                        Card::make()->schema([
                            Grid::make(2)->schema([
                                TextInput::make('unit_name')
                                    ->label(__('indikator-mutu::content.fields.unit_name'))
                                    ->placeholder(__('indikator-mutu::content.form.unit.name_placeholder'))
                                    ->helperText(__('indikator-mutu::content.form.unit.helper_text'))
                                    ->required()
                                    ->unique('unit_kerja', 'unit_name', ignoreRecord: true)
                                    ->maxLength(255)
                            ]),

                            Textarea::make('description')
                                ->label(__('indikator-mutu::content.fields.description'))
                                ->placeholder(__('indikator-mutu::content.form.unit.description_placeholder'))
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),
                    ]),

                // Section::make(__('indikator-mutu::content.form.users.title'))
                //     ->description(__('indikator-mutu::content.form.users.description'))
                //     ->schema(components: [
                //         Card::make()->schema([
                //             Repeater::make('user_unit_kerja')
                //                 // ->headers([
                //                 //     Header::make('name')->label(__('indikator-mutu::content.fields.users')),
                //                 // ])
                //                 // ->renderHeader(false)
                //                 ->schema([
                //                     Select::make('user_id')
                //                         // ->label(__('indikator-mutu::content.fields.user_id'))
                //                         // ->placeholder(__('indikator-mutu::content.form.users.search_placeholder'))
                //                         ->options(
                //                             User::with('position')->get()
                //                                 ->mapWithKeys(fn($user) => [$user->id => "{$user->name} - " . ($user->position->name ?? __('indikator-mutu::content.fields.position'))])
                //                                 ->toArray()
                //                         )
                //                         ->searchable()
                //                         ->preload()
                //                         ->required(),
                //                 ])
                //                 ->addActionLabel(__('indikator-mutu::content.form.users.add_button'))
                //                 ->columns(3)
                //                 ->collapsed(),
                //         ]),
                //     ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit_name')
                    ->label(__('indikator-mutu::content.fields.unit_name'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label(__('indikator-mutu::content.fields.description'))
                    ->limit(50),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make()->slideOver(),
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make()->visible(fn(Model $record) => method_exists($record, 'trashed') && $record->trashed()),
                ForceDeleteAction::make()->visible(fn(Model $record) => method_exists($record, 'trashed') && $record->trashed()),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUnitKerjas::route('/'),
            'create' => Pages\CreateUnitKerja::route('/create'),
            'edit' => Pages\EditUnitKerja::route('/{record}/edit'),
        ];
    }
}
