<?php

namespace App\Filament\Resources\UnitKerjaResource\RelationManagers;

use App\Models\User;
use App\Models\Position;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pengguna')
                    ->sortable(),

                TextColumn::make('position.name')
                    ->label('Jabatan')
                    ->sortable()
                    ->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('position_id')
                    ->label('Filter Jabatan')
                    ->relationship('position', 'name')
                    ->searchable()
                    ->preload()
                    ->indicator('Jabatan'),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label('Tambah Pengguna')
                    ->color('primary')
                    ->form(fn () => [
                        Select::make('recordId')
                            ->label('Pilih Pengguna')
                            ->options(fn () => User::with('position')->get()
                                ->mapWithKeys(fn ($user) => [
                                    $user->id => "{$user->name} - " . ($user->position->name ?? 'Tidak ada jabatan')
                                ])
                                ->toArray())
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->preloadRecordSelect()
                    ->recordSelectSearchColumns(['name']),
            ])
            ->actions([
                Tables\Actions\DetachAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi')
                    ->modalDescription('Yakin ingin menghapus pengguna dari unit kerja ini?'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
