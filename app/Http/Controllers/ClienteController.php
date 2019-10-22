<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\API\ApiError;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return response()->json(Cliente::paginate(10));
    }

    public function show(Request $cliente)
    {
     // dd($cliente);
         return response()->json(Cliente::find($cliente->id));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            Cliente::create($request->all());

            return response()->json(['msg'=>'Criado com suceso'],201);

        }catch(\Exception $e){
                
            if(config('api.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(),1010));
                    
            }

            return response()->json(['msg'=>'Error de isert'],1012);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try{

           

            $cliente = Cliente::find($id);
           
            if($cliente!=null){
                
                $cliente->update($request->all());

                return response()->json(['msg'=>'Atualizado com suceso'],201);
            }
          

        }catch(\Exception $e){
                
            if(config('api.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(),1010));
                    
            }

            return response()->json(['msg'=>'Error de update'],1012);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        try{

            $cliente = Cliente::find($id);

            $cliente->delete();

            return response()->json(['msg'=>'Deletado com suceso'],200);

        }catch(\Exception $e){
                
            if(config('api.debug')){

                return response()->json(ApiError::errorMessage($e->getMessage(),1010));
                    
            }

            return response()->json(['msg'=>'Error de update'],1012);

        }
    }
}
