<?php

$this->load->view('Includes/header');
$this->load->view('Includes/menu');

if($tela!='') $this->load->view('telas/'.$tela);
$this->load->view('Includes/footer');