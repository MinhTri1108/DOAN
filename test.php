$testx =  mysqli_query($conn, $sql);
              foreach ($testx as $key => $value)
              {
                
                $chuyen =array(
                  'stc' => $value['SoTinChi'],
                  'dtbm' => $value['DiemTBMon'],
                );
                // $c = array_merge($chuyen);
                echo "<pre>";
                print_r($chuyen);
                $check[]=array_product($chuyen);
                echo "</pre>";
                // print_r($check);
                echo "<pre>";
                print_r($check);
                echo "</pre>";
                
                print_r(array_sum($check));
                
              
              }
              for(i=0 ; i<array [],i++)
{
	tong+=a[i];
}
echo tong;