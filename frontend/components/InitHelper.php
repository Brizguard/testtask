<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 06.04.2019
 * Time: 13:07
 */

namespace frontend\components;


use frontend\models\Employee;
use Yii;
use yii\helpers\Url;

class InitHelper
{
    /**
     * Сумма зарплат работников с учетом налога
     * @param Employee $employee
     * @return float сумма с учетом налога
     */
    public static function getSumSalaryWithTax($employeeList){

        $sum = 0;
        foreach ($employeeList as $employee){
            $sum += self::getSalaryTax($employee);
        }

        return $sum;
    }


    /**
     * Зарплата работника с учетом налога
     * @param Employee $employee
     * @return float зарплата работника с учетом налога
     */
    public static function getSalaryTax( Employee $employee){

        $tax1 = 0.1;//Если зп меньше 10000
        $tax2 = 0.15;//Если зп 10000 - 25000
        $tax3 = 0.25;//Если зп более 25000

        if($employee->salary < 10000){
           $salaryResult = $employee->salary - ($employee->salary * $tax1);
        }elseif($employee->salary >= 10000 && $employee->salary <= 25000 ){
            $salaryResult = $employee->salary - ($employee->salary * $tax2);
        }elseif($employee->salary > 25000){
            $salaryResult = $employee->salary - ($employee->salary * $tax3);
        }

        return $salaryResult;
    }

    public static function generateTxtReport($employeeList){

        $name = __DIR__ ."/reports/".date("Ymd_His")."_report.txt";
        $save = fopen($name, 'w');
        $sum = 0;
        $rows = '';
        foreach ($employeeList as $employee){
            $salary = self::getSalaryTax($employee);
            $sum += $salary;
            $rows .= 'Имя + Фамилия: '.$employee->name.' '.$employee->surname.PHP_EOL.
                     'Заработная плата: '.$employee->salary.' руб. '.PHP_EOL.
                     'Сумма налога на доход физических лиц: ' . ($employee->salary - $salary).' руб. '.PHP_EOL.
                     'Заработная плата с вычетом налога: '. $salary.' руб. '.PHP_EOL.
            '-----------------------------------------------------------------------'.PHP_EOL;

        }
        $header = 'Общая ЗП с учетом налоговых вычетов '.$sum.' руб.'.PHP_EOL.
        '-----------------------------------------------------------------------'.PHP_EOL;;

        $resultText = $header.$rows;
        fwrite($save, $resultText);
        fclose($save);

        if (file_exists($name)) {
            return \Yii::$app->response->sendFile($name);
        }

    }

}