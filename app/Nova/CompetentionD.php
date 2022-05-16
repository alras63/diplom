<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use App\CompetentionsBlock;


class CompetentionD extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\CompetentionD::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name', 'description', 'area', 'image_url', 'created_at', 'updated_at'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Competention Ds');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Competention D');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
                                                ID::make( __('Id'),  'id')
->rules('required')
->sortable()
,
                                                                Text::make( __('Name'),  'name')
->rules('required')
->sortable()
,
                                                                Text::make( __('Description'),  'description')
->sortable()
,
                                                                Text::make( __('Area'),  'area')
->sortable()
,
                                                                Image::make( __('Image Url'),  'image_url')
->sortable()
,
HasMany::make('CompetentionTest'),
BelongsTo::make('CompetentionsBlock', 'competentionsblock', 'App\Nova\CompetentionsBlock')
    ->rules('required')
->sortable()
// Select::make('CompetentionsBlock', 'competentions_block')
// ->options(CompetentionsBlock::all()->pluck('name', 'id'))
//         ->placeholder('Выберите блок компетенций')
        
                                                                                            ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
