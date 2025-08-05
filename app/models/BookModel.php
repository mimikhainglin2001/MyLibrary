<?php
require_once __DIR__ . '/BaseModel.php';
class BookModel extends BaseModel
{
    protected $title;
    protected $isbn;
    protected $category_id;
    protected $author_id;
    protected $total_quantity;
    protected $available_quantity;
    protected $status_id;
   protected $image;
}
?>
