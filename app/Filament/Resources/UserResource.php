<?php

namespace App\Filament\Resources;

use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Filament\Exports\UserExporter;
use App\Filament\Imports\UserImporter;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Group;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Filters\SelectFilter;
use Filament\Resources\Pages\CreateRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Infolists\Components\ImageEntry;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ViewUser;
use STS\FilamentImpersonate\Tables\Actions\Impersonate;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Infolists\Components\Section as InfolistSection;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;
use Rmsramos\Activitylog\RelationManagers\ActivitylogRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Email' => $record->email,
            'Role' => $record->roles->first()->name ?? 'No Role',
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultUrl(Model $record): ?string
    {
        return route('filament.admin.resources.users.edit', $record);
    }

    public static function getGlobalSearchResultImage(Model $record): ?string
    {
        return $record->profile_photo_url ?? null;
    }

    public static function getLabel(): ?string
    {
        return __('filament-navigation::navigation.resources.users');
    }

    public static function getPluralLabel(): ?string
    {
        return __('');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-navigation::navigation.group.user_access');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make('User Information')
                ->description('Isi data pengguna dengan lengkap. Pastikan email valid dan role dipilih dengan benar.')
                ->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->placeholder('Masukkan nama lengkap')
                        ->required(),
                    Grid::make(2)->schema([
                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->placeholder('contoh@email.com')
                            ->required()
                            ->unique('users', 'email', ignoreRecord: true),
                        TextInput::make('password')
                            ->password()
                            ->label('Password')
                            ->placeholder('Masukkan kata sandi')
                            ->dehydrateStateUsing(fn($state) => bcrypt($state))
                            ->required(fn($livewire) => $livewire instanceof CreateRecord),
                    ]),
                    Select::make('role')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->optionsLimit(10)
                        ->getOptionLabelFromRecordUsing(fn($record) => $record->name),
                ]),

            Card::make('Position & Access')
                ->description('Pilih posisi pengguna dalam organisasi. Anda juga bisa membuat posisi baru langsung dari sini.')
                ->schema([
                    Select::make('position_id')
                        ->label('Position')
                        ->relationship('position', 'name')
                        ->preload()
                        ->searchable()
                        ->placeholder('Pilih posisi')
                        ->createOptionForm(fn(Form $form) => $form->schema([
                            TextInput::make('name')->required()->label('Position Name')->placeholder('Nama posisi'),
                            TextInput::make('description')->label('Description')->placeholder('Deskripsi posisi'),
                        ])),
                    // Toggle::make('is_active')
                    //     ->label('Active Status')
                    //     ->default(true),
                ]),
        ]);
    }



    public static function canCreate(): bool
    {
        return true;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    ImageColumn::make('avatar_url')
                        ->searchable()
                        ->circular()
                        ->grow(false)
                        ->getStateUsing(fn($record) => $record->avatar_url ?: "https://ui-avatars.com/api/?name=" . urlencode($record->name)),
                    Stack::make([
                        TextColumn::make('name')
                            ->searchable()
                            ->weight(FontWeight::Bold),
                        TextColumn::make('position.name')
                            ->label('Position')
                            ->searchable()
                            ->sortable()
                            ->icon('heroicon-o-briefcase')
                            ->badge()
                            ->color(''),
                    ])->alignStart()->space(1),
                    Stack::make([
                        TextColumn::make('roles.name')
                            ->searchable()
                            ->icon('heroicon-o-shield-check')
                            ->grow(false),
                        TextColumn::make('email')
                            ->icon('heroicon-m-envelope')
                            ->searchable()
                            ->grow(false),
                    ])->alignStart()->visibleFrom('lg')->space(1)
                ]),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),
                SelectFilter::make('position')
                    ->relationship('position', 'name')
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                ActivityLogTimelineTableAction::make('Activities'),
                Action::make('Set Role')
                    ->icon('heroicon-m-adjustments-vertical')
                    ->form(form: [
                        Select::make('role')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->optionsLimit(10)
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->name),
                    ]),
                Impersonate::make()->label('Impersonate'),
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->button()->label('Actions'),
            ])
            // ->headerActions([
            //     ExportAction::make()
            //         ->exporter(UserExporter::class),
            //     ImportAction::make()
            //         ->importer(UserImporter::class)
            // ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
                    ->exporter(UserExporter::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ActivitylogRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            InfolistSection::make('User Profile')
                ->columns(3)
                ->schema([
                    ImageEntry::make('avatar_url')
                        ->label('')
                        ->circular()
                        ->size(120)
                        ->grow(false)
                        ->getStateUsing(fn($record) => $record->avatar_url ?: "https://ui-avatars.com/api/?name=" . urlencode($record->name))
                        ->columnSpan(1),

                    Group::make([
                        TextEntry::make('name')
                            ->label('Full Name')
                            ->weight(FontWeight::Bold),
                        TextEntry::make('email')
                            ->icon('heroicon-m-envelope')
                            ->copyable()
                            ->tooltip('Click to copy email'),
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime('d M Y')
                            ->icon('heroicon-m-calendar'),
                    ])->columnSpan(1),

                    Group::make([
                        TextEntry::make('position.name')
                            ->label('Position')
                            ->badge()
                            ->icon('heroicon-o-briefcase')
                            ->color('primary'),
                        TextEntry::make('roles.name')
                            ->label('Roles')
                            ->badge()
                            ->icon('heroicon-o-shield-check')
                            ->color('success')
                            ->separator(', '),
                    ])->columnSpan(1),
                ]),
        ]);
    }

    public static function getModelLable(): string
    {
        return __('User Management');
    }

    public static function getPluralModelLabl(): string
    {
        return __('User Managements');
    }

}
