<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lieux et dates';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('place', __('Lieu'))->sortable();
        $grid->column('date', __('Date'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Crée à'));
        $grid->column('updated_at', __('Mis à jour à'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('place', __('Lieu'))->sortable();
        $show->field('date', __('Date'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Crée à'));
        $show->field('allow', __('Status du compte'));
        $show->field('updated_at', __('Mis à jour à'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event);

        $form->display('id', __('ID'));
        $form->text('place', __('Lieu'));
        $form->date('date', __('Date'))->format('L');
        $form->select('status', __('Status'))->options([1 => 'Réalisé', 0 => 'À venir']);
        $form->display('created_at', __('Crée à'));
        $form->display('updated_at', __('Mis à jour à'));

        return $form;
    }
}
