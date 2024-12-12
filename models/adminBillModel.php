<?php
class AdminBillModel {
    public function getBillWithUser(){
        include_once'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select bill.id_bill, bill.date_time as time, bill.price, user.name, user.phone, bill.status from bill inner join user
        on bill.id_user = user.id_user order by date_time desc;";
        return $data->selectall($sql);
    }

    public function filterBill($listFilter){
        include_once'models/connectModel.php';
        $data = new ConnectModel();
        $isAnd = false;
        $sql = "select bill.id_bill, bill.date_time as time, bill.price, user.name, user.phone, bill.status from bill inner join user
        on bill.id_user = user.id_user";
        if(count($listFilter) !== 0){
            $sql .= " where ";

            // price
            if(isset($listFilter['priceFrom']) && isset($listFilter['priceTo'])){
                $priceFrom = $listFilter['priceFrom'];
                $priceTo = $listFilter['priceTo'];
                if($isAnd){
                    $sql.= " and ";
                }else{
                    $isAnd = true;
                }
                $sql .= "price between $priceFrom and $priceTo";
            }else{
                if(isset($listFilter['priceFrom'])){
                    $priceFrom = $listFilter['priceFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    }else{
                        $isAnd = true;
                    }
                    $sql.= "price >= $priceFrom";
                }else if(isset($listFilter['priceTo'])){
                    $priceTo = $listFilter['priceTo'];
                    if($isAnd){
                        $sql.= " and ";
                    }else{
                        $isAnd = true;
                    }
                    $sql .= "price <= $priceTo";
                }
            }

            // day
            if(isset($listFilter['dayFrom']) && isset($listFilter['dayEnd'])){
                $dayFrom = $listFilter['dayFrom'];
                $dayEnd = $listFilter['dayEnd'];
                if($isAnd){
                    $sql.= " and ";
                }else{
                    $isAnd = true;
                }
                $sql.= "day(date_time) between $dayFrom and $dayEnd";
            }else{
                if(isset($listFilter['dayFrom'])){
                    $dayFrom = $listFilter['dayFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    }else{
                        $isAnd = true;
                    }
                    $sql.= "day(date_time) > $dayFrom";
                }else if(isset($listFilter['dayEnd'])){
                    $dayEnd = $listFilter['dayEnd'];
                    if($isAnd){
                        $sql.= " and ";
                    }else{
                        $isAnd = true;
                    }
                    $sql.= "day(date_time) < $dayEnd";
                }
            }

            // month

            if(isset($listFilter['monthFrom']) && isset($listFilter['monthEnd'])){
                $monthFrom = $listFilter['monthFrom'];
                $monthEnd = $listFilter['monthEnd'];
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "month(date_time) between $monthFrom and $monthEnd";
            }else{
                if(isset($listFilter['monthFrom'])){
                    $monthFrom = $listFilter['monthFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "month(date_time) > $monthFrom";
                } else if(isset($listFilter['monthEnd'])){
                    $monthEnd = $listFilter['monthEnd'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "month(date_time) < $monthEnd";
                }
            }

            // year

            if(isset($listFilter['yearFrom']) && isset($listFilter['yearEnd'])){
                $yearFrom = $listFilter['yearFrom'];
                $yearEnd = $listFilter['yearEnd'];
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "year(date_time) between $yearFrom and $yearEnd";
            }else{
                if(isset($listFilter['yearFrom'])){
                    $yearFrom = $listFilter['yearFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "year(date_time) > $yearFrom";
                } else if(isset($listFilter['yearEnd'])){
                    $yearEnd = $listFilter['yearEnd'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "year(date_time) < $yearEnd";
                }
            }

            // hour

            if(isset($listFilter['hourFrom']) && isset($listFilter['hourTo'])){
                $hourFrom = $listFilter['hourFrom'];
                $hourTo = $listFilter['hourTo'];
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "hour(date_time) between $hourFrom and $hourTo";
            }else{
                if(isset($listFilter['hourFrom'])){
                    $hourFrom = $listFilter['hourFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "hour(date_time) > $hourFrom";
                } else if(isset($listFilter['hourTo'])){
                    $hourTo = $listFilter['hourTo'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "hour(date_time) < $hourTo";
                }
            }

            // name

            if(isset($listFilter['name'])){
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "user.name like '%". $listFilter['name']. "%'";
            }

            // minute

            if(isset($listFilter['minuteFrom']) && $listFilter['minuteTo']){
                $minuteFrom = $listFilter['minuteFrom'];
                $minuteTo = $listFilter['minuteTo'];
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "minute(date_time) between $minuteFrom and $minuteTo";
            }else{
                if(isset($listFilter['minuteFrom'])){
                    $minuteFrom = $listFilter['minuteFrom'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "minute(date_time) > $minuteFrom";
                } else if(isset($listFilter['minuteTo'])){
                    $minuteTo = $listFilter['minuteTo'];
                    if($isAnd){
                        $sql.= " and ";
                    } else{
                        $isAnd = true;
                    }
                    $sql.= "minute(date_time) < $minuteTo";
                }
            }

            // phone

            if(isset($listFilter['phone'])){
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "user.phone like '%". $listFilter['phone']. "%'";
            }

            // status 
            if(isset($listFilter['status'])){
                if($isAnd){
                    $sql.= " and ";
                } else{
                    $isAnd = true;
                }
                $sql.= "bill.status = ". $listFilter['status']. "";
            }
            
            $sql .= ';';
        }
        
        return $data->selectall($sql);
    }
}