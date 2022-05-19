<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\JogosModel;
use App\Models\ProdutosModel;
use App\Models\CategoriasModel;
use App\Models\ComprasModel;

class Home extends BaseController
{
	
	public function index()
	{   
		return $this->selectProduto();
	}

	public function showInsertUser() 
	{
		$data['form_tipo'] = 'insert';

		echo view ('common/header');
		echo view ('user_form', $data);
		echo view ('common/footer');
	}

	public function insertUser() 
	{
		
		$rules = [
			'email' => 'required|min_length[6]|max_length[256]|valid_email|is_unique[usuario.email]',
			'nome' => 'required|min_length[3]|max_length[256]'
		];

		$users_model = new UsersModel();

		if ($this->validate($rules)){
			$data = array(
				
				'email' => $this->request->getVar('email'),

				'nome' => $this->request->getVar('nome')

			);

			$users_model->insertUsuario($data);
			return $this->selectUser();
			
		} else {
			$this->showInsertUser();	
					
		}

	}

	public function selectUser() 
	{
		$users_model = new UsersModel();
		$result = $users_model->getUsuario();
		$data['usuarios'] = $result;

		echo view ('common/header');
		echo view ('user_lista', $data);
		echo view ('common/footer');
	}

	public function showEditUser($id) 
	{

		$users_model = new UsersModel();
		$result = $users_model->getUsuario($id);
		$data['usuarios'] = $result;

		$data['form_tipo'] = 'update';

		echo view ('common/header');
		echo view ('user_form', $data);
		echo view ('common/footer');
	}

	public function editUser($id) 
	{

		$rules = [
			'email' => 'required|min_length[6]|max_length[256]|valid_email',
			'nome' => 'required|min_length[3]|max_length[256]'
		];

		$users_model = new UsersModel();

		if ($this->validate($rules)){
			$data = array(

				'email' => $this->request->getVar('email'),

				'nome' => $this->request->getVar('nome')


			);
			

			$users_model->updateUsuario($id, $data);
			return redirect()->to(base_url('select_user'));
			
		} else {
			$this->showEditUser($id);	
					
		}
		
	}
	
	public function deleteUser($id) 
	{

		if ($id === null){
			return $this->selectUser();
		}

		$users_model = new UsersModel();

		$result = $users_model->getUsuario($id);

		if ($result !== null){
			$users_model->removeUsuario($result['id']);		
			return $this->selectUser();
			
		}else{
			return $this->selectUser();
		}
		
	}

	public function comprasUser($id) 
	{

		$compras_model = new ComprasModel();
		$result = $compras_model->getComprasByUser($id);
		$data['compras'] = $result;

		$produtos_model = new ProdutosModel();
		$result = $produtos_model->getProduto();
		$data['produtos'] = $result;

		$users_model = new UsersModel();
		$result = $users_model->getUsuario($id);
		$data['usuarios'] = $result;

		echo view ('common/header');
		echo view ('total_compras', $data);
		echo view ('common/footer');
		
	}

	public function showInsertProduto() 
	{
		$data['form_tipo'] = 'insert';

		$categorias_model = new CategoriasModel();
		$result = $categorias_model->getCategoria();
		$data['categorias'] = $result;

		echo view ('common/header');
		echo view ('produto_form', $data);
		echo view ('common/footer');
	}

	public function insertProduto() 
	{
		$tipo = $this->request->getVar('tipo');

		if ($tipo == 'outro') {

			$rules = [
				'nome' => 'required|min_length[3]|max_length[256]',
				'tipo' => 'required',
				'quantidade' => 'required|max_length[11]|numeric|greater_than_equal_to[0]',
				'preco' => 'required|decimal|greater_than_equal_to[0]'
			];
	
			$produtos_model = new ProdutosModel();
	
			if ($this->validate($rules)){
				$data = array(
					
					'nome' => $this->request->getVar('nome'),

					'tipo' => $this->request->getVar('tipo'),

					'categoria' => $this->request->getVar('categoria'),

					'console' => $this->request->getVar('console'),
	
					'quantidade' => $this->request->getVar('quantidade'),

					'preco' => $this->request->getVar('preco')
	
				);
	
				$produtos_model->insertProduto($data);
				return redirect()->to('/');
				
			} else {
				$this->showInsertProduto();	
						
			}

		} else if ($tipo == 'jogo') {

			$rules = [
				'nome' => 'required|min_length[3]|max_length[256]',
				'tipo' => 'required',
				'categoria' => 'required',
				'console' => 'required|min_length[3]|max_length[256]',
				'quantidade' => 'required|max_length[11]|numeric|greater_than_equal_to[0]',
				'preco' => 'required|decimal|greater_than_equal_to[0]'
			];
	
			$produtos_model = new ProdutosModel();
	
			if ($this->validate($rules)){
				$data = array(
					
					'nome' => $this->request->getVar('nome'),

					'tipo' => $this->request->getVar('tipo'),
	
					'categoria' => $this->request->getVar('categoria'),

					'console' => $this->request->getVar('console'),

					'quantidade' => $this->request->getVar('quantidade'),

					'preco' => $this->request->getVar('preco')
	
				);
	
				$produtos_model->insertProduto($data);
				return redirect()->to('/');
				
			} else {
				$this->showInsertProduto();	
						
			}

		}
	}

	public function selectProduto() 
	{
		$produtos_model = new ProdutosModel();
		$result = $produtos_model->getProduto();
		$data['produtos'] = $result;

		echo view ('common/header');
		echo view ('produto_lista', $data);
		echo view ('common/footer');
		
	}

	public function showEditProduto($id) 
	{
		$produtos_model = new ProdutosModel();
		$result = $produtos_model->getProduto($id);
		$data['produtos'] = $result;

		$categorias_model = new CategoriasModel();
		$result = $categorias_model->getCategoria();
		$data['categorias'] = $result;

		$data['form_tipo'] = 'update';

		echo view ('common/header');
		echo view ('produto_form', $data);
		echo view ('common/footer');
	}

	public function editProduto($id) 
	{
		$tipo = $this->request->getVar('tipo');

		if ($tipo == 'outro') {

			$rules = [
				'nome' => 'required|min_length[3]|max_length[256]',
				'quantidade' => 'required|max_length[11]|numeric|greater_than_equal_to[0]',
				'preco' => 'required|decimal|greater_than_equal_to[0]'
			];

			$produtos_model = new ProdutosModel();

			if ($this->validate($rules)){
				$data = array(

					'nome' => $this->request->getVar('nome'),
	
					'quantidade' => $this->request->getVar('quantidade'),

					'preco' => $this->request->getVar('preco')

				);
				

				$produtos_model->updateProduto($id, $data);
				return redirect()->to(base_url('/'));
				
			} else {
				$this->showEditProduto($id);	
						
			}

		} else if ($tipo == 'jogo') {

			$rules = [
				'nome' => 'required|min_length[3]|max_length[256]',
				'categoria' => 'required',
				'console' => 'required|min_length[3]|max_length[256]',
				'quantidade' => 'required|max_length[11]|numeric|greater_than_equal_to[0]',
				'preco' => 'required|decimal|greater_than_equal_to[0]'
			];

			$produtos_model = new ProdutosModel();

			if ($this->validate($rules)){
				$data = array(

					'nome' => $this->request->getVar('nome'),
	
					'categoria' => $this->request->getVar('categoria'),

					'console' => $this->request->getVar('console'),

					'quantidade' => $this->request->getVar('quantidade'),

					'preco' => $this->request->getVar('preco')

				);
				

				$produtos_model->updateProduto($id, $data);
				return redirect()->to(base_url('/'));
				
			} else {
				$this->showEditProduto($id);	
						
			}

		}
	}
	
	public function deleteProduto($id) 
	{

		if ($id === null){
			return redirect()->to(base_url('/'));
		}

		$produtos_model = new ProdutosModel();

		$result = $produtos_model->getProduto($id);

		if ($result !== null){
			$produtos_model->removeProduto($result['id']);		
			return redirect()->to(base_url('/'));
			
		}else{
			return redirect()->to(base_url('/'));
		}
		
	}

	public function showProduto($id) 
	{
		$produtos_model = new ProdutosModel();
		$result = $produtos_model->getProduto($id);
		$data['produtos'] = $result;

		$users_model = new UsersModel();
		$result = $users_model->getUsuario();
		$data['usuarios'] = $result;

		if ($data['produtos']['tipo'] == 'jogo') {
			$categoria_id = $data['produtos']['categoria'];

			$categorias_model = new CategoriasModel();
			$result = $categorias_model->getCategoria($categoria_id);
			$data['categorias'] = $result;

			echo view ('common/header');
			echo view ('produto_pag', $data);
			echo view ('common/footer');
		} else if ($data['produtos']['tipo'] == 'outro') {
			echo view ('common/header');
			echo view ('produto_pag', $data);
			echo view ('common/footer');
		}
		
	}

	public function comprarProduto($id) 
	{

		if ($id === null){
			return $this->showProduto($id);
		}

		$data['usuario'] = $this->request->getVar('usuario');
		$data['produto'] = $id;

		$compras_model = new ComprasModel();
		$compras_model->insertCompra($data);		
		return redirect()->to(base_url('/'));
		
	}

	public function showInsertCategoria() 
	{
		$data['form_tipo'] = 'insert';

		echo view ('common/header');
		echo view ('categoria_form', $data);
		echo view ('common/footer');
	}

	public function insertCategoria() 
	{
		$rules = [
			'nome' => 'required|min_length[3]|max_length[256]'
		];

		$categorias_model = new CategoriasModel();

		if ($this->validate($rules)){
			$data = array(
				
				'nome' => $this->request->getVar('nome')

			);

			$categorias_model->insertCategoria($data);
			return $this->selectUser();
			
		} else {
			$this->showInsertCategoria();	
					
		}
	}

	public function selectCategoria() 
	{
		$categorias_model = new CategoriasModel();
		$result = $categorias_model->getCategoria();
		$data['categorias'] = $result;

		echo view ('common/header');
		echo view ('categoria_lista', $data);
		echo view ('common/footer');
	}

	public function showEditCategoria($id) 
	{
		$categorias_model = new CategoriasModel();
		$result = $categorias_model->getCategoria($id);
		$data['categorias'] = $result;

		$data['form_tipo'] = 'update';

		echo view ('common/header');
		echo view ('categoria_form', $data);
		echo view ('common/footer');
	}

	public function editCategoria($id) 
	{
		$rules = [
			'nome' => 'required|min_length[3]|max_length[256]'
		];

		$categorias_model = new CategoriasModel();

		if ($this->validate($rules)){
			$data = array(

				'nome' => $this->request->getVar('nome')


			);
			

			$categorias_model->updateCategoria($id, $data);
			return $this->selectCategoria();
			
		} else {
			$this->showEditCategoria($id);	
					
		}
		
	}
	
	public function deleteCategoria($id) 
	{

		if ($id === null){
			return $this->selectCategoria();
		}

		$categorias_model = new CategoriasModel();

		$result = $categorias_model->getCategoria($id);

		if ($result !=NULL){
			$categorias_model->removeCategoria($result['id']);		
			return $this->selectCategoria();
			
		}else{
			return $this->selectCategoria();
		}
		
	}

}
