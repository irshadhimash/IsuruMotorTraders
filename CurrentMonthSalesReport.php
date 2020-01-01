<?php

class CurrentMonthSalesReport extends KoolReport{

    // setting
    protected function setting(){

        return array(
            "datasources" => array(
                "automaker" => array(
                    "ConenctionString" => "mysql:host = localhost; dbname = isurumotortraders",
                    "username" => "root",
                    "password" => "",
                    "charset" => "utf-8"
                )
            )
        );

    }

    protected function setup(){
        $this->src("automaker")
        ->query("
        call GetTotalSalesByMonth
        ")
        ->pipe( $this->datasource("result") );
    }

}

?>