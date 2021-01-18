<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class empresacontroller extends Controller
{


       public function lista(){
		return DB::select('select * from empresa');
	}
        
    
 
	// Cadastrando empresas
	public function novo(Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
        $res = DB::insert('insert into empresa (nameResponsable,email ,adress,cpfCnpj,businessType,phone,webSite) values (?, ?)'[[$data['nameResposable'],$data['email'],$data['adress'],$data['cpfCnpj'],$data['businessType'], $data['phone'],$data['webSite']]] ); // Insert
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Editando pessoas
	public function editar($id, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::update("update empresa set nameResponsable  = ?,email  = ?,adress  = ?,cpfCnpj  =  ?,businessType  = ?,phone  = ?, webSite  =  ?  WHERE  id = ?" [[$data['nameResposable'],$data['email'],$data['adress'],$data['cpfCnpj'],$data['businessType'], $data['phone'],$data['webSite'], $id ]]); //Update
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Excluindo pessoas
	public function excluir($cpf){
		$res = DB::delete("delete from empresa WHERE id = ?", [$id]); //Excluir
 
		return ["status" => ($res)?'ok':'erro'];
}

}


