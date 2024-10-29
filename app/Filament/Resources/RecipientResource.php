<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipientResource\Pages;
use App\Models\Recipient;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class RecipientResource extends Resource
{
    protected static ?string $model = Recipient::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nik')
                    ->required()
                    ->maxLength(16)
                    ->unique(ignoreRecord: true),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->maxLength(15),
                DatePicker::make('birth_date'),
                Select::make('gender')
                    ->required()
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
                TextInput::make('marital_status')
                    ->required(),
                TextInput::make('income_level')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('nik')->sortable()->searchable(),
                TextColumn::make('address')->sortable()->searchable(),
                TextColumn::make('phone_number')->sortable()->searchable(),
                TextColumn::make('birth_date')->sortable()->searchable(),
                TextColumn::make('gender')->sortable()->searchable(),
                TextColumn::make('marital_status')->sortable()->searchable(),
                TextColumn::make('income_level')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relation managers here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipients::route('/'),
            'create' => Pages\CreateRecipient::route('/create'),
            'edit' => Pages\EditRecipient::route('/{record}/edit'),
        ];
    }
}
