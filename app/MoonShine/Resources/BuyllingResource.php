<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buylling;
use Illuminate\Support\Facades\Request;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\image;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Buylling>
 */
class BuyllingResource extends ModelResource
{
    protected string $model = Buylling::class;

    protected string $title = 'Compras';

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
                Text::make('Nombre del Producto', 'name')->required(),
                Number::make('Precio','price')->required(),
                Text::make('Descripción','description')->required(),
                Image::make('Imagen','image')
            ]),
        ];
    }

    /**
     * @param Buylling $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
