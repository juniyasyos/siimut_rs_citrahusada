<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\UnitKerja;
use Filament\Tables\Table;
use Filament\Resources\Resource;
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
use Filament\Forms\Components\{TextInput, Textarea, Repeater, Select, Grid};
use App\Filament\Resources\UnitKerjaResource\RelationManagers;

class UnitKerjaResource extends Resource
{
    protected static ?string $model = UnitKerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getGloballySearchableAttributes(): array
    {
        return ['unit_name', 'description'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Description' => $record->description,
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
        return array_merge([
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
        ]);
    }

    public static function getLabel(): ?string
    {
        return __('indikator-mutu::content.title');
    }

    public static function getPluralLabel(): ?string
    {
        return __('indikator-mutu::content.plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('indikator-mutu::content.navigation_group');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('unit_name')
                        ->label(__('indikator-mutu::content.fields.unit_name'))
                        ->required()
                        ->unique('unit_kerja', 'unit_name')
                        ->maxLength(255)
                        ->columnSpan(1),

                    Textarea::make('description')
                        ->label(__('indikator-mutu::content.fields.description'))
                        ->rows(3)
                        ->columnSpan(1),
                ]),

                // Repeater::make('users')
                //     ->label(__('Assign Users'))
                //     ->relationship('users')
                //     ->schema([
                //         Select::make('user_id')
                //             ->label(__('User'))
                //             ->relationship('users', 'name')
                //             ->searchable()
                //             ->preload()
                //             ->required(),
                //     ])
                //     ->addActionLabel(__('Tambah User'))
                //     ->columns(2)
                //     ->collapsed(),
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
        return [];
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
