<?php

namespace Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public static $Deleted = 2;
    public static $Active = 1;
    public static $Inactive = 0;

    public static $EstadosEliminables = [1,0];

    public static function getAll($search = "",$relations = [], $onlyActive = true )
    {
        $query = Self::select();

        if($relations){
            $query =  $query->with($relations);
        }

        if (!empty($search)){
            $query = Self::orWhere("name","like","%".$search."%")->orWhere("code","like","%".$search."%");
        }

        return $query->get();
    }



    public function saveNewEntity()
    {
        $this->enum_salida = 1;
        $this->enum_entrada = 1;
        $this->state= 1;
        $this->save();
    }

    public function updateEntity()
    {
        $this->update();
    }

    public function removeEntity()
    {
        $this->state = self::$Deleted;
        $this->update();
    }

    public function toggleState()
    {

        if($this->state==self::$Inactive){

            $this->state=self::$Active;

        }else{

            $this->state = self::$Inactive;
        }

        $this->update();

        return $this->state;
    }

    public static function getById($id)
    {
        return Self::where('id', $id)->firstOrFail();
    }

    public static function getByCode($code)
    {
        return Self::where('code', $code)->first();
    }

}
