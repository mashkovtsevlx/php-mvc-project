<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{
		if(isset($_GET['id']))
		{
			$page = $this->model->get_page($_GET['id'], $_GET['order']);
		}
		else
		{
			$page = $this->model->get_page();
		}
		$this->view->generate('view_main.php', 'view_template.php', $page);
	}
	function action_new()
	{
		$this->model->new_card($_POST['name'], $_POST['email'], $_POST['text']);
	}

	function action_login()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			if($login=="admin" && $password=="123")
			{
				session_start(); echo $_SESSION['admin'];
				$_SESSION['admin'] = $password;
			}
		}
		header('Location:/');
	}

	function action_logout()
	{
		session_start();
		session_destroy();
		header('Location:/');
	}

	function action_update_text()
	{
		$this->model->update_card_text($_POST['cardtext'], $_POST['cardid']);
	}

	function action_update_status()
	{
		$this->model->update_card_status($_POST['status'], $_POST['cardid']);
	}
}
