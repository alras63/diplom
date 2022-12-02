<?php

namespace App\Nova;

use App\Nova\Polya;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use OptimistDigital\MultiselectField\Multiselect;

class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Course::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'title', 'description', 'cost'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Courses');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return __('Course');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('Id'), 'id')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Title'), 'title')
                ->sortable()
            ,
//                                                                 HasOne::make('Teacher')

// ->sortable()
// ,
            Text::make(__('Description'), 'description')->displayUsing(function ($name) {
                return \Str::limit($name, 55);
            })
                ->sortable()
            ,
            Text::make(__('Dates'), 'dates')
                ->sortable()
            ,
            Text::make(__('Cost'), 'cost')
                ->sortable()
            ,

            File::make(__('Url'), 'url')
                ->disk('public')
                ->sortable()
            ,
            Number::make(__('Sort'), 'sort')
                ->sortable()
            ,
//                                                                 HasOne::make('ActivityNew')

// ->sortable()
// ,
            Number::make(__('Click Registration'), 'click_registration')
                ->sortable()
            ,
            Number::make(__('For Type'), 'for_type')
                ->sortable()
            ,
            Number::make(__('Closed'), 'closed')
                ->sortable()
            ,
            HasMany::make('Modules')
                ->sortable()
            ,
            HasMany::make('RequestR')
                ->sortable()
            ,
            Text::make(__('Oborud'), 'oborud')
                ->sortable()
            ,
            Text::make(__('Time'), 'time')
                ->sortable()
            ,
            Text::make(__('Docs'), 'docs')
                ->sortable()
            ,
            Multiselect::make('Polya', 'polya')
                ->asyncResource(Polya::class)
                ->placeholder('Выберите поля для регистрации'),

            Multiselect::make('blocks', 'blocks')
                ->asyncResource(CompetentionsBlock::class)
                ->placeholder('Выберите блок(-и)')

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
