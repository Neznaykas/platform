<?php

declare(strict_types=1);

namespace Orchid\Platform\Layouts;

abstract class Table
{
    /**
     * @var string
     */
    public $template = 'dashboard::container.layouts.table';

    /**
     * @var string
     */
    public $data;

    /**
     * @param $query
     *
     * @return array
     * @throws \Throwable
     */
    public function build($query)
    {
        $form = $this->generatedTable($query);
        return view($this->template, [
            'form'    => $form,
        ])->render();
    }

    /**
     * @param $post
     *
     * @return array
     */
    private function generatedTable($post) : array
    {
        return [
            'data'   => $post->getContent($this->data),
            'fields' => $this->fields(),
        ];
    }

    /**
     * @return array
     */
    public function fields() : array
    {
        return [];
    }
}
