
<?php
/*
Tracking Number
- PO Number
- Data `Scheduled` w formacie daty i godziny (Y-m-d H:i)
- Customer
- Trade
- NTE (jako liczba float - bez formatowania)
- Store ID
- Address z rozbiciem na ulica,
- miasto,
- stan (2 litery)
- kod pocztowy
- Telefon (jako liczba float - bez formatowania)
*/
include('simple_html_dom.php');

$parser = new Parser();
$parser->completeData();
$parser->createReadableTab();
$parser->writeCSV();

class Parser
{
    private array $nsr;private array $wod;private array $ld;private array $completeData=[];
    private array $twoDimensions=[];
    private array $formatData;
    private static string $fileName ="./document.csv";
public function __construct()
{
    $html = file_get_html("./wo_for_parse.html");
// New Service Request
    $this->nsr["customer"] = $html->find("h3[id='customer']", 0)->plaintext;
    $this->nsr["priority"] = $html->find("h3[id='priority']", 0)->plaintext;
    $this->nsr["trade"] = $html->find("h3[id='trade']", 0)->plaintext;
    $this->nsr["scheduled_date"] =  date('d/M/Y h:i:s',strtotime($html->find("h3[id='scheduled_date']", 0)->plaintext));
    $this->nsr["category"] = $html->find("h3[id='category']", 0)->plaintext;
    $this->nsr["nte"]= number_format(floatval(substr($html->find("h3[id='nte']", 0)->plaintext, 1, strlen($html->find("h3[id='nte']", 0)->plaintext)))*1000, 3, ',', ' ');
//Work order details
    $this->wod["area"] = $html->find("h3[id='area']", 0)->plaintext;
    $this->wod["asset"] = $html->find("h3[id='asset']", 0)->plaintext;
    $this->wod["problem_type"] = $html->find("h3[id='problem_type']", 0)->plaintext;
    $this->wod["problem_code"] = $html->find("h3[id='problem_code']", 0)->plaintext;
    $this->wod["po_number"] = $html->find("h3[id='po_number']", 0)->plaintext;
    $this->wod["tracking_number"] = $html->find("h3[id='wo_number']", 0)->plaintext;
//Location details
    $this->ld["location_customer"] = $html->find("h3[id='location_customer']", 0)->plaintext;
    $this->ld["location_name"] = $html->find("h3[id='store_id']", 0)->plaintext;
    $this->ld["location_id"] = $html->find("h3[id='location_name']", 0)->plaintext;
    $this->ld["location_address"] = $html->find("h3[id='location_address']", 0)->plaintext;
    $this->ld["location_phone"] = $html->find("a[id='location_phone']", 0)->plaintext;
//Format Data
    $this->formatData();




}

public function completeData(): void{
    foreach ($this->nsr as $single){
        array_push($this->completeData, $single);
    }
    foreach ($this->wod as $single){
        array_push($this->completeData, $single);
    }
    foreach ($this->ld as $single){
        array_push($this->completeData, $single);
    }
}

public function createReadableTab(): void{
    array_push($this->twoDimensions, ["Tracking Number", $this->wod["tracking_number"]]);
    array_push($this->twoDimensions, ["PO number", $this->wod["po_number"]]);
    array_push($this->twoDimensions, ["Schedule data", $this->nsr["scheduled_date"]]);
    array_push($this->twoDimensions, ["Customer",  $this->nsr["customer"]]);
    array_push($this->twoDimensions, ["Trade",  $this->nsr["trade"]]);
    array_push($this->twoDimensions, ["NTE", $this->nsr["nte"]]);
    array_push($this->twoDimensions, ["Address", $this->formatData["streetName"]]);
    array_push($this->twoDimensions, ["City",  $this->ld["location_name"]]);
    array_push($this->twoDimensions, ["State", $this->formatData["state"]]);
    array_push($this->twoDimensions, ["Postcode", $this->formatData["postcode"]]);
    array_push($this->twoDimensions, ["Phone",  $this->formatData["phone"]]);

}



public function writeCSV(): void{
    $file = fopen(Parser::$fileName, 'w');
    if ($file === false) {
        die('Error opening the file ' . Parser::$fileName);
    }

    foreach ($this->twoDimensions as $row) {
        fputcsv($file, $row, ";", '"', "\\");
    }

}

private function formatData():void{
    //Adress to postcod, street and state converison
    //(nte to float and schedule date have been converted at construct function)
    $adres = explode(" ", trim($this->ld["location_address"]));
    $this->formatData["postcode"] = end($adres);
    $this->formatData["streetName"] = $adres[0]." ".$adres[1]." ".$adres[2];
    $this->formatData["state"] = $adres[3];

    //phone


    //phone
    $this->formatData["phone"] = floatval(str_replace("-", "", trim($this->ld["location_phone"])));


}

}


?>
