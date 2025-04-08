<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Employee;
use App\Models\Client;

class SystemReportChart extends Chart
{
    public function __construct()
    {
        parent::__construct();
    }

    public function build()
    {
        $employeesCount = Employee::count();
        $clientsCount = Client::count();

        return $this->labels(['Employees', 'Clients'])
            ->dataset('Total Count', 'bar', [$employeesCount, $clientsCount])
            ->backgroundColor(['#3498db', '#2ecc71']);
    }
}
