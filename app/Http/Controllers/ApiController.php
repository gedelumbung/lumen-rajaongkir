<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hok00age\RajaOngkir;

class ApiController extends Controller
{
	private $rajaongkir;

	public function __construct(){
		$this->rajaongkir = new RajaOngkir(ENV("RAJA_ONGKIR_KEY"), ENV("RAJA_ONGKIR_ACCOUNT_TYPE"));
	}

    public function provinces(){
        $provinces = $this->rajaongkir->getProvince();
        return response()->json($this->_parse($provinces));
    }

    public function getCities(){
        return $this->cities();
    }

    public function getCitiesByProvince($provinceId){
        return $this->cities($provinceId);
    }

    private function cities($provinceId = null){
        $cities = $this->rajaongkir->getCity($provinceId);
        return response()->json($this->_parse($cities));
    }

    public function cost(Request $request){
        $input = $request->input();

        $rules = [
            'origin' => 'required',
            'destination' => 'required',
            'weight' => 'required',
        ];

        $v = \Validator::make($input, $rules);

        if($v->fails()){
            return response()->json($v->messages());
        }

        $cities = $this->rajaongkir->getCost($input['origin'], $input['destination'], $input['weight']);
        return response()->json($this->_parse($cities));
    }

    private function _parse($param){
        return json_decode($param->__get('raw_body'));
    }
}
