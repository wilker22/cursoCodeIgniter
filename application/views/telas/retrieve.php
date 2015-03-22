<?php 
echo '<h2>Lista de Usuários</h2>';
if($this->session->flashdata('excluirok')):
	echo '<p>'.$this->session->flashdata('excluirok').'</p>';
endif;

$this->table->set_heading('ID','Nome','Email','Login', 'Operações');
foreach($pessoa as $linha):
	$this->table->add_row($linha->id, $linha->nome, $linha->email, $linha->login, anchor("crud/update/$linha->id", 'Editar').'-
		'.anchor("crud/delete/$linha->id", 'Excluir'));

endforeach;

echo $this->table->generate();