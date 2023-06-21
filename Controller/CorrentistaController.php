<?php

namespace ApiBancoDigital\Controller;

use ApiBancoDigital\Model\CorrentistaModel;

class CorrentistaController extends Controller
{
    public static function save() : void
    {
        try
        {  
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();

            $model->id = $json_obj->id;
            $model->nome = $json_obj->nome;
            $model->cpf = $json_obj->cpf;
            $model->data_nasc = $json_obj->data_nasc;
            $model->email = $json_obj->email;
            $model->senha = $json_obj->senha;
            $model->data_cad = $json_obj->data_cad;
        

        $model->save();
        }
        catch(Exception $e)
        {
            parent::getExceptionAsJSON($e);
        }
    }

    public static function select() : void
    {
        try
        {
            $model = new CorrentistaModel();
            
            $model->getAllRows();

            parent::getResponseAsJSON($model->rows);
              
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    public static function auth()
    {
        try 
        {
            $json_obj = json_decode(file_get_contents('php://input'));

            $model = new CorrentistaModel();
            $model->cpf = $json_obj->Cpf;
            $model->senha = $json_obj->Senha;

            parent::getResponseAsJSON($model->AuthenticCorrentista());
        } catch (Exception $err) {
            parent::getExceptionAsJSON($err);
        }
    }

    public static function delete() : void
    {
        try
		{
			$model = new CorrentistaModel();

			$model->id = parent::getIntFromUrl(isset($_GET['id']) ? $_GET['id'] : null);

			$model->delete();
		}
		catch(Exception $e)
		{
			parent::getExceptionAsJSON($e);
		}
    }
}