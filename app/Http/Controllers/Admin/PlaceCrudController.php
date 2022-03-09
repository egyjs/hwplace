<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PlaceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PlaceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PlaceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Place::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/place');
        CRUD::setEntityNameStrings('place', 'places');
        $this->crud->setOperationSetting('setFromDb', false);
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('city_id');
        CRUD::column('section_id');
        CRUD::column('description');
        CRUD::column('image')->type('image');
        CRUD::addColumn([
            'name' => 'images',
            'type' => 'upload_multiple',
//            'prefix' =>'storage/'
        ]);
        CRUD::column('google_map_location');
        CRUD::column('website');
        CRUD::column('rates');
        CRUD::column('is_top');
        CRUD::column('keywords');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PlaceRequest::class);

//        CRUD::field('id');

        CRUD::field('name');
        CRUD::addField([
            'name' => 'description',
            'type' => 'tinymce'
        ]);

        CRUD::addField([   // Upload
            'name'      => 'image',
            'type'      => 'upload_ajax',
        ]);

        CRUD::addField([   // Upload
            'name'      => 'images',
            'upload'    => true,
            'prefix'    => 'uploads',
            'type'      => 'upload_multiple_ajax',
        ]);
        CRUD::field('google_map_location');
        CRUD::addField([
            'name' => 'website',
            'type' => 'url'
        ]);
        CRUD::field('rates')->type('number')->attributes(['max'=>5]);
//        CRUD::field('keywords');
        $this->crud->addField([
            'name'=>'keywords',
            'type'=>'tags',
        ]);
        CRUD::field('is_top');
        CRUD::field('city_id');
        CRUD::field('section_id');
        CRUD::addField([
            'name'=>'is_active',
            'type' => 'checkbox',
            'value'=> true
        ]);
//        CRUD::field('created_at');
//        CRUD::field('updated_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
