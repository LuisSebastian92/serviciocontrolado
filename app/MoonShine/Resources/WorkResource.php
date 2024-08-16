<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\File;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Work>
 */
class WorkResource extends ModelResource
{
    protected string $model = Work::class;

    protected string $title = 'Mis Trabajos';

    protected bool $createInModal = true;
    protected bool $editInModal = true;
    protected bool $detailsInModal = true;


    public function redirectAfterSave():string
    {
        $referer = Request::header('referer');
        return $referer ? : '/';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Nombre del Trabajador','name'),
                Number::make('Teléfono','phone'),
                Text::make('Trabajo','work'),
                Text::make('Detalles del Trabajo','details'),
                Select::make('Status', 'status')
                ->options([
                    'activo' => 'Activo',
                    'no_activo' => 'No Activo',
                ])
                ->sortable()
                ->searchable(),
                File::make('Adjuntar Curriculum Vitae','file'),
            ]),
        ];
    }

    /**
     * @param Work $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
