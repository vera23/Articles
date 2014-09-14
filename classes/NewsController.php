<?php

class NewsController extends AbstractController
{
	protected function AdminAction() {
	    $view = new View;
		$view->display('admin.php');
	}
	
	protected function AllAction(){
		try {
            $allNews = ArticleModel::findAll();
        }
        catch(Exception $e) {
              echo "Исключение: " . $e->getMessage();
            die;
        }
		$view = new View;
	    $view->items = $allNews;
		$view->display('all.php');
	}
	
	protected function OneAction($id){
	    try {
            $oneNews = ArticleModel::findByPk($id);
        }
        catch(Exception $e) {
            echo "Исключение: " . $e->getMessage();
            die;
        }
	    $view = new View;
	    $view->items = $oneNews;
	    $view->display('one.php');
	}

	protected function DeleteAction($id){
	    try {
            $delete = ArticleModel::findByPk($id);
        }
        catch(Exception $e) {
            echo "Исключение: " . $e->getMessage();
            die;
        }
        try {
            $deleteArt = $delete->delete();
        }
        catch(Exception $e) {
            echo "Исключение: " . $e->getMessage();
            die;
        }
	    $view = new View;
		$view->items = $deleteArt;
	    $view->display("delete.php");
	}

    protected function AddOneAction() {
        $view = new View;
        $view->display("admin.php");
    }

    protected function AddAction(){
		$article = new ArticleModel;
		$article->title = $_POST['title'];
		$article->content = $_POST['content'];
		$article->save();
	    $view = new View;
	    $view->display('add.php');
    }

    protected function EditOneAction($id){
        $editArt = ArticleModel::findByPk($id);
        $view = new View;
        $view->items = $editArt;
        $view->display('edit.php');
        }

    protected function EditAction($id) {
        try {
            $editArt = ArticleModel::findByPk($id);
        }
        catch(Exception $e) {
            echo "Исключение: " . $e->getMessage();
            die;
        }
        $editArt->title = $_POST['title'];
        $editArt->content = $_POST['content'];
        $editArt->id = $_POST['id'];
        $editArt->save();
        $view = new View;
        $view->display('change.php');
    }
}


	
