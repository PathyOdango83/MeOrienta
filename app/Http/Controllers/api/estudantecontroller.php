<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class estudantecontroller extends Controller
{
       public function lista(){
		return DB::select('select * from estudante');
	}
 
	// Cadastrando pessoas
	public function novo(Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
        $res = DB::insert('insert into estudante (nome,email,yearOld,adress,cpf,deficiencia,bairro,cep,nomeCurso,estado,escolaridade,institucao,dataInicio,dataFim,formacao,statusFormacao,image) values (?, ?)' [[$data['idEst'], $data['name'],$data['email'],$data['yearOld'],$data['adress'],$data['cpf'],$data['deficiencia'], $data['bairro'],$data['cep'],$data['nomeCurso'],$data['estado'],$data['instuicao'],$data['dataInicio'],$data['dataFim'],$data['formacao'],$data['formacaoStatus'],$data['image']]]); // Insert
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Editando pessoas
	public function editar($cpf, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::update("update estudante set nome = ?,email = ?,yearOld =?,adress = ?,cpf = ?,deficiencia = ? ,bairro = ?,cep = ?,nomeCurso = ?,estado = ?,escolaridade = ? ,institucao = ?,dataInicio = ?,dataFim =?,formacao =?,statusFormacao = ?,image =?  WHERE cpf = ?" [[$data['idEst'], $data['name'],$data['email'],$data['yearOld'],$data['adress'],$data['cpf'],$data['deficiencia'], $data['bairro'],$data['cep'],$data['nomeCurso'],$data['estado'],$data['instuicao'],$data['dataInicio'],$data['dataFim'],$data['formacao'],$data['formacaoStatus'],$data['image'], $cpf]]); //Update
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Excluindo pessoas
	public function excluir($cpf){
		$res = DB::delete("delete from estudante WHERE cpf = ?", [$cpf]); //Excluir
 
		return ["status" => ($res)?'ok':'erro'];
}

}
