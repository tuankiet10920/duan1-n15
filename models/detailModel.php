<?php
class HomeModel
{
    public function getMonitorWithId($id)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor, monitor.name, price, type_screen, response_time, in_stock, gurantee, size, describe_monitor, status, brand.name as brand_name, color_space.name as color_space_name, base_plate.name as base_plate_name, screen_solution.name as screen_solution_name ,number_number, scan_frequency.number from monitor 
inner join brand on monitor.brand = brand.id_brand
inner join color_space on monitor.color_space = color_space.id_color_space
inner join base_plate on monitor.base_plate = base_plate.id_base_plate
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution
inner join scan_frequency on monitor.scan_frequency = scan_frequency.id_scan_frequency
where id_monitor = :id;";
        return $data->selectall($sql, $id);
    }
}
