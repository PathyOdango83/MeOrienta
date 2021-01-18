<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class eventocontroller extends Controller
{
     public function lista(){
		return DB::select('select * from evento');
	}
        
    
 
	public function novo(Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
        $res = DB::insert('insert into evento (idEvento,nomeEvento,tipoEvento ,descricao) values (?, ?)'[[$data['iEvento'],$data['nomeEvento'],$data['tipoEvento'],$data['descricao']]]); // Insert
 
		return ["status" => ($res)?'ok':'erro'];
	}
 

	public function editar($idEvento, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::update("update evento set nomeEvento = ?,tipoEvento = ? ,descricao  =  ?  WHERE  id = ?" [[$data['iEvento'],$data['nomeEvento'],$data['tipoEvento'],$data['descricao'], $id ]]); //Update
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	public function excluir($idEvento){
		$res = DB::delete("delete from evento WHERE idEevento = ?", [$idEvento]); //Excluir
 
		return ["status" => ($res)?'ok':'erro'];
}
}
