<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Models\Job;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;


class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),

            RichEditor::make('description')->required(),

            TextInput::make('location')->required(),

            TextInput::make('salary')->numeric(),

            Select::make('job_type')
                ->options([
                    'Full-time' => 'Full-time',
                    'Part-time' => 'Part-time',
                    'Contract' => 'Contract',
                ])
                ->required(),

            TextInput::make('education'),



            Select::make('experience_level')
                ->options([
                    'Entry Level' => 'Entry Level',
                    'Mid Level' => 'Mid Level',
                    'Senior Level' => 'Senior Level',
                    'Lead/Manager' => 'Lead/Manager',
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('location')->sortable(),
                TextColumn::make('job_type')->sortable(),
                TextColumn::make('experience_level')->sortable(),
                TextColumn::make('salary')->sortable(),
                TextColumn::make('created_at')->dateTime('M d, Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('job_type')
                    ->options([
                        'Full-time' => 'Full-time',
                        'Part-time' => 'Part-time',
                        'Contract' => 'Contract',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
