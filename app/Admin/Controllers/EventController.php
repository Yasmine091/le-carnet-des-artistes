<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Example controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('first_name', __('Prénom'))->sortable();
        $grid->column('last_name', __('Nom'))->sortable();
        $grid->column('email', __('Mail'));
        $grid->column('allow', __('Status du compte'));
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('first_name', __('Prénom'));
        $show->field('last_name', __('Nom'));
        $show->field('email', __('Mail'));
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
        $form = new Form(new User);

        $form->display('id', __('ID'));
        $form->text('first_name', __('Prénom'));
        $form->text('last_name', __('Nom'));
        $form->email('email', __('Mail'));
        $form->select('allow', __('Status du compte'))->options([1 => 'Activé', 0 => 'Désactivé']);
        $form->display('created_at', __('Crée à'));
        $form->display('updated_at', __('Mis à jour à'));

        return $form;
    }
}
