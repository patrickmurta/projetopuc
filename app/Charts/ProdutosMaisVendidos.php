<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class ProdutosMaisVendidos extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }

    public function dataResponse(){

        $arrayChart = array(
            'chart' => array(
                'labels' => array('Primeiro', 'segundo', 'terceiro')
            ),
            'datasets' => array(
                array('name' => 'Teste 1', 'values' => array(10,30,2)),
                array('name' => 'Teste 2', 'values' => array(40,20,20)),
            )
        );

        return response()->json($arrayChart);
    }
}
