<?php

namespace App\Imports;

use App\Models\VibrationData;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Validation\Rule;

class VibrationDataImport implements ToModel, WithBatchInserts, WithChunkReading, WithValidation, WithHeadingRow, WithCustomCsvSettings
{

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param array $row
     *
     * @return VibrationData|null
     */
    public function model(array $row)
    {

        return new VibrationData([
            'filename' => $this->filename,
            'number' => $row['number'] ?? 0,
            'evid' => $row['evid'] ?? 0,
            'province' => $row['provincename'] ?? '',
            'line_name' => $row['linename'] ?? '',
            'clock' => $row['clock'] ?? 0,
            'gt_number' => $row['gtnumber'] ?? 0,
            'voltage' => $row['voltage'] ?? 0,
            'voltage_type' => $row['voltagetype'] ?? 0,
            'span' => $row['span'] ?? 0,
            'line_angle' => $row['lineangle'] ?? 0.0,
            'wind_direction' => $row['winddirection'] ?? 0.0,
            'wind_speed' => $row['windspeed'] ?? 0.0,
            'humidity' => $row['humidity'] ?? '',
            'temperature' => $row['temperature'] ?? 0.0,
            'precipitation' => $row['precipitation'] ?? 0.0,
            'ice_thickness' => $row['icethickness'] ?? 0.0,
            'angle' => $row['angle'] ?? 0.0,
            'vertical_wind_speed' => $row['verticalwindspeed'] ?? 0.0,
            'podu' => $row['podu'] ?? 0,
            'pogao' => $row['pogao'] ?? 0,
            'dimao' => $row['dimao'] ?? 0,
            'fengzhen' => $row['fengzhen'] ?? 0,
            'tiaozha' => $row['tiaozha'] ?? 0,
            'pohuai' => $row['pohuai'] ?? 0,
            'time' => isset($row['time']) ? $this->transferTime($row['time']) : '',
            'batch' => $row['pici'] ?? 0,

            // new added
            'altitude' => isset($row['altitude']) ? $row['altitude'] : 0,
            'longitude' => isset($row['longitude']) ? $row['longitude'] : 0,
            'latitude' => isset($row['latitude']) ? $row['latitude'] : 0,
            'line_type' => isset($row['line_type']) ? $row['line_type'] : null,
            'split_number' => isset($row['split_number']) ? $row['split_number'] : 0,
            'split_span' => isset($row['split_span']) ? $row['split_span'] : 0,
            'max_span' => isset($row['max_span']) ? $row['max_span'] : 0,
            'insulator_type' => isset($row['insulator_type']) ? $row['insulator_type'] : null,
            'shock_device' => isset($row['shock_device']) ? $row['shock_device'] : 0,
            'reserved_a' => isset($row['reserved_a']) ? $row['reserved_a'] : 0,
            'reserved_b' => isset($row['reserved_b']) ? $row['reserved_b'] : 0,
            'reserved_c' => isset($row['reserved_c']) ? $row['reserved_c'] : null,
            'reserved_d' => isset($row['reserved_d']) ? $row['reserved_d'] : null,
            'reserved_e' => isset($row['reserved_e']) ? $row['reserved_e'] : null,
        ]);
    }

    public function rules(): array
    {
        return [
//            'unique' => 'required|unique:vibration_data,key'
        ];
    }

    protected function transferTime($time)
    {
        if (strstr($time, '_')) {
            $_arr = explode('_', $time);
        } else {
            $_arr = explode('.', $time);
        }

        if ($_arr) {
            $month = $_arr[1];
            $year = $_arr[0];
            return Carbon::create($year, $month)->format('Ym');
        }

        return '';
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getCsvSettings(): array
    {
        $ext = $this->getExtension();
        if ($ext === 'csv') {
            return [
                'delimiter' => ","
            ];
        } else {
            return [
                'delimiter' => "\t"
            ];
        }
    }

    protected function getExtension()
    {
        $_arr = explode('.', $this->filename);
        if (count($_arr)) {
            return $_arr[1];
        }
        return '';
    }

}