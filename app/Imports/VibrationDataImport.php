<?php

namespace App\Imports;

use App\Models\VibrationData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Validation\Rule;

class VibrationDataImport implements ToModel, WithBatchInserts, WithChunkReading, WithValidation, WithHeadingRow, WithCustomCsvSettings
{
    /**
     * @param array $row
     *
     * @return VibrationData|null
     */
    public function model(array $row)
    {
        return new VibrationData([
            'number' => $row['number'],
            'evid' => $row['evid'],
            'province' => $row['provincename'],
            'line_name' => $row['linename'],
            'clock' => $row['clock'],
            'voltage' => $row['voltage'],
            'gt_number' => $row['gtnumber'],
            'voltage_type' => $row['voltagetype'],
            'span' => $row['span'],
            'line_angle' => $row['lineangle'],
            'wind_direction' => $row['winddirection'],
            'wind_speed' => $row['windspeed'],
            'humidity' => $row['humidity'],
            'temperature' => $row['temperature'],
            'precipitation' => $row['precipitation'],
            'ice_thickness' => $row['icethickness'],
            'angle' => $row['angle'],
            'vertical_wind_speed' => $row['verticalwindspeed'],
            'podu' => $row['podu'],
            'pogao' => $row['pogao'],
            'dimao' => $row['dimao'],
            'wudong' => $row['wudong'],
            'tiaozha' => $row['tiaozha'],
            'pohuai' => $row['pohuai'],
        ]);
    }

    public function rules(): array
    {
        return [

        ];
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
        return [
            'delimiter' => "\t"
        ];
    }

}