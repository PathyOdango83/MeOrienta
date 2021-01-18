<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class vagacontroller extends Controller
{
     public function lista(){
		return DB::select('select * from evento');
	}
 
	// Cadastrando pessoas
	public function novo(Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::insert('insert into evento (nomeEvento, tipoEvento,discricao) values (?, ?)', [$data['nomeEvento'], $data['tipoEvento'],$data['discricao']]); // Insert
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Editando pessoas
	public function editar($id, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::update("update evento set nomeEvento = ?, tipoEvento = ?, discricao=?,  WHERE id = ?",[$data['nomeEvento'], $data['tipoEvento'],$data['discricao'], $idEvento]); //Update
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Excluindo pessoas
	public function excluir($idEvento){
		$res = DB::delete("delete from evento WHERE id = ?", [$idEvento]); //Excluir
 
		return ["status" => ($res)?'ok':'erro'];
}

}
