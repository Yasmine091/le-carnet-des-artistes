<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;

class SubjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sujets';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Subject);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('user_id', __('ID de l\'utilisateur'))->sortable();
        $grid->column('content', __('Sujet'))->sortable();
        $grid->column('status', __('Apparu'));
        $grid->column('allow', __('Status du sujet'));
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
        $show = new Show(Subject::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('user_id', __('ID de l\'utilisateur'));
        $show->field('content', __('Sujet'));
        $show->field('status', __('Apparu'));
        $show->field('allow', __('Status du sujet'));
        $show->field('created_at', __('Crée à'));
        $show->field('allow', __('Status du sujet'));
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
        $form = new Form(new Subject);

        $form->display('id', __('ID'));
        $form->text('user_id', __('ID de l\'utilisateur'));
        $form->text('content', __('Sujet'));
        $form->select('status', __('Apparu'))->options([1 => 'Oui', 0 => 'Non']);
        $form->select('allow', __('Status du sujet'))->options([1 => 'Approuvé', 0 => 'Refusé']);
        $form->display('created_at', __('Crée à'));
        $form->display('updated_at', __('Mis à jour à'));

        return $form;
    }
}
