<?php

namespace App\Nova;

use App\Nova\Actions\CreateCoursePay;
use App\Nova\CoursePay;
use App\Nova\Actions\ExportRequests;
use App\Nova\Actions\AgreeRequests;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Pdmfc\NovaFields\ActionButton;

class PriemEventRequest extends Resource
{

    public static $perPageOptions = [10, 25, 50, 100];

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\PriemEventsRequests::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'Приемная коммиссия заявки на мероприятия';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'tg_user_id', 'priem_event_id'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Приемная коммиссия заявки на мероприятия');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return  string
     */
    public static function singularLabel()
    {
        return __('Приемная коммиссия заявки на мероприятия');
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
            BelongsTo::make('TgUser')

                ->rules('required')
                ->sortable()
            ,
            BelongsTo::make('TgEvent')

                ->rules('required')
                ->sortable()
            ,
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



}
