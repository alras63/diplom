<?php
//
//namespace App\Nova;
//
//use Illuminate\Http\Request;
//use Laravel\Nova\Fields\ID;
//use Laravel\Nova\Fields\Text;
//use Laravel\Nova\Fields\Image;
//use Laravel\Nova\Fields\HasOne;
//
//
//class CompetentionQuestion extends Resource
//{
//    /**
//     * The model the resource corresponds to.
//     *
//     * @var  string
//     */
//    public static $model = \App\CompetentionQuestion::class;
//
//    /**
//     * The single value that should be used to represent the resource when being displayed.
//     *
//     * @var  string
//     */
//    public static $title = 'title';
//
//    /**
//     * The columns that should be searched.
//     *
//     * @var  array
//     */
//    public static $search = [
//        'id', 'title', 'description', 'image_url', 'competention_test_id', 'answers_var'
//    ];
//
//    /**
//     * Get the displayable label of the resource.
//     *
//     * @return  string
//     */
//    public static function label()
//    {
//        return __('Competention Questions');
//    }
//
//    /**
//    * Get the displayable singular label of the resource.
//    *
//    * @return  string
//    */
//    public static function singularLabel()
//    {
//        return __('Competention Question');
//    }
//
//    /**
//     * Get the fields displayed by the resource.
//     *
//     * @param    \Illuminate\Http\Request  $request
//     * @return  array
//     */
//    public function fields(Request $request)
//    {
//        return [
//                                                ID::make( __('Id'),  'id')
//->rules('required')
//->sortable()
//,
//                                                                Text::make( __('Title'),  'title')
//->rules('required')
//->sortable()
//,
//                                                                Text::make( __('Description'),  'description')
//->sortable()
//,
//                                                                Image::make( __('Image Url'),  'image_url')
//->sortable()
//,
//                                                                HasOne::make('CompetentionTest')
//
//->rules('required')
//->sortable()
//,
//                                                                Text::make( __('Answers Var'),  'answers_var')
//->sortable()
//,
//                                    ];
//    }
//
//    /**
//     * Get the cards available for the request.
//     *
//     * @param    \Illuminate\Http\Request  $request
//     * @return  array
//     */
//    public function cards(Request $request)
//    {
//        return [];
//    }
//
//    /**
//     * Get the filters available for the resource.
//     *
//     * @param    \Illuminate\Http\Request  $request
//     * @return  array
//     */
//    public function filters(Request $request)
//    {
//        return [];
//    }
//
//    /**
//     * Get the lenses available for the resource.
//     *
//     * @param    \Illuminate\Http\Request  $request
//     * @return  array
//     */
//    public function lenses(Request $request)
//    {
//        return [];
//    }
//
//    /**
//     * Get the actions available for the resource.
//     *
//     * @param    \Illuminate\Http\Request  $request
//     * @return  array
//     */
//    public function actions(Request $request)
//    {
//        return [];
//    }
//}
