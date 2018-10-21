<?php

namespace App\Infrastructure;


class LocalFileStorage
{
    private static function indexData(Array $old_data, $data)
    {
        $data['id'] = count($old_data) + 1;
        return $data;
    }

    public static function store($file_path, $data)
    {
        // Retrive existing json from file as old data
        $old_data = self::retriveAll($file_path);

        // add new element to the json array and create new data
        array_push($old_data, self::indexData($old_data, $data));
        $new_data = json_encode($old_data);

        // Save the new json to the file
        $myfile = fopen($file_path, 'w') or die('Unable to open file!');
        fwrite($myfile, $new_data);
        fclose($myfile);
    }

    public static function retriveAll($file_path)
    {
        $myfile = fopen($file_path, 'r') or die('Unable to open file!');
        $data = json_decode(fread($myfile, filesize($file_path)));
        fclose($myfile);

        return $data;
    }

    public static function retriveById(String $file_path, Int $id)
    {
        $data = self::retriveAll($file_path);

        for($i = 0; $i < count($data); $i++)
        {
            if($data[$i]->id === $id)
            {
                return $data[$i];
            }
        }
    }
}
