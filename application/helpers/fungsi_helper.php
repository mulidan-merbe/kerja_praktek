<?php

function check_already_loginm()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('Login');
	if($user_session){
		redirect('mahasiswa/beranda');
	}
}

function check_already_logind()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('Login');
	if($user_session){
		redirect('dosen/beranda');
	}
}

function check_already_logina()
{
	$ci =& get_instance();
	$user_session = $ci->session->userdata('Login');
	if($user_session){
		redirect('admin/beranda');
	}
}