<?php


namespace App\Services;


class CheckService
{
    /**
     * @return array
     */
    public function getChecks(): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://ru.enote.link/08efd710-4709-478f-bac1-2d1b7e209599/odata/standard.odata/Document_ДенежныйЧек?$select=Ref_Key,Date,Товары&$filter=Date%20gt%20datetime%272022-10-01T12:52:52%27&$format=json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, 'odatatest:RpG~WU%nX');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $output = curl_exec($ch);
        curl_close($ch);

        $checks = json_decode($output, true)['value'];
        return  $this->orderEncode($checks);
    }

    /**
     * @param $checks
     * @return array
     */
    private function orderEncode($checks) :array
    {
        $countChecks = count($checks)-1;
        for($i=0; $i<=$countChecks; $i++){
            $checks[$i]['Товары'] = json_encode($checks[$i]['Товары']);
        }
        return $checks;
    }
}
