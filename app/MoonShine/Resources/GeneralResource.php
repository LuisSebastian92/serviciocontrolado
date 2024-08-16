<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\General;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

/**
 * @extends ModelResource<General>
 */
class GeneralResource extends ModelResource
{
    protected string $model = General::class;

    protected string $title = 'Busca Servicios';

    protected bool $createInModal = false;
    protected bool $editInModal = false;
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
                BelongsTo::make('Nombre' , 'services','name'),
                BelongsTo::make('Precio' , 'services','price'),
                BelongsTo::make('Descripcion' , 'services','description'),
                BelongsTo::make('Imagen' , 'services','image')
            ]),
        ];
    }

    /**
     * @param General $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
