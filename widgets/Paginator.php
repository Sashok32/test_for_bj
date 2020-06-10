<?php


namespace widgets;

class Paginator
{

    private $page;
    private $perPage;
    private $countPages;

    public function __construct($modelCount, $perPage = 3) {
        $count = ceil($modelCount/$perPage);
        if ($_GET['page'] <= 1 ) {
            $page = 1;
        } elseif ($_GET['page'] >= $count) {
            $page = $count;
        } else {
            $page = floor($_GET['page']);
        }
        $this->page = $page;
        $this->perPage = $perPage;
        $this->countPages = $count;
    }

    public function limit(){
        return $this->perPage;
    }

    public function offset(){
        return ($this->page - 1) * $this->perPage;
    }

    public function viewPages(){
        $sort = isset($_GET['sort']) ? 'sort='.$_GET['sort'].'&' : '';

               $view = "<nav class='pagination-lg'>
                    <ul class='pagination justify-content-center'>";

               for ($page = 1; $page <= $this->countPages; $page++) {

                    $view .= "<li class='page-item'>
                                <a class='page-link' href='?{$sort}page={$page}'>{$page}</a>
                            </li>";
               }
                $view .= "</ul>
                </nav>";

        return $view;
    }

}
