<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Number;
use MoonShine\Fields\Image;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Service>
 */
class ServiceResource extends ModelResource
{
    protected string $model = Service::class;

    protected string $title = 'Servicios';
    
    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
 
    protected bool $detailInModal = true; 

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
                Text::make('Nombre del Servicio', 'name_service')->required(),
                Phone::make('Teléfono','phone')->required(),
                Text::make('Descripción','description')->required(),
                Number::make('Precio','price')->required(),
                Image::make('Imagen','image')
            ]),
        ];

    }

    /**
     * @param Service $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
