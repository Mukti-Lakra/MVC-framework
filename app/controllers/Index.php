<?php
/**
 * 
 */
class Index extends DController{
  
  public function __construct(){
    parent::__construct();

  }

  public function home(){
    $this->load->view("home");
  }

  public function category(){
    $data = array();
    $table = "category";
    $catModel = $this->load->model("CatModel");
    $data['cat'] = $catModel->catList($table);
    $this->load->view("category", $data);
  }

  public function catById(){
    $data = array();
    $table = "category";
    $id =3;
    $catModel = $this->load->model("CatModel");
    $data['catbyid'] = $catModel->catById($table, $id);
    $this->load->view("catbyid", $data);
  }

  public function addtCategory(){
    $this->load->view("addcategory");
  }

  public function insertCategory(){
    $table = "category";

    $name  = $_POST['name'];
    $title = $_POST['title'];

    $data = array(
      'name'  => $name,
      'title' => $title
       );
   $catModel = $this->load->model("CatModel");
   $result = $catMode->insertCat($table, $data);

   $mdata = array();
   if ($result == 1) {
      $mdata['msg'] = "Category Added Successfully....";
   } else {
      $mdata['msg'] = "Category Not Added";
   }
   $this->load->view("addcategory", $mdata);
  }

}

?>