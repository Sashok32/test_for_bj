<?php


namespace widgets;

/**
 * @param array $attributes like ['attribute' => 'label',]
 *
 * example ['name' => 'Имя пользователя', ...,]
 */
class Sort
{

    private $attributes;
    private $sorting;

    public function __construct(array $attributes = []) {
        $this->attributes = $attributes;
        $this->sorting = $_GET['sort'] ?? '';
    }

    public function sortBy(){
        return $this->sorting;
    }

    public function viewSort(){
        $page = isset($_GET['page']) ? 'page='.$_GET['page'].'&' : '';

               $view = "<div class='btn-group btn-group-md' role='group'>";

               foreach ($this->attributes as $attr => $label) {
                    $sort = (!empty($this->sorting) && $this->sorting == $attr) ? '-'.$attr : $attr;

                    $view .= "<button class='btn btn-secondary' type='button'>
                                <a class='page-link' href='?{$page}sort={$sort}'>{$label}</a>
                            </button>";
               }
                $view .= "</div>";

        return $view;
    }

}
